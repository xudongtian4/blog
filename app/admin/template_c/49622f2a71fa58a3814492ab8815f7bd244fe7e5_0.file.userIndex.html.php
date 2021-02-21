<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-14 23:01:15
  from 'D:\blog\app\admin\view\User\userIndex.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd77e3ba9e383_09479619',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '49622f2a71fa58a3814492ab8815f7bd244fe7e5' => 
    array (
      0 => 'D:\\blog\\app\\admin\\view\\User\\userIndex.html',
      1 => 1607958073,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/sidebar.html' => 1,
  ),
),false)) {
function content_5fd77e3ba9e383_09479619 (Smarty_Internal_Template $_smarty_tpl) {
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

        <table align="center"  border="1" cellpadding="0" cellspacing="0" width="700" height="100">
        	<tr>
        		<td colspan="8">用户列表</td>
        	</tr>

        	<tr>
        		<td>#ID</td>
        		<td>用户名</td>
        		<td>角色</td>
        		<td align="center">注册时间</td>
        		<td>操作</td>
        	</tr>

        	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
$__foreach_user_0_saved = $_smarty_tpl->tpl_vars['user'];
?>
        	<tr>
        		<td> <!-- $user@key+1 --> <?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</td>
        		<td><?php echo $_smarty_tpl->tpl_vars['user']->value['u_username'];?>
</td>
        		<td>
        		<?php if ($_smarty_tpl->tpl_vars['user']->value['u_is_admin']) {?>管理员<?php } else { ?>普通用户<?php }?>
        	    </td>
        		<td align="center"><?php echo date('Y年m月d日 H:i:s',$_smarty_tpl->tpl_vars['user']->value['u_reg_time']);?>
</td>

        		<td><a href="index.php?p=admin&c=User&a=delete&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" onClick="return confirm('确认要删除用户:<?php echo $_smarty_tpl->tpl_vars['user']->value['u_username'];?>
吗？')"><?php if (!$_smarty_tpl->tpl_vars['user']->value['u_is_admin']) {?>删除<?php }?></a>  

                <a href="index.php?p=admin&c=user&a=edit&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
                <?php if (!$_smarty_tpl->tpl_vars['user']->value['u_is_admin']) {?> 编辑<?php }?>
             
                </a></td>
        	</tr>
        	<?php
$_smarty_tpl->tpl_vars['user'] = $__foreach_user_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>

       <!--  -分页显示 -->
        <div align="center"><?php echo $_smarty_tpl->tpl_vars['pagestr']->value;?>
</div>
</body>
</html><?php }
}
