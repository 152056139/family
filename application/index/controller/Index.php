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
        if(Cookie::get('logintimes')>3)
        {
            return $this->error("登录失败,三次登录失败，请稍后再试。");
        }

        $postData = Request::instance() -> post();
        //var_dump($postData);
        $members = Db::query("SELECT `member_password` FROM member WHERE member_name = '" . $postData['name'] . "';");
        if($members[0]['member_password'] == $postData['password'])
        {
            Cookie::set('MyName', $postData['name']);
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


    public function changePassword()
    {
        return $this->fetch();
    }
    public function change()
    {
        $myName = Cookie::get("MyName");
        //获取表单上的
        $postData = Request::instance() -> post();
        $oldPasswordInput = $postData["oldpassword"];
        $newPasswordInput = $postData["newpassword"];
        $rePasswordInput = $postData["repassword"];
        //获取数据库原来的密码
        $members = Db::query("SELECT `member_password` FROM member WHERE member_name = '" . $myName . "';");
        $oldPassword = $members[0]["member_password"];

        if($oldPassword != $oldPasswordInput)
        {
            $this->error("原密码不正确");
        }
        else if($newPasswordInput != $rePasswordInput)
        {
            $this->error("两次密码不一致");
        }
        else
        {
            Db::execute("UPDATE member SET member_password = '" . $newPasswordInput . "' WHERE member_name = '" . $myName ."';");
            return $this->success("密码修改成功", "/family/public/index/Dynimic/show_dynimic_list");

        }
    }

}
