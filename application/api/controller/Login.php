<?php

namespace app\api\controller;

use app\common\controller\Api;

/**
 * 登录接口
 */
class Login extends Api
{

    //如果$noNeedLogin为空表示所有接口都需要登录才能请求
    //如果$noNeedRight为空表示所有接口都需要验证权限才能请求
    //如果接口已经设置无需登录,那也就无需鉴权了
    //
    // 无需登录的接口,*表示全部
    protected $noNeedLogin = ['login'];
    // 无需鉴权的接口,*表示全部
    protected $noNeedRight = ['test2'];

    /**
     * 测试方法
     *
     * @ApiTitle    (测试名称)
     * @ApiSummary  (测试描述信息)
     * @ApiMethod   (POST)
     * @ApiRoute    (/api/demo/test/id/{id}/name/{name})
     * @ApiHeaders  (name=token, type=string, required=true, description="请求的Token")
     * @ApiParams   (name="id", type="integer", required=true, description="会员ID")
     * @ApiParams   (name="name", type="string", required=true, description="用户名")
     * @ApiParams   (name="data", type="object", sample="{'user_id':'int','user_name':'string','profile':{'email':'string','age':'integer'}}", description="扩展数据")
     * @ApiReturnParams   (name="code", type="integer", required=true, sample="0")
     * @ApiReturnParams   (name="msg", type="string", required=true, sample="返回成功")
     * @ApiReturnParams   (name="data", type="object", sample="{'user_id':'int','user_name':'string','profile':{'email':'string','age':'integer'}}", description="扩展数据返回")
     * @ApiReturn   ({
         'code':'1',
         'msg':'返回成功'
        })
     */

    /**
     * @ApiTitle (登录)
     * @ApiMethod   (POST)
     * @param string $login_name 账号
     * @param string $login_password 密码
     * @param int $login_type 类型1采购2库存3客服
     */
    public function login(){
        $account = $this->request->request('phone');
        $password = $this->request->request('login_password');
        $type = $this->request->request('login_type');
        if (!$account || !$password || !$type) {
            $this->error(__('缺少参数'));
        }
        $ret = $this->accounts->login($account, $password, $type);
        if ($ret) {
            $session = session('account');

            $data = ['userinfo' => isset($session[$type]) || is_array($session[$type]) ? $session[$type] : '获取用户信息异常','token'=>$ret];
            $this->success(__('登录成功'), $data);
        } else {
            $this->error(__('登录失败'));
        }
    }

    /**
     * @ApiTitle (退出登录)
     * @ApiMethod   (POST)
     */
    public function logout(){
        session(null);
        $this->success(__('退出成功'));
    }

}
