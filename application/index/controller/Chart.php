<?php

namespace app\index\controller;

use think\Controller;
use think\Db;

class Chart extends Controller
{
    public function test()
    {
        //家庭成员数量
        $memberCount = Db::query('SELECT COUNT(*) FROM member');
        $this->assign('memberCount', $memberCount);

        //家庭总支出
        $allOut = Db::query('SELECT SUM(Dynimic_count) FROM Dynimic WHERE Dynimic_type="支出"');
        $this->assign('allOut', $allOut);

        //家庭总收入
        $allIn = Db::query('SELECT SUM(Dynimic_count) FROM Dynimic WHERE Dynimic_type="收入"');
        $this->assign('allIn', $allIn);



        return $this->fetch();
    }
}
