<?php

namespace app\admin\model;

use think\Model;


class Purchase extends Model
{

    

    //数据库
    protected $connection = 'database';
    // 表名
    protected $name = 'order';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'status_text'
    ];
    

    
    public function getStatusList()
    {
        return [ '1' => __('未入库'),'2' => __('已入库'),'3' => __('已出库')];
    }


    public function getStatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['status']) ? $data['status'] : '');
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }




    public function account()
    {
        return $this->belongsTo('Account', 'purchase_er', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
