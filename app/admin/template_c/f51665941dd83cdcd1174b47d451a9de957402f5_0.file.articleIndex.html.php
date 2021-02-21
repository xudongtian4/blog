<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-13 22:12:10
  from 'D:\blog\app\admin\view\Article\articleIndex.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd6213af09de1_94387635',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f51665941dd83cdcd1174b47d451a9de957402f5' => 
    array (
      0 => 'D:\\blog\\app\\admin\\view\\Article\\articleIndex.html',
      1 => 1607868726,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/sidebar.html' => 1,
  ),
),false)) {
function content_5fd6213af09de1_94387635 (Smarty_Internal_Template $_smarty_tpl) {
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
	 <form action="index.php?p=admin&c=Article&a=index" method="post">
 	<table align="center"  border="1" cellpadding="0" cellspacing="0" width="500" height="250">
 	
 		<tr height="20">
 			<td colspan="3" align="center"><h4>搜索</h4></td>
 		</tr>

 		<tr>
 			<td><label>标题</label></td>
 			<td colspan="2" align="center"><input type="text" name="a_title" value="<?php if ((isset($_smarty_tpl->tpl_vars['cond']->value['a_title']))) {?> <?php echo $_smarty_tpl->tpl_vars['cond']->value['a_title'];
}?>"></td>
 		</tr>

 		<tr >
 			<td><label>分类</label></td>
 			<td colspan="2" align="center"><select name="c_id">
 				    <option value="0">任意</option>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_SESSION['categories'], 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
" <?php if ((isset($_smarty_tpl->tpl_vars['cond']->value['c_id'])) && $_smarty_tpl->tpl_vars['cond']->value['c_id'] == $_smarty_tpl->tpl_vars['cat']->value['id']) {?>selected="selected" <?php }?>>
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
 				<option value=""> 任意</option>
 				<option value="1" <?php if ((isset($_smarty_tpl->tpl_vars['cond']->value['a_status'])) && $_smarty_tpl->tpl_vars['cond']->value['a_status'] == 1) {?> selected="selected"<?php }?>> 草稿</option>
 				<option value="2" <?php if ((isset($_smarty_tpl->tpl_vars['cond']->value['a_status'])) && $_smarty_tpl->tpl_vars['cond']->value['a_status'] == 2) {?> selected="selected"<?php }?>> 公开</option>
 				<option value="3" <?php if ((isset($_smarty_tpl->tpl_vars['cond']->value['a_status'])) && $_smarty_tpl->tpl_vars['cond']->value['a_status'] == 3) {?> selected="selected"<?php }?>> 隐藏</option>
 			   </select>
			</td>
 		</tr>


 		<tr>
 			<td><label>置顶</label></td>
 			<td align="center">
 				<input type="radio" name="a_toped" value="" checked>不限
 				<input type="radio" name="a_toped" value="1" <?php if ((isset($_smarty_tpl->tpl_vars['cond']->value['a_toped'])) && $_smarty_tpl->tpl_vars['cond']->value['a_toped'] == 1) {?> checked="checked"<?php }?>>置顶
 			    <input type="radio" name="a_toped" value="2" <?php if ((isset($_smarty_tpl->tpl_vars['cond']->value['a_toped'])) && $_smarty_tpl->tpl_vars['cond']->value['a_toped'] == 2) {?> checked="checked"<?php }?>>不置顶
 			</td>
 		</tr>

 		<tr>
 			<td colspan="3" align="center"><input type="submit" value="提交"></td>
 		</tr>
      	</table>
 </form>


        <table align="center"  border="1" cellpadding="0" cellspacing="0" width="700" height="100">
        	<tr>
        		<td colspan="8">博文列表</td>
        	</tr>

        	<tr>
        		<td>#ID</td>
        		<td>作者</td>
        		<td>分类</td>
        		<td>标题</td>
        		<td>发布日期</td>
        		<td>评论数量</td>
        		<td>状态</td>
        		<td>操作</td>
        	</tr>
           <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'art');
$_smarty_tpl->tpl_vars['art']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['art']->key => $_smarty_tpl->tpl_vars['art']->value) {
$_smarty_tpl->tpl_vars['art']->do_else = false;
$__foreach_art_1_saved = $_smarty_tpl->tpl_vars['art'];
?>
        	<tr>
        		<td><!-- <?php echo $_smarty_tpl->tpl_vars['art']->value['id'];?>
  --><?php echo $_smarty_tpl->tpl_vars['art']->key+1;?>
</td>
        		<td><?php echo $_smarty_tpl->tpl_vars['art']->value['a_author'];?>
</td>
        		<td><?php echo $_SESSION['categories'][$_smarty_tpl->tpl_vars['art']->value['c_id']]['c_name'];?>
</td>
        		<td><?php echo $_smarty_tpl->tpl_vars['art']->value['a_title'];?>
</td>
        		<td><?php echo date('Y:m:d H:i:s',$_smarty_tpl->tpl_vars['art']->value['a_time']);?>
</td>
        		<td>12</td>
        		<td><?php if ($_smarty_tpl->tpl_vars['art']->value['a_status'] == 1) {?>草稿<?php } elseif ($_smarty_tpl->tpl_vars['art']->value['a_status'] == 2) {?>公开<?php } else { ?>隐藏<?php }?></td>

        		<td><a href="index.php?p=admin&c=Article&a=delete&id=<?php echo $_smarty_tpl->tpl_vars['art']->value['id'];?>
" onClick="return confirm('确认要删除文章：<?php echo $_smarty_tpl->tpl_vars['art']->value['a_title'];?>
?')">删除</a> 
                    
        			<?php if ($_smarty_tpl->tpl_vars['art']->value['u_id'] == $_SESSION['user']['id']) {?>
        		    <a href="index.php?p=admin&c=Article&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['art']->value['id'];?>
"><?php $_prefixVariable1 = 1;
$_tmp_array = isset($_smarty_tpl->tpl_vars['uesr']) ? $_smarty_tpl->tpl_vars['uesr']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array['u_is_admin'] = $_prefixVariable1;
$_smarty_tpl->_assignInScope('uesr', $_tmp_array);
if ($_prefixVariable1) {?>编辑<?php }?></a>
        		    <?php }?>
        		</td>
        			
        	</tr>
        	<?php
$_smarty_tpl->tpl_vars['art'] = $__foreach_art_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
      <div align="center"><?php echo $_smarty_tpl->tpl_vars['pagestr']->value;?>
</div>
     
        
</body>
</html><?php }
}
