<?php
namespace home\model;
use \core\Model;
class UserModel extends Model{
	   protected $table='user';
	   public function getByUsername($u_username){
	   	   //防止sql注入
	   	   $u_username=addslashes($u_username);
	   	   //组织sql
	   	   $sql="select * from {$this->getTable()} where u_username='{$u_username}' ";
	   	   //echo $sql;exit();
	   	   
           //执行sql语句
           return $this->query($sql);
	   }
}