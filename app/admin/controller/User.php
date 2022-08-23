<?php
namespace app\admin\controller;

use think\facade\Request;
use think\facade\View;
use think\facade\Db;
use app\common\Admin\UserList as U;

class User extends Base
{
      protected $middleware = ['LoginCheck'];
    
    /**
     * 请求方法 get post put delete
     * get 数据请求
     * post 新增
     * put 更新
     * delete 删除
     * 
     */
    // 用户列表
     public function list()
    {
        $post_data = Request::get();
        $get_data=U::sea_user_data($post_data);  
        return json($get_data);
    }
    // 用户新增
     public function add()
    {
        $post_data = Request::post();
        $get_data=U::add_user_data($post_data);  
        return json($get_data);
    }
    // 用户更新
     public function update()
    {
        $post_data = Request::put();
        $get_data=U::update_user_data($post_data);  
        return json($get_data);
    }
    // 用户删除
     public function delete()
    {
        $post_data = Request::get("id");
        $get_data=U::delete_user_data($post_data);  
        return json($get_data);
    }
}
