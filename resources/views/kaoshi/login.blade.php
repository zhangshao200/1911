<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册</title>
</head>
<body>
<form action="{{url('/kaoshi/index')}}" method="post">
            账号 ：<input type="text" name="user_name"><br>
            邮箱 : <input type="email" name="user_email"><br>
            密码 ： <input type="password" name="user_pwd"><br>
    <input type="submit" value="注册">

</form>
</body>
</html>
