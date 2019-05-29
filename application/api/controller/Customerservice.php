<?php
namespace app\api\controller;

use app\admin\model\Account;
use app\common\controller\Api;
use app\common\model\Order;
use fast\Date;

/**
 * 客服端
 */
class Customerservice extends Api {
    protected $noNeedLogin = ['getOrder'];
    protected $account_id = null;
    public function _initialize()
    {
        $session = session('account');
        $this->account_id = isset($session[3]['id']) ? $session[3]['id'] : 3;
    }

    /**
     * 获取所有采购记录
     * @throws \think\exception\DbException
     */
    public function getOrder(){

        $list = Order::all(["status"=>'1']);
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
     * 编辑采购订单
     * @ApiMethod   (POST)
     * @ApiParams  (name="data", type="object", sample="{'product_name':'string','qty':'int','product_image':'string','order_sn':'string','create_at':'dateTime','delivery_at':'dateTime','delivery_at':'dateTime','delivery_at':'dateTime'}", description="扩展数据")
     */

    public function editOrder(){

    }
}