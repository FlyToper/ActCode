<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>测试页面</title>
</head>
<body>
	<h1>注册测试</h1>
	<form action="/User/register" method="post">
		密码：<input tyepe="text" name="Password"><br>
		IMEI：<input tyepe="text" name="Imei"><br> 
		<input type="submit" value="注册">
	</form>
	<hr>
	<hr>

	<h1>登录测试</h1>
	<form action="/User/checkLogin" method="post">
		用户名：<input type="text" name="UserName" ><br>
		密码：<input type="text" name="Password"><br> 
		<input type="submit" value="登录">
	</form>
	<hr>
	<hr>
	
	<h1>发送激活码，获取联系人数据</h1>
	<form action="/User/getContact" method="post">
		请输入激活码：<input type="text" name="JHCode">
		<input type="submit" value="提交">
	</form>
	<hr>
	<hr>
	
	<h1>获取用户信息</h1>
	<form action="/User/getUserInfo" method="post">
		用户名：<input type="text" name="UserName">
		<input type="submit" value="提交">
	</form>
	<hr>
	<hr>
</body>
</html>