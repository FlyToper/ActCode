<?php
	header("Content-Type:text/html;charset=utf-8");
	 //创建项目的应用目录
    //许多文件目录会创建在这个地方
    define("APP_PATH", "../");

    //设置开发模式为："调试模式"
    define("APP_DEBUG", true);

    //把css和img图片路径定义为常理，以便使用
    define("SITE_URL", "http://web.100.com/");
    define("CSS_URL", SITE_URL."shop/go/public/css/");
    define("IMG_URL", SITE_URL."shop/go/public/img/");

    include "../../../ThinkPHP/ThinkPHP.php";