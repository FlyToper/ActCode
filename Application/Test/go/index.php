<?php
	header("Content-Type:text/html;charset=utf-8");
	 //������Ŀ��Ӧ��Ŀ¼
    //����ļ�Ŀ¼�ᴴ��������ط�
    define("APP_PATH", "../");

    //���ÿ���ģʽΪ��"����ģʽ"
    define("APP_DEBUG", true);

    //��css��imgͼƬ·������Ϊ�����Ա�ʹ��
    define("SITE_URL", "http://web.100.com/");
    define("CSS_URL", SITE_URL."shop/go/public/css/");
    define("IMG_URL", SITE_URL."shop/go/public/img/");

    include "../../../ThinkPHP/ThinkPHP.php";