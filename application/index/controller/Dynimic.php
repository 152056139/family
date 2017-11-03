<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Dynimic extends Controller
{
    public function show_add_dynimic()
    {
        $members = Db::query('SELECT * FROM member');
        $this->assign('members', $members);
        return $this->fetch();
    }
    public function show_dynimic_list()
    {
        $dynimics = Db::query('SELECT * FROM Dynimic d JOIN member c WHERE d.Dynimic_member=c.member_no');
        $this->assign('dynimics', $dynimics);
        return $this->fetch();
    }
    public function add_dynimic()
    {
        $postData = Request::instance() -> post();
        Db::execute('INSERT INTO Dynimic
            (Dynimic_member, Dynimic_count, Dynimic_type, Dynimic_remark, Dynimic_datatime) VALUES
            (?, ?, ?, ?, ?)',
            [$postData['Dynimic_member'], $postData['Dynimic_count'], $postData['Dynimic_type'], $postData['Dynimic_remark'], date('Y-m-d H:i:s')]);
        return $this->success("添加成功");
    }
}
