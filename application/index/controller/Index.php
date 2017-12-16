<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Cookie;
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
        var_dump(Cookie::get('logintimes'));
        if(Cookie::get('logintimes')>3)
        {
            return $this->error("登录失败,三次登录失败，请稍后再试。");
        }

        $postData = Request::instance() -> post();
        //var_dump($postData);
        $members = Db::query("SELECT `member_password` FROM member WHERE member_name = '" . $postData['name'] . "';");
        if($members[0]['member_password'] == $postData['password'])
        {
            $this->redirect('/family/public/index/Dynimic/show_dynimic_list');
        }
        else
        {
            if(!Cookie::has('logintimes'))
            {
                Cookie::set('logintimes',1);
            }
            else {
                Cookie::set('logintimes', Cookie::get('logintimes')+1, ['expire'=>10]);
            }
            return $this->error("登录失败,用户名或密码错误。");
        }
    }

}
