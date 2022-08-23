<?php
namespace app\index\controller;
use think\facade\View;
use app\BaseController;

class Index extends Base
{
    public function index()
    {
       return View::fetch("index/index");
    }
}
