<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Sign in &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
  <style>
      .alert{
        display: none;
      }
  </style>
</head>
<body>
  <div class="login">
    <form class="login-wrap">
      <img class="avatar" src="../static/assets/img/default.png">
      <!-- 有错误信息时展示 -->
      <div class="alert alert-danger"">
        <strong>错误！</strong> <span id="msg">用户名或密码错误！</span>
      </div>
      <div class="form-group">
        <label for="email" class="sr-only">邮箱</label>
        <input id="email" type="email" class="form-control" placeholder="邮箱" autofocus>
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">密码</label>
        <input id="password" type="password" class="form-control" placeholder="密码">
      </div>
      <!-- <a class="btn btn-primary btn-block" href="javascript:;">登 录</a>-->
      <span id="btn-login" class="btn btn-primary btn-block">登 录</span> 
    </form>
  </div>
  <script src="../static/assets/vendors/jquery/jquery.js"></script>
  <script>
      //先进行浏览器端的表单验证
        //登陆按钮注册的点击事件
        $("#btn-login").on("click",function(){
          //1.收集用户邮箱的密码
          var email=$("#email").val();
          var password=$("#password").val();
          //2.数据验证 //浏览器端的表单验证
          var reg=/\w+\@\w+\.\w+/;
          if(!reg.test(email)){
            $("#msg").text("你输入的信息有错误，请重新输入");
            $(".alert").show();
            return;
          }
          //表单密码长度的
          var pwdReg=/\w{3,20}/;
          if(!pwdReg.test(password)){
            $("#msg").text('密码长度错误，请重新输入');
            $(".alert").show();
            return;
          }-
          $.ajax({
            type:"post",
            data:{
            email : email,
            password : password},
            url:"api/_userLogin.php",
            success:function(res){
             
              if(res.code==1){
                alert('登录成功');
              // 如果连接成功跳转到后台页面
                location.href='index.php';
              }else{
                $("#msg").text('用户名或密码错误');
                $(".alert").show();
              }
            }
          });
        });
   
  </script>
</body>
</html>
