<?php
namespace home\model;
use \core\Model;
class ArticleModel extends Model{
	protected $table='article';
      //获取总的博文信息
	public function  getAllarticles($cond=array(),$pagecount=5,$page=1){
               //计算分页信息
               $offect=($page-1)*$pagecount;
               //组织条件
               $where='where a_is_delete=0 and a_status =2';
               
               //条件搜索，通过标题搜索和博文种类
               if(isset($cond['a_title']))    $where.=" and a_title like '%{$cond['a_title']}%' ";
               if(isset($cond['c_id']))       $where.=" and c_id={$cond['c_id']} ";
               
               //连表子查询，用b_article表和b_comment表c查出每个id下的博文评论数量
               $sql="select a.*,c.c_count from {$this->getTable()} a left join (select a_id,count(*) c_count from {$this->getTable('comment')} group by a_id) c on a.id=c.a_id {$where} limit {$offect},{$pagecount}";
               //echo $sql;exit();
               //执行sql
               return $this->query($sql,true); 
	 } 

       //获取总的记录数
   public function getSearchCount($cond){
               //基础类跳转，没有被删除的
               $where='where a_is_delete=0 and a_status =2';
               //条件组织
               foreach($cond as $k=>$v){
                    //k代表字段名，v代表条件值
                 switch($k){
                  case 'a_title':
                  $where.=" and a_title like '%{$v}%' ";
                  break;

                  case 'c_id':
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

    //根据分类获取总记录数，分类id作为数组下标
     public function getCountsByCategory(){
                //组织sql:聚合操作
                $sql="select c_id,count(*) c from {$this->getTable()} where a_is_delete=0 and a_status=2 group by c_id";
                //执行sql
                $res=$this->query($sql,true);
                $list=array();
                foreach ($res as $v){
                  $list[$v['c_id']]=$v['c'];
                }
                return $list;
     }

     //获取最新三条记录信息
     public function getNewsInfo($limit=3){
              //组织$sql
              $sql="select id,a_title,a_img_thumb from {$this->getTable()} where a_is_delete=0 order by a_time desc limit $limit";
              //echo $sql;exit;
              return $this->query($sql,true);
     }
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