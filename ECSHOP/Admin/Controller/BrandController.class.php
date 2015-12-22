<?php 
/**
 * zu
 */
class BrandController extends AuthController{
	private $db;
	//缓存数据
	private $brand;
	//构造函数
	public function __init()
	{
		if (!$this->access()) {
			$this->error('你没有访问权限','Index/welcome');
		}
		$this->db=K('brand');
		$this->brand=S('brand');
	}

	public function index()
	{
		$this->assign('brand',$this->brand);
		$this->display();
	}

	//添加品牌
	public function add()
	{
		if (IS_POST) {
			if ($this->db->addBrand()) {
				$this->success('添加成功','index');
			}else{
				$this->error($this->db->error);
			}
		}else{
			$this->display();
		}
	}
	//编辑品牌
	public function edit()
	{
		if (IS_POST) {
			if ($this->db->editBrand()) {
				$this->success('编辑成功','index');
			}else{
				$this->error($this->db->error);
			}
		}else{
			$bid=Q('bid',0,'intval');
			if (!$bid) {
				$this->error('品牌不存');
			}
			$data=$this->brand;
			$d=$data[$bid];
			$d['brand_logo']=array('1'=>array('path'=>$d['brand_logo']));
			$this->assign('data',$d);
			$this->display();
		}
	}
	//删除品牌
	public function del()
	{
		if ($this->db->delBrand()) {
			$this->success('删除成功','index');
		}else{
			$this->error($this->db->error);
		}
	}
	/**
	 * 更新品牌缓存
	 */
	public function updateCache()
	{
		if ($this->db->updateCache()) {
			$this->success('缓存更新成功','index');
		}else{
			$this->error('更新失败');
		}
	}
}



 ?>