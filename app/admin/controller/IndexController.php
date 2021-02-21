<?php
//后台首页功能
namespace admin\controller;

use \core\Controller;

class IndexController extends  Controller{
	   //显示首页数据
       public function index(){

       	//开启session
       	 @session_start();

       	 $u=new \admin\model\UserModel();
       	 $counts=$u->getCounts();
       	 $this->assign('count',$counts);
       	//显示首页数据
        $this->display('index.html');
       }

}