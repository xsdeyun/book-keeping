<?php
namespace app\api\controller;

use think\facade\Request;
use think\facade\View;
use think\facade\Db;
use app\BaseController;
use app\common\Api\RecordList as R;

class Record extends Base
{
    // protected $middleware = ['LoginCheck'];
    
    /**
     * 请求方法 get post put delete
     * get 数据请求
     * post 新增
     * put 更新
     * delete 删除
     * 
     */
     
     public function index()
    {
        $post_data = Request::post();
		$Year_money=Db::name('jz_record')->where("userid",$post_data["userid"])->whereYear('CreatTime')->sum("money");
		$Month_money=Db::name('jz_record')->where("userid",$post_data["userid"])->whereMonth('CreatTime')->sum("money");
		$Week_money=Db::name('jz_record')->where("userid",$post_data["userid"])->whereWeek('CreatTime')->sum("money");
		$Day_money=Db::name('jz_record')->where("userid",$post_data["userid"])->whereDay('CreatTime')->sum("money");
		$list_data=Db::name('jz_record')->where("userid",$post_data["userid"])->order('time', 'desc')->limit(6)->select();
        return json(["code"=>200,"msg"=>"请求成功！","data"=>["year"=>$Year_money,"month"=>$Month_money,"week"=>$Week_money,"day"=>$Day_money],"list"=>$list_data]);
    }
    // 列表
     public function list()
    {
                $post_data = Request::post();
        $where1=[
            ['userid','=',$post_data['userid']],
            ['type','=',$post_data['type']]
            ];
        $where2=[
            ['userid','=',$post_data['userid']],
            ['type','=',1]
        ];
        $where3=[
            ['userid','=',$post_data['userid']],
            ['type','=',2]
        ];
        $get_data=Db::name('jz_record')->where($where1)->whereMonth('CreatTime', $post_data['time'])->select();
        $zhi=Db::name('jz_record')->where($where2)->whereMonth('CreatTime', $post_data['time'])->sum("money");
        $chu=Db::name('jz_record')->where($where3)->whereMonth('CreatTime', $post_data['time'])->sum("money");
        return json(["code"=>200,"msg"=>"请求成功！","data"=>$get_data,"zhi"=>$zhi,"chu"=>$chu]);
    }
    // 新增
     public function add()
    {
        $post_data = Request::post();
        $get_data=R::add_list_data($post_data);  
        return json($get_data);
    }
    // 报表
     public function report()
    {
         $post_data = Request::post();
        $titledata=[["name"=>"交通","value"=>0],["name"=>"餐饮","value"=>0],["name"=>"娱乐","value"=>0],["name"=>"健康","value"=>0],["name"=>"居家","value"=>0],["name"=>"购物","value"=>0],["name"=>"文教","value"=>0],["name"=>"其他","value"=>0]];
        for($i=0;$i<count($titledata);$i++){
            $where=[
            ['userid','=',$post_data['userid']],
            ['type','=',$post_data['type']],
            ['title',"=",$titledata[$i]["name"]]
            ];
            $num=Db::name('jz_record')->where($where)->whereMonth('CreatTime', $post_data['time'])->sum("money");
            $titledata[$i]["value"]=$num;
        }
        return json(["code"=>200,"msg"=>"请求成功！","data"=>$titledata]);
    }
    public function details(){
        $post_data = Request::get("id");
        $get_data=Db::name('jz_record')->where("id",$post_data)->find();
         return json(["code"=>200,"msg"=>"请求成功！","data"=>$get_data]);
    }
    // 更新
     public function update()
    {
        $post_data = Request::put();
        $get_data=U::update_list_data($post_data);  
        return json($get_data);
    }
    // 删除
     public function delete()
    {
        $post_data = Request::get("id");
        $get_data=U::delete_list_data($post_data);  
        return json($get_data);
    }
    
}
