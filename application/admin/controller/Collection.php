<?php
namespace app\admin\controller;

/**
 * 控制器
 */
class Collection extends Init
{

    function _initialize()
    {
        parent::_initialize();
        $this->model = model('common/collection');
    }

    function index(){
        $params = input('param.');
        $video_id = $params['video_id'];
        $video = db('video')->find($video_id);
        $page_size = isset($params['limit'])?$params['limit']:15;
        $map = array('video_id'=>$video_id);
        $order = array('id'=>'desc');
        if(isset($params['search']) && is_array($params['search'])){
            foreach ($params['search'] as $k => $v) {
                if($v){
                    $map[$k] = array('like','%'.$v.'%');
                }
            }
        }
        $url_params_arr = url_params_unique(request()->except([]));
        $url_params_str = format_url_params($url_params_arr);
        $order = isset($url_params_arr['order'])?$url_params_arr['order']:$order;
        $collections = $this->model->get_list($map,$order,$page_size);
        return view('list',['collections'=>$collections,'url_params_arr'=>$url_params_arr,'url_params_str'=>$url_params_str,'video'=>$video]);
    }

    function add(){
        $params = input('param.');
        $video_id = $params['video_id'];
        $video = db('video')->find($video_id);
        if(request()->isPost()){
            $params = input('post.');

            $result = $this->model->add($params);
            if($result){
                return json(array('code'=>200,'msg'=>'添加成功'));
            }else{
                return json(array('code'=>0,'msg'=>'添加失败'));
            }
        }


        return view('add',['video'=>$video]);
    }

    function edit(){
        if(request()->isPost()){
            $params = input('post.');

            $result = $this->model->edit($params);
            if($result){
                return json(array('code'=>200,'msg'=>'修改成功'));
            }else{
                return json(array('code'=>0,'msg'=>'修改失败'));
            }
        }
        $collection = $this->model->where('id',input('param.id'))->find();
        $video = db('video')->find($collection['video_id']);
        return view('edit',array('collection'=>$collection,'video'=>$video));
    }

    function del(){
        $result = $this->model->del(input('post.id'));
        if($result){
            return json(array('code'=>200,'msg'=>'删除成功'));
        }else{
            return json(array('code'=>0,'msg'=>'删除失败'));
        }
    }

    //批量删除
    function batches_delete(){
        $params = input('post.');
        $ids =  $params['ids'];
        $result = $this->model->del($ids);
        if($result){
            return json(array('code'=>200,'msg'=>'批量删除成功'));
        }else{
            return json(array('code'=>0,'msg'=>'批量删除失败'));
        }
    }


    //推荐
    function to_recommend(){
        $id = input('post.id');
        $data['id'] = $id;
        $data['is_recommend'] = array('exp','1-is_recommend');
        $result = $this->model->edit($data);
        if($result){
            return json(array('code'=>200,'msg'=>'操作成功'));
        }else{
            return json(array('code'=>0,'msg'=>'操作失败'));
        }
    }


}