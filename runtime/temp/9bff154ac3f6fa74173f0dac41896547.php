<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:31:"./template/wap/index/index.html";i:1601314290;}*/ ?>
<html lang="en" style="font-size: 41.4px;">
<head>
	<meta charset="UTF-8">
	<title><?php echo $seo['title']; ?></title>
	<meta name="keywords" content="<?php echo $seo['keywords']; ?>">
	<meta name="description" content="<?php echo $seo['description']; ?>">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, height=device-height, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<?php echo $settings['head_html']; ?>
	<link rel="stylesheet" type="text/css" href="__TEMPLATE__static/css/common.css">
	<link rel="stylesheet" type="text/css" href="__TEMPLATE__static/css/style.css?r=1">
	<link rel="stylesheet" type="text/css" href="__TEMPLATE__static/css/swiper.min.css">
	<link rel="stylesheet" type="text/css" href="__TEMPLATE__static/css/aos.css" />
	<script src="//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript" src="__TEMPLATE__static/js/swiper.min.js"></script>
	<script type="text/javascript" src="__TEMPLATE__static/js/aos.js"></script>
	<?php echo $settings['site_statistice']; ?>
	<?php echo $settings['company_kefu_global']; ?>
</head>
<body style="font-size: 36px;">
<!-- 头部 -->
<header class="header">
	<div class="header_container trans_0_1">
		<div class="container_15">
			<div class="logo"><a href="/"><img src="<?php echo $settings['logo']; ?>" alt="<?php echo $settings['site_name']; ?>"></a></div>
			<div class="menu_btn"><img src="__TEMPLATE__static/images/menu_icon.png" alt="菜单"></div>
		</div>
	</div>
	<script type="text/javascript">
		var p=0,t=0;
		$(window).scroll(function(e) {
			var top = $(document).scrollTop();
			if(top>51){
				p = $(this).scrollTop();
				console.log(t<=p)
				if(t<=p){
					$('.header_container').addClass('header_container_hide');
				}else{
					$('.header_container').removeClass('header_container_hide');
				}
				setTimeout(function(){t = p;},0);
			}else{
				$('.header_container').removeClass('header_container_hide');
			}
		});
	</script>
</header>
<?php $category_id =  input('param.category_id') ? input('param.category_id') : 0; ?>
<div class="nav_container_mask trans_0_2">
	<div class="nav_container trans_0_2">
		<ul>
			<a href="/"><img class="nav_logo" src="<?php echo $settings['logo']; ?>" alt="<?php echo $settings['site_name']; ?>"></a>
			<a href="/"><li class="<?php if($vo==$category_id){ echo 'on';} ?>">全部</li></a>
			<?php if(is_array($categorys[0][0]) || $categorys[0][0] instanceof \think\Collection || $categorys[0][0] instanceof \think\Paginator): $i = 0; $__LIST__ = $categorys[0][0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($categorys[$vo]['is_menu'] == 1): ?>
			<a href="/?category_id=<?php echo $vo; ?>"><li class="<?php if($vo==$category_id){ echo 'on';} ?>"><?php echo $categorys[$vo]['name']; ?></li></a>
			<?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div>
<script type="text/javascript">
	$('.menu_btn').click(function(){
		$('.nav_container_mask').addClass('show');
		$('.nav_container').addClass('show');
	})
	$('.nav_container_mask').click(function(){
		$('.nav_container_mask').removeClass('show');
		$('.nav_container').removeClass('show');
	})
</script>
<div class="banner">
	<video id="v1" autoplay loop muted style="width: 100%;">
		<source src="__TEMPLATE__static/images/index_video.mp4" type="video/mp4"  />
	</video>
</div>
<div class="mobile-game-matrix">
	<div style="height: 1.12rem"></div>
	<div class="data-bar">
		<div class="data-bar-item">
			<span class="data-bar-item__title">发行游戏数</span>
			<span class="data-bar-item__value">150</span></div>
		<div class="data-bar-item">
			<span class="data-bar-item__title">月活跃用户数</span>
			<span class="data-bar-item__value" style="padding-left: 5px;">8000万</span></div>
		<div class="data-bar-item">
			<span class="data-bar-item__title">累计下载量</span>
			<span class="data-bar-item__value" style="padding-right: 1px;">6亿</span></div>
	</div>

	<div class="game-list ajax_lists_container">
		<!--<div class="game-list-item" data-src="https://sf1.ohayoo.cn/obj/developer-platform/91284946631363030323432333339373_e5a4a7e4beae59bbe.jpg" data-top="534" data-loaded="true" style="background-image: url(&quot;https://sf1.ohayoo.cn/obj/developer-platform/91284946631363030323432333339373_e5a4a7e4beae59bbe.jpg&quot;); background-repeat: no-repeat; background-size: 100% 100%;">
			<div class="game-content">
				<img class="game-icon" data-src="https://sf1.ohayoo.cn/obj/developer-platform/63632138031363030323432333333333_31323069636f6e.png" alt="" data-top="696" src="https://sf1.ohayoo.cn/obj/developer-platform/63632138031363030323432333333333_31323069636f6e.png">
				<div class="game-name-downloadnum">
					<h2 class="game-name">我也是大侠</h2>
					<span class="game-downloadnum">2000万+下载量</span></div>
				<a class="game-download-btn" href="javascript:;;">下载</a></div>
		</div>-->

	</div>

	<div class="list_more"><span>加载更多</span></div>
	<div class="fill_20"></div>

</div>
</body>
</html>


<script>
	var page = 0;
	function get_ajax_lists(){
		$(this).find('span').addClass('loading').text('加载中...');
		page ++;
		var param = {
			category_id : "<?php echo $category_id; ?>",
			sort : "create_time",
			limit : 18,
			page : page,
			//thumb: '280,170,3'
		};
		$.get('<?php echo url("get_ajax_lists"); ?>',param,function(ret){
			if(ret && ret.length > 0){
				var html = '';
				$.each(ret,function(i,item){
					html += '<div class="game-list-item"  data-top="534" data-loaded="true" style="background-image: url(&quot;'+ item.image_url +'&quot;); background-repeat: no-repeat; background-size: 100% 100%;">'
							+    '<div class="game-content">'
							+    	'<img class="game-icon"  alt="" data-top="696" src="'+ item.logo +'">'
							+        '<div class="game-name-downloadnum">'
							+            '<h2 class="game-name">'+ item.title +'</h2>'
							+            '<span class="game-downloadnum">'+ item.hits +'万+下载量</span></div>'
							+        '<a class="game-download-btn" href="javascript:;;" ios_url="'+ item.ios_url +'" android_url="'+ item.android_url +'">下载</a></div>'
							+'</div>';

				})
				$('.ajax_lists_container').append(html);
				$('.list_more').find('span').removeClass('loading').text('加载更多');
			}else{
				$('.list_more').find('span').removeClass('loading').text('没有更多了');
			}
		})
	};

	$(this).find('span').addClass('loading').text('加载中...');
	get_ajax_lists();

	$('.list_more').click(function(){
		$(this).find('span').addClass('loading').text('加载中...');
		get_ajax_lists();
	});


	var ua = navigator.userAgent.toLowerCase();
	var isAndroid = /(android|Android)/i.test(ua); //android终端
	var isiOS =   /(iphone|ipad|ipod|ios)/i.test(ua); //ios终端
	var isWeixin = ua.indexOf('micromessenger') != -1;
	if(isWeixin){
		$('.mask').show();
	}

	$(document).on('click','.game-download-btn',function () {
		if(isiOS){
			var down_url = $(this).attr('ios_url');
		}else{
			var down_url = $(this).attr('android_url');
		}
		window.location.href = down_url;
	});
</script>