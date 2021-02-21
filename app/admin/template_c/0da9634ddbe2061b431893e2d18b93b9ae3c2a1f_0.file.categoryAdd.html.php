<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-09 22:32:56
  from 'D:\blog\app\admin\view\Category\categoryAdd.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd0e0181ab568_35425355',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0da9634ddbe2061b431893e2d18b93b9ae3c2a1f' => 
    array (
      0 => 'D:\\blog\\app\\admin\\view\\Category\\categoryAdd.html',
      1 => 1607524370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/sidebar.html' => 1,
  ),
),false)) {
function content_5fd0e0181ab568_35425355 (Smarty_Internal_Template $_smarty_tpl) {
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
 <form action="index.php?p=admin&c=Category&a=insert" method="post">
 	<table align="center"  border="1" cellpadding="0" cellspacing="0" width="500" height="320">
 		<tr height="40">
 			<td colspan="2" align="lift"><h3>添加分类</h3></td>
 		</tr>
 		<tr>
 			<td><label>名称</label></td>
 			<td><input type="text" name="c_name" value=""></td>
 		</tr>

 		<tr height="60">
 			<td><label>父分类</label></td>
 			<td><select name="c_parent_id">
 				<option value="0">无</option>
 				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_SESSION['categories'], 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
 				<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
"> <?php echo str_repeat('--',$_smarty_tpl->tpl_vars['cat']->value['level']);
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
 			<td><input type="text" name="c_sort" value=""></td>
 		</tr>
        
        <tr>
 			<td colspan="2" align="center"><input type="submit" name="submit"></td>
 		</tr>

 	</table>
 </form>
</body>
</html><?php }
}
