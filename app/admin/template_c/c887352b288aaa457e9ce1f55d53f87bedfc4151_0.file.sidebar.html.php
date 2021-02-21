<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-19 10:25:28
  from 'D:\blog\app\admin\view\public\sidebar.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fdd6498bc8e48_82247773',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c887352b288aaa457e9ce1f55d53f87bedfc4151' => 
    array (
      0 => 'D:\\blog\\app\\admin\\view\\public\\sidebar.html',
      1 => 1608344273,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fdd6498bc8e48_82247773 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>  
    <div>
      <!-- start menu -->
      <div>
      	<ul>
      		<li> <a href="index.php?p=admin"><img src="<?php echo P;?>
/img/3.jpg" width="16" height="16"/>控制面板</a> </li>
       
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
                <li> <a href="index.php?p=admin&c=Article&a=add"><img src="<?php echo P;?>
/img/3.jpg" width="16" height="16"/>添加博文</a> </li>
      		    <li> <a href="index.php?p=admin&c=Article&a=index"><img src="#" width="16" height="16"/> 博文列表</a> </li>
      	  	 </ul>
      	  </li>
      
    <?php if ($_SESSION['user']['u_is_admin']) {?>
       <!-- 用户管理 -->
            <li>
	            	<a href="#" title='用户管理'><img src="#" width="16" height="16"/> 用户管理<img src=""  width="7" height="4"> </a>

	      	  	 <ul>
	                <li> <a href="index.php?p=admin&c=User&a=add"><img src="#" width="16" height="16"/>添加用户</a> </li>

	      		    <li>   <a href="index.php?p=admin&c=User&a=index"><img src="#" width="16" height="16"/>用户列表</a> </li>
	      	  	 </ul>
            </li>

           <!-- 评论管理 -->
                    <li> <a href="index.php?p=admin&c=Comment"> <img src="<?php echo P;?>
/img/4.jpg" width="16" height="16"/>评论列表</a> </li>
      <?php }?>
        
        </ul>
       </div>
      <!-- end sidemenu -->
    </div>
</body>
</html><?php }
}
