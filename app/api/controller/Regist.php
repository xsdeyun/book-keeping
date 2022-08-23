<?php
namespace app\api\controller;

use think\facade\Request;
use think\facade\Db;
use think\facade\Cookie;
use app\BaseController;
use app\common\Api\UserList as U;
class Regist extends Base
{
    /**
     * 请求方法 get post put delete
     * get 数据请求
     * post 新增
     * put 更新
     * delete 删除
     * 
     */
    // 登录
        // 用户新增
     public function index()
    {
        $post_data = Request::post();
        $get_data=U::add_user_data($post_data);  
        return json($get_data);
    }
}
