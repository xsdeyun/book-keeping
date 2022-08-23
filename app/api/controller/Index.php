<?php
namespace app\api\controller;

use think\facade\Request;
use think\facade\Db;
use app\BaseController;
use think\facade\Cookie;
class Index extends Base
{

    
    /**
     * 请求方法 get post put delete
     * get 数据请求
     * post 新增
     * put 更新
     * delete 删除
     * 
     */
    
    
    
    public function home()
    {   
        $ip = $_SERVER["REMOTE_ADDR"];
        $weather =$this->http_get("https://news.topurl.cn/api?ip=".$ip);
        $weatherdata=json_decode($weather,true);
        return json(["code"=>200,"msg"=>"请求成功!","weather"=>$weatherdata["data"]["weather"]]);
    }
    // 登录
    public function login()
    {
        $post_data = Request::post();
        $get_data=Db::name('jz_user')->where('username', $post_data['username'])->find();
        if(empty($get_data)){
           $data = ["code"=>400,"msg"=>"账户不存在！"];
        }else if($post_data["username"]!=$get_data["username"]||$post_data["password"]!=$get_data["password"]){
           $data = ["code"=>400,"msg"=>"账户或密码错误！"];
        }else{
           $token = Request::buildToken('__token__', 'sha1');
           Cookie::set('token', $token);
           $data = ["code"=>200,"msg"=>"登录成功！","data"=>$get_data,"token"=>$token];
        }
        return json($data);
    }
    
    // 退出
    public function logout()
    {
        Cookie::delete('token');
        return json(["code"=>200,"msg"=>"退出成功！"]);
    }
    
}
