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
        $(document).ready(function(){
            $("#submit").click(function(){
                var d = $("#Loginform").serialize();
                $.post("/take-away-coffee/index.php/Home/Login/login",d,function(data){
                    if(data == "OK")
                    {
                        window.location.href = "/take-away-coffee/index.php/Home/Index/index";
                    }
                    else 
                    {
                        $("error").css("display","block");
                        $("#errorcontent").html(data);
                    }
                });
            });
            $("#Search").click(function(){
              var text = $("#SearchContent").val();
              $("#left").val("");
              $("#right").val(""); 
              $(".chosesort").removeClass("chosesort");
              $(".sort").first().addClass("chosesort");
              $.post("/take-away-coffee/index.php/Home/Index/search",{"text":text},function(data){
                  var json = eval('(' + data + ')'); 
                  var dat = "";
                  for(var i in json)
                  {
                    dat += "<div style=\"float: left; border: solid red 1px; height:230px;width:24%; margin-right: 1%;margin-top: 2%;\"><div style=\"height: 70%; border: solid red 1px;\"><a href=\"/take-away-coffee/index.php/Home/Index/goods?id="+json[i]['id']+"\" target=\"_blank\"><img src=\"/take-away-coffee/Public/img/"+json[i]['pic']+"\" style=\"height: 100%; width: 100%;\"></a></div><div style=\"margin-top: 4%;\"><div style=\"font-size: 20px;font-weight: 700;margin-left: 5%;\">"+json[i]['goodsname']+"</div><div style=\"font-size: 20px;font-weight: 700; margin-left: 80%;color:#f76120\">"+json[i]['price']+"$</div></div></div>";
                  }
                  $("#goods").html(dat);
              });
            });
            $(".sort").click(function(){
              $(".chosesort").removeClass("chosesort");
              $(this).addClass("chosesort");
              var sortflag = $(".chosesort").attr("sortval");
              var sort = "id asc";
              if(sortflag == 1) sort = "time asc";
              else if(sortflag == 2) sort = "time desc"; 
              else if(sortflag == 3) sort = "price asc"; 
              else if(sortflag == 4) sort = "price desc";
              var left = $("#left").val();
              var right = $("#right").val();
              if(left == "") left = 0;
              if(right == "") right = 1000000;
              var text = $("#SearchContent").val();
              $.post("/take-away-coffee/index.php/Home/Index/sort",{"text":text,"sort":sort,"left":left,"right":right},function(data){
                  var json = eval('(' + data + ')'); 
                  var dat = "";
                  for(var i in json)
                  {
                    dat += "<div style=\"float: left; border: solid red 1px; height:230px;width:24%; margin-right: 1%;margin-top: 2%;\"><div style=\"height: 70%; border: solid red 1px;\"><a href=\"/take-away-coffee/index.php/Home/Index/goods?id="+json[i]['id']+"\" target=\"_blank\"><img src=\"/take-away-coffee/Public/img/"+json[i]['pic']+"\" style=\"height: 100%; width: 100%;\"></a></div><div style=\"margin-top: 4%;\"><div style=\"font-size: 20px;font-weight: 700;margin-left: 5%;\">"+json[i]['goodsname']+"</div><div style=\"font-size: 20px;font-weight: 700; margin-left: 80%;color:#f76120\">"+json[i]['price']+"$</div></div></div>";
                  }
                  $("#goods").html(dat);
              }); 
              return false;
            });
            $("#range").click(function(){
              var sortflag = $(".chosesort").attr("sortval");
              var sort = "id asc";
              if(sortflag == 1) sort = "time asc";
              else if(sortflag == 2) sort = "time desc"; 
              else if(sortflag == 3) sort = "price asc"; 
              else if(sortflag == 4) sort = "price desc";
              var left = $("#left").val();
              var right = $("#right").val();
              if(left == "") left = 0;
              if(right == "") right = 1000000;
              var text = $("#SearchContent").val();
              $.post("/take-away-coffee/index.php/Home/Index/sort",{"text":text,"sort":sort,"left":left,"right":right},function(data){
                  var json = eval('(' + data + ')'); 
                  var dat = "";
                  for(var i in json)
                  {
                    dat += "<div style=\"float: left; border: solid red 1px; height:230px;width:24%; margin-right: 1%;margin-top: 2%;\"><div style=\"height: 70%; border: solid red 1px;\"><a href=\"/take-away-coffee/index.php/Home/Index/goods?id="+json[i]['id']+"\" target=\"_blank\"><img src=\"/take-away-coffee/Public/img/"+json[i]['pic']+"\" style=\"height: 100%; width: 100%;\"></a></div><div style=\"margin-top: 4%;\"><div style=\"font-size: 20px;font-weight: 700;margin-left: 5%;\">"+json[i]['goodsname']+"</div><div style=\"font-size: 20px;font-weight: 700; margin-left: 80%;color:#f76120\">"+json[i]['price']+"$</div></div></div>";
                  }
                  $("#goods").html(dat);
              });
            });
        });
    </script>
    <style>
      .chosesort
      {
        background-color: #c40000;
      }
    </style>
</head>
<body>
    <div class="container">
        <div class="row" style="background-color: #c40000;">
            <div class="col-md-offset-5 col-md-2"><h3 style="color:white; margin-top: 10%;"><a href="/take-away-coffee/index.php/Home/Index/index" style="color:white; text-decoration: none;">Coffee Online</a></h3></div>
            <div class="col-md-offset-10">
                <ul class="nav nav-pills" style="margin-top: 1%;">
                  <?php if($flag == 0): ?><li role="presentation"><button class="btn btn-lg" style="background-color: #c40000; font-size: 20px; color:white;" data-toggle="modal" data-target="#myModal">Login</button></li>
                  <li role="presentation"><button class="btn btn-lg" style="background-color: #c40000; font-size: 20px;"><a style="text-decoration: none; color:white;" href="/take-away-coffee/index.php/Home/Login/index" target="_blank">Register</a></button></li>
                  <?php else: ?><li role="presentation"><button class="btn btn-lg" style="background-color: #c40000; font-size: 20px;"><a style="text-decoration: none; color:white;" href="/take-away-coffee/index.php/Home/Person/index?id=<?php echo ($id); ?>"><?php echo ($name); ?></a></button></li>
                  <li role="presentation"><button class="btn btn-lg" style="background-color: #c40000; font-size: 20px;"><a style="text-decoration: none; color:white;" href="/take-away-coffee/index.php/Home/Login/logout">Logout</a></button></li><?php endif; ?>
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
                <a class="sort chosesort" href="" style="color:black; text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;" sortval="0">默认</a>
                <a class="sort" href="" style="color:black; text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;" sortval="1">时间↑</a>
                <a class="sort" href="#" style="color:black; text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;" sortval="2">时间↓</a>
                <a class="sort" href="#" style="color:black; text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;" sortval="3">价格↑</a>
                <a class="sort" href="#" style="color:black; text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;" sortval="4">价格↓</a>
                <span style="margin-left: 1%;">价格:<span>
                <input id="left" type="text" style="width: 5%;">—
                <input id="right" type="text" style="width: 5%;">
                <button type="button" id="range" style="background-color: #c40000;border: solid #c40000 1px; color:white;">确定</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-1 col-md-10" id="goods">
                <?php if(is_array($li)): $i = 0; $__LIST__ = $li;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><div style="float: left; border: solid red 1px; height:230px;width:24%; margin-right: 1%;margin-top: 2%;">
                    <div style="height: 70%; border: solid red 1px;">
                        <a href="/take-away-coffee/index.php/Home/Index/goods?id=<?php echo ($li['id']); ?>" target="_blank"><img src="/take-away-coffee/Public/img/<?php echo ($li['pic']); ?>" style="height: 100%; width: 100%;"></a>
                    </div>
                    <div style="margin-top: 4%;">
                        <div style="font-size: 20px;font-weight: 700;margin-left: 5%;"><?php echo ($li['goodsname']); ?></div>
                        <div style="font-size: 20px;font-weight: 700; margin-left: 80%;color:#f76120"><?php echo ($li['price']); ?>$</div>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <!-- Modal -->
        <div class="row">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel" style="text-align: center;">Login</h4>
                  </div>
                  <div class="modal-body">
                    <form id="Loginform"> 
                      <div class="form-group">
                        <label for="exampleInputName2">UserName</label>
                        <input type="text" class="form-control" name="username">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                      </div>
                      <div id="error" class="form-group" style="display: none;">
                        <label id="errorcontent"></label>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" id="submit" class="btn btn-success">Login</button>
                  </div>
                </div>
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