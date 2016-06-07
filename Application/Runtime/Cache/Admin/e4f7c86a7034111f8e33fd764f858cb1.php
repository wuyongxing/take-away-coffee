<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>Coffee Management</title>

	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- 可选的Bootstrap主题文件（一般不用引入） -->
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
        $(document).ready(function(){
            if($("#status").html() == "状　态　:　未接单")
                $(".title").find("ul li:eq(1)").addClass("active");
            else
                $(".title").find("ul li:eq(2)").addClass("active");
        });
        $(document).ready(function(){
            var T = setInterval(function(){
                $.post("/take-away-coffee/index.php/Admin/Index/new_booking",function(data){
                    if(data != 0)
                    {
                        $("#new").html(data);
                    }
                });
                if($("#adminid").val() == "")
                    clearInterval(T);
            },100);
            $("#correct").click(function(){
                $.post("/take-away-coffee/index.php/Admin/Index/check_booking?op=correct&&id=" + $("#id").val(),function(data){
                    if(data == 'OK')
                    {
                        alert("OK!");
                        window.location.href="/take-away-coffee/index.php/Admin/Index/booking";
                    }
                });
            });
            $("#reject").click(function(){
                $.post("/take-away-coffee/index.php/Admin/Index/check_booking?op=reject&&id=" + $("#id").val(),function(data){
                    if(data == 'OK')
                    {
                        alert("OK!");
                        window.location.href="/take-away-coffee/index.php/Admin/Index/booking";
                    }
                });
            });
        });
    </script>
</head>
<body style="background:url(/take-away-coffee/Public/img/main_bg.png) repeat-x;">
<div class="container-fluid">
    <div class="row">
        <h1 style="text-align: center;">后台管理</h1>
        <input type="hidden" id="adminid" value="<?php echo ($username); ?>">
    </div>
    <div class="row">
        <div class="title col-sm-offset-3 col-sm-6">
            <ul class="nav nav-pills" style="margin: 2px;">
              <li role="presentation"><a href="/take-away-coffee/index.php/Admin/Index/index" style="color: white;">管理用户</a></li>
              <li role="presentation"><a href="/take-away-coffee/index.php/Admin/Index/booking" style="color: white;">新增订单<span id="new" class="badge badge-default"></span></a></li>
              <li role="presentation"><a href="/take-away-coffee/index.php/Admin/Index/old_booking" style="color: white;">历史订单</a></li>
              <li role="presentation"><a href="/take-away-coffee/index.php/Admin/Index/goods" style="color: white;">管理商品</a></li>
              <li role="presentation"><a href="/take-away-coffee/index.php/Admin/Index/admin" style="color: white;">管理管理员</a></li>
              <li role="presentation"><a href="/take-away-coffee/index.php/Admin/Login/logout" style="color: white;">注销</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6" style="margin-top: 1%; background-color: #FFFFFF; height: 500px; border: #CCC solid 1px; box-shadow: 2px 2px 10px #c0c0c0;" >
            <div class="page-header">
                <h3 style="text-align: center;">订单管理</h3>
            </div>
            <input type="hidden" id="id" value="<?php echo ($li[0]['id']); ?>" />
            <div class="col-md-offset-4" style="margin-top: 10%;">
                <h4>订单号　:　<?php echo ($li[0]['id']); ?></h4>
                <h4>姓　名　:　<?php echo ($li[0]['name']); ?></h4>
                <h4>手机号　:　<?php echo ($li[0]['phone']); ?></h4>
                <h4>商品名　:　<?php echo ($li[0]['goodsname']); ?></h4>
                <h4>甜　度　:　<?php if($li[0]['candy'] == 0): ?>0%</h4>
                               <?php elseif($li[0]['candy'] == 1): ?>25%</h4>
                               <?php elseif($li[0]['candy'] == 2): ?>50%</h4>
                               <?php elseif($li[0]['candy'] == 3): ?>75%</h4>
                               <?php else: ?>100%</h4><?php endif; ?>
                <h4>冷　热　:　<?php if($li[0]['cold'] == 0): ?>冰</h4>
                               <?php elseif($li[0]['cold'] == 1): ?>常温</h4>
                               <?php else: ?>冰</h4><?php endif; ?>
                <h4>数　量　:　<?php echo ($li[0]['num']); ?>
                <h4 id="status">状　态　:　<?php if($li[0]['status'] == 0): ?>未接单</h4><?php elseif($li[0]['status'] == 1): ?>已接单</h4>
                               <?php else: ?>已拒绝</h4><?php endif; ?>
                <?php if($li[0]['status'] == 0): ?><button type="button" id="correct" class="btn btn-primary">确认接单</button>
                    <button type="button" id="reject" class="btn btn-danger">拒绝接单</button>
                    <button type="button" class="btn btn-success"><a href="/take-away-coffee/index.php/Admin/Index/booking" style="text-decoration: none; color:white;">返回</a></button>
                <?php else: ?><button type="button" class="btn btn-success" ><a href="/take-away-coffee/index.php/Admin/Index/old_booking" style="text-decoration: none; color:white;">返回</a></button><?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row">
         <div class="footer_f">
            <div class="footer text-center col-sm-offset-3 col-sm-6" style="padding:10px 0; color:#999; margin-top:20px;">中正大学资讯工程 版权所有@2016
            </div>
        </div>
    </div>
</div>
</body>
</html>