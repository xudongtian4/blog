<?php
namespace core;
//引入全局空间类

use \PDO,\PDOStatement,\PDOException;

//创建Dao类
class Dao{
        //属性
      	private $pdo;
      	private $fetch_model;

        //构造方法
      	public  function  __construct($info=array(),$drivers=array()){

               $type=$info['type'] ?? 'mysql';
               $host=$info['host'] ?? 'localhost';
               $port=$info['port'] ?? '3306';
               $user=$info['user'] ?? 'root';
               $pass=$info['pass'] ?? 'root';
               $dbname=$info['dbname'] ?? 'db_3';
               $charset=$info['charset'] ?? 'utf8';
               $this->fetch_model=$info['fetch_model']??PDO::FETCH_ASSOC;
               //驱动控制，异常处理模式
               $drivers[PDO::ATTR_ERRMODE]=$drivers[PDO::ATTR_ERRMODE]?? PDO::ERRMODE_EXCEPTION;

               //实例化对象
               try{

               	$this->pdo=new PDO($type.':host='.$host.';port='.$port.';dbname='.$dbname,  $user,$pass, $drivers);
               }catch(PDOException $e){
               	//调用异常处理方法
                   $this->pdo_exception($e);
               }


              //设置字符集
              try{
              	 $this->pdo->exec('set names utf8');
                 } catch(PDOException $e){
                 	//调用异常处理方法
                   $this->pdo_exception($e);
                 }
              

      	   }

          private function pdo_exception(PDOException $e){

            	  echo '代码运行错误！<br/>';
                echo '错位文件为：'.$e->getFile().'<br/>';
                echo '错位行号为：'.$e->getLine().'<br/>';
                echo '错位描述为：'.$e->getMessage();
                exit;
          }
           //写方法
          public function dao_exec($sql){

             try{
                  return  $this->pdo->exec($sql);
             }catch(PDOException $e){
             	 $this->pdo_exception($e);
             }

          }
          
           //获取自增长id的方法
          public function  dao_getinsert_id(){
            	return  $this->pdo->lastInsertId();
          }

            //读方法，二合一，一条和多条，默认查一条
          public function dao_query($sql,$all=false){
            	try{
            		 $stmt=$this->pdo->query($sql);

            		 //设置fetch_mode
            		 $stmt->setFetchMode($this->fetch_model);

                  //解析数据
            		 if($all){

            		 	  return	$stmt->fetchAll();
            	  }
            	  else{

            	     return 	$stmt->fetch();
            	   } 
              }catch(PDOException $e){
            	     $this->pdo_exception($e);
            	    }
          }
      	
 }


/*$a=new Dao();
$arr=$a->dao_query('select * from t_33 where id=80');
var_dump($b);*/