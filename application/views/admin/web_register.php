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
    #che-name{
        font-size: 12px;
        color: red;
    }
</style>
<body>
    <form action="admin/admin/c_register" method="post">
        <dl>
            <label for="username"><dt>用户名：</dt></label>
            <dd><input type="text" id="username" name="username"><span id="che-name"></span></dd>

            <label for="password"><dt>密码：</dt></label>
            <dd><input type="text" id="password" name="password"></dd>
            <dt ><button type="button" id="btn">注册</button></dt>
        </dl>
    </form>

    <script src="assets/admin/files/js/jquery-1.10.2.min.js"></script>
    <script>
        $(function(){
            var nameggg = $('#username').val();
            var pass = $('#password').val();
            $('#username').on('blur',function(){
               console.log($('#username').val());
                $.post('admin/admin/check_user',{username: $('#username').val()},function(data){
                    if(data == "success"){
                        $('#che-name').text('用户名已存在，请修改！');
                    }else{
                        $('#che-name').text('');
                    }
                },'text');

            });

            var ch = $('#che-name').text();
            $('#btn').on('click',function(){
                if($('#che-name').text()){
                    //console.log($('#che-name').text());
                    alert("填写信息不着正确！");
                }else{
                    if( $('#username').val() && $('#password').val() ){
                        $.post('admin/admin/c_register',{username: $('#username').val(),password: $('#password').val()},function(data){
                            if(data == "success"){
                                alert("注册成功！");
                                //redirect('admin/welcome/webIndex');
                                //location.href = "admin/welcome/webIndex";
                            }
                        },'text');
                    }else{
                        alert("用户信息不全！");
                    }

                }
            });


        });
    </script>
</body>
</html>