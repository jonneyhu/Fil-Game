<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"/www/wwwroot/game.com/application/admin/view/public/login.tpl.php";i:1601170342;s:65:"/www/wwwroot/game.com/application/admin/view/public/toper.tpl.php";i:1530175630;s:66:"/www/wwwroot/game.com/application/admin/view/public/footer.tpl.php";i:1503323382;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>后台管理中心</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black"> 
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="__STATIC__layui/css/layui.css">
	<script type="text/javascript" src="__STATIC__layui/layui.js"></script>
	<script type="text/javascript" src="__STATIC__js/common.js"></script>
	<link rel="stylesheet" href="__STATIC__css/style.css">
</head>
<body>
<style type="text/css">html{background: #eee;}</style>
<div class="login_page">
    <?php if(isset($settings['logo']) && $settings['logo']){?>
        <img class="logo-login" src="<?php echo $settings['logo']; ?>" alt="logo">
    <?php } ?>

    <h1>欢迎使用</h1>
    <form class="layui-form">
        <div class="layui-form-item">
            <div class="layui-input-inline input-custom-width">
                <input type="text" name="username" lay-verify="required" placeholder="用户名" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-inline input-custom-width">
                <input type="password" name="password" lay-verify="required" placeholder="密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-inline input-custom-width">
                <input type="text" name="captcha" lay-verify="required" placeholder="验证码" autocomplete="off" class="layui-input">
                <div class="captcha"><img src="<?php echo captcha_src(); ?>" alt="captche" title='点击切换' onclick="this.src='/captcha?id='+Math.random()"></div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-inline input-custom-width">
              <button class="layui-btn input-custom-width" lay-submit="" lay-filter="login">立即登陆</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
layui.use('form',function(){
    var form = layui.form
    ,$ = layui.jquery;
    //监听提交
      form.on('submit(login)', function(data){
        loading = custom_loading();
        var param = data.field;
        $.ajax({
            type:'post',
            dataType:'json',
            url:'<?php echo url("login/login"); ?>',
            data:param,
            success:function(data){
                if(data.code == 200){
                    show_msg(data.msg,1,'<?php echo url("index/index"); ?>');
                }else{
                    show_msg(data.msg,2);
                    $('.captcha img').attr('src','/captcha?id='+Math.random());
                }
            },
            error:function(result){
                console.log(result);
                show_msg(result.statusText+'，状态码：'+result.status,2,'',2000);
            }
        });
        return false;
      });
});
</script>
</body>
</html>