<?php
namespace vendor;

class Image{
	//图片后缀对应的处理函数，GD库
 	private static $ext =array(
         'jpg'=>'jpeg',
         'jpeg'=>'jpeg',
         'png'=>'png',
         'gif'=> 'gif'
	);
	//记录错误信息
	public static $error;
	//制作缩略图
	public static function makeThumb($file,$path,$width=40,$height=45){
		//判定资源有效性
		if(!is_file($file)){
			self::$error='图片资源不存在！';
			return false;
		}
		//获取文件信息，判定文件是否可以制作缩略图
		$file_info=pathinfo($file);      //数组，里面包含文件后缀
		$img_info=getimagesize($file); //数组，里面包含尺寸

		if(!array_key_exists($file_info['extension'], self::$ext)){
		 self::$error='当前文件不能制作缩略图！';
		 return false;
		}
		//明确原图资源函数，打开资源和保存函数
		$open= 'imagecreatefrom'.self::$ext[$file_info['extension']];
		$save='image'.self::$ext[$file_info['extension']];

		//打开图片资源
		$src=$open($file);
		$thumb=imagecreatetruecolor($width, $height);//新建一个图像,width*heighe的黑丝图像

		//缩略图背景补白
		$bg=imagecolorallocate($thumb, 255, 255, 255);//imagecolorallocate为图像分配颜色，红绿蓝
		imagefill($thumb, 0, 0, $bg);      //区域填充
		//计算原图在缩略图中的位置，通过宽高比来计算
		$src_b=$img_info[0]/$img_info[1];
		$thumb_b=$width/$height;
		//原图款高比大于缩略图宽高比：原图太宽，缩略图宽度要占满
		if($src_b>$thumb_b){
			$w=$width;
			$h=ceil($width/$src_b);

			$x=0;
            $y=ceil(($height-$h)/2);
		}else{
			//原图款高比小于于缩略图宽高比：原图太高，缩略图高度占满
            $w=ceil($src_b*$width);
            $h=$height;
            
            $x=ceil(($width-$w)/2);
            $y=0;
		}
		//复制合并缩略图
		if(!imagecopyresampled($thumb, $src, $x, $y, 0, 0, $w, $h, $img_info[0], $img_info[1])){
			//采样复制失败
			self::$error='缩略图制作失败！';
            return false;
		}
		//保存图片
		$res=$save($thumb,$path.'thumb_'.$file_info['basename']);

		//销毁资源
		imagedestroy($src);
		imagedestroy($thumb);
		//判定结果
		if($res){
		  //保存成功,返回文件名字
			return 'thumb_'.$file_info['basename'];
		}else{
			//保存失败
			self::$error='图片保存失败！';
			return  false;
		}
	}   
}
