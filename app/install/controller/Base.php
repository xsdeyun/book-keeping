<?php
declare (strict_types = 1);

namespace app\install\controller;
use think\facade\View;
class Base extends \app\BaseController
{
	//页面渲染
	protected function fetch($template = '',$data = [])
	{
	    return View::fetch($template,$data);
	}
}
