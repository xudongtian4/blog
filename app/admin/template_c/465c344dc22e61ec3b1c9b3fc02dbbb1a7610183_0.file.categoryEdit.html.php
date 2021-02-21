<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-09 19:54:30
  from 'D:\blog\app\admin\view\Category\categoryEdit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd0baf6affaf4_44279048',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '465c344dc22e61ec3b1c9b3fc02dbbb1a7610183' => 
    array (
      0 => 'D:\\blog\\app\\admin\\view\\Category\\categoryEdit.html',
      1 => 1607514862,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/sidebar.html' => 1,
  ),
),false)) {
function content_5fd0baf6affaf4_44279048 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	   <?php $_smarty_tpl->_subTemplateRender('file:../public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
       <?php $_smarty_tpl->_subTemplateRender('file:../public/sidebar.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
       <form action="index.php" method="post">
 	<table align="center"  border="1" cellpadding="0" cellspacing="0" width="500" height="320">
 	
 		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">	
 		<input type="hidden" name="p" value="admin">
 		<input type="hidden" name="c" value="Category">
 		<input type="hidden" name="a" value="update">
 		

 		<tr height="40">
 			<td colspan="2" align="lift"><h3>编辑分类</h3></td>
 		</tr>
 		<tr>
 			<td><label>名称</label></td>
 			<td><input type="text" name="c_name" value="<?php echo $_SESSION['categories'][$_smarty_tpl->tpl_vars['id']->value]['c_name'];?>
"></td>
 		</tr>

 		<tr height="60">
 			<td><label>父分类</label></td>
 			<td><select name="c_parent_id">
 				<option value="0">无</option>
 				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
 				<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
"
          <?php if ($_smarty_tpl->tpl_vars['cat']->value['id'] == $_SESSION['categories'][$_smarty_tpl->tpl_vars['id']->value]['c_parent_id']) {?> selected="selected"<?php }?> >
 				<?php echo str_repeat('--',$_smarty_tpl->tpl_vars['cat']->value['level']);
echo $_smarty_tpl->tpl_vars['cat']->value['c_name'];?>

 				</option>
 				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
 			    </select>
 			</td>
 		</tr>

 		<tr>
 			<td><label>排序</label></td>
 			<td><input type="text" name="c_sort" value="<?php echo $_SESSION['categories'][$_smarty_tpl->tpl_vars['id']->value]['c_sort'];?>
"></td>
 		</tr>
        
        <tr>
 			<td colspan="2" align="center"><input type="submit" name="submit"></td>
 		</tr>

 	</table>
 </form>
</body>
</html><?php }
}
