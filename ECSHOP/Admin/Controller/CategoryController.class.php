<?php 

class CategoryController extends AuthController{
	private $db;
	//栏目缓存 
	private $category;
	public function __init()
	{
		$this->access();
		$this->db=K('Category');
		$this->category=S('category');
	}

	public function index()
	{	
		$pid=Q('pid',0,'intval');
		int_to_string($this->category,array('is_show'=>array('1'=>'显示','0'=>'隐藏')));
		foreach ($this->category as $k => $v) {
			if ($v['pid']==0) {
				$TopCategory[]=$v;
			}
			if ($pid && $v['pid']==$pid) {
				$data[]=$v;
			}
			if ($v['cid']==$pid) {
				$data[]=$v;
			}
		}
		if ($pid) {
			$this->assign(array('category'=>$data,'topCategory'=>$TopCategory));
		}else{

			$this->assign(array('category'=>$this->category,'topCategory'=>$TopCategory));
		}
		$this->display();
	}

	//添加栏目 
	public function add()
	{
		if (IS_POST) {
			if ($this->db->addCategory()) {
				$this->success('添加成功','index');
			}else{
				$this->error($this->db->error);
			}
		}else{
			/**
			 * 栏目类型
			 */
			$goods_type=M('goods_type')->all();
			$this->assign('goods_type',$goods_type);
			$this->assign('category',S('category'));
			$this->display();
		}
	}
	//编辑栏目
	public function edit()
	{
		if (IS_POST) {
			if ($this->db->editCategory()) {
				$this->success('编辑成功','index');
			}else{
				$this->error($this->db->error);
			}
		}else{
			$data=$this->category;
			if(!$cid=Q('cid',0,'intval')){
				$this->error('栏目不存在');
			};
			$this->assign('data',$data[$cid]);
			/**
			 * 栏目类型
			 */
			$goods_type=M('goods_type')->all();
			$this->assign('goods_type',$goods_type);
			$this->assign('category',S('category'));
			$this->display();
		}
	}
	//删除栏目
	public function del()
	{
		if ($this->db->delCategory()) {
			$this->success('删除成功','index');
		}else{
			$this->error($this->db->error);
		}
	}
	/**
	 * 更新缓存
	 */
	public function updateCache()
	{
		if ($this->db->updateCache()) {
			$this->success('缓存更新成功','index');
		}else{
			$this->error($this->db->error);
		}
	}
}


 ?>