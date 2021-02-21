<?php
//命名空间
namespace admin\controller;

use \core\Controller;

class PrivilegeController extends Controller{

	//获取登录表单
	public function index(){
		// 加载登录表单模板
		$this->display('login.html');
	}

	//验证用户信息
	public function check(){
    //var_dump($_POST);exit();
	  //接收数据
	   $username=trim($_POST['u_username']);
	   $password=trim($_POST['u_password']);
	   $captcha=trim($_POST['captcha']);
       

       //验证合法性
       if(empty($captcha)){
          $this->error('验证码不能为空','index');
       }
       if(empty($username)||empty($password)){
       	//不对，应该重来
       	$this->error('用户名密码不能为空','index');
       }

       //验证验证码的有效性
       if(!\vendor\Captcha::checkcaptcha($captcha)){
        $this->error('验证码有误！','index');
       }

       //验证用户是否存在，调用模型
       $u=new \admin\model\UserModel();
       $user=$u->getUserByusername($username);
      /* var_dump($user);
       exit;*/
       //判断用户是否存在
       if(!$user){
      //用户名不存在
       $this->error('当前用户名：'.$username.'不存在','index');
       }
       //判断密码是否正确
       if($user['u_password']!==md5($password)){
       	$this->error('密码错误','index');
       }


       //将用户登录后的用户信息保存到session中
       @session_start();
       $_SESSION['user']=$user;


        //设置7天免登陆
       if(isset($_POST['rememberMe'])){
        //用户选择了记住用户信息
         setcookie('id',$user['id'],time()+7*24*3600);     
       }

       //登录成功，直接跳转首页
       $this->success('欢迎登博客后台系统','index','Index');
	}

	public function  logout(){
         @session_start();
         //删除权限
         session_destroy();
         //删除可能存在的cookie
         setcookie('id','',1);     
         //提示退出成功
         $this->success('退出成功！','index');
       }
       
       public function captcha(){
        //调用验证码插件类
        \vendor\Captcha::getCaptcha();
       }
}