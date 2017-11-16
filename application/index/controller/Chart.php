<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;

class Chart extends Controller
{
    //加载登录界面
    public function index()
    {
        return $this->fetch();
    }

}
