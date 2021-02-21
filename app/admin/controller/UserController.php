<?php
namespace admin\controller;
use \core\controller;
class UserController extends Controller{
	public function add(){
	        //加载模板
	        $this->display('userAdd.html');

	}
	public function  insert(){
			//接收数据
			$data=$_POST;

			if(empty(trim($data['u_username']))||empty(trim($data['u_password']))){
				$this->error('用户名或者密码不能为空！','add');
			}
			//合理性验证
			$u=new \admin\model\UserModel();

			if($u->getUserByusername($data['u_username'])){
				$this->error("当前用户名：".$data['u_username']."已经存在",'add');
			}
	        //说明用户名可以使用，组织数据入库
	        $data['u_reg_time']=time();
	        $data['u_password']=md5($data['u_password']);
	        if($u->autoInsert($data)){
	        	//添加用户成功，调到用户列表页面
	           $this->success('用户添加成功','index');
	        }else{
	        	//添加用户失败，继续添加
	        	$this->error('新增用户失败','add');
	        }

			//加载模板并显示模板
    } 
    public function index(){
	    	    $cond['a']=A;
			   	$cond['c']=C;
			   	$cond['p']=P;
	    	//获取分页信息
	        $page=$_REQUEST['page'] ?? 1;  

	        //获取配置文件中的分页数据
	          global $config;
	        $pagecount=$config['admin']['user_pagecount'] ?? 2; 

	    	//调用模型，查询数据库中的所有用户信息的总的记录数
	    	 $u=new \admin\model\UserModel();
	 
	    	 $users=$u->getAllUser($pagecount,$page);   //所有用户信息
	         /* var_dump($users);exit;*/
	         $counts=$u->getCounts();  //查询总的记录数
	         
	        //调用分页类,实现效果
	        $pagestr= \vendor\Page::clickPage(URL.'index.php',$counts,$pagecount,$page,$cond);

	        
	         $this->assign('pagestr',$pagestr);
	     	 $this->assign('users',$users); //加载模板并显示模板
	    	 $this->display('userIndex.html');
    }
    public function delete(){
    	//接收数据
	    	$id=(int)$_GET['id'];
	    	$d=new \admin\model\UserModel();
	    	if($d->deleteById($id)){
	          $this->success('删除成功','index');
	    	}else{
	    		$this->error('删除失败','index');
	    	}
    }
    public function  edit(){
	         //加载要编辑的页面
	    	$id=(int)$_GET['id'];
	    	$a=new \admin\model\UserModel();
	    	$user=$a->getById($id);
	    	$this->assign('user',$user);
	    	$this->display('userEdit.html');

    }
	public function update(){
        
        //获取数据
        $id=(int)$_POST['id'];
        $data['u_username']=trim($_POST['u_username']);
		$data['u_password']=trim($_POST['u_password']);
		$data['u_is_admin']=$_POST['u_is_admin'];
		echo '<pre>';
	
	    //合理性判断
	    if(empty($data['u_username'])){
             $this->back('用户名不能为空！');
	    }
	   if(empty($data['u_password'])){
	   	     $this->back('密码不能为空！');
	   }

	    $a=new \admin\model\UserModel();

	    $user=$a->getById($id);//先查询原用户信息
	    $user['u_password']=trim($user['u_password']);
	    if(! $user){
	    	//如果没有查到信息，说明用户不存在
            $this->back('当前用户不存在！');
	    }
        
        //var_dump($data);var_dump($user);
        //对更新的数据进行剔除
        $data=array_diff_assoc($data, $user);//以$data的字段为标准进行比较
        //var_dump($data);exit;

        if(empty($data)){
        	$this->error('没有要更新的内容a！','index');
        }

        if(array_key_exists('u_password', $data)){
         $data['u_password']=md5($data['u_password']);//如果密码更改的话，就把密码在加密在更新到数据库
        }
        //var_dump($data);exit;
	    if($a->autoUpdate($id,$data)){
            $this->success('用户更新成功！','index');
	    }else{
	        $this->error('用户更新失败','index');
	    }
		   
	}
	    
	    
	    
}