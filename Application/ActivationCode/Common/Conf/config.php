<?php
return array(
	
		//'配置项'=>'配置值'
		'URL_MODEL' => 2, //重写模式 www.book.com:8090/Home/Index/index
		'MODULE_ALLOW_LIST'    =>    array('Home','Admin'),
		'DEFAULT_MODULE'       =>    'Home', // 默认模块
				
		'DB_TYPE'               =>  'mysql',     // 数据库类型
		'DB_HOST'               =>  '', // 服务器地址
		'DB_NAME'               =>  '',          // 数据库名
		'DB_USER'               =>  '',      // 用户名
		'DB_PWD'                =>  '',          // 密码
		'DB_PORT'               =>  '3306' ,   // 端口
		'DB_PREFIX'             =>  '',    // 数据库表前缀
		'DB_CHARSET'=> 'utf8', // 字符集
		'DB_FIELDS_CACHE' => false,
		"SHOW_PAGE_TRACE" => true,
);