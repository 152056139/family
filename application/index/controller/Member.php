<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;

class Member extends Controller
{
    public function show_add_member()
    {
        return $this->fetch();
    }
    public function add_member()
    {
        $postData = Request::instance() -> post();
        Db::execute('insert into member (member_name, member_sex, member_birthday) values (?, ?, ?)',[$postData['member_name'], $postData['member_sex'], $postData['member_birthday']]);
        return $this->success("添加成功");
    }
    public function show_member_list()
    {
        $members = Db::query('select * from member');
        $this->assign('members', $members);
        return $this->fetch();
    }
}
