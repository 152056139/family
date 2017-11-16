<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;

class Index extends Controller
{
    //加载登录界面
    public function index()
    {
        return $this->fetch();
    }
    public function login()
    {
        $postData = Request::instance() -> post();
        $members = Db::query("SELECT `member_password` FROM member WHERE member_name = '" . $postData['name'] . "';");
        if($members[0]['member_password'] == $postData['password'])
        {
            $this->redirect('/family/public/index/Dynimic/show_dynimic_list');
        }
        else
        {
            return $this->error("登录失败");
        }
    }

}
