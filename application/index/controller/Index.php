<?php
namespace app\index\controller;

class Index extends Init
{
    function _initialize()
    {
        parent::_initialize();
        $this->game_model = model('common/game');

        $this->category_model = model('common/category');
    }
    public function index()
    {

    	return view('index');
    }

    function get_ajax_lists(){
        $params = input('param.');
        $sqlmap = array();

        if(isset($params['keywords']) && $params['keywords']){
            $sqlmap['title'] = array('like','%'.$params['keywords'].'%');
        }elseif(isset($params['category_id']) && $params['category_id']){
            $sqlmap['category_id'] = $params['category_id'];
        }
        $order = $params['order']?$params['order']:'create_time desc';
        $limit = $params['limit']?$params['limit']:10;
        $page = $params['page']?$params['page']:1;
        $thumb = $params['thumb']?explode(',', $params['thumb']):'';

        /*if(empty($sqlmap)){
            return false;
        }*/

        $games = $this->game_model->where($sqlmap)->order($order)->limit($limit)->page($page)->select();
        $lists = array();
        foreach ($games as $k => $v) {
            $lists[$k] = $v->toArray();
            $lists[$k]['url'] = empty($v['url'])?url('index/game/show',['id'=>$v['id']]):$v['url'];
            if(is_array($thumb)){
                $lists[$k]['thumb'] = thumb($v['image_url'],$thumb[0],$thumb[1],$thumb[2]);
            }
        }
        return json($lists);
    }

}
