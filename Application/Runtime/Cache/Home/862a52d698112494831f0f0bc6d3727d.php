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
                        window.location.href = "/take-away-coffee/index.php/Home/Index/goods?id="+$("#gid").val();
                    }
                    else 
                    {
                        $("error").css("display","block");
                        $("#errorcontent").html(data);
                    }
                });
            });
            $(".choosecandy").click(function(){
              $(".chosen1").removeClass("chosen1");
              $(this).addClass("chosen1");
            });
            $(".choosecold").click(function(){
              $(".chosen2").removeClass("chosen2");
              $(this).addClass("chosen2");
            });
            $("#submitbooking").click(function(){
              var uid = $("#uid").val();
              var gid = $("#gid").val();
              if(uid == "")
              {
                $("#myModal").modal("show");
                return;
              }
              var candy = $(".chosen1").attr("chosevalue");
              var cold = $(".chosen2").attr("chosevalue");
              if(candy == undefined || cold == undefined)
                return;
              var name = $("#name").val();
              var phone = $("#phone").val();
              var num = $("#num").val();
              if(name == "" || phone == "")
                return;
              $.post("/take-away-coffee/index.php/Home/Index/booking",{"uid":uid,"gid":gid,"candy":candy,"cold":cold,"name":name,"phone":phone,"num":num},function(data){
                  if(data == "OK")
                  {
                    window.location.href="/take-away-coffee/index.php/Home/Person/index?id="+uid;
                  }
              });
            });
        });
    </script>
    <style>
      .choosecandy
      {
        color: black;
      }
      .choosecold
      {
        color: black;
      }
      .chosen1
      {
        background-color: #c40000;
      }
      .chosen2
      {
        background-color: #c40000;
      }
    </style>
</head>
<body>
    <div class="container">
        <div class="row" style="background-color: #c40000;">
            <div class="col-md-offset-5 col-md-2"><h3 style="color:white; margin-top: 10%;"><a href="/take-away-coffee/index.php/Home/Index/index" style="color:white; text-decoration: none;">Coffee Online</a></h3></div>
            <input type="hidden" id="gid" value="<?php echo ($gid); ?>">
            <input type="hidden" id="uid" value="<?php echo ($uid); ?>">
            <div class="col-md-offset-10">
                <ul class="nav nav-pills" style="margin-top: 1%;">
                  <?php if($flag == 0): ?><li role="presentation"><button class="btn btn-lg" style="background-color: #c40000; font-size: 20px; color:white;" data-toggle="modal" data-target="#myModal">Login</button></li>
                  <li role="presentation"><button class="btn btn-lg" style="background-color: #c40000; font-size: 20px;"><a style="text-decoration: none; color:white;" href="/take-away-coffee/index.php/Home/Login/index" target="_blank">Register</a></button></li>
                  <?php else: ?><li role="presentation"><button class="btn btn-lg" style="background-color: #c40000; font-size: 20px;"><a style="text-decoration: none; color:white;" href="/take-away-coffee/index.php/Home/Person/index?id=<?php echo ($id); ?>"><?php echo ($name); ?></a></button></li>
                  <li role="presentation"><button class="btn btn-lg" style="background-color: #c40000; font-size: 20px;"><a style="text-decoration: none; color:white;" href="/take-away-coffee/index.php/Home/Login/logout">Logout</a></button></li><?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="row" style="margin-top: 5%;">
          <div class="col-md-offset-1 col-md-5" style="height: 400px;">
            <img src="/take-away-coffee/Public/img/<?php echo ($li['pic']); ?>" style="height:100%; width: 100%;">
          </div>
          <div class="col-md-4">
            <form>
              <div class="form-group">
                <label for="exampleInputName2" style="font-size: 30px;"><?php echo ($li["goodsname"]); ?></label>
              </div>
              <div class="form-group">
                <label for="exampleInputName2" style="font-size: 20px;"><?php echo ($li["describe"]); ?></label>
              </div>
              <div class="form-group">
                <label for="exampleInputName2" style="font-size: 20px;">Price : <?php echo ($li["price"]); ?>$</label>
                <input type="hidden" class="form-control" id="price" value="<?php echo ($li["price"]); ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputName2" style="font-size: 20px;">Candy : </label>
                <a class="choosecandy" href="#" style="text-decoration: none;border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;" chosevalue="0">0%</a>
                <a class="choosecandy" href="#" style="text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;" chosevalue="1">25%</a>
                <a class="choosecandy" href="#" style="text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;" chosevalue="2">50%</a>
                <a class="choosecandy" href="#" style="text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;" chosevalue="3">75%</a>
                <a class="choosecandy" href="#" style="text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;" chosevalue="4">100%</a>
              </div>
              <div class="form-group">
                <label for="exampleInputName2" style="font-size: 20px;">Cold : </label>
                <a class="choosecold" href="#" style="text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;" chosevalue="0">冰</a>
                <a class="choosecold" href="#" style="text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;" chosevalue="1">常温</a>
                <a class="choosecold" href="#" style="text-decoration: none; border: solid #eee 1px;padding: 1% 2% 1% 2%; margin-right:-0.5%;" chosevalue="2">热</a>
              </div>
            </form>
            <form class="form-inline">
              <div class="form-group">
                <label for="exampleInputName2" style="font-size: 20px;">Num : </label>
                <input type="text" class="form-control" id="num">
              </div>
              <div class="form-group" style="margin-top: 2%;">
                <label for="exampleInputName2" style="font-size: 20px;">Name : </label>
                <input type="text" class="form-control" id="name">
              </div>
              <div class="form-group" style="margin-top: 2%;">
                <label for="exampleInputName2" style="font-size: 20px;">TelePhone : </label>
                <input type="text" class="form-control" id="phone">
              </div>
              <button style="margin-top: 1%; margin-left: 2%;background-color: #c40000;color:white;" type="button" class="btn" id="submitbooking">下单</button>  
            </form>
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
        <div class="row" style="margin-top: 18%;">
            <div class="footer_f">
                <div class="footer text-center col-sm-offset-3 col-sm-6" style="padding:10px 0; color:#999;">中正大学资讯工程 版权所有@2016
                </div>
            </div>
        </div>
    </div>
</body>
</html>