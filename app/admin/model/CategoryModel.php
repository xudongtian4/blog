<?php
//分类模型
namespace admin\model;
use \core\Model;

class CategoryModel extends Model{
	//属性，保存表名
	protected $table='category';

	//获取所有分类信息
	public function getAllCategories(){
			//组织sql
			$sql="select * from {$this->getTable()} order by c_sort desc";
			//执行
			$categories=$this->query($sql,true);
		    return $this->nolmitCategory($categories);
	}
	public function nolmitCategory($categories,$parent_id=0,$level=0,$stop=0){
			//建立一个数组，保存得到的结果
	        static $list=array();
			//遍历数组，获取满足要求是结果
			foreach ($categories as $cat){
				if($cat['id']==$stop)  continue;
	 		  //匹配条件
				if($cat['c_parent_id']==$parent_id){
				//增加level信息
	            $cat['level']=$level;

	            //当前需要的分类
	            $list[$cat['id']]=$cat;
	            //当前分类中可能有子分类，递归
	            $this->nolmitCategory($categories,$cat['id'],$level+1,$stop);
				}
			}
			//返回所有结果
			return $list;
	}

//验证父分类下是否有指定名字的分类（根据名子获取分类信息）
  public function checkCategoryName($c_parent_id,$c_name){
		  //组织sql语句,代码优化只需要查是否存在即可，不需要查询所有字段，id的字段最小
		  	$sql="select id from {$this->getTable()} where c_parent_id={$c_parent_id} and c_name='{$c_name}' ";
		  	   return $this->query($sql);
		  }

		   public function insertCategory($name,$sort,$parent_id){
		     //组织sql
		   	$sql="insert into {$this->getTable()} values (null,'{$name}',{$sort},{$parent_id})";
		   	return $this->exec($sql);
		   }

		   //获取子分类
		   public function getSon($id){
		   //组织sql
		   	$sql="select id from {$this->getTable()} where c_parent_id={$id}";
		   	return $this->query($sql);
	  }


}
