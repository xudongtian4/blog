<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-16 09:26:09
  from 'D:\blog\app\home\view\Index\blogShowList3.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fd962311ac977_72943189',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db0915aa9dfe6a8e3c45bd4538f697f9938b059d' => 
    array (
      0 => 'D:\\blog\\app\\home\\view\\Index\\blogShowList3.html',
      1 => 1608081965,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fd962311ac977_72943189 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
hah
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
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'art');
$_smarty_tpl->tpl_vars['art']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['art']->value) {
$_smarty_tpl->tpl_vars['art']->do_else = false;
?>

      
	     <span><a href=""><?php echo $_smarty_tpl->tpl_vars['art']->value['a_author'];?>
 </a></span>
       <span>在</span>
        <span><?php echo $_SESSION['categories'][$_smarty_tpl->tpl_vars['art']->value['c_id']]['c_name'];?>
</span>
        <span>下发布</span>
         <span><a href="">12</a></span>
        
	     

   <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</body>
</html><?php }
}
