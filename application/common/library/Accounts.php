<?php

namespace app\common\library;

use app\common\model\Account;
use app\common\model\UserRule;
use fast\Random;
use think\Config;
use think\Db;
use think\Exception;
use think\Hook;
use think\Request;
use think\Validate;

class Accounts
{
    protected static $instance = null;
    protected $_error = '';
    protected $_logined = false;
    protected $_user = null;
    protected $_token = '';
    //Token默认有效时长
    protected $keeptime = 2592000;
    protected $requestUri = '';
    protected $rules = [];
    //默认配置
    protected $config = [];
    protected $options = [];
    protected $allowFields = ['id', 'username', 'nickname', 'mobile', 'avatar', 'score'];

    public function __construct($options = [])
    {
        if ($config = Config::get('user')) {
            $this->config = array_merge($this->config, $config);
        }
        $this->options = array_merge($this->config, $options);
    }

    /**
     *
     * @param array $options 参数
     * @return Auth
     */
    public static function instance($options = [])
    {
        if (is_null(self::$instance)) {
            self::$instance = new static($options);
        }

        return self::$instance;
    }

    /**
     * 获取User模型
     * @return User
     */
    public function getUser()
    {
        return $this->_user;
    }

    /**
     * 兼容调用user模型的属性
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->_user ? $this->_user->$name : null;
    }

    /**
     * 根据Token初始化
     *
     * @param string $token Token
     * @return boolean
     */
    public function init($token)
    {
        if ($this->_logined) {
            return true;
        }
        if ($this->_error) {
            return false;
        }
        $data = Token::get($token);
        if (!$data) {
            return false;
        }
        $user_id = $data['user_id']+0;
        if ($user_id > 0) {
            $user= $this->get($user_id);
            /*$user = User::get($user_id);
            
            print_r($user);
            if (!$user->login_name) {
                $this->setError('Account not exist');
                return false;
            }
            /*if ($user['status'] != 'normal') {
                $this->setError('Account is locked');
                return false;
            }*/
            $this->_user = $user;
            $this->_logined = true;
            $this->_token = $token;

            //初始化成功的事件
            Hook::listen("user_init_successed", $this->_user);

            return true;
        } else {
            $this->setError('You are not logged in');
            return false;
        }
    }

    /**
     * 用户登录
     *
     * @param string $account  账号,用户名、邮箱、手机号
     * @param string $password 密码
     * @return boolean
     */
    public function login($account, $password, $login_type)
    {
        $user = Account::get(['phone' => $account,'type'=>$login_type]);
        
        if (!$user) {
            $this->setError('用户不存在');
            return false;
        }
        if ($user->login_password != $password) {
            $this->setError('密码不正确');
            return false;
        }
        $this->_token = (Random::uuid());
        Token::set($this->_token, $user->id, $this->keeptime);
        $this->_logined = true;
        session('account',array($login_type=>array("info"=>$user)));
        return $this->_token;
    }

    /**
     * 注销
     *
     * @return boolean
     */
    public function logout()
    {
        if (!$this->_logined) {
            $this->setError('You are not logged in');
            return false;
        }
        //设置登录标识
        $this->_logined = false;
        //删除Token
        Token::delete($this->_token);
        //注销成功的事件
        Hook::listen("user_logout_successed", $this->_user);
        return true;
    }

    /**
     * 判断是否登录
     * @return boolean
     */
    public function isLogin()
    {
        if ($this->_logined) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * 获取当前请求的URI
     * @return string
     */
    public function getRequestUri()
    {
        return $this->requestUri;
    }

    /**
     * 设置当前请求的URI
     * @param string $uri
     */
    public function setRequestUri($uri)
    {
        $this->requestUri = $uri;
    }

    /**
     * 设置错误信息
     *
     * @param $error 错误信息
     * @return Auth
     */
    public function setError($error)
    {
        $this->_error = $error;
        return $this;
    }

    /**
     * 获取错误信息
     * @return string
     */
    public function getError()
    {
        return $this->_error ? __($this->_error) : '';
    }
    /**
     * 获取错误信息
     * @return string
     */
    public function get($id)
    {
         $user = Account::get(['id'=>$id]);
         return $user;
    }
}
