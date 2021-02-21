<?php
namespace  admin\model;
use  \core\Model;
class ArticleModel  extends Model{
	protected $table='article';

//分页获取文章分页信息$cond=array()为查询条件
public function getArticleInfo($cond=array(),$pagecount=5,$page=1){
	 	//基础类跳转，没有被删除的
	 	$where=" where a_is_delete=0";
	 	//条件组织
	 	foreach($cond as $k=>$v){
	 		    //k代表字段名，v代表条件值
	 		switch($k){
	 			case 'a_title':
	 			$where.=" and a_title like '%{$v}%' ";
	 			break;

	 			case 'c_id':
	 			case 'a_status':
	 			case 'a_toped' :
	 			case 'u_id':
	 			//都是使用=符号进行条件筛选，可以统一用
	 			$where.=" and {$k} = {$v} ";
			 			break;
			 		}
			 	}
			       //求出起始页面
			 	$offect=($page-1)*$pagecount;

			 	//构造完整的sql:不同数据在不同的表中，要用到表名（暂时不做评论数量）
			 	$sql="select id,a_title,c_id,u_id,a_time,a_status,a_author from {$this->getTable()} {$where} order by a_time desc limit {$offect},{$pagecount}";
			      // echo $sql;exit;
			 	//执行sql语句
			 	return $this->query($sql,true);
   }

   //获取满足条件的总数量
   public function getSearchCount($cond){
   	   //基础类跳转，没有被删除的
			 	$where=" where a_is_delete=0";
			 	//条件组织
			 	foreach($cond as $k=>$v){
			 		    //k代表字段名，v代表条件值
			 		switch($k){
			 			case 'a_title':
			 			$where.=" and a_title like '%{$v}%' ";
			 			break;

			 			case 'c_id':
			 			case 'a_status':
			 			case 'a_toped' :
			 			case 'u_id':
			 			//都是使用=符号进行条件筛选，可以统一用
			 			$where.=" and {$k} = {$v} ";
			 			break;
		         }
		      }
		      //组织sql指令，获取总记录数量
		       $sql="select count(* ) c from {$this->getTable()} {$where} ";
		         //echo $sql;exit;
			 	//执行sql语句
			 	$res= $this->query($sql);  
			 	//取出结果，是一个一维数字[count(*)=4]
			 	return $res['c'] ?? 0;
    } 

    //获取分类下的博文总数,分类id作为数组下标
	 public function  getArtcleByCategory(){
         //组织sql:聚合操作
                $sql="select c_id,count(*) c from {$this->getTable()} where a_is_delete=0  group by c_id";
                //执行sql
                $res=$this->query($sql,true);
                $list=array();
                foreach ($res as $v){
                  $list[$v['c_id']]=$v['c'];
                }
                return $list;
	 }

	 //判断分类下是否有博文信息
	 public function checkArtcleByCategory($c_id){
	 	$sql="select id from {$this->getTable()} where c_id={$c_id} limit 1";
	 	return $this->query($sql);
	 }
}
