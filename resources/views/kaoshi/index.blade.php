<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品列表</title>
</head>
<body>
<table border="2">
    <tr>
        <td>名称</td>
        <td>价格</td>
        <td>库存</td>
        <td>图片</td>
    </tr>
    @foreach($goods as $v)
    <tr>
        <td>{{$v->goods_name}}</td>
        <td>{{$v->shop_price}}</td>
        <td>{{$v->click_count}}</td>
        <td>{{env('UPLOADS_URL')}}{{$v->goods_img}}</td>
    </tr>
        @endforeach
</table>
</body>
</html>
