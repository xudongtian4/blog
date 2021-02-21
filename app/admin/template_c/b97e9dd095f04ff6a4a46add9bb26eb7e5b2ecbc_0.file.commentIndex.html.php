<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-19 16:32:15
  from 'D:\blog\app\admin\view\Comment\commentIndex.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fddba8f17b1c0_76348219',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b97e9dd095f04ff6a4a46add9bb26eb7e5b2ecbc' => 
    array (
      0 => 'D:\\blog\\app\\admin\\view\\Comment\\commentIndex.html',
      1 => 1608366732,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/sidebar.html' => 1,
  ),
),false)) {
function content_5fddba8f17b1c0_76348219 (Smarty_Internal_Template $_smarty_tpl) {
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
			<div align="center"><h3>评论管理</h3></div>
		    <table  align="center"  border="1" cellpadding="0" cellspacing="0" width="750" height="120">
		    	<tr height="40" align="center">
		    		<td colspan="8">评论列表</td>
		        </tr>

		    	<tr  height="40">
		    		<td>ID</td>
		    		<td width="60">作者</td>
		    		<td >评论内容</td>
		    		<td >博文名称</td>
		    		<td width="200" align="center">评论时间</td>
		    		<td>赞</td>
		    		<td>踩</td>
		    		<td >操作</td>
		    	</tr>
             
             <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'com');
$_smarty_tpl->tpl_vars['com']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['com']->value) {
$_smarty_tpl->tpl_vars['com']->do_else = false;
?>
		    	<tr>
		    		<td><?php echo $_smarty_tpl->tpl_vars['com']->value['id'];?>
</td>
		    		<td ><?php echo $_smarty_tpl->tpl_vars['com']->value['u_username'];?>
</td>
		    		<td ><?php echo $_smarty_tpl->tpl_vars['com']->value['c_comment'];?>
</td>
		    		<td ><?php echo $_smarty_tpl->tpl_vars['com']->value['a_title'];?>
</td>
		    		<td align="center"><?php ob_start();
echo $_smarty_tpl->tpl_vars['com']->value['c_time'];
$_prefixVariable1 = ob_get_clean();
echo date('Y:m:d H:i:s',$_prefixVariable1);?>
</td>
		    		<td width="40"><?php echo $_smarty_tpl->tpl_vars['com']->value['praise'];?>
</td>
		    		<td width="40"><?php echo $_smarty_tpl->tpl_vars['com']->value['step'];?>
</td>
		    		<td ><a href="index.php?p=admin&c=Comment&a=delete&id=<?php echo $_smarty_tpl->tpl_vars['com']->value['id'];?>
" onClick="return confirm('确定要删除吗？')"> 删除 </a>
		    		</td>
		    	</tr>
		    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		    </table>
		    <div align="center">
		      <?php echo $_smarty_tpl->tpl_vars['strpage']->value;?>

		    </div>
</body>  
</html><?php }
}
