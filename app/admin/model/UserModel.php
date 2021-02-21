<?php
//命名空间
namespace admin\model;

use  \core\Model;

class  UserModel extends Model{

     protected $table='user';

     public function  getUserByusername($username){
         	//防止sql注入通过特殊符号改变sql指令,为特殊字符增加斜杠
         	//$username=addcslashes($username);

           //组织sql指令，获取用户信息
           $sql="select * from {$this->getTable()} where u_username='{$username}' " ;
            return $this->query($sql);
     }
     
     //获取用户数量
      public function getCounts(){
          	//组织sql语句
          	 $sql="select count(*) as c from {$this->getTable()}";
          	 $res=$this->query($sql);
            // var_dump($res);exit;
          	 //返回结果
          	 return $res['c'] ?? 0;
      }

      //按照分页获取用户信息
      public function getAllUser($pagecount=5,$page=1){
            //计算页码
            $offect=($page-1)*$pagecount;
            //组织sql获取用户信息
            $sql="select id,u_username,u_is_admin,u_reg_time from {$this->getTable()} order by u_reg_time desc limit {$offect},{$pagecount}";
            return $this->query($sql,true);

      }

}