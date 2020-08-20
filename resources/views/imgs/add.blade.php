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
<form action="">
   名称 : <input type="text" name="name"><br>
    头像 ： <input type="file" name="name_file"><br>
    <input id="adds" type="button" value="添加">
</form>
</body>
</html>
<script src="/sta/jquery.min.js"></script>
<script type="text/javascript">
    $('#adds').click(function () {
        var name=$('input[name=name]').val();
        var formData = new FormData();
        var name_file=$('input[name=name_file]')[0].files[0];

        formData.append('name',name);
        formData.append('name_file',name_file);
       // alert(formData);

        //ajax
        $.ajax({
            url:'{{url('http://api.com/add/imgs')}}',
            dataType:'json',
            type:'POST',
            data: formData,
            processData : false, // 使数据不做处理
            contentType : false, // 不要设置Content-Type请求头
            success: function(data){
                // console.log(data);
                if (data.status == 'ok') {
                    alert('上传成功！');
                }
            },
            // error:function(response){
            //     console.log(response);
            // }
        });

    })
        //post
    $('#adds').click(function () {
        var name=$('input[name=name]').val();
        $.get('http://api.com/api/geturlparam',{name:name},function (res) {

        })
        $.post('http://api.com/api/posturlparam',{name:name},function (res) {

        })
        var name=$('input[name=name]').val();
        var  formDAta=new FormData();
        var name_file=$('input[name=name_file]')[0].files[0];
        formDAta.append('name',name);
        formDAta.append('name_file',name_file)
        $.ajax({
            url:'{{url('http://api.com/api/upload')}}',
            type:'POST',
            data: formDAta,
            processData : false, // 使数据不做处理
            contentType : false, // 不要设置Content-Type请求头
            success: function(data){
                console.log(data);
                if (data.status == 'ok') {
                    alert('上传成功！');
                }
            },
            error:function(response){
                console.log(response);
            }
        });
            var data={name:name,name_file:name_file}
        data=JSON.stringify(data);
        $.ajax({
            url:'{{url('http://api.com/api/getjson')}}',
            type:'POST',
            data: data,
            contentType:"application/json;charset=utf-8",
            success: function(data){
                console.log(data);
                if (data.status == 'ok') {
                    alert('上传成功！');
                }
            },
            error:function(response){
                console.log(response);
            }
        });
    })
    //json请求头


</script>
