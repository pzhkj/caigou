<?php
namespace app\api\controller;

use app\admin\model\Account;
use app\common\controller\Api;
use app\common\model\Order;
use fast\Date;
use think\Db;
/**
 * 采购端
 */
class Purchase extends Api {
    protected $noNeedLogin = ['getOrder'];
    protected $account_id = null;
    public function _initialize()
    {
        $session = session('account');
        $this->account_id = isset($session[1]['id']) ? $session[1]['id'] : 1;
    }
    /**
     * 获取本账户采购记录
     * @throws \think\exception\DbException
     */
    public function getOrder(){

        /*$list = Order::get(['purchase_er'=>$this->account_id,'status'=>'1'])->order('create_at','desc')->column('id,product_name,qty,product_image,order_sn,create_at,delivery_at,status,remarks');*/
        $user = $this->account_id;
        $list = Db('order')->where("purchase_er = $user and status = '1'")->order('create_at desc')->field('id,product_name,qty,product_image,order_sn,create_at,delivery_at,status,remarks')->select();
        $this->success(__('获取成功'), $list);
    }

    /**
     * 创建采购记录
     * @ApiMethod   (POST)
     * @param string product_name 商品名称
     * @param int qty 商品数量
     * @param string product_image 商品图片
     * @param \DateTime delivery_at 送货时间
     */
    public function creOrder(){
        $product_name = $this->request->request('product_name');
        $qty = $this->request->request('qty');
        $product_image = $this->request->request('product_image');
        $delivery_at = $this->request->request('delivery_at');
        if(!$product_name || !$qty || !$product_image || !$delivery_at){
            $this->error(__('缺少参数'));
        }
        $param = [
            'purchase_er'=>$this->account_id,
            'product_name'=>$product_name,
            'qty'=>$qty,
            'product_image'=>$product_image,
            'order_sn'=>"ORDERSN".time(),
            'create_at'=>date('Y-m-d H:i:s',time()),
            'delivery_at'=>$delivery_at?date('Y-m-d H:i:s',strtotime($delivery_at)):NULL,
            'status'=>1,
            'remarks'=>isset($_POST['remarks']) ? $_POST['remarks'] : NULL
        ];
        $add = Order::create($param);
        if($add) {
            $this->success(__('获取成功'), $add->toArray());
        }else{
            $this->error(__('获取失败'));
        }

    }

    /**
     * 获取采购订单详情
     * @ApiMethod   (POST)
     * @param int order_id 商品名称
     */
    public function getOrderInfo(){
        $order_id = $this->request->request('order_id');
        $info=Db::name('order')
        ->where(['id'=>$order_id])
        ->field('id,product_name,qty,product_image,order_sn,create_at,delivery_at,status,remarks,in_system_at,out_system_at')
        ->find();
        /*$info = Order::get("id" => $order_id)->column('id,product_name,qty,product_image,order_sn,create_at,delivery_at,status,remarks');*/
        $nums=Db::name('order')
        ->where(['product_name'=>$info['product_name']])
        ->field('sum(qty) nums')
        ->find();
        $info['stock'] = $nums['nums']; 
        if(is_array($info) && !empty($info)) {
            $this->success(__('获取成功'), $info);
        }else{
            $this->error(__('获取失败'));
        }
    }
    /**
     * 获取所有的商品
     * @ApiMethod   (POST)
     * 
     */
    public function allProducts(){
        $info=Db::name('order')
        ->field('product_name')
        ->group('product_name')
        ->select();
        if(is_array($info) && !empty($info)) {
            $this->success(__('获取成功'), $info);
        }else{
            $this->error(__('获取失败'));
        }
    }
    
}