<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-09 14:42:20
  from 'D:\blog\app\admin\view\public\sidebar.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd071ccd4c8d2_26426279',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3738ff0a265bbf410dfe34dc903c71400a24e48a' => 
    array (
      0 => 'D:\\blog\\app\\admin\\view\\public\\sidebar.html',
      1 => 1607428876,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fd071ccd4c8d2_26426279 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>  
    <div>
      <div>
      	<div> <p> 此广告常年招商</p> </div>
      </div>

      <!-- start menu -->
      <div>
      	<ul>
      		<li> <a href="#"><img src="#" width="16" height="16"/>控制面板</a> </li>
       
  <?php if ($_SESSION['user']['u_is_admin']) {?>
      		<!-- 分类管理 -->
      		<li>
      			<a href="#" title='分类管理'><img src="#" width="16" height="16"/> 分类管理<img src=""  width="7" height="4"> </a>
      		
         
	      		 <ul>
                <li> <a href="index.php?c=Category&a=index&p=admin"><img src="<?php echo P;?>
/img/3.jpg" width="16" height="16"/>分类列表</a> </li>
              <li> <a href="index.php?c=Category&a=add&p=admin"><img src="<?php echo P;?>
/img/3.jpg" width="16" height="16"/> 添加分类</a> </li>
             </ul>
	          </li>
    <?php }?>
      	<!-- 分类管理 -->
  

      	<!-- 博文管理 -->
      	  <li>
      	  	<a href="#" title='博文管理'><img src="#" width="16" height="16"/> 博文管理<img src=""  width="7" height="4"> </a>

      	  	 <ul>
                <li> <a href="#"><img src="#" width="16" height="16"/>添加博文</a> </li>
      		    <li> <a href="#"><img src="#" width="16" height="16"/> 博文列表</a> </li>
      	  	 </ul>
      	  </li>
      
    <?php if ($_SESSION['user']['u_is_admin']) {?>
       <!-- 用户管理 -->
            <li>
	            	<a href="#" title='用户管理'><img src="#" width="16" height="16"/> 用户管理<img src=""  width="7" height="4"> </a>

	      	  	 <ul>
	                <li> <a href="#"><img src="#" width="16" height="16"/>添加用户</a> </li>
	      		    <li> <a href="#"><img src="#" width="16" height="16"/>用户列表</a> </li>
	      	  	 </ul>
            </li>

           <!-- 评论管理 -->
                    <li> <a href="#"><img src="#" width="16" height="16"/>评论列表</a> </li>
      <?php }?>
        
        </ul>
       </div>
      <!-- end sidemenu -->
    </div>
</body>
</html><?php }
}
