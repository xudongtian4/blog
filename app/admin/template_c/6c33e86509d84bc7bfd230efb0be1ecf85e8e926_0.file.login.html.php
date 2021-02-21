<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-08 14:47:31
  from 'D:\blog\app\admin\view\Privilege\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fcf21837a9105_07353581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6c33e86509d84bc7bfd230efb0be1ecf85e8e926' => 
    array (
      0 => 'D:\\blog\\app\\admin\\view\\Privilege\\login.html',
      1 => 1607409614,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fcf21837a9105_07353581 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>博客后台</title>
</head>
<body>
	
       <!--  <div ><span>博客后台管理系统</span></div> -->
        <form method="post" action="index.php?p=admin&c=Privilege&a=check">
        	<!--  <label>用户名</label>
        	      <input type="text" placeholder="请输入用户名" name="u_username" value=""/ >
        	 <label>密码</label>
                  <input type="psssword" placeholder="请输入密码" name="u_password" value=""/>

             <label>验证码</label>
              <div><img src="index.php?p=admin&c=Privilege&a=captcha" width="220" height="50" onclick="this.src='index.php?p=admin&c=Privilege&a=captcha&'+Math.random()" >  </div>
             <input type="text" name="captcha" value="">

             <label><input type="checkbox" name="rememberMe">七天内自动登录</label>

             <input type="submit" name="button" value="登录"/>
 -->


             <table background="" align="center"  border="1" cellpadding="0" cellspacing="0" width="350" height="470" bgcolor="#EAEAEA">
                 <tr>
                     <td>
                         <table align="center"  border="0" cellpadding="0" cellspacing="0" width="300" height="460">
                              <tr height="50" >
      <td  colspan="2" align="center" valign="top"><h2>个人博客登录系统</h2></td>
    </tr>

                             <tr align="center">
                                 <td><label>用户名</label></td>
                             </tr>

                              <tr align="center">
                                 <td><input type="text" placeholder="请输入用户名" name="u_username" value=""/ >
                                    </td>
                             </tr>
                             
                              <tr align="center">
                                 <td><label>密码</label></td>
                              </tr>

                              <tr align="center">
                                  <td> <input type="psssword" placeholder="请输入密码" name="u_password" value=""/></td>
                              </tr>

                               <tr align="center">
                                 <td><label>验证码</label></td>
                              </tr>

                              <tr align="center">
                                 <td><img src="index.php?p=admin&c=Privilege&a=captcha" width="220" height="50" onclick="this.src='index.php?p=admin&c=Privilege&a=captcha&'+Math.random()" ></td>
                              </tr>

                               <tr align="center">
                                 <td><input type="text" name="captcha" value=""></td>
                              </tr>

                               <tr align="center">
                                 <td><label><input type="checkbox" name="rememberMe">七天内自动登录</label></td>
                              </tr>

                              <tr align="center">
                                 <td><input type="submit" name="button" value="登录"/></td>
                              </tr>

                         </table>
                     </td>
                 </tr>
             </table>


        </form>
    
</body>
</html><?php }
}
