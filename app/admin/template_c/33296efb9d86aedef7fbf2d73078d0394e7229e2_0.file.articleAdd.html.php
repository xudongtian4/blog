<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-11 15:35:45
  from 'D:\blog\app\admin\view\Article\articleAdd.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd3215108bf98_58882272',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33296efb9d86aedef7fbf2d73078d0394e7229e2' => 
    array (
      0 => 'D:\\blog\\app\\admin\\view\\Article\\articleAdd.html',
      1 => 1607672041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/sidebar.html' => 1,
  ),
),false)) {
function content_5fd3215108bf98_58882272 (Smarty_Internal_Template $_smarty_tpl) {
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
	   <form action="index.php?p=admin&c=Article&a=insert" method="post" enctype="multipart/form-data">
 	<table align="center"  border="1" cellpadding="0" cellspacing="0" width="500" height="320">
 	
 		<tr height="20">
 			<td colspan="3"><h5>添加博文</h5></td>
 		</tr>

 		<tr>
 			<td><label>标题</label></td>
 			<td colspan="2" align="center"><input type="text" name="a_title" value=""></td>
 		</tr>

 		<tr >
 			<td><label>分类</label></td>
 			<td colspan="2" align="center"><select name="c_id">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_SESSION['categories'], 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
">
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
 			<td><label>状态</label></td>
 			<td colspan="2" align="center"><select name="a_status">
 				<option value="1">草稿</option>
 				<option value="2">公开</option>
 				<option value="3">隐藏</option>
 			</select>
			</td>	
 		</tr>


 		<tr>
 			<td><label>置顶</label></td>
 			<td align="center"><input type="radio" name="a_toped" value="1">置顶
 			<input type="radio" name="a_toped" value="2">不置顶
 		    </td>
 		</tr>

 		<tr>
 			<td><label>图片</label></td>
 			<td colspan="2" align="center"><input type="file" name="a_img" value="" /></td>
 		</tr>

 		<tr></tr>
           <td><label>内容</label></td>
           <td colspan="2"  align="center"> <textarea textarea name="a_content" rows="10"></textarea>
            </td>
        <tr>
 			<td colspan="3" align="center"><input type="submit" value="提交"></td>
 		</tr>

 	</table>
 </form>
</body>
</html><?php }
}
