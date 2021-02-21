<?php
//配置文件
return array(

	//修改配置文件
	//return在函数中代表返回值，将函数内容（结果）返回给函数调用，在文件中使用return代表将return后跟的内容回给文件包含处

        	'database'=>array(
                                'type'=>'mysql',    //数据库产品
                                'host'=>'localhost',
                                'port'=>'3306',
                                'user'=>'root',
                                'pass'=>'root',
                                'charset'=>'utf8',
                                'dbname'=>'blog',
                                'prefix'=>'b_'         //表前缀
        	),
            //增加驱动
            'drivers'=>array(
            ),
            'system'=>array(
                            	'error_reporting'=>E_ALL,
                                'displary_error'=>1
            ),
            //增加后台分页配置
            'admin'=>array(
                                'article_pagecount'=>5,
                                'user_pagecount'=>2,
                                'comment_pagecount'=>5

            ),
            //增加前台分页配置
            'home'=>array(
                                 'article_pagecount'=>5
            ),

    ) ;