<?php
namespace admin\controller;
use \core\Controller;
/**
 * 
 */
class ArticleController extends Controller{  
     //新增博文，显示表单
	public function add(){
			//表单中显示所有分类，要先判断分类是否存在,如果不存在就添加进来
			$this->getCategories();
		    //显示表单
			$this->display('articleAdd.html');
	}
    
    //新增博文，入库
	public function insert(){
	    //接收数据
			$data=$_POST;

		//合法性判定，标题内容不能为空，分类必须存在
		   if(empty(trim($data['a_title']))||empty(trim($data['a_content']))){
		   	$this->error('文章标题和内容不能为空！','add');
	        }
		   	if(!array_key_exists($data['c_id'], $_SESSION['categories'])){
		   		$this->error('当前选择的分类不存在！','add');
		   	 }
		   	//补充数据
		   	 $data['u_id']=$_SESSION['user']['id'];
		   	 $data['a_author']=$_SESSION['user']['u_username'];
		   	 $data['a_time']=time();

		   	 //实现文件上传和缩略图
		   	 if($a_img=\vendor\Uploader::uploadOne($_FILES['a_img'],UPLOAD_PATH)){
		   	 	$data['a_img']=$a_img;
		   	 	//成功，制作缩略图
		   	 	$a_img_thumb=\vendor\Image::makeThumb(UPLOAD_PATH.$a_img,UPLOAD_PATH);
		   	 	if($a_img_thumb)  $data['a_img_thumb']=$a_img_thumb;
		   	 }

		   	 //入库
		   	 $a=new \admin\model\ArticleModel();

		   	 if($a->autoInsert($data)){

		   	 	//判断图片是否新增成功
		   	 	if(!$a_img)  $this->success('博文：'.$data['a_title'].'新增成功,但是图片上传失败,失败原因是：'.\vendor\Uploader::$error,'add'); 
		   	 	//判断缩略图是否成功
		   	 	if($a_img&&!$a_img_thumb)   $this->success('博文：'.$data['a_title'].'新增成功,但是缩略图制作失败,失败原因是：'.\vendor\Image::$error,'add');
		   	   //成功
		   	    $this->success('博文：'.$data['a_title'].'  新增成功','index');
		   	 }else{
		   	 	@unlink(UPLOAD_PATH.$a_img);
		   	 	$this->error('博文：'.$data['a_title'].'  新增失败','add');
		   	 }
	} 
	//获取博文列表
	 public function index(){
		   //接收可能存在的页码
		   $page=$_REQUEST['page'] ?? 1;
		   //获取分页数据,显示每页显示量,用户可以在配置文件中修改
		   global $config;
		   $pagecount=$config['admin']['article_pagecount'] ?? 5;
		   //接收可能存在的检索条件
		   $cond=array();
		   //挨个判定接收条件
		   if(isset($_REQUEST['a_title']) && !empty(trim($_REQUEST['a_title']))) 
		   	  $cond['a_title']=trim($_REQUEST['a_title']);
		   if(isset($_REQUEST['c_id'])&&$_REQUEST['c_id']!=0) 
		   	 $cond['c_id']=(int)$_REQUEST['c_id'];
		   if(isset($_REQUEST['a_status'])&&$_REQUEST['a_status']!=0) 
		   	  $cond['a_status']=(int)$_REQUEST['a_status'];
		   if(isset($_REQUEST['a_toped'])&&$_REQUEST['a_toped']!=0) 
		   	  $cond['a_toped']=(int)$_REQUEST['a_toped'];
		   	//添加普通用户条件，普通用户只能查看自己的博文
		   if(!$_SESSION['user']['u_is_admin']) 
		   	  $cond['u_id']=$_SESSION['user']['id'];

		   	$cond['a']=A;
		   	$cond['c']=C;
		   	$cond['p']=P;

		    //获取分类信息
		    $this->getCategories();

			//调用模板获取数据
			$a=new \admin\model\ArticleModel();
			$articles=$a->getArticleInfo($cond,$pagecount,$page);

			//获取满足条件的记录总数
			$counts=$a->getSearchCount($cond);

			//调用分页类产生分页信息
			 $pagestr=\vendor\Page::clickPage(URL.'index.php',$counts,$pagecount,$page,$cond);

		    //显示模板
		    $this->assign('pagestr',$pagestr);
			$this->assign('cond',$cond);
			$this->assign('articles',$articles);
			$this->display('articleIndex.html');
	} 
	public function delete(){
			//获取id
			$id=(int)$_GET['id'];
			//删除数据，用modeL中的deleteById()方法
			$a=new \admin\model\ArticleModel();
			if($a->deleteById($id)){
				$this->success('删除成功','index');
			}else{
				$this->error('删除失败','index');
			}
	} 

	public function edit(){
           
          //获取所有分类列表
          $this->getCategories();

			//获取数据
			$id=(int)$_GET['id'];
	        $a=new \admin\model\ArticleModel();
	        $article=$a->getById($id);
	        if(!$article) $this->error('当前编辑的博文不存在！','index');

	        //加载模板
	        $this->assign('article',$article);
	        $this->display('articleEdit.html');
	} 
	public function update(){
		    //接收数据 
		    $id=(int)$_POST['id'];
		    $data['a_title']=trim($_POST['a_title']);
		    $data['c_id']   =(int)$_POST['c_id'];
		    $data['a_status']   =(int)$_POST['a_status'];
		    $data['a_toped']   =(int)$_POST['a_toped'];
		    $data['a_content']=trim($_POST['a_content']);
		    //合法性验证
		    if(empty($data['a_title'])||empty($data['a_content'])){
		    	$this->back('博文标题或内容不能为空');
		    }
		    //获取当前id对应的原信息
		    $a=new \admin\model\ArticleModel();
		    $article=$a->getById($id);

		    if(!$article) {
		    	$this->error('当前信息不存在','index');
		    }
		    //对更新的数据进行剔除
		    $data=array_diff_assoc($data, $article);
		    if(empty($data)){
		    	$this->error('没有要更新的数据','index');
		    }
            
		    //操作更新
		   if($a->autoUpdate($id,$data)){
             $this->success('更新成功','index');
		   } else{
             $this->back('更新失败');
		   } 
	 }
	  
}
 