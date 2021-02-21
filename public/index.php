<?php
//增加入口标记
define('ACCESS',TRUE);

//定义上级目录常量
define('ROOT_PATH', str_replace('\\', '/', dirname(__DIR__)).'/');
//echo ROOT_PATH;die;


//加载初始化文件
include  ROOT_PATH.'core/APP.php';

//激活初始化,有命名空间
\core\APP::start();