<?php
namespace core;
 
 class  Controller{

            //增加属性，保存对象，能让子类调用和访问（自己跨方法）
       protected  $smarty;
            //构造方法，实现一些需要初始化才能使用的内容
       public function  __construct(){
            //实现smartyd的初始化
            //加载smarty

            include VENDOR_PATH.'smarty/Smarty.class.php';
            //实例化
            $this->smarty=new \Smarty();

         		//设置smarty
         		$this->smarty->template_dir=APP_PATH.P.'/view/'.C.'/';
         		$this->smarty->caching=false;      //开发阶段不缓存
         		$this->smarty->cache_dir=APP_PATH.P.'/cache';
         		$this->smarty->cache_lifetime=120;
         		$this->smarty->compile_dir=APP_PATH.P.'/template_c';


            //后台权限验证，除了privilegeaController里的方法不需要验证用户是否登录以外，其他的都要验证
            if(P=='admin'){
              //通过SESSION判断用户是否登录,不是权限控制器也没有session，说明用户没有登录
              @session_start();

              if(strtolower(C)!=='privilege' && !isset($_SESSION['user'])){
                  //继续判定，继续判定用户是否选择了七天免登陆
                  if(isset($_COOKIE['id'])){
                    //帮助用户登录，并记录用户信息
                    $u=new \admin\model\UserModel();
                    $user=$u->getById((int)$_COOKIE['id']);
                    //判断用户是否存在
                    if($user){
                     //登录成功，有该用户
                      $_SESSION['user']=$user;
                      //回到用户访问的界面
                      $this->success('欢迎回到博客后台',A,C);
                    }
                  }
                $this->error('请先登录','index','Privilege');
               }
            }
        }
    

    //smart的二次封装
   	protected function assign($key,$value)
   	    {
            $this->smarty->assign($key,$value);
   	    }

   	protected function display($file)
         {
   		  $this->smarty->display($file);
   	     }
    
   	//错误跳转
   	protected function error($msg,$a=A,$c=C,$p=P,$time=3)
   	  {
         $refresh='Refresh:'.$time.';url='.URL.'index.php?c='.$c.'&a='.$a.'&p='.$p;
         header($refresh);
         echo $msg;
         exit;
   	  }

 	  //成功跳转
 	  protected function success($msg,$a=A,$c=C,$p=P,$time=3)
 	  {
 	   $refresh='Refresh:'.$time.';url='.URL.'index.php?c='.$c.'&a='.$a.'&p='.$p;
       header($refresh);
       echo $msg;
       exit;
 	  }
    //返回跳转
    protected function back($msg,$time=1){
        $url=$_SERVER['HTTP_REFERER'];//上个请求
        header('Refresh:'.$time.';url='.$url);
        echo "$msg";
         exit;
    }

    //后台获取分类
    public function getCategories(){
        
          if(!isset($_SESSION['categories'])){
          $c=new \admin\model\CategoryModel();
          $categories=$c->getAllCategories();
          $_SESSION['categories']=$categories;
          return $_SESSION['categories'];
          }
      }

    //前台获取分类
      //后台获取分类
    public function getHomeCategories(){
         
          if(!isset($_SESSION['categories'])){
          $c=new \home\model\CategoryModel();
          $categories=$c->getAllCategories();
          $_SESSION['categories']=$categories;
          return $_SESSION['categories'];
          }
      }
 }