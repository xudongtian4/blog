<?php
//增加命名空间
namespace core;

//安全稳定
if(!defined('ACCESS')){
  	//非法访问
     header('location:../public/index.php');
  		exit;
  }

//初始化类
  class App{

    public static function start(){
             //定义目录路径常量
           	self::set_path();

            //先调用配置文件的函数
            self::set_config();

            //调用错误处理文件的函数
            self::set_error();
            
            //调用url的函数
            self::set_url();
            //自动加载
            self::set_autoload();

            //分配控制器
            self::set_dispatch();     
     }
    
      private static  function set_path(){
            	define('CORE_PATH'  ,ROOT_PATH.'core/');
            	define('APP_PATH'   ,ROOT_PATH.'app/' );
            	define('HOME_PATH'  ,APP_PATH.'home/');
            	define('ADMIN_PATH' ,APP_PATH.'admin/');

            	define('ADMIN_CONT'  ,ADMIN_PATH.'controller/');
            	define('ADMIN_MODEL'  ,ADMIN_PATH.'model/');
            	define('ADMIN_VIEW'  ,ADMIN_PATH.'view/');

            	define('HOME_CONT'  ,HOME_PATH.'controller/');
            	define('HOME_MODEL' ,HOME_PATH.'model/');
            	define('HOME_VIEW'  ,HOME_PATH.'view/');

            	define('VENDOR_PATH'  ,ROOT_PATH.'vendor/');
            	define('CONFIG_PATH'  ,ROOT_PATH.'config/');
              define('UPLOAD_PATH',ROOT_PATH.'public/uploads/');

            	define('URL'   ,'http://www.blog.com/');

        }

       //设置错处理方式
       public static  function set_error(){
            global $config;
           	//错误类型和错误方式  ini_set(配置项，值);
           	@ini_set('error_reporting',$global['system']['error_reporting']);  //E_ALL系统常量，表示所有错误
           	@ini_set('displary_error',$global['system']['displary_error']);        //显示错误信息，1显示 0不显示
       }
       //包含配置文件
       public static function set_config() {
              //设为全局变量
              global $config;
              //包含配置文件
              $config=include CONFIG_PATH.'config.php';
       }

       private static function set_url(){
              //获取前后台，控制器名字和方法，名字：规定浏览器中携带p参数，c参数和a参数（p代表platform平台，c代表controller,控制器，a代表action）
              $p=$_REQUEST['p']?? 'home';  //默认前台
              $c=$_REQUEST['c']?? 'Index'; //默认IndexController控制器
              $a=$_REQUEST['a']?? 'index'; //默认index方法

              //暂时只是解析，不分发，考虑到还要后续使用，设定为常量
               define('P', $p);
               define('C', $c);
               define('A', $a);
               //echo P,C,A;
         
        }

        /* 所有的类文件都在控制器，模型和核心文件中，所以应该定义多个类来实现类的加载，但是所有的类文件都有命名空间，要考虑到命名空间的影响。利用spl_autoload_regeister()的方法来实现注册*/

        //四种不同文件类的加载方法
        private static function  set_autoload_function($class){
                //此时，$class不只是类名，是带着空间的，所以只需要保留类名 home\controller\IndexContraller
                
                //echo $class; exit;
                $class=basename($class);

                //判断核心类文件是否存才，并加载
                $core_file=CORE_PATH.$class.'.php';
                if(file_exists($core_file))   include_once  $core_file;

                 
                //判断控制器是否存在，包括前后台的,通过url一次判定
                $cont_file=APP_PATH.P.'/controller/'.$class.'.php';
                if(file_exists($cont_file)) include  $cont_file ;


                //判断模块是否存在，包括前后台的,通过url一次判定
                $model_file=APP_PATH.P.'/model/'.$class.'.php';
                if(file_exists($model_file)) include  $model_file;

                  //加载外部类，插件
                   $vendor=VENDOR_PATH . $class.'.php';
                    if(file_exists($vendor))
                      {
                        include_once  $vendor;
                      }
         }

         //注册自动加载
        private static  function set_autoload(){
                   //利用spl_autoload_register()方法进行注册,(当前类，静态方法名)
                    spl_autoload_register(array(__CLASS__,'set_autoload_function'));
                   //echo  __CLASS__; exit;
         }
            
        //分发控制器的方法  
        private static function set_dispatch(){
                  $p=P;
                  $c=C;
                  $a=A;
                  //组织成合适的空间元素
                  $controller="\\{$p}\\controller\\{$c}Controller";
                  //echo $controller;exit;
                  //利用方法最终分发
                  $c=new $controller();
                  // var_dump($c); 
                  //exit;
                  $c->$a();                //可变方法
        }


    //前台控制器和模型加载,一个一个加载

          /* if(P=='home')
             {
              $path=HOME_CONT.$class.'.php';
              if(file_exists($path))
                {
                  include_once $path;
                }

                $path=HOME_MODEL.$class.'.php';
                if(file_exists($path))
                {
                  include_once $path;
                }
             }*/

             //后台台控制器和模型加载，一个一个加载
      
/*             else
             {
                $path=ADMIN_CONT.$class.'.php';
              if(file_exists($path))
                {
                  include_once $path;
                }

                $path=ADMIN_MODEL.$class.'.php';
                if(file_exists($path))
                {
                  include_once $path;
                }
             }*/
  }