{include file="public/toper" /}
<div class="layui-tab layui-tab-brief main-tab-container">
    <ul class="layui-tab-title main-tab-title">
        <div class="main-tab-item"><?php echo $categorys[$game["category_id"]]['name']; ?> - 管理</div>
        <a href="<?php echo url('game/index','category_id='.$game["category_id"]) ?>"><li>列表</li></a>
        <a href="<?php echo url('game/add','category_id='.$game["category_id"]) ?>"><li>添加</li></a>
        <a href="<?php echo url('game/edit','id='.$game["id"]) ?>"><li class="layui-this">修改</li></a>
    </ul>
    <div class="layui-tab-content">
        <form class="layui-form">
            <div class="layui-tab-item layui-show">
                <input type="hidden" name="id" value="<?php echo $game['id'] ?>">
                <?php echo Form::select_no_option('category_id','','所属栏目','',$model_category_select_option,'required');?>
                <?php echo Form::input('title',$game['title'],'标题','','请输入标题','required');?>
                <?php echo Form::file('image_url',$game['image_url'],'封面图','图片','图片地址','','选择','images');?>
                <?php echo Form::file('logo',$game['logo'],'LOGO','图片','图片地址','','选择','images');?>
                <?php echo Form::input('ios_url',$game['ios_url'],'IOS下载地址','IOS下载地址','以http://开头');?>
                <?php echo Form::input('android_url',$game['android_url'],'安卓下载地址','安卓下载地址','以http://开头');?>
                <?php //echo Form::radio('is_recommend',$game['is_recommend'],'是否推荐','用于前台推荐调用',array(1=>'是',0=>'否'));?>
                <?php echo Form::date('create_time',$game['create_time'],'添加时间','默认是当前时间');?>
                <?php echo Form::input('hits',$game['hits'],'载量','请输入数字','请输入下载量，单位万次','number');?>
                <?php //echo Form::input('url',$game['url'],'链接地址','外链地址，非外链文章则留空','以http://开头');?>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button class="layui-btn" lay-submit="" lay-filter="game_edit">立即提交</button>
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
        form.on('submit(game_edit)', function(data){
            loading = custom_loading();
            var param = data.field;
            $.ajax({
                type:'post',
                dataType:'json',
                url:'{:url("game/edit")}',
                data:param,
                success:function(data){
                    if(data.code == 200){
                        show_msg(data.msg,1,'{:url("game/index",["category_id"=>$game["category_id"]])}');
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

{include file="public/footer" /}