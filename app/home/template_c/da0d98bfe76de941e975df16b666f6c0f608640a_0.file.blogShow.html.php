<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-19 20:27:18
  from 'D:\blog\app\home\view\Index\blogShow.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fddf1a6b64a52_71904599',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da0d98bfe76de941e975df16b666f6c0f608640a' => 
    array (
      0 => 'D:\\blog\\app\\home\\view\\Index\\blogShow.html',
      1 => 1608380815,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fddf1a6b64a52_71904599 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>    <h1>博文内容</h1>
	      <div align="right"> <a href="index.php">回到首页 </a></div>
	        <div>
	        	 <h2 align="center"><?php echo $_smarty_tpl->tpl_vars['article']->value['a_title'];?>
</h2>
	        	<table align="center" border="0" cellpadding="1" cellspacing="0" width="800" height="50" >
	        		<tr >
	        			<td width="50">
	        				<span ><i><a href="index.php?p=admin"><?php echo $_smarty_tpl->tpl_vars['article']->value['a_author'];?>
 </a></i></span>
	        			</td>

	        			<td width="30" align="center"> 
	        				<span>在</span>
	        			</td>

	        			<td width="80" align="center">
	        				<span><?php echo $_SESSION['categories'][$_smarty_tpl->tpl_vars['article']->value['c_id']]['c_name'];?>
</span>
	        			</td>

	        			<td width="80" align="center">
	        				<span>下发布</span>
	        			</td>

	        			<td align="right" >
	        				<span>评论<?php echo count($_smarty_tpl->tpl_vars['comments']->value);?>
</span>
	        			</td>

	        			<td width="120" align="right">
	        				<span> <?php echo date('Y:m:d',$_smarty_tpl->tpl_vars['article']->value['a_time']);?>
 </span>
	        			</td>

	        		</tr>
	        	</table>
            </div>
            <div align="center">
            	<img src="<?php if ($_smarty_tpl->tpl_vars['article']->value['a_img']) {
echo URL;?>
uploads/<?php echo $_smarty_tpl->tpl_vars['article']->value['a_img'];
} else {
echo P;?>
/img/4.jpg<?php }?>">
            </div>
            <div align="center"><p><?php echo $_smarty_tpl->tpl_vars['article']->value['a_content'];?>
</p></div>

           
            <!-- <用户评论> -->
	            <div><h4>共有评论<?php echo count($_smarty_tpl->tpl_vars['comments']->value);?>
条</h4> </div>

	     <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'com');
$_smarty_tpl->tpl_vars['com']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['com']->value) {
$_smarty_tpl->tpl_vars['com']->do_else = false;
?>
		            <div>
			            <span><a href="index.php?p=admin"><?php echo $_smarty_tpl->tpl_vars['com']->value['u_username'];?>
 </a> </span>
			             <span><?php echo date('d-m-Y',$_smarty_tpl->tpl_vars['com']->value['c_time']);?>
</span>
                          <span>
               <?php if ((isset($_SESSION['user']))) {?>
                	<a href="index.php?c=Comment&a=praise&id=<?php echo $_smarty_tpl->tpl_vars['com']->value['id'];?>
&a_id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">赞<?php echo $_smarty_tpl->tpl_vars['com']->value['praise'];?>
</a> 
                	<a href="index.php?c=Comment&a=step&id=<?php echo $_smarty_tpl->tpl_vars['com']->value['id'];?>
&a_id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
">踩<?php echo $_smarty_tpl->tpl_vars['com']->value['step'];?>
</a>
                <?php }?>
                           </span>
			              <p><?php echo $_smarty_tpl->tpl_vars['com']->value['c_comment'];?>
</p>
		              </div>
	     <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                <!-- 发布评论 -->
		        <div >
	        	<h4>发布新评论</h4>
		         <form action="index.php?c=Comment&a=insert&a_id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
"  method="post">
		            	<textarea name="c_comment" rows="7" placeholder="请输入你的评论"></textarea>
		            	  <?php if ((isset($_SESSION['user']))) {?>
	                         <input type="submit" value="发布">
	                      <?php } else { ?>
	                  <input type="button" onclick="JavaScript:return false"  value="请先登录">
	                      <?php }?>
	             </form>
                </div>
</body>
</html>
<?php }
}
