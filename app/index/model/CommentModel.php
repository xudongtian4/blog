<?php
namespace home\model;
use \core\Model;
class CommentModel extends Model{
	    protected $table='comment';
        
	    //获取指定博文的评论信息
	    public function getCommentBya_id($id){
	    	//组织sql1,sql2都可以
	    	//$sql1="select * from {$this->getTable()} where a_id={$id} order by c_time desc";
            $sql="select c.*,u.u_username from {$this->getTable()} c left join {$this->getTable('user')} u on c.u_id=u.id where c.a_id={$id} order by c.c_time desc";
	    	return $this->query($sql,true);
	    }

	    //对点赞数量进行更新
	    public  function  zanUpdate($id){
	    	$sql="update {$this->getTable()} set praise=praise+1 where id={$id} ";
	    	return $this->exec($sql);
	    }
	    //对狂踩的数量进行更新
	    public  function  stepUpdate($id){
	    	$sql="update {$this->getTable()} set step=step+1 where id={$id} ";
	    	return $this->exec($sql);
	    }

        //检查用户是否已经点赞过
	    public function checkByCommentId($id,$u_username){
		   	   //防止sql注入
		   	   //$u_username=addslashes($u_username);
		   	   //组织sql
		   	   $sql="select id from {$this->getTable('praise')} where c_id={$id} and u_username='{$u_username}'";
		   	   //echo $sql;exit();
	           //执行sql语句

	          return $this->query($sql);
	           
	   }
	   //将点赞的用户名插入到数据库
	    public function userInsertPraise($u_username,$id){
	    	     //echo $u_username;exit;
	             $sql="insert into {$this->getTable('praise')} values (null,'{$u_username}',$id)";
	             //echo $sql;exit;
	             return $this->exec($sql);
	    }        
       //检查用户是否已经踩过
       public function checkByUsername2($id,$u_username){
		   	   //防止sql注入
		   	   // $u_username=addslashes($u_username);
		   	   //组织sql
		   	   $sql="select id from {$this->getTable('step')} where c_id={$id} and u_username='{$u_username}'";
		   	  
		   	   
	           //执行sql语句
	           return $this->query($sql);
	   }
	   //将被踩的用户保存入到数据库
	    public function userInsertStep($u_username,$id){
	            $sql="insert into {$this->getTable('step')} values (null,'{$u_username}',$id)";
	             return $this->exec($sql);

       }
   }
