<?php
namespace admin\model;
use \core\Model;
class CommentModel extends Model{
	protected $table='comment';

	//获取所有的评论信息，包含页码
	public  function  getAllcomments($pagecount=5,$page=1){
           //计算分页信息
		   $offect=($page-1)*$pagecount;
		   $sql="select c.*,u.u_username,a.a_title from {$this->getTable()} c left join {$this->getTable('user')} u on c.u_id=u.id left join {$this->getTable('article')} a on c.a_id=a.id order by c.c_time desc,c.a_id desc limit $offect,$pagecount"; 
           return $this->query($sql,true);
	}
	
	//获取总的评论数
	public function getCommentsCount(){
		   $sql="select count(*) c from {$this->getTable()} ";
		   $res=$this->query($sql);
		   return $res['c'] ?? 0;
	}
}