<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"/www/wwwroot/game.com/application/admin/view/game/list.tpl.php";i:1601311522;s:65:"/www/wwwroot/game.com/application/admin/view/public/toper.tpl.php";i:1530175630;s:66:"/www/wwwroot/game.com/application/admin/view/public/footer.tpl.php";i:1503323382;}*/ ?>
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
        <a href="<?php echo url('game/index','category_id='.$category_id) ?>"><li class="layui-this">列表</li></a>
        <a href="<?php echo url('game/add','category_id='.$category_id) ?>"><li>添加</li></a>
    </ul>
    <div class="layui-tab-content">
        <div class="layui-tab-item layui-show">
            <div class="table_top_bar">
                <a href="javascript:void(0)" id="batches_delete"><i class="layui-icon">&#xe640;</i>删除</a>
                <div class="spacer-gray"></div>
                <a href="javascript:void(0)" id="batches_move"><i class="layui-icon">&#xe602;</i>移动</a>
                <div class="spacer-gray"></div>
                <a href="<?php echo url('game/index','category_id='.$category_id) ?>"><i class="layui-icon">&#x1002;</i>刷新</a>
                <div class="spacer-gray"></div>
                <div class="table_top_search">
                    <form class="layui-form">
                        搜索：
                        <div class="layui-inline">
                            <input class="layui-input" name="search[title]" autocomplete="off" placeholder="输入标题搜索" value="<?php echo input('param.search.title'); ?>">
                        </div>
                        <button class="layui-btn layui-btn-mini" lay-submit="" lay-filter="search">搜索</button>
                    </form>
                </div>
            </div>
            <form class="layui-form">
                <table class="layui-table" lay-even>
                    <colgroup>
                        <col width="48">
                        <col width="80">
                        <col>
                        <col width="150">
                        <col width="150">
                        <col width="175">
                        <!--<col width="90">-->
                        <col width="100">
                    </colgroup>
                    <thead>
                    <tr>
                        <th><input type="checkbox" name="checkAll" lay-skin="primary" lay-filter="checkAll"></th>
                        <th>
                            <span>ID</span>
                            <span class="layui-table-sort layui-inline" lay-sort="<?php echo isset($url_params_arr['order']['id'])?$url_params_arr['order']['id']:''; ?>"><a href="?<?php echo $url_params_str ?>&order[id]=asc" class="layui-edge layui-table-sort-asc"></a><a href="?<?php echo $url_params_str ?>&order[id]=desc" class="layui-edge layui-table-sort-desc"></a></span>
                        </th>
                        <th>标题</th>
                        <th>所属栏目</th>
                        <th>
                            <span>下载量/万次</span>
                            <span class="layui-table-sort layui-inline" lay-sort="<?php echo isset($url_params_arr['order']['hits'])?$url_params_arr['order']['hits']:''; ?>"><a href="?<?php echo $url_params_str ?>&order[hits]=asc" class="layui-edge layui-table-sort-asc"></a><a href="?<?php echo $url_params_str ?>&order[hits]=desc" class="layui-edge layui-table-sort-desc"></a></span>
                        </th>
                        <th>
                            <span>添加时间</span>
                            <span class="layui-table-sort layui-inline" lay-sort="<?php echo isset($url_params_arr['order']['create_time'])?$url_params_arr['order']['create_time']:''; ?>"><a href="?<?php echo $url_params_str ?>&order[create_time]=asc" class="layui-edge layui-table-sort-asc"></a><a href="?<?php echo $url_params_str ?>&order[create_time]=desc" class="layui-edge layui-table-sort-desc"></a></span>
                        </th>
                        <!--<th>
                            <span>推荐</span>
                            <span class="layui-table-sort layui-inline" lay-sort="<?php /*echo isset($url_params_arr['order']['is_recommend'])?$url_params_arr['order']['is_recommend']:''; */?>"><a href="?<?php /*echo $url_params_str */?>&order[is_recommend]=asc" class="layui-edge layui-table-sort-asc"></a><a href="?<?php /*echo $url_params_str */?>&order[is_recommend]=desc" class="layui-edge layui-table-sort-desc"></a></span>
                        </th>-->
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($games['data'] as $v) { ?>
                        <tr>
                            <td><input type="checkbox" name="ids[<?php echo $v['id'] ?>]" value="<?php echo $v['id'] ?>" lay-skin="primary" lay-filter="checkOne"></td>
                            <td><?php echo $v['id']; ?></td>
                            <td>
                                <?php echo $v['title']; ?>

                            </td>
                            <td><?php echo $v['category_name']; ?></td>
                            <td><?php echo $v['hits']; ?></td>
                            <td><?php echo $v['create_time']; ?></td>
                            <!--<td style="text-align: center;">
                                <?php /*if($v['is_recommend'] != 1){ */?>
                                    <a href="javascript:void(0)" class="list-switch list-switch-off is_recommend" data-id="<?php /*echo $v['id'] */?>" title="点击开启"><i class="layui-icon">&#x1006;</i></a>
                                <?php /*}else{ */?>
                                    <a href="javascript:void(0)" class="list-switch list-switch-on is_recommend" data-id="<?php /*echo $v['id'] */?>" title="点击关闭"><i class="layui-icon">&#xe605;</i></a>
                                <?php /*} */?>
                            </td>-->
                            <td>
                                <a href="<?php echo url('game/edit',['id'=>$v['id']]) ?>" class="layui-btn layui-btn-mini" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                                <a class="layui-btn layui-btn-danger layui-btn-mini del_btn" game-id="<?php echo $v['id'] ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="layui-table-tool list_page"><div id="page"></div></div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    layui.use(['element','table','form','laypage'], function(){
        var element = layui.element
            ,table = layui.table
            ,form = layui.form
            ,laypage = layui.laypage
            ,$ = layui.jquery;

        $('.collection_btn').click(function () {
            var title = $(this).attr('data-title');
            var url = $(this).attr('data-href');
            layer.open({
                type: 2,
                icon: 2,
                maxmin: true,
                area: ['1000px','600px'],
                title: title,
                content: [url]
            });
        });
        //图片预览
        $('.layui-table td .thumb').hover(function(){
            $(this).append('<img class="thumb-show" src="'+$(this).attr('thumb')+'" >');
        },function(){
            $(this).find('img').remove();
        });
        //全选
        form.on('checkbox(checkAll)', function(data){
            if(data.elem.checked){
                $("input[type=checkbox]").prop('checked',true);
            }else{
                $("input[type=checkbox]").prop('checked',false);
            }
            form.render('checkbox');
        });
        form.on('checkbox(checkOne)', function(data){
            var is_check = true;
            if(data.elem.checked){
                $("input[lay-filter=checkOne]").each(function(){
                    if(!$(this).prop('checked')){ is_check = false; }
                });
                if(is_check){
                    $("input[lay-filter=checkAll]").prop('checked',true);
                }
            }else{
                $("input[lay-filter=checkAll]").prop('checked',false);
            }
            form.render('checkbox');
        });
        //批量移动
        $('#batches_move').click(function(){
            var ids = [];
            $("input[lay-filter=checkOne]").each(function(){
                if($(this).prop('checked')){ ids.push($(this).val()); }
            });
            if(ids.length<1){show_msg('请选择数据',2);return false;}
            loading = custom_loading();
            $.ajax({
                type:'post',
                dataType:'text',
                url:'<?php echo url("category/model_category_select"); ?>',
                data:{'ids':ids,'category_id':<?php echo $category_id; ?>},
                success:function(data){
                    if(data){
                        layer.open({
                            type: 1,
                            title: '数据移动',
                            area: ['auto', '450px'],
                            content: data //这里content是一个普通的String
                        });
                        form.render('select');
                        layer.close(loading);
                        form.on('select(move)', function(data){
                            var selected_text = $(data.elem).find("option:selected").text();
                            //确认移动
                            layer.confirm('确定批量移动至【'+selected_text+'】?', function(index){
                                $.ajax({
                                    type:'post',
                                    dataType:'json',
                                    url:'<?php echo url("game/batches_move"); ?>',
                                    data:{'ids':ids,'to_category_id':data.value},
                                    success:function(data){
                                        if(data.code == 200){
                                            show_msg(data.msg,1,'reload');
                                        }else{
                                            show_msg(data.msg,2);
                                        }
                                    },
                                    error:function(result){
                                        show_msg(result.statusText+'，状态码：'+result.status,2,'',2000);
                                    }
                                })
                            });
                        });
                    }else{
                        show_msg(data.msg,2);
                    }
                },
                error:function(result){
                    show_msg(result.statusText+'，状态码：'+result.status,2,'',2000);
                }
            })

        });
        //批量删除
        $('#batches_delete').click(function(){
            var ids = [];
            $("input[lay-filter=checkOne]").each(function(){
                if($(this).prop('checked')){ ids.push($(this).val()); }
            });
            if(ids.length<1){show_msg('请选择数据',2);return false;}
            //确认删除
            layer.confirm('确定删除['+ids+']?', function(index){
                loading = custom_loading();
                $.ajax({
                    type:'post',
                    dataType:'json',
                    url:'<?php echo url("game/batches_delete"); ?>',
                    data:{'ids':ids},
                    success:function(data){
                        if(data.code == 200){
                            show_msg(data.msg,1,'reload');
                        }else{
                            show_msg(data.msg,2);
                        }
                    },
                    error:function(result){
                        show_msg(result.statusText+'，状态码：'+result.status,2,'',2000);
                    }
                })
            });
        });
        //ajax删除
        $('.del_btn').click(function(){
            var this_tr = $(this).parents('tr');
            var id = $(this).attr('game-id');
            layer.confirm('确定删除【'+id+'】?', function(index){
                loading = custom_loading();
                $.ajax({
                    type:'post',
                    dataType:'json',
                    url:'<?php echo url("game/del"); ?>',
                    data:{'id':id},
                    success:function(data){
                        if(data.code == 200){
                            this_tr.remove();
                            show_msg(data.msg,1);
                        }else{
                            show_msg(data.msg,2);
                        }
                    },
                    error:function(result){
                        show_msg(result.statusText+'，状态码：'+result.status,2,'',2000);
                    }
                });
            });
        });
        //推荐
        $('.is_recommend').click(function(){
            loading = custom_loading();
            var row = $(this);
            var id = $(this).attr('data-id');
            $.ajax({
                type:'post',
                dataType:'json',
                url:'<?php echo url("game/to_recommend"); ?>',
                data:{'id':id},
                success:function(data){
                    if(data.code == 200){
                        if(row.hasClass('list-switch-off')){
                            row.removeClass('list-switch-off').find('.layui-icon').html('&#xe605;');
                            row.attr('title','点击开启');
                        }else{
                            row.addClass('list-switch-off').find('.layui-icon').html('&#x1006;');
                            row.attr('title','点击关闭');
                        }
                        show_msg(data.msg,1);
                    }else{
                        show_msg(data.msg,2);
                    }
                },
                error:function(result){
                    show_msg(result.statusText+'，状态码：'+result.status,2,'',2000);
                }
            })
        });
        //分页
        laypage.render({
            elem: 'page'
            ,count: <?php echo $games['total']; ?>
            ,curr: <?php echo $games['current_page']; ?>
            ,limit: <?php echo $games['per_page']; ?>
            ,limits: [10, 15, 20, 30, 40, 50]
            ,prev: '<i class="layui-icon">&#xe603;</i>'
            ,next: '<i class="layui-icon">&#xe602;</i>'
            ,layout: [ 'prev', 'page', 'next', 'skip', 'count','limit']
            ,jump: function(obj, first){
                //首次不执行
                if(!first){
                    location.href = '?<?php echo $url_params_str; ?>&page='+obj.curr+'&limit='+obj.limit;
                }
            }
        });

    })
</script>

</body>
</html>