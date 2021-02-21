<?php
 namespace home\controller;
//引入公共控制器
 use \core\Controller;

class IndexController extends Controller{
  
	//默认方法
	public  function index(){
           @session_start();
           
           $cond=array();
           if(isset($_REQUEST['a_title']) && !empty($_REQUEST['a_title']))
             $cond['a_title']=trim($_POST['a_title']);
           if(isset($_REQUEST['c_id']) && $_GET['c_id'] !=0)
             $cond['c_id']=(int)$_REQUEST['c_id'];

              $cond['a']=A;
              $cond['c']=C;
              $cond['p']=P;
              $p= $cond['p'];
            //获取分页信息
            $page=$_REQUEST['page'] ?? 1 ; 

            //获取配置文件中的分页数据
            global $config;
            $pagecount=$config['home']['atricle_pagecount'] ?? 5;

            //获取总的博文记录数
            $c=new \home\model\ArticleModel();
            $counts=$c->getSearchCount($cond);
            //echo $counts;exit;

            //调用分页类
            $pagestr= \vendor\Page::clickPage(URL.'index.php',$counts,$pagecount,$page,$cond);

           //获取博文分类信息(调用)
            $categories=$this->getHomeCategories();
            
           //获取所有博文信息，分页获取
           $articles=$c->getAllarticles($cond,$pagecount,$page);
           
           //获取分类下对应的分类数量,要考虑分类下没有博文的情况
           $cat_count=$c->getCountsByCategory();
           // var_dump($cat_counts);exit();

           //获取最新的博文信息
           $news=$c->getNewsInfo();

           $this->assign('news',$news);
           $this->assign('cat_count',$cat_count);
           $this->assign('cond',$cond);
           $this->assign('pagestr',$pagestr);
           $this->assign('articles',$articles);
           $this->display('blogShowList.html');
    }
      //获取博文详情
    public function  detial(){
           //接收数据
           $id=(int)$_GET['id'];
           $a=new \home\model\ArticleModel();
           $article=$a->getById($id);
           //开启session,获取分类信息
           @session_start();
           $this->getHomeCategories();

           $c=new \home\model\CommentModel();
           $comments=$c->getCommentBya_id($id); 
           
           $this->assign('comments',$comments);
           $this->assign('article',$article);
           $this->display('blogShow.html');

    }
}

?>
