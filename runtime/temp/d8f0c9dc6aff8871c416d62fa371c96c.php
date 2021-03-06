<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"/www/wwwroot/game.com/application/admin/view/game/add.tpl.php";i:1601311267;s:65:"/www/wwwroot/game.com/application/admin/view/public/toper.tpl.php";i:1530175630;s:66:"/www/wwwroot/game.com/application/admin/view/public/footer.tpl.php";i:1503323382;}*/ ?>
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
<div class="layui-tab layui-tab-brief main-tab-container">
    <ul class="layui-tab-title main-tab-title">
        <div class="main-tab-item"><?php echo $categorys[$category_id]['name']; ?> - 管理</div>
        <a href="<?php echo url('game/index','category_id='.$category_id) ?>"><li>列表</li></a>
        <a href="<?php echo url('game/add','category_id='.$category_id) ?>"><li class="layui-this">添加</li></a>
    </ul>
    <div class="layui-tab-content">
        <form class="layui-form">
            <div class="layui-tab-item layui-show">
                <?php echo Form::select_no_option('category_id','','所属栏目','',$model_category_select_option,'required');?>
                <?php echo Form::input('title','','标题','','请输入标题','required');?>
                <?php echo Form::file('image_url','','封面片','图片','图片地址','','选择','images');?>
                <?php echo Form::file('logo','','LOGO','图片','图片地址','','选择','images');?>
                <?php echo Form::input('ios_url','','IOS下载地址','IOS下载地址','以http://开头');?>
                <?php echo Form::input('android_url','','安卓下载地址','安卓下载地址','以http://开头');//echo Form::radio('is_recommend',0,'是否推荐','用于前台推荐调用',array(1=>'是',0=>'否'));?>
                <?php echo Form::date('create_time',date('Y-m-d H:i:s'),'添加时间','默认是当前时间');?>
                <?php echo Form::input('hits',0,'下载量','请输入数字','请输入下载量，单位万次','number');//echo Form::input('url','','链接地址','外链地址，非外链文章则留空','以http://开头');?>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit="" lay-filter="game_add">立即提交</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    layui.use(['element', 'form'], function(){
        var element = layui.element
            ,form = layui.form
            ,$ = layui.jquery;

        //监听提交
        form.on('submit(game_add)', function(data){
            loading = custom_loading();
            var param = data.field;
            $.ajax({
                type:'post',
                dataType:'json',
                url:'<?php echo url("game/add"); ?>',
                data:param,
                success:function(data){
                    if(data.code == 200){
                        show_msg(data.msg,1,'<?php echo url("game/index",["category_id"=>$category_id]); ?>');
                    }else{
                        show_msg(data.msg,2);
                    }
                },
                error:function(result){
                    show_msg(result.statusText+'，状态码：'+result.status,2,'',2000);
                }
            });
            return false;
        });

    })
</script>

</body>
</html>