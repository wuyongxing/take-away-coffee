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
        $(function(){
            $(".title").find("ul li:eq(1)").addClass("active");
        });
        $(document).ready(function(){
            setInterval(function(){
                $.post("/take-away-coffee/index.php/Admin/Index/new_booking",function(data){
                    if(data != 0)
                    {
                        $("#new").html(data);
                    }
                });
            },100);
        });
    </script>
</head>
<body style="background:url(/take-away-coffee/Public/img/main_bg.png) repeat-x;">
<div class="container-fluid">
    <div class="row">
        <h1 style="text-align: center;">后台管理</h1>
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
            <h3 style="text-align: center;">新增订单</h3>
            <table class="table">
                <tr><th>BookingNumber</th><th>Status</th><th>Time</th></tr>
                <?php if(is_array($li)): $i = 0; $__LIST__ = $li;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><tr>
                    <td><a href="/take-away-coffee/index.php/Admin/Index/show_booking?id=<?php echo ($li["id"]); ?>" style="text-decoration: none;"><?php echo ($li["id"]); ?></a>
                    </td>
                    <td>
                        <?php if($li['status'] == 0): ?>未接单</h4><?php elseif($li['status'] == 1): ?>已接单</h4><?php else: ?>已拒绝</h4><?php endif; ?>
                    </td>
                    <td>
                        <?php echo ($li["time"]); ?>
                    </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>   
            </table>
            <div style="position: absolute;left: 30%;top:85%;">
                <?php echo ($page); ?>
            </div>
        </div>
    </div>
    <div class="row">
         <div class="footer_f">
            <div class="footer text-center col-sm-offset-3 col-sm-6" style="padding:10px 0; color:#999;">中正大学资讯工程 版权所有@2016
            </div>
        </div>
    </div>
</div>
</body>
</html>