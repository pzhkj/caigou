<?php
namespace app\api\controller;

use app\admin\model\Account;
use app\common\controller\Api;
use app\common\model\Order;
use fast\Date;
use think\Db;
/**
 * 库存端
 */
class Stock extends Api {
    protected $noNeedLogin = ['getOrder'];
    protected $account_id = null;
    public function _initialize()
    {
header('Content-type:text/html;charset="gbk"');  
        $session = session('account');
        $this->account_id = isset($session[2]['id']) ? $session[2]['id'] : 2;
    }

    /**
     * 获取所有采购记录
     * @throws \think\exception\DbException
     */
    public function getOrder(){

        $list = Order::all(['status'=>'1']);
        $this->success(__('获取成功'),$list);
    }

    /**
     * 获取采购订单详情
     * @ApiMethod   (POST)
     * @param int order_id 订单ID
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
     * 入库
     * @ApiMethod   (POST)
     * @param int order_id 订单ID
     * @param int qty 入库数量
     */
    public function inSystem(){
        $order_id = $this->request->request('order_id');
        $qty = $this->request->request('qty');
        if(!$order_id){
            $this->error(__('缺少参数'));
        }
        $order = Order::get(['id'=>$order_id]);
        if($order && is_object($order)) {
            $order->status = 2;
            $order->in_system_at = date("Y-m-d H:i:s",time());
            $order->in_system_qty = $qty;
            $order->in_system_account_id = $this->account_id;
            if($order->save()) {
                $this->success(__('入库成功'));
            }else{
                $this->error(__('入库失败'));
            }
        }else{
            $this->error(__('订单不存在'));
        }
    }

    /**
     * 出库
     * @ApiMethod   (POST)
     * @param int order_id 订单ID
     * @param int qty 入库数量
     */
    public function outSystem(){
        $order_id = $this->request->request('order_id');
        $qty = $this->request->request('qty');
        if(!$order_id){
            $this->error(__('缺少参数'));
        }
        $order = Order::get(['product_name'=>$order_id]);
        if($order && is_object($order)) {
            $param = [
                'out_system_account_id'=>$this->account_id,
                'product_name'=>$order_id,
                'qty'=>'-'.$qty,
                'product_image'=>$order->product_image,
                'order_sn'=>"ORDERSN".time(),
                'delivery_at'=>date('Y-m-d H:i:s',time()),
                'create_at'=>date('Y-m-d H:i:s',time()),
                'out_system_at'=>date('Y-m-d H:i:s',time()),
                'status'=>3,
                'remarks'=>isset($_POST['remarks']) ? $_POST['remarks'] : NULL
            ];
            if(Order::create($param)) {
                $this->success(__('出库成功'));
            }else{
                $this->error(__('出库失败'));
            }
        }else{
            $this->error(__('订单不存在'));
        }
    }
    /*
    *入库记录
    * @ApiMethod   (POST)
    *
    *
    */
    public function inSystemRecords(){
        $list = Db::name('order')
        ->where("status = '2'")
        ->select();        
        $this->success(__('获取成功'),$list);
    }
    /*
    *出库记录
    * @ApiMethod   (POST)
    *
    *
    */
    public function outSystemRecords(){
        $list=Db::name('order')
        ->where("status = '3'")
        ->select();
        $this->success(__('获取成功'),$list);
    }
    /**
     * 库存
     * @ApiMethod   (POST)
     * 
     */
    public function stockNum(){
        $inSystem=Db::name('order')
        ->field('sum(qty) qty,product_name,product_image')
        ->group('product_name')
        ->select();
        if(is_array($inSystem) && !empty($inSystem)) {
            $this->success(__('获取成功'), $inSystem);
        }else{
            $this->error(__('获取失败'));
        }
    }
}