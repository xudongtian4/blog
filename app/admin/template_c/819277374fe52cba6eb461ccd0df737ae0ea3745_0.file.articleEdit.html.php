<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-11 10:30:16
  from 'D:\blog\app\admin\view\Article\articleEdit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd2d9b8c92315_88680891',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '819277374fe52cba6eb461ccd0df737ae0ea3745' => 
    array (
      0 => 'D:\\blog\\app\\admin\\view\\Article\\articleEdit.html',
      1 => 1607653649,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/sidebar.html' => 1,
  ),
),false)) {
function content_5fd2d9b8c92315_88680891 (Smarty_Internal_Template $_smarty_tpl) {
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
         <form action="index.php?p=admin&c=Article&a=update" method="post">
         	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">

 	<table align="center"  border="1" cellpadding="0" cellspacing="0" width="500" height="320">
 		<tr height="20">
 		
 			<td colspan="3"><h5>编辑博文</h5></td>
 		</tr>

 		<tr>
 			<td><label>标题</label></td>
 			<td colspan="2" align="center"><input type="text" name="a_title" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['a_title'];?>
"></td>
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
" <?php if ($_smarty_tpl->tpl_vars['cat']->value['id'] == $_smarty_tpl->tpl_vars['article']->value['c_id']) {?>selected="seleccted" <?php }?>>
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
 				<option value="1" <?php if ($_smarty_tpl->tpl_vars['article']->value['a_status'] == 1) {?>selected="selected"<?php }?>>草稿</option>
 				<option value="2" <?php if ($_smarty_tpl->tpl_vars['article']->value['a_status'] == 2) {?>selected="selected"<?php }?>>公开</option>
 				<option value="3" <?php if ($_smarty_tpl->tpl_vars['article']->value['a_status'] == 3) {?>selected="selected"<?php }?>>隐藏</option>
 			</select>
			</td>	
 		</tr>


 		<tr>
 			<td><label>置顶</label></td>
 			<td align="center"><input type="radio" name="a_toped" value="1" <?php if ($_smarty_tpl->tpl_vars['article']->value['a_toped'] == 1) {?>checked="checked"<?php }?>>置顶
 			<input type="radio" name="a_toped" value="2" <?php if ($_smarty_tpl->tpl_vars['article']->value['a_toped'] == 2) {?>checked="checked"<?php }?>>不置顶
 		    </td>
 		</tr>

 		<tr>
 			<td colspan="3"><label>图片</label>
 				<img src="$article.a_img"></td>
 		</tr>


 		<tr>
 			<td><label>新图片</label></td>
 			<td colspan="2" align="center"><input type="file" name="a_img" value="" /></td>
 		</tr>

 		<tr></tr>
           <td><label>内容</label></td>
           <td colspan="2"  align="center"> 

           	<textarea textarea name="a_content" rows="10"><?php echo $_smarty_tpl->tpl_vars['article']->value['a_content'];?>

           	</textarea>
           	
            </td>
        <tr>
 			<td colspan="3" align="center"><input type="submit" value="提交"></td>
 		</tr>

 	</table>
 </form>

</body>
</html><?php }
}
