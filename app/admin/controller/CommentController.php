<?php
namespace admin\controller;
use \core\Controller;
class CommentController extends Controller{

	  public function index(){
	  	       $cond['c']=C;
	  	       $cond['p']=P;
	  	       $cond['a']=A;
			   //接收可能存在的页码
			   $page=$_REQUEST['page'] ?? 1;
			   //获取分页数据,显示每页显示量,用户可以在配置文件中修改
			   global $config;
			   $pagecount=$config['admin']['comment_pagecount'] ?? 5;
				  //获取所有评论
			   $c=new \admin\model\CommentModel();
			   $comments=$c->getAllcomments($pagecount,$page);
			   $counts=$c->getCommentsCount();
               
               //调用分页类
               $strpage=\vendor\Page::clickPage(URL.'index.php',$counts,$pagecount,$page,$cond);
		       //分配数据模板
		       $this->assign('strpage',$strpage);
			   $this->assign('comments',$comments);
			   $this->display('commentIndex.html');
	  }
	  public function delete(){
	          $id=(int)$_GET['id'];
	          $c=new \admin\model\CommentModel();
	          if($c->deleteById($id)){
	          	$this->success('删除成功','index');
	          }else{
	          	$this->error('删除失败','index');
	          }
	          
      }
}    