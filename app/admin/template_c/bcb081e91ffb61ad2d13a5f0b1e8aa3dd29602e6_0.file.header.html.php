<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-18 21:14:26
  from 'D:\blog\app\admin\view\public\header.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fdcab32a85402_04973368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bcb081e91ffb61ad2d13a5f0b1e8aa3dd29602e6' => 
    array (
      0 => 'D:\\blog\\app\\admin\\view\\public\\header.html',
      1 => 1608297199,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fdcab32a85402_04973368 (Smarty_Internal_Template $_smarty_tpl) {
?> <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
     <div id='header'>
     	<!--logo -->
     	<div> <a href="index.php?p=admin"> 博客后台</style></a> </div>
     	<div><div></div></div>


     	<!-- 快速菜单 -->
       <div>
       <a href="index.php?p=admin&c=Article&a=add" title='新增一片博客'><img src="<?php echo P;?>
/img/3.jpg" width="18" height="14"/> 新增一片博客</a>
       <a href="index.php" title='直达前台'><img src="<?php echo P;?>
/img/3.jpg" width="18" height="14"/> 直达前台</a>
       </div>


        <!-- 档案箱 --> 
        <div align="right"> 
        <a href=""> <img src="<?php echo P;?>
/img/3.jpg" width="33" height="33"> 
            <span>
              <?php if ($_SESSION['user']['u_is_admin']) {?>管理员<?php } else { ?>用户<?php }?>
           </span>
           <b>昵称：<?php echo $_SESSION['user']['u_username'];?>
</b>
        </a>
        	<div align="right">
        		<ul>
        		   <a href="<?php echo URL;?>
index.php?p=admin&c=privilege&a=logout">退出</a> 
        		</ul>
        	</div>
        </div>
     </div>
</body>
</html><?php }
}
