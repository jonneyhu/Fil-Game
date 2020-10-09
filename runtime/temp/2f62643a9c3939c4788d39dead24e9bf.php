<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"/www/wwwroot/game.com/application/admin/view/category/content_manage_search.tpl.php";i:1526980148;s:65:"/www/wwwroot/game.com/application/admin/view/public/toper.tpl.php";i:1530175630;s:66:"/www/wwwroot/game.com/application/admin/view/public/footer.tpl.php";i:1503323382;}*/ ?>
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
      <div class="main-tab-item">内容管理</div>
    </ul>
    <div class="layui-tab-content">
      <div class="layui-tab-item layui-show">

      </div>
    </div>
</div>


<script type="text/javascript">
layui.use(['layer', 'jquery','tree'], function(){
  var layer = layui.layer
  ,$ = layui.jquery

  layer.open({
    type: 1, 
    closeBtn: 0,
    shade: 0.1,
    title: '快速进入',
    area: ['500px', '450px'],
    content: '<div id="search_content" class="layui-form-select"><div class="layui-input-block"><input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入栏目名称可快速搜索" class="layui-input"><dl class="layui-anim layui-anim-upbit search_content_list"></dl></div></div>' //这里content是一个普通的String
  });

  $('#search_content .layui-input').keyup(function(event){
  	var keywords = $(this).val();
  	var	last_categorys = <?php echo $category_list ?>;
    $('.search_content_list').empty();
    if(keywords != ''){
      for(var o in last_categorys){
        var reg = new RegExp(keywords) ;
        if( reg.test( last_categorys[o].name )){
          $('.search_content_list').append('<a href="'+last_categorys[o].href+'"><dd>'+last_categorys[o].name+' -- <span style="font-size:12px;color:#999">'+last_categorys[o].model_name+'</span></dd></a>');
          $('.search_content_list').show();
        }
      }
    }else{
      $('.search_content_list').hide();
    }
  });

});
</script>
</body>
</html>