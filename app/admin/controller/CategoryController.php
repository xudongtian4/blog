<?php
namespace admin\controller;
use \core\Controller;

class CategoryController extends Controller{
	//首页显示所有分类
	public function index(){
    		//获取所有无限极分类信息
    		$c=new \admin\model\CategoryModel();
    		$categories=$c->getAllCategories();
    		/*echo "<pre>";
    		var_dump($categories);exit();*/

    		//把获取的资源保存在session中，比较占用计算机计算资源
    		$_SESSION['categories']=$categories;

        //获取所有分类下对应的文章数,博文表article
        $a=new  \admin\model\ArticleModel();
        $a_count=$a->getArtcleByCategory();

    		//显示模板信息
        $this->assign('a_count',$a_count);
    		$this->display('categoryIndex.html');
	}
	public function  add(){
    		//表单中显示所有分类，要先判断分类是否存在,如果不存在就添加进来
    	  $this->getCategories();
    		//加载显示增加分类的模板
    		$this->display('categoryAdd.html');
	}

	//新增分类，数据入库
	public function insert(){
     //接收数据，验证数据
      		$c_name=trim($_POST['c_name']);
      		$c_parent_id=(int)$_POST['c_parent_id'];
      		$c_sort=trim($_POST['c_sort']);

      	 //合法性验证(字符长度限定：mb_strlen)
           if(empty($c_name)){
           	$this->error('分类名字有误','add');
           }
           //排序应该是正整数
           if(!is_numeric($c_sort)||(int)$c_sort !=$c_sort||$c_sort<0||$c_sort>PHP_INT_MAX){
           	$this->error('分类排序必须是正整数','add');
           }
           //验证当前父类下是否有同名文件
           $c=new \admin\model\CategoryModel();
          
           if($c->checkCategoryName($c_parent_id,$c_name)){
           	//查到：已经存在

           	$this->error('当前分类名字：'.$c_name.'已经存在','add');
           }
           //数据入库
      	if($c->insertCategory($c_name,$c_sort,$c_parent_id)){
      		$this->success('新增分类成功','index');
      	}else{
      		//失败
      		$this->error('新增分类失败','add');
      	    }
	}

	public function delete(){
    		//接收数据
    		$id=(int)$_GET['id'];
    		//判断是否可以删除 1，有子分类不能删除2，有文章不能删除
    		 $c=new \admin\model\CategoryModel();
    		if($c->getSon($id)){
    			$this->error('当前分类有子分类不能删除！','index');
    		}
        //有内容不能删除，在article表中
        $a=new \admin\model\ArticleModel();
       
        if($a->checkArtcleByCategory($id)){    
             $this->error('当前分类存在文章不能删除！','index');
        }else{
              $this->success('删除分类成功！','index');
        }

    		//开始删除数据
        if($c->deleteById($id)){
          $this->success('删除分类成功！','index');	
        }else{
        	$this->error('删除分类失败！','index');
        }
	}
  
  public function edit(){

      //接收数据
       $id=(int)$_GET['id'];
       //有效性验证，判断当前分类id是否在session中存在，不存在肯定无效
       if(!array_key_exists($id, $_SESSION['categories'])){
       	 //当前id不存在
       	$this->error('当前编辑的分类不存在！','index');
       }
       //去除部分数据(自己及分类)
       $c=new \admin\model\CategoryModel();
       $categories=$c->nolmitCategory($_SESSION['categories'],0,0,$id);
       
       //分配id给模板
       $this->assign('categories',$categories);
       $this->assign('id',$id);
       $this->display('categoryEdit.html');
  }

  public function update(){
    	//接收数据
    	$id=(int)$_POST['id'];
    	$data['c_name']=trim($_POST['c_name']);
    	$data['c_parent_id']=(int)$_POST['c_parent_id'];
    	$data['c_sort']=trim($_POST['c_sort']);
      /*echo "<pre>";
      var_dump($data);
      var_dump($_SESSION['categories'][$id]);exit;*/
    	//合法性验证(字符长度限定：mb_strlen)
       if(empty($data['c_name'])){
       	$this->back('分类名字有误');
       }
       //排序应该是正整数
       if(!is_numeric($data['c_sort'])||(int)$data['c_sort'] !=$data['c_sort']||$data['c_sort']<0||$data['c_sort']>PHP_INT_MAX){
       	$this->back('分类排序必须是正整数');
       }

       //有效性验证，确保不会在同一父类下出现同名分类
       $c=new \admin\model\CategoryModel();
       $cat=$c-> checkCategoryName($data['c_parent_id'],$data['c_name']);

       if($cat && $cat['id']!=$id){
       //查到有其他与自己同名的分类
        $this->back('当前分类名字在指定父类下已经存在！');
       }
       //数据更新部分判断
       $data=array_diff_assoc($data, $_SESSION['categories'][$id]);
       //判定数据
       if (empty($data)) {
       	// echo "<pre>"; 
       	//没有要更新的数据
       	$this->error('没有要更新的数据！','index');
       }
       //更新入库，采用自动更新
       if($c->autoUpdate($id,$data)){
       	//更新成功
       	$this->success('更新成功','index');
       }else{
       	//更新失败
       	$this->error('更新成功','index');
       }
   }
	
}