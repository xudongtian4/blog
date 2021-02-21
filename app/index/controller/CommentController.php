<?php
 namespace  home\controller;
 use \core\Controller; 
 class CommentController extends Controller{
 	public function insert(){
       		 //开启session
       		     @session_start();
               //接收数据
               $data['a_id']=(int)$_GET['a_id'];
               $data['c_comment']=trim($_POST['c_comment']);
               $data['c_time']=time();
               $data['u_id']=(int)$_SESSION['user']['id'];
               //有效性验证
               if(empty($data['c_comment'])){
               	$this->back('评论内容不能为空,并且长度不能超过50个字符！');
               }
               $c=new \home\model\CommentModel();
               if($c->autoInsert($data)){
               	$this->back('评论成功');
               }else{
               	$this->back('评论失败');
               }
 	 }
   //点赞方法
   public function praise(){
              //接收数据,这个id是评论的id
              $a_id=(int)$_GET['a_id'];           //评论表是博文id
              $id=(int)$_GET['id'];               //评论表的id
              @session_start();
              $u_username=$_SESSION['user']['u_username'];
              $c=new \home\model\CommentModel(); 
              
              if($c->checkByCommentId($id,$u_username))
              {
                echo  "<script> alert('您已经顶过该贴,请不要重复！') </script>";
                $this->back('');
              }else{ 
                      $c->userInsertPraise($u_username,$id);
                      $a=$c->zanUpdate($id);
                      if($a){
                         header("Location:index.php?index.php?c=Index&a=detial&id={$a_id}");
                    }else{
                      $this->back('点赞有误！');
                    }
              }
    }
   //狂踩的方法
   public function step(){
             //接收数据,这个id是评论的id
              $a_id=(int)$_GET['a_id'];           //评论表是博文id
              $id=(int)$_GET['id'];               //评论表的id
              @session_start();
              $u_username=$_SESSION['user']['u_username'];
              $c=new \home\model\CommentModel(); 
              
              if($c->checkByUsername2($id,$u_username))
              {
                echo  "<script> alert('您已经顶过该贴,请不要重复！') </script>";
                $this->back('');
              }else{ 
                      $c->userInsertStep($u_username,$id);
                      $a=$c->stepUpdate($id);
                      if($a){
                         header("Location:index.php?index.php?c=Index&a=detial&id={$a_id}");
                    }else{
                      $this->back('点赞有误！');
                    }
              }
       }
    
}