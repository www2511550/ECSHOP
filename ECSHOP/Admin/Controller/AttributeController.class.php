<?php 

class AttributeController extends AuthController{
	private $db;
	public function __init()
	{
	 	$this->db=K('Attribute');
	}

	public function index()
	{
		$cat_id=Q('cat_id',0,'intval');
		if ($cat_id) {
			$map['cat_id']=array('EQ',$cat_id);
			$this->db->where($map);
		}
		$data=$this->db->all();
		int_to_string($data,array('attr_type'=>array('0'=>'普通类型','1'=>'规格类型')));
		int_to_string($data,array('attr_input_type'=>array(0=>'文本框',1=>'下拉列表',2=>'文本域')));
		foreach ($data as $k=>$v) {
			if(!empty($v['attr_value'])){
				$da['attr_value']=unserialize($v['attr_value']);
				$data[$k]['attr_value']=implode('', $da['attr_value']);//implode将一维数组转换为字符串
			}
		}
		$this->assign('data',$data);
		/**
		 * 选择对应的商品类型
		 *分配类型
		 */
		$this->assign('goods_type',S('goods_type'));
		$this->display();
	}
	/**
	 * 添加商品属性
	 */
	public function add()
	{
		if (IS_POST) {
			if ($this->db->addAttribute()) {
				$this->success('添加成功','index');
			}else{
				$this->error($this->db->error);
			}
		}else{
			$this->assign('goods_type',S('goods_type'));
			$this->display();
		}
	}
	/**
	 * 编辑商品属性
	 */
	public function edit()
	{
		if (IS_POST) {
			if ($this->db->editAttribute()) {
				$this->success('添加成功','index');
			}else{
				$this->error($this->db->error);
			}
		}else{
			if (!$attr_id=Q('attr_id',0,'intval')){
				$this->error('商品属性不存在');
			};
			$data=M('attribute')->find($attr_id);
			if (!empty($data['attr_value'])) {
				$data['attr_value']=unserialize($data['attr_value']);
				$data['attr_value']=implode('', $data['attr_value']);//implode将一维数组转换为字符串
			}
			$this->assign('data',$data);
			$this->assign('goods_type',S('goods_type'));
			$this->display();
		}
	}
	/**
	 * 删除商品属性
	 */
	public function del()
	{
		if ($this->db->delAttribute()) {
			$this->success('删除成功','index');
		}else{
			$this->error($this->db->error);
		}
	}





}

 ?>