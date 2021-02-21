<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-14 21:06:27
  from 'D:\blog\app\admin\view\user\userEdit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd7635303b3f1_71673637',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38753dca61c28806af631e4e47c24affdd624bed' => 
    array (
      0 => 'D:\\blog\\app\\admin\\view\\user\\userEdit.html',
      1 => 1607951185,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/sidebar.html' => 1,
  ),
),false)) {
function content_5fd7635303b3f1_71673637 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>  
	   <?php $_smarty_tpl->_subTemplateRender('file:../public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	   <?php $_smarty_tpl->_subTemplateRender('file:../public/sidebar.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	    <form action="index.php?p=admin&c=User&a=update" method="post" enctype="multipart/form-data">
	    <input type="hidden" name="id" value=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
>	

	   <table align="center"  border="1" cellpadding="0" cellspacing="0" width="300" height="200">
 	    <tr>
 	   	   <td colspan="3">编辑用户</td>
 	    </tr>

 	     <tr>
 	    	<td>用户名</td>
 	    	<td colspan="2"> <input type="text" name="u_username"  value="<?php echo $_smarty_tpl->tpl_vars['user']->value['u_username'];?>
"></td>
 	     </tr>

 	      <tr>
 	    	<td>密码</td>
 	    	<td colspan="2"> <input type="password" name="u_password" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['u_password'];?>
"></td>
 	     </tr>

 	      <tr>
 	      	<td>角色</td>
 	      	<td colspan="2"><input type="radio" name="u_is_admin" value="0" <?php if ($_smarty_tpl->tpl_vars['user']->value['u_is_admin'] == 0) {?>checked="checked" <?php }?>>普通用户
 	      		            <input type="radio" name="u_is_admin" value="1" <?php if ($_smarty_tpl->tpl_vars['user']->value['u_is_admin'] == 1) {?>checked="checked" <?php }?>>管理员

 	      	</td>
 	      </tr>

 	      <tr><td colspan="3" align="center"><input type="submit" name="submit" value="提交"></td></tr>
 	 </table>
 </form>
</body>
</html><?php }
}
