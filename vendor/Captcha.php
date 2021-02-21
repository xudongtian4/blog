<?php
namespace vendor;

class Captcha{
	/*制作验证码
	pargam1 int $width=450 验证码图片默认宽度
	pargam1 int $height=65 验证码图片默认高度
	pargam1 int $length=4 验证码默认字符数
	pargam1 string $font='' 验证码字符，默认为空*/
public static function getCaptcha($width=450,$height=65,$length=4,$fonts=''){
    	//判断字体资源
        if(empty($fonts)) $fonts='STENCIL.TTF';
         //确定路径        
          $fonts=__DIR__.'/fonts/'.$fonts;

          //制作画布
          $img=imagecreatetruecolor($width, $height);
         
          //填充背景色 随机浅色系
           $bg_color=imagecolorallocate($img, mt_rand(140,190), mt_rand(140,190),mt_rand(140,190));

           imagefill($img,0,0, $bg_color);

           //增加干扰点
           for($i=0;$i<50;$i++){
           	//随机颜色
           	$dots_color=imagecolorallocate($img, mt_rand(200,255), mt_rand(200,255),mt_rand(200,255));
           	//使用*号作为干扰点
           	imagestring($img, mt_rand(1,5), mt_rand(0,$width),mt_rand(0,$height),'*',$dots_color);
           }
           for($i=0;$i<10;$i++){
            //线段颜色
            $line_color=imagecolorallocate($img, mt_rand(80,130), mt_rand(80,130),mt_rand(80,130));
            //制作线段
            imageline($img, mt_rand(0,$width), mt_rand(0,$height),mt_rand(0,$width),mt_rand(0,$height),$line_color);
           }
          
          $captcha=self::getString($length); //获取随机字符
         
          @session_start();
          $_SESSION['captcha']=$captcha; //将获取到的随机验证码放到session里面

          //写入到图片
          for($i=0;$i<$length;$i++){
               //增加颜色
            $c_color=imagecolorallocate($img, mt_rand(0,60), mt_rand(0,60), mt_rand(0,60));
            imagettftext($img, mt_rand(20,25), mt_rand(-45,45), $width/($length+1)*($i+1), mt_rand(25,$height-25), $c_color, $fonts, $captcha[$i]);
        }
        //输出资源
        header('Content-type:image/png');
        imagepng($img);
        //销毁资源
        imagedestroy($img);
     } 


  private static function getString($length=4){
             //从ASCII码中读取
          $captcha='';
             //随机取大写，小写，数字
          for($i=0;$i<$length;$i++){
            //随机确定是字母还是数字
            switch(mt_rand(1,3)){
              case 1:             //数字49到57代表1-9
                $captcha.=chr(mt_rand(49,57));
                 break;

              case 2:             //小写字母
                 $captcha.=chr(mt_rand(65,90));
                  break;

              case 3:             //大写字母
                $captcha.=chr(mt_rand(97,122));
                  break;
            }
           }
           //返回调用者
           return $captcha;
   }

   public static function checkcaptcha($captcha){
        //确保session开启：当前框架而言，后天部分做过开启，但是其他部分未开启
        @session_start();
        //不区分大小写,与session存在进行比较
        return (strtolower($captcha)===strtolower($_SESSION['captcha']));
   }
}         
