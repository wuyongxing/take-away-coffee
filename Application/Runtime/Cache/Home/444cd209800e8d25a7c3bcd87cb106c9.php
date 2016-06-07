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
    <script>
    </script>
</head>
<div class="container">
        <div class="row" style="background-color: #c40000;">
            <div class="col-md-offset-5 col-md-2"><h3 style="margin-top: 10%;"><a href="/take-away-coffee/index.php/Home/Index/index" style="color:white; text-decoration: none;">Coffee Online</a></h3></div>
            <div class="col-md-offset-10">
                <ul class="nav nav-pills" style="margin-top: 1%;">
                  <li role="presentation"><button class="btn btn-lg" style="background-color: #c40000; font-size: 20px;"><a style="text-decoration: none; color:white;" href="/take-away-coffee/index.php/Home/Person/index?id=<?php echo ($id); ?>"><?php echo ($name); ?></a></button></li>
                  <li role="presentation"><button class="btn btn-lg" style="background-color: #c40000; font-size: 20px;"><a style="text-decoration: none; color:white;" href="/take-away-coffee/index.php/Home/Login/logout">Logout</a></button></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-5 col-md-2;">
                <h2><?php echo ($name); ?>的订单记录</h2>
            </div>
        </div>
        <div class="row" style="margin-top: 2%;">
            <table class="table">
                <thead><tr><th>BookingID</th><th>Goods'name</th><th>Unit</th><th>Num</th><th>candy</th><th>cold</th><th>BooikngName</th><th>Phone</th><th>time</th><th>status</th></tr></thead>
                <tbody>
                <?php if(is_array($li)): $i = 0; $__LIST__ = $li;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($li["id"]); ?></td>
                        <td><?php echo ($li["goodsname"]); ?></td>
                        <td><?php echo ($li["price"]); ?></td>
                        <td><?php echo ($li["num"]); ?></td>
                        <td><?php if($li['candy'] == 0): ?>0%<?php elseif($li['candy'] == 1): ?>25%<?php elseif($li['candy'] == 2): ?>50%<?php elseif($li['candy'] == 3): ?>75%<?php else: ?>100%<?php endif; ?></td>
                        <td><?php if($li['cold'] == 0): ?>冰<?php elseif($li['cold'] == 1): ?>常温<?php else: ?>冰<?php endif; ?></td>
                        <td><?php echo ($li["name"]); ?></td>
                        <td><?php echo ($li["phone"]); ?></td>
                        <td><?php echo ($li["time"]); ?></td>
                        <td><?php if($li['status'] == 0): ?>未接单<?php elseif($li['status'] == 1): ?>已接单<?php else: ?>已拒绝<?php endif; ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
        </div>
        <div class="row" style="position:absolute;left: 42%;top: 92%;">
            <div class="footer_f">
                <div class="footer text-center" style="padding:10px 0; color:#999;">中正大学资讯工程 版权所有@2016
                </div>
            </div>
        </div>
    </div>
</body>
</html>