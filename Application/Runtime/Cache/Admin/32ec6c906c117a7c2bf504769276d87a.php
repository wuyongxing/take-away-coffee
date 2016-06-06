<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- 可选的Bootstrap主题文件（一般不用引入） -->
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body style="background-image:url(/take-away-coffee/Public/img/main_body.png);background-repeat:repeat-x;">	
	<div class="container">
		<div class="row">
			<div class="col-md-offset-5"><h2 style="color: white;">后台管理系统</h2></div>
		</div>
		<div class="row col-md-offset-3 col-md-6" style="margin-top: 10%;border: solid #9d9d9d 1px;">
			<div class="col-md-offset-2 col-md-8" style="margin-top: 5%; margin-bottom: 5%;solid red 1px;">
				<form action="/take-away-coffee/index.php/Admin/Login/login" method="post">
				  <div class="form-group">
				    <label for="exampleInputEmail1">User Name</label>
				    <input name="username" class="form-control" placeholder="UserName">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" name="password" class="form-control" placeholder="Password">
				  </div>
				  <?php if($error == 1): ?><div class="form-group">
					  	<label for="exampleInputPassword1" style="color:red;">帐号秘密有误</label>
					  </div><?php endif; ?>
				  <button type="submit" class="btn btn-primary">Login</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>