<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-17 15:10:57
  from 'D:\blog\app\home\view\Index\reg.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fdb048119fca8_04757859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a887b7f22f0e4f88a56fe1624d9437ac18fc7bf2' => 
    array (
      0 => 'D:\\blog\\app\\home\\view\\Index\\reg.html',
      1 => 1608189054,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fdb048119fca8_04757859 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
   <div>
         <form id="menu_reg1" action="" method="post" >
            <table background="" align="center"  border="0" cellpadding="1" cellspacing="0" width="300" height="200" bgcolor=" #FF00FFFF">
       <tr>
             <td align="center"> 
                <h4>用户注册</h4> 
             </td> 
       </tr>

        <tr>
             <td align="center"> 
              <input type="text" name="u_username" value="" placeholder="请输入用户名"> 
             </td> 
       </tr>
        <tr>
             <td align="center"> 
             <input type="text" name="u_password" value="" placeholder="请输入密码"> 
             </td> 
       </tr>   
        <tr>
             <td><img  src="index.php?a=captcha" width="220" height="50" onclick="this.src='index.php?p=home&c=User&a=captcha&'+Math.random()">
             </td>
       </tr>   
        <tr>
             <td align="center"> 
              <input type="text" name="captcha" value="" placeholder="请您填写邮件验证码"> 
             </td> 
       </tr>  

        <tr>
             <td align="center"> 
                <input type="submit" value="注册">
             </td> 
       </tr>    
            <tr align="left"><td>老用户?<input type="button"  value="立即登录" onClick="Display1(1)"></td></tr>
      </table>
            
        </form>
    </div>

</body>
</html><?php }
}
