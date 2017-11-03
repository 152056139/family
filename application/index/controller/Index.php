<?php
namespace app\index\controller;

use think\Controller;
use think\Model;

class Index extends Controller
{
    public function index()
    {

        return $this->fetch();
    }

}
