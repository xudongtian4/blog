<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-13 21:56:15
  from 'D:\blog\app\admin\view\User\userAdd.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd61d7f2e4459_80903549',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d5f5bde94bc2b5a56239ba87652493238d2b259' => 
    array (
      0 => 'D:\\blog\\app\\admin\\view\\User\\userAdd.html',
      1 => 1607867767,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/sidebar.html' => 1,
  ),
),false)) {
function content_5fd61d7f2e4459_80903549 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
       <?php $_smarty_tpl->_subTemplateRender('file:../public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	   <?php $_smarty_tpl->_subTemplateRender('file:../public/sidebar.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	    <form action="index.php?p=admin&c=User&a=insert" method="post" enctype="multipart/form-data">
 	 <table align="center"  border="1" cellpadding="0" cellspacing="0" width="300" height="200">
 	    <tr>
 	   	   <td colspan="3">添加用户</td>
 	    </tr>

 	     <tr>
 	    	<td>用户名</td>
 	    	<td colspan="2"> <input type="text" name="u_username"  value=""></td>
 	     </tr>

 	      <tr>
 	    	<td>密码</td>
 	    	<td colspan="2"> <input type="password" name="u_password" value=""></td>
 	     </tr>

 	      <tr>
 	      	<td>角色</td>
 	      	<td colspan="2"><input type="radio" name="u_is_admin" value="0">普通用户
 	      		            <input type="radio" name="u_is_admin" value="1">管理员

 	      	</td>
 	      </tr>

 	      <tr><td colspan="3" align="center"><input type="submit" name="submit" value="提交"></td></tr>
 	 </table>
 </form>
</body>
</html><?php }
}
