<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

	//测试数据库1
	public function checkDB1(){
		
		$model  =  D();
		
		
		echo '<pre>';
		//var_dump($model);
		echo '</pre>';

		$info =  $model -> query("show databases;");
		if(!$info){
			die('连接错误！');
		}

		if(is_resource($info)){
			
		}
	}
	// 数据库测试
	public function checkDB(){
		$localhost = '127.0.0.1';
		$port = '3306';
		$user = 'root';
		$pwd = '123456';

		$link = mysql_connect("$localhost:$port", $user, $pwd);

		if(!is_resource($link)){
			die('数据库连接失败！');
		}

		$sql = 'show databases';

		$result = mysql_query($sql, $link);
		if(!$result){
			echo 'error';
			return;
		}

		if(is_resource($result)){
			while($row = mysql_fetch_array($result)){
				echo $row[0].'<br>';
			}
		}
	}

	
	//登录验证
	public function checkLogin(){
		try{
			extract($_REQUEST);

			//验证用户名和密码
			if(is_set($usename) && !empty($username)){
				if(is_set($password) && !empty($password)){
					//开始执行登录验证
					echo 'success';
				}else{
					echo 'error';
				}
			}else{
				echo 'error';
			}	
		}catch(Exception $e){
			echo 'error 404';
		}
	}

	//注册
	public function register(){
		try{
			
		}catch(Exception $e){
			echo 'error 404';
		}
	}

}