<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-18 21:18:34
  from 'D:\blog\app\admin\view\Index\index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fdcac2a5e5b28_15258019',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72c23d480a763ebdb26e14f3bdfec2355e748be2' => 
    array (
      0 => 'D:\\blog\\app\\admin\\view\\Index\\index.html',
      1 => 1608297511,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../public/header.html' => 1,
    'file:../public/sidebar.html' => 1,
    'file:../public/footer.html' => 1,
  ),
),false)) {
function content_5fdcac2a5e5b28_15258019 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
		   <?php $_smarty_tpl->_subTemplateRender('file:../public/header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	
		   <?php $_smarty_tpl->_subTemplateRender('file:../public/sidebar.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
          <div>
          	<h2>控制面板</h2>
          	<p>小标题</p>
          </div>
	</div>
     <div>
     	<h2>提示</h2>
     	   <ul>
     		 <li>使用左侧的导航菜单栏进入功能</li>
             <li>使用右上角的退出按钮退出管理后台</li>
     	   </ul>
     	   <!-- <a href="#">关闭</a> -->
     </div>

     <div>
     	<h2>提示</h2>
     	<ul>
     		<li>1.您当前使用是ip:<?php echo $_SERVER['REMOTE_ADDR'];?>
</li>
     		<li>2.PHP版本:<?php echo PHP_VERSION;?>
</li>
     		<li>3.浏览器:<?php echo $_SERVER['HTTP_USER_AGENT'];?>
</li>
     	</ul>
     	<!-- <a href="#">关闭</a> -->
     </div>

     <div>
     	<span> <img src="<?php echo P;?>
/img/4.jpg" width="44" height="32"> 
     		<b>用户数<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</b> 
     	</span>
    <?php $_smarty_tpl->_subTemplateRender('file:../public/footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
