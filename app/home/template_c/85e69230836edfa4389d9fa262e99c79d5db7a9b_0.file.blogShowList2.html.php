<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-15 22:54:55
  from 'D:\blog\app\home\view\Index\blogShowList2.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd8ce3f7b8cb4_11567930',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85e69230836edfa4389d9fa262e99c79d5db7a9b' => 
    array (
      0 => 'D:\\blog\\app\\home\\view\\Index\\blogShowList2.html',
      1 => 1608044092,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fd8ce3f7b8cb4_11567930 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

       	 <h3>分类</h3>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_SESSION['categories'], 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
    
     <li><a href="#"> <?php echo str_repeat('--',$_smarty_tpl->tpl_vars['cat']->value['level']);
echo $_smarty_tpl->tpl_vars['cat']->value['c_name'];?>
&nbsp<span>3</span></a></li>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

  haha
</body>
</html><?php }
}
