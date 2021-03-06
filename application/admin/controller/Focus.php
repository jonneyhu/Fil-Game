<?php
namespace app\admin\controller;

/**
* 轮播图控制器
*/
class Focus extends Init
{
	
	function _initialize()
	{
		parent::_initialize();
		$this->model = model('common/focus');
		$this->category_model = model('common/category');
		$this->type = array(1=>'电脑端',2=>'移动端');
	}

	function index(){
		$params = input('param.');
		$map = array();
		$focuss = $this->model->get_list($map,'sort asc');
		return view('list',['focuss'=>$focuss,'type'=>$this->type]);
	}

	function add(){
		if(request()->isPost()){
			$params = input('post.');
			$result = $this->model->add($params);
			if($result){
				return json(array('code'=>200,'msg'=>'添加成功'));
			}else{
				return json(array('code'=>0,'msg'=>'添加失败'));
			}
		}
		$category_id = input('param.category_id');
		return view('add',['type_select'=>$this->type]);
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
		$focus = $this->model->where('id',input('param.id'))->find();
		return view('edit',array('focus'=>$focus,'type_select'=>$this->type));
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
	//显示
	function to_show(){ 
		$id = input('post.id');
		$data['id'] = $id;
		$data['is_show'] = array('exp','1-is_show');
		$result = $this->model->edit($data);
		if($result){
			return json(array('code'=>200,'msg'=>'操作成功'));
		}else{
			return json(array('code'=>0,'msg'=>'操作失败'));
		}
	}
	//轮播图排序
	function sort(){
		$param = input('post.')['sorts'];
		$result = $this->model->sort($param);
		if($result){
			return json(array('code'=>200,'msg'=>'排序成功'));
		}else{
			return json(array('code'=>0,'msg'=>'排序失败'));
		}
	}


}