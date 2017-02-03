<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url();?>"/>
</head>
<style>
    form{
        margin-top: 50px;
        margin-left: 120px;
    }
    button{
        border: none;
        width: 100px;
        height: 20px;
    }
    dt{
        margin-top: 10px;
        margin-bottom: 5px;
    }
</style>
<body>
    <form action="admin/admin/c_login" method="post">
        <dl>
            <label for="username"><dt>用户名：</dt></label>
            <dd><input type="text" id="username"></dd>

            <label for="password"><dt>密码：</dt></label>
            <dd><input type="password" id="password"></dd>
            <dt ><button type="button" id="btn">登录</button></dt>
        </dl>
    </form>
    <script src="assets/admin/files/js/jquery-1.10.2.min.js"></script>
    <script>
        $(function(){

            $('#btn').on('click',function(){
                console.log( $('#xubox_shade3'));
                $('#xubox_shade3').remove();
                var name = $('#username').val();
                if($('#username').val() && $('#password').val()){
                    $.post('admin/admin/c_login',{username: $('#username').val(),password: $('#password').val()},function(data){
                        if(data == "success"){
                            alert('登录成功！');

                        }else{
                            alert('无法登陆，是不是密码错啦！！');
                        }
                    },'text');
                }else{
                    alert("填写信息不全！");
                }
            });



        });


    </script>
</body>
</html>