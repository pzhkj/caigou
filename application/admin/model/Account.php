<?php

namespace app\admin\model;

use think\Model;


class Account extends Model
{

    

    //数据库
    protected $connection = 'database';
    // 表名
    protected $name = 'account';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'type_text'
    ];
    

    
    public function getTypeList()
    {
        return ['3' => __('客服账户'), '2' => __('库存账户'), '1' => __('采购账户')];
    }


    public function getTypeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['type']) ? $data['type'] : '');
        $list = $this->getTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }




}
