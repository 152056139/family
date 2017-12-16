<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\Db;

class Search extends Controller
{
	public function search_member()
	{
		$postData = Request::instance() -> post();
		$name = $postData["input"];
		
		$sql = "SELECT * FROM Dynimic d JOIN member c WHERE d.Dynimic_member=c.member_no and c.member_name='".$name."';";
        $dynimics = Db::query($sql);
        $this->assign('dynimics', $dynimics);
        return $this->fetch('dynimic/show_dynimic_list');
	}
}
