<?php
namespace vendor;
class Page{
	//生成分页字符串
	public static function  clickPage($url,$counts,$pagecount=5,$page=1,$cond=array()){
       //计算页码,一共多少页
		$pages=ceil($counts/$pagecount);
   
        //上一页，没有上一页就是第一页
	    $prev=$page>1?$page-1:1;
	    //下一页，没有下一页就是最后一页
	    $next=$page<$pages?$page+1:$pages;

	    //组织条件,额外条件
	    $pathinfo=" ";
	    foreach ($cond as $key => $value) {
	       $pathinfo.=$key."=".$value.'&';
	    }

	    $click=" ";
	    $click.="<a href='{$url}?{$pathinfo}page=1'>首页&nbsp</a>";
        //组织上一页功能
        $click.="<a href='{$url}?{$pathinfo}page={$prev}'>上一页&nbsp</a>";
        //页码点击判断
        if($pages<=7){
        	//显示全部页面
        	for($i=1;$i<=$pages;$i++){
        	   $click.="<a href='{$url}?{$pathinfo}page={$i}'>{$i}&nbsp</a>";
        	}
        }else{
        	  //当$pages>7页时，要判断所选页数<=5时,显示前7页，追加...
        	  if($page<=5){
		        	   for($i=1;$i<=7;$i++){
		        	   $click.="<a href='{$url}?{$pathinfo}page={$i}'>{$i}&nbsp</a>";
	        	       }
			           //追加...
			           $click.="<a href='#'>...&nbsp</a>";

               }else{
               	      //所选页码>5,然后再判断是在中间还是在最后三页
                      $click.="<a href='{$url}?{$pathinfo}page=1'>1&nbsp</a>";
                      $click.="<a href='{$url}?{$pathinfo}page=2'>2&nbsp</a>";
                      $click.="<a href='#'>...&nbsp</a>";

               	      //判断所选页数在最后三页时，要显示最后五页 12...最后五页 
               	      if($pages-$page<3){
                          for($i=$pages-4;$i<=$pages;$i++){
                          $click.="<a href='{$url}?{$pathinfo}page={$i}'>{$i}&nbsp</a>";
                          }
               	     }else{
                          //所选择的页码在中间，12...中间五页...
               	     	  for($i=$page-2;$i<=$page+2;$page++){
                           $click.="<a href='{$url}?{$pathinfo}page={$i}'> {$i}&nbsp </a>";  
               	     	    }
               	     	     //追加...
               	     	    $click.="<a href='#'>...&nbsp</a>";
               	          }
                    }
		      }
	      //组织下一页功能
	       $click.="<a href='{$url}?{$pathinfo}page={$next}'>下一页&nbsp</a>";
	       $click.="<a href='{$url}?{$pathinfo}page={$pages}'>尾页</a>";
	      //返回给调用者
	      return $click;
    }  
} 