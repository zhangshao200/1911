<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="{{url('/redis/index')}}" method="get">
    请输入文字 <input type="text" placeholder="请输入商品的名称进行搜索" name="name"> <input type="submit" value="搜索">
</form>

<table border="2">
    <tr>
        <td>商品id</td>
        <td>商品名称</td>
        <td>商品型号</td>
        <td>商品库存</td>
        <td>商品价格</td>
        <td>简介</td>
        <td>图片</td>
    </tr>
    @foreach($add as $v)
    <tr>
        <td>{{$v->goods_id}}</td>
        <td>{{$v->goods_name}}</td>
        <td>{{$v->goods_sn}}</td>
        <td>{{$v->goods_number}}</td>
        <td>{{$v->shop_price}}</td>
        <td>{{$v->keywords}}</td>
        <td>{{$v->goods_img}}</td>
    </tr>
        @endforeach
</table>

{{$add->links()}}


</body>
</html>
<script src="/sta/jquery.min.js">

</script>
