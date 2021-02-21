<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-18 22:05:30
  from 'D:\blog\app\admin\view\Category\categoryIndex.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fdcb72a4454b9_38175725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1828a5fddd65a61485a3e3b0539c9cf3552d001' => 
    array (
      0 => 'D:\\blog\\app\\admin\\view\\Category\\categoryIndex.html',
      1 => 1608300327,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/sidebar.html' => 1,
  ),
),false)) {
function content_5fdcb72a4454b9_38175725 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
     
	
		   <?php $_smarty_tpl->_subTemplateRender('file:../public/sidebar.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

       <table align="center"  border="1" cellpadding="0" cellspacing="0" width="500" height="300" bgcolor="#EAEAEA">
       	   <tr>
       	   	 <th>#ID</th>
       	   	  <th>名称</th>
       	   	   <th>下属博文数量</th>
       	   	    <th>排序</th>
       	   	      <th>操作</th>
       	   </tr>
           <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_SESSION['categories'], 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
		   <tr>
			   	<td><?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
 </td>
			   	<td><?php echo str_repeat('----',$_smarty_tpl->tpl_vars['cat']->value['level']);?>
 <?php echo $_smarty_tpl->tpl_vars['cat']->value['c_name'];?>
 </td>	
			   	<td><?php echo (($tmp = @$_smarty_tpl->tpl_vars['a_count']->value[$_smarty_tpl->tpl_vars['cat']->value['id']])===null||$tmp==='' ? 0 : $tmp);?>
</td>	
			   	<td><?php echo $_smarty_tpl->tpl_vars['cat']->value['c_sort'];?>
 </td>
			   	<td>
			   		<a href="index.php?p=admin&c=Category&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
">编辑</a>
			   		<a href="index.php?p=admin&c=Category&a=delete&id=<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" onClick="return confirm('确认删除：<?php echo $_smarty_tpl->tpl_vars['cat']->value['c_name'];?>
分类？')">删除</a>
			   	</td>
		   </tr>
           <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
       </table>
</body>
</html><?php }
}
