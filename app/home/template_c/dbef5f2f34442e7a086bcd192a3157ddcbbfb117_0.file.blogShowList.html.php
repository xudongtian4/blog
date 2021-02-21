<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-18 14:30:06
  from 'D:\blog\app\home\view\Index\blogShowList.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fdc4c6e541ef1_61548211',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dbef5f2f34442e7a086bcd192a3157ddcbbfb117' => 
    array (
      0 => 'D:\\blog\\app\\home\\view\\Index\\blogShowList.html',
      1 => 1608273003,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fdc4c6e541ef1_61548211 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body> 
    <style>
        body 
       {
            text-align: center;
            background-color: burlywood;
        }
        .signform {
            font-family: 微软雅黑;
            position: fixed;
            background-color: white;
            top: 20%;
            left: 30%;
            width: 500px;
            height: 400px;
            border-radius: 1em;
            text-align: center;
            z-index: 999;
        }
        #registerform {
            height: 450px;
        }
        .signclose {
            cursor: pointer;
            float: right;
            overflow: hidden;
            text-align: center;
            position: relative;
            height: 35px;
            width: 35px;
            margin-top: 10px;
            margin-right: 10px;
        }
        #registerloading{
            position: absolute;
            width: 25px;
            height: 25px;
            left: 410px;
            top: 90px;
        }
        .signinput {
            text-align: center;
            border-radius: 0.2em;
            width: 280px;
            height: 45px;
            border: none;
            background-color:#f2f2f2;
            font-size: 28px;
        }
        .signinput::-webkit-input-placeholder {
            font-size: 26px;
        }
        .userdiv {
            position: relative;
            margin-top: 80px;
        }
        .pwddiv {
            position: relative;
            margin-top: 20px;
        }
        .postdiv {
            position: relative;
            margin-top: 20px;
        }
        .postdiv button {
            cursor: pointer;
            color: white;
            font-size: 26px;
            border: none;
            border-radius: 0.4em;
            width: 280px;
            height: 45px;
            background-color:#4CAF50;
        }
    </style>
  
        </head>
         
     <SCRIPT language="javascript">
                function Display1(sid){
                which = eval("menu_item" + sid);
                if (which.style.display == "none"){
                eval("menu_item" + sid + ".style.display=\"\";");
                }else{
                eval("menu_item" + sid + ".style.display=\"none\";");
                }
             }
            
             
     </SCRIPT>

     <SCRIPT language="javascript">
                function Display2(sid){
                which = eval("menu_reg" + sid);
                if (which.style.display == "none"){
                eval("menu_reg" + sid + ".style.display=\"\";");
                }else{
                eval("menu_reg" + sid + ".style.display=\"none\";");
                }
             }
     </SCRIPT>

    <div align="right">
        <?php if ((isset($_SESSION['user']))) {?><a href="index.php?a=out&c=User">退出登录</a>
        <a href="index.php?p=admin"><?php echo $_SESSION['user']['u_username'];?>
</a>
        <?php } else { ?><input type="button"  value="登录" onClick="Display1(1)">
        <?php }?>
    </div>
    <!--  加载登录表单 -->
 <div>
  <form  id="menu_item1" name="form" action="index.php?c=User&a=check" method="post" style="display: none">

     <table background="" align="center"  border="0" cellpadding="1" cellspacing="0" width="300" height="200" bgcolor="#FF42426F">
       <tr>
         <td align="center"> 
            <h4>用户登录</h4> 
         </td> 
       </tr>

        <tr>
         <td align="center"> 
            用户名 &nbsp<input type="text" name="u_username" value="" placeholder="请输入用户名"> 
         </td> 
       </tr>
        
        <tr>
         <td align="center"> 
         密    &nbsp码 &nbsp <input type="text" name="u_password" value="" placeholder="请输入密码"> 
         </td> 
       </tr>    

        <tr>
         <td align="center"> 
            <input type="submit" value="登录">
         </td> 
       </tr>    
            <tr align="left"><td>新用户?<input type="button"  value="立即注册" onClick="Display2(1)"></td></tr>
      </table>
    </form>
 </div>

 <!-- 加载注册表单 -->
    <div>
         <form id="menu_reg1" action="index.php?c=User&a=regist" method="post" style="display:none">
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
             <td><img  src="index.php?c=User&a=captcha" width="200" height="40" onclick="this.src='index.php?p=home&c=User&a=captcha&'+Math.random()">
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

 
 <!--   检索内容 -->

	    <h3>按标题检索</h3> 
	    <form action="index.php" method="post"> 
         <input type="text" name="a_title" value="" placeholder="请输入检索内容">
         <input type="submit" value="检索">
	    </form>
    
		 <h3>按分类检索</h3>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_SESSION['categories'], 'cat');
$_smarty_tpl->tpl_vars['cat']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->do_else = false;
?>
        <li><a href="index.php?c_id=<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
"> <?php echo str_repeat('--',$_smarty_tpl->tpl_vars['cat']->value['level']);
echo $_smarty_tpl->tpl_vars['cat']->value['c_name'];?>
&nbsp<span><?php echo (($tmp = @$_smarty_tpl->tpl_vars['cat_count']->value[$_smarty_tpl->tpl_vars['cat']->value['id']])===null||$tmp==='' ? 0 : $tmp);?>
</span></a></li>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<!--  博文内容 -->
  <h3 align="center">博文内容</h3>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'art');
$_smarty_tpl->tpl_vars['art']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['art']->value) {
$_smarty_tpl->tpl_vars['art']->do_else = false;
?>
      <table background="" align="center"  border="0" cellpadding="0" cellspacing="0" width="450" height="300" bgcolor="#EAEAEA">
      <tr>
      	  <td>
	     <span><a href=""><?php echo $_smarty_tpl->tpl_vars['art']->value['a_author'];?>
 </a></span>
	     <span>在</span>
	     <span><?php echo $_SESSION['categories'][$_smarty_tpl->tpl_vars['art']->value['c_id']]['c_name'];?>
</span>
	     <span>下发布</span>

	     <span><a href="">评论<?php echo (($tmp = @$_smarty_tpl->tpl_vars['art']->value['c_count'])===null||$tmp==='' ? 0 : $tmp);?>
条</a></span>

	     <span><?php echo date('Y年m月d日',$_smarty_tpl->tpl_vars['art']->value['a_time']);?>
</span>
	     <h3><?php echo $_smarty_tpl->tpl_vars['art']->value['a_title'];?>
</h3>
	     <p><?php echo $_smarty_tpl->tpl_vars['art']->value['a_content'];?>
</p>
	     <a href="index.php?c=Index&a=detial&id=<?php echo $_smarty_tpl->tpl_vars['art']->value['id'];?>
">点击阅读更多</a>
	   </td>
      </tr>
     </table>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
               <div align="center"><?php echo $_smarty_tpl->tpl_vars['pagestr']->value;?>
</div>

 <!-- <显示最新博文> -->

    <h3>最新博文</h3>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['news']->value, 'new');
$_smarty_tpl->tpl_vars['new']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['new']->value) {
$_smarty_tpl->tpl_vars['new']->do_else = false;
?>
		    <div>
		    	<a href="index.php?c=Index&a=detial&id=<?php echo $_smarty_tpl->tpl_vars['new']->value['id'];?>
"><img src="<?php if ($_smarty_tpl->tpl_vars['new']->value['a_img_thumb']) {
echo URL;?>
uploads/<?php echo $_smarty_tpl->tpl_vars['new']->value['a_img_thumb'];
} else {
echo P;?>
/img/4.jpg<?php }?>"></a>
		    </div>

		    <div><a href="index.php?c=Index&a=detial&id=<?php echo $_smarty_tpl->tpl_vars['new']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['new']->value['a_title'];?>
</a></div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


</body>
</html>

<?php }
}
