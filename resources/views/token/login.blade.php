<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    用户名 <input type="text" name="user_name">
    <hr>
    密码 <input type="password" name="user_pwd">
    <hr>
    <input type="button" id="but" value="登录">
</form>
</body>
</html>
<script src="/sta/jquery.min.js"></script>
<script>
    $('#but').click(function () {
        var user_name=$('input[name=user_name]').val()
        var user_pwd=$('input[name=user_pwd]').val()
        $.post('http://api.com/api/user/login',{user_name:user_name,user_pwd:user_pwd},function (res) {
            if (res.code=='00001'){
                alert(res.msg)
            }

        },'json')
    })
</script>
