<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>后台登录页面</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico"/>
    <link rel="bookmark" href="favicon.ico"/>
    <link rel="stylesheet" href="/Public/Admin/css/site.min.css">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="/js/html5shiv.js"></script>
      <script src="/js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/site.min.js"></script>
    <script type="text/javascript" src="js/util.js"></script>
    <style>
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #303641;
        color: #C1C3C6
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="loadding"></div>
      <form class="form-signin" id="loginform"  action="/index.php/Admin/Public/checkLogin"  method="POST" >
        <h3 class="form-signin-heading">请登录</h3>
        <div class="form-group message">
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="glyphicon glyphicon-user"></i>
            </div>
            <input type="text" class="form-control" name="username" id="username" placeholder="admin@qq.com" autocomplete="off" />
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">
              <i class=" glyphicon glyphicon-lock "></i>
            </div>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
          </div>
        </div>

        <label class="checkbox">
          <input type="checkbox" id="remember" value="remember-me"> &nbsp 记住我
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
      </form>
    </div>
    <div class="clearfix"></div>
    <br><br>
    <script type="text/javascript">
        $(function(){
            var str = localStorage.getItem("login");
            if( str ) {
                var obj = JSON.parse(str);
                $("#username").val(obj.email);
                $("#password").val(obj.pwd);
                $("#remember").parent().addClass("checked");
            }

            $("#loginform").submit(function(){
                var uname = $("#username").val();
                var pwd = $("#password").val();
                if( $.validate.isEmpty(uname) == false ) {
                    $.alt({type:'warning', el:'.message', msg:'邮箱不能为空!'});
                    $("#username").focus();
                    return false;
                }

                if( $.validate.isEmpty(pwd) == false ) {
                    $.alt({type:'warning' ,el:'.message', msg:'密码不能为空!'});
                    $("#password").focus();
                    return false;
                }

                if( $.validate.isEmail( uname ) == false ) {
                    $.alt({type:'warning', el:'.message', msg:'邮箱格式不正确!'});
                    $("#username").focus();
                    return false;
                }
                
                var data = {email:uname,pwd:pwd};
                $._ajax({
                    url : "/admin/login",
                    data : data,
                    type : 'post'
                }).done(function( obj ){
                    if( obj.code ) {
                      if( $("#remember").is(":checked") ) {
                          localStorage.setItem("login",JSON.stringify(data));  
                      } else {
                          localStorage.removeItem("login");
                      }
                      window.location = "/admin/index";
                    } else {
                      $.alt({type:"danger", el:'.message', msg:'登陆失败，请重试!'});
                    }
                });
                
                return false;
            });
        });
    </script>
  </body>
</html>