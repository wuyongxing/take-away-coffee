<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>Coffee OnLine</title>

	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- 可选的Bootstrap主题文件（一般不用引入） -->
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="row" style="background-color: #c40000;">
            <div class="col-md-offset-5 col-md-2"><h3 style="color:white;">Coffee Online</h3></div>
            <div class="col-md-offset-10">
                <ul class="nav nav-pills" style="margin-top: 5%;">
                  <li role="presentation"><a style="color: white;" href="#">Login</a></li>
                  <li role="presentation"><a style="color: white;" href="#">Profile</a></li>
                </ul>
            </div>
        </div>
        <div class="row" style=" margin-top: 2%;">
            <div id="carousel-example-generic" class="carousel slide col-md-offset-1 col-md-10" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner" style="height: 500px;" role="listbox">
                <div class="item active">
                  <img src="/take-away-coffee/Public/img/slide1.png" alt="..." style="height: 100%;width: 100%;">
                </div>
                <div class="item">
                  <img src="/take-away-coffee/Public/img/slide2.png" alt="..." style="height: 100%;width: 100%;">
                </div>
                <div class="item">
                  <img src="/take-away-coffee/Public/img/slide3.png" alt="..." style="height: 100%;width: 100%;">
                </div>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-4 col-md-4" style="margin-top: 2%; padding: 0%; border: solid #c40000 5px;">
                <input type="text" name="SearchContent" id="SearchContent" style="width: 80%;">
                <input type="button" id="Search" style="width: 20%; background-color: #c40000;border: solid #c40000 2px; color:white; margin: -0% -1% -0% -1%;" value="Search">
            </div>
        </div>
        <div class="row" style="margin-top: 2%;">
            <div class="col-md-offset-1 col-md-10">
                <a href="#" style="text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;">默认</a>
                <a href="#" style="text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;">默认</a>
                <a href="#" style="text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;">默认</a>
                <a href="#" style="text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;">默认</a>
                <a href="#" style="text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;">默认</a>
                <span style="margin-left: 1%;">价格:<span>
                <input type="text" style="width: 5%;">—
                <input type="text" style="width: 5%;">
                <button type="button" style="background-color: #c40000;border: solid #c40000 1px; color:white;">确定</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div style="float: left; border: solid red 1px; height:230px;width:24%; margin-right: 1%;margin-top: 2%;">
                    123
                </div>
                <div style="float: left; border: solid red 1px; height:230px;width:24%; margin-right: 1%;margin-top: 2%;">
                    123
                </div>
                <div style="float: left; border: solid red 1px; height:230px;width:24%; margin-right: 1%;margin-top: 2%;">
                    123
                </div>
                <div style="float: left; border: solid red 1px; height:230px;width:24%; margin-right: 1%;margin-top: 2%;">
                    123
                </div>
                <div style="float: left; border: solid red 1px; height:230px;width:24%; margin-right: 1%;margin-top: 2%;">
                    123
                </div>
                <div style="float: left; border: solid red 1px; height:230px;width:24%; margin-right: 1%;margin-top: 2%;">
                    123
                </div>
                <div style="float: left; border: solid red 1px; height:230px;width:24%; margin-right: 1%;margin-top: 2%;">
                    123
                </div>
                <div style="float: left; border: solid red 1px; height:230px;width:24%; margin-right: 1%;margin-top: 2%;">
                    123
                </div>
                <div style="float: left; border: solid red 1px; height:230px;width:24%; margin-right: 1%;margin-top: 2%;">
                    123
                </div> 
            </div>
        </div>
        <div class="row" style="margin-top: 2%;">
            <div class="footer_f">
                <div class="footer text-center col-sm-offset-3 col-sm-6" style="padding:10px 0; color:#999;">中正大学资讯工程 版权所有@2016
                </div>
            </div>
        </div>
    </div>
</body>
</html>