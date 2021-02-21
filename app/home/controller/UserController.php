<?php
namespace home\controller;
use \core\Controller;
header("content-type:text/html;charset=utf-8");
class UserController extends Controller{
	 public function check(){
		 	//接收数据
		 	$u_username=trim($_POST['u_username']);
		 	$u_password=md5(trim($_POST['u_password']));
		 	
		 	if(empty($u_username)||empty($u_password)){
		 		$this->error('用户名或密码不能为空！','index','Index');
		 	}
	     
		 	$u=new \home\model\UserModel();
	        $user=$u->getByUsername($u_username);
		 	//验证用户名是否正确
		 	if(! $user){
	         $this->error('当前用户名：'.$u_username."不存在！",'index','Index');
		 	}
		 	//验证密码是否正确
		 	if ($u_password!= $user['u_password']){
		 		$this->error('密码错误！','index','Index');
		 	}
		 	//用户名密码都正确，保存用户信息在session里面
		 	session_start();
		 	$_SESSION['user']=$user;
		 	//var_dump($_SESSION['user']);exit;

		 	//登录成功，回到用户首页
		 	$this->success('登录成功','index','Index');
	 }
	 //用户退出功能
	public function out(){
		 	//删除session中的数据
		 	 @session_start();
		 	 session_destroy();
		 	 $this->success('退出成功','index','Index');
	 } 

	 //生成随机验证码
	public function captcha(){
		 	//调用验证码插件类
	        \vendor\Captcha::getCaptcha();
   } 
   public function regist(){
   	       //获取数据
   	       $data['u_username']=trim($_POST['u_username']);
   	       $data['u_password']=md5(trim($_POST['u_password']));
   	       $captcha=trim($_POST['captcha']);
           $data['u_reg_time']=time();
   	       //有效性验证
   	       if(empty($captcha)){
   	       	   $this->back('验证码不能为空！');
   	       }
   	       if(empty($data['u_username'])|| empty($data['u_password'])){
   	       	   $this->error('用户名和密码不能为空！','index','Index');
   	       }
   	       if(! \vendor\Captcha::checkcaptcha($captcha)){
   	       	   $this->error('验证码错误！','index','Index');
   	       }
   	       //验证用户名
   	       $u=new \home\model\UserModel();
   	       if($u->getByUsername($data['u_username'])){
               $this->error('用户名：'.$data['u_username'].'已经存在！','index','Index');
   	       }
   	      
   	       //调用自动插入
   	        if($u->autoInsert($data)){
   	       	$this->success('注册成功！','index','Index');
   	       }else{
   	       	$this->error('注册失败','index','Index');
   	       }
   }      
}