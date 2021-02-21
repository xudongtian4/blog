<?php
namespace home\model;
use \core\Model;

class CategoryModel  extends Model{
	protected $table='category';

	 //获取所有分类信息
	public function getAllCategories(){
			//组织sql
			$sql="select * from {$this->getTable()} order by c_sort desc";
			//执行
			$categories=$this->query($sql,true);
		    return $this->nolmitCategory($categories);
	}
	public function nolmitCategory($categories,$parent_id=0,$level=0){
			//建立一个数组，保存得到的结果
	        static $list=array();
			//遍历数组，获取满足要求是结果
			foreach ($categories as $cat){
			
	 		  //匹配条件
				if($cat['c_parent_id']==$parent_id){
				//增加level信息
	            $cat['level']=$level;

	            //当前需要的分类
	            $list[$cat['id']]=$cat;
	            //当前分类中可能有子分类，递归
	            $this->nolmitCategory($categories,$cat['id'],$level+1);
				}
			}
			//返回所有结果
			return $list;
	}
}