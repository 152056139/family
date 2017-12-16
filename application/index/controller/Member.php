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

    public function show_member_list()
    {
        $members = Db::query('select * from member');
        $this->assign('members', $members);
        return $this->fetch();
    }

    public function show_modify_member($member_no)
    {
        $members = Db::query('SELECT * FROM member WHERE member_no = ' . $member_no . ';');
        $this->assign('members', $members);
        return $this->fetch();
    }

    public function show_member_detial($member_no)
    {
        $members = Db::query('SELECT * FROM member WHERE member_no = ' . $member_no . ';');
        $this->assign('members', $members);
        return $this->fetch();
    }

    public function add_member()
    {
        $postData = Request::instance() -> post();
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('member_photo');

        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                //echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                //echo $info->getSaveName();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                //echo $info->getFilename();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
        Db::execute('INSERT INTO member
            (member_name, member_sex, member_birthday, member_company, member_job, member_nation, member_photo) VALUES
            (?, ?, ?, ?, ?, ?, ?)',
            [$postData['member_name'], $postData['member_sex'], $postData['member_birthday'], $postData['member_company'], $postData['member_job'], $postData['member_nation'], $info->getSaveName()]);
        return $this->success("添加成功");
    }

    public function delete_member($member_no)
    {
        $sql = "DELETE FROM member WHERE member_no = " . $member_no .";";
        Db::execute($sql);
        $sql1 = "DELETE FROM Dynimic WHERE Dynimic_member = " . $member_no .";";
        Db::execute($sql1);
        return $this->success("删除成功");
    }
}
