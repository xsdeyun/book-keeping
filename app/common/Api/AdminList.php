<?php
namespace app\common\Api;
use think\facade\Db;
use think\facade\Request;
use think\facade\Session;

class AdminList{
    
	// 用户列表查询
	public static function sea_user_data($post_data){
	    try {
		if(!isset($post_data["username"])){
			$post_data["username"]="";
		}
		$where=[
			['username','like',$post_data["username"].'%']
		];
		$get_data=Db::name('admin')->where($where)->limit(($post_data["page"]-1)*10,$post_data["limit"])->select();
		$count=Db::name('admin')->where($where)->count();
		return ["code"=>200,"msg"=>"请求成功！","data"=>$get_data,"count"=>$count];
	    } catch(\PDOException $e) { 
				return json(["code"=>400,"msg"=>$e->getMessage()]);
		}
	}
	// 用户列表新增
	public static function add_user_data($post_data){
	    try {
		$get_data=Db::name('admin')->strict(false)->insert($post_data);
		return ["code"=>200,"msg"=>"注册成功！","data"=>$get_data];
	    } catch(\PDOException $e) { 
				return json(["code"=>400,"msg"=>$e->getMessage()]);
		}
	}
	// 用户列表更新
	public static function update_user_data($post_data){
	    try {
		$get_data=Db::name('admin')->where('id',$post_data['id'])->update($post_data);
		return ["code"=>200,"msg"=>"更新成功！","data"=>$get_data];
	    } catch(\PDOException $e) { 
				return json(["code"=>400,"msg"=>$e->getMessage()]);
		}
	}
	// 用户删除
	public static function delete_user_data($id){
	    try {
		$get_data=Db::name('admin')->where('id',$id)->delete();
		return ["code"=>200,"msg"=>"删除成功！","data"=>$get_data];
	    } catch(\PDOException $e) { 
				return json(["code"=>400,"msg"=>$e->getMessage()]);
		}
	}
	
	
    //示例
    public static function ceshi($post_data){
        try {
            
        } catch(\PDOException $e) { 
    				return json(["code"=>400,"msg"=>$e->getMessage()]);
    	}
    }
}