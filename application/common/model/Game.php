<?php
namespace app\common\model;

use think\Model;

/**
 *
 */
class Game extends Model
{

    function initialize()
    {
        parent::initialize();
    }

    //添加
    function add($params){
        $params['update_time'] = $params['create_time'] = strtotime($params['create_time']);
        $result = $this->isUpdate(false)->allowField(true)->save($params);
        if($result){
            return $this->id;
        }else{
            return false;
        }
    }

    //修改
    function edit($params){
        $params['update_time'] = time();
        if(isset($params['create_time'])){
            $params['create_time'] = strtotime($params['create_time']);
        }
        $result = $this->isUpdate(true)->allowField(true)->save($params);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    //删除
    function del($ids){
        /*//删除图片
        $lists = $this->all($ids);
        foreach ($lists as $k => $v) {
            //删除封面图缩略图
            $directory = dirname(ROOT_PATH.$v['image_url']);
            if (is_dir($directory) != false) {
                $handle = opendir($directory);
                while (($file = readdir($handle)) !== false) {
                    if (substr(basename($v['image_url']),0,32) == substr($file, 0,32)) {
                        @unlink("$directory/$file");
                    }
                }
            }
            //删除封面图
            @unlink(ROOT_PATH.$v['image_url']);
            //删除文章配图
            $pattern="/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg|\.jpeg|\.bmp|\.png]))[\'|\"].*?[\/]?>/";
            preg_match_all($pattern,$v['content'],$match);
            foreach ($match[1] as $path) {
                @unlink(ROOT_PATH.$path);
            }
        }*/
        //删除数据
        $result = $this->destroy($ids);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    //移动
    function move($ids,$category_id){
        if(empty($ids) || empty($category_id)){ return false; }
        $result = $this->where('id','in',$ids)->update(['category_id'=>$category_id]);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 获取列表
     *
     */
    function get_list($where = '',$order = 'id desc',$page_size=0){
        if(!$order){ $order = 'id desc';}
        $games = $this->where($where)->order($order)->paginate($page_size);
        $games = $games->toArray();
        foreach ($games['data'] as $k => $v) {
            $games['data'][$k]['category_name'] = cache('categorys')[$v['category_id']]['name'];
        }
        return $games;
    }
    /**
     * 获取详情
     */
    function get_details($id){
        $result = $this->get($id);
        $game = $result->toArray();
        /*$next = $this->where('create_time','<',strtotime($game['create_time']))->where('category_id',$game['category_id'])->order('create_time desc')->find();
        $prev = $this->where('create_time','>',strtotime($game['create_time']))->where('category_id',$game['category_id'])->order('create_time asc')->find();

        if($prev){
            $game['prev'] = $prev->toArray();
            $game['prev']['url'] =empty($prev["url"])?url("index/game/show",["id"=>$prev["id"]]):$prev["url"];
        }else{
            $game['prev'] = array('title'=>'返回列表','url'=>url('index/game/lists',['category_id'=>$game['category_id']]));
        }
        if($next){
            $game['next'] = $next->toArray();
            $game['next']['url'] =empty($next["url"])?url("index/game/show",["id"=>$next["id"]]):$next["url"];
        }else{
            $game['next'] = array('title'=>'返回列表','url'=>url('index/game/lists',['category_id'=>$game['category_id']]));
        }*/

        return $game;
    }
}