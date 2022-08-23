<?php

namespace app\common\middleware;
use think\facade\Request;
use think\facade\Cookie;
use think\facade\Session;

class LoginPermission
{
	public static function isLogin()
	{
	   // Request::checkToken('__token__',Request->param())
	   // Cookie::get('token')
	   //dump(Cookie::get('token'));
	   //dump(Session::get('token'));
	    if(Cookie::get('token')==Session::get('token')&&Cookie::get('token')!=null){
			 return true; 
		}else{
			 return false;
		}
	}
	
}
?>