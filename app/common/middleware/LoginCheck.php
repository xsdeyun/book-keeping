<?php
namespace app\common\middleware;

use app\common\middleware\LoginPermission as L;
use think\facade\Request;
class LoginCheck
{
	public function handle($request, \Closure $next)
	{
		if(L::isLogin() == false){
		  //  header("HTTP/1.0 403 Not Found");
		  //abort(404,'未登录，请登陆后再次尝试！');
		  abort(403,'未登录，请登陆后再次尝试！');
		  //  throw new HttpException(404,'未登录，请登陆后再次尝试！');
		  //  return json(["code"=>403,"msg"=>"未登录，请登陆后再次尝试！"]);
		}
		return $next($request);
	}
}
?>