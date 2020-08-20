<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajax文件上传</title>
</head>
<body>
<form action="" enctype="multipart/form-data">
<div class="form-group">
    <label></label>
    <label>上传文件</label>
    <div class="col-sm-10">
        <input type="file" accept=".xlsx" id="crowd_file">
    </div>
    <div class="submit">
        <input type="button" value="添加">
    </div>
</div>
</form>
</body>
</html>
<script src="/sta/jquery.min.js"></script>
<script type="text/javascript">
    $('.submit').click(function () {
        //接收图片
        var crowd_file = $('#crowd_file')[0].files[0];
            // console.log(crowd_file);
        var formData = new FormData();
        formData.append("crowd_file",$('#crowd_file')[0].files[0]);

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
</script>
