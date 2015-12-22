<?php 


class GoodsController extends AuthController{
	//模型
	private $db;
	//商品属性模型
	private $goods_attr;
	//栏目缓存
	private $category;
	//品牌缓存数据
	private $brand;
	//商品类型缓存
	private $goods_type;
	function __init()
	{
		$this->db=K('Goods');
		//栏目缓存数据
		$this->category=S('category');
		//品牌缓存数据
		$this->brand=S('brand');
		//商品类型缓存
		$this->goods_type=S('goods_type');
		//商品属性模型
		$this->goods_attr=K('GoodsAttr');
	}

	public function index()
	{
		$data=$this->db->getPageList();
		$this->assign($data);
		$this->assign('goods_type',$this->goods_type);
		$this->display();
	}
	/**
	 * 添加商品
	 */
	public function add()
	{
		if (IS_POST) {
			if ($this->db->addGoods()) {
				$this->success('添加成功','index');
			}else{
				$this->error($this->db->error);
			}
		}else{
			// 栏目分配
			$this->assign('category',$this->category);
			// 品牌分配
			$this->assign('brand',$this->brand);
			// 商品类型分配
			$this->assign('goods_type',$this->goods_type);
			$this->display();
		}
	}
	/**
	 * 编辑商品
	 */
	public function edit()
	{
		if (IS_POST) {
			if ($this->db->editGoods()) {
				$this->success('编辑成功','index');
			}else{
				$this->error($this->db->error);
			}
		}else{
			$goods_id=Q('goods_id',0,'intval');
			$goods= $this->db->join('__goods__ g LEFT JOIN __goods_data__ gd ON g.goods_id = gd.goods_gid')->find($goods_id);
			$this->assign('goods',$goods);
			//商品图片表
			$img=M('goods_gallery')->where("goods_gid=$goods_id")->all();
			$this->assign('img',$img);
			//商品副表
			$goods_data=M('goods_data')->where("goods_gid=$goods_id")->find();
			$this->assign('goods_data',$goods_data);
			//分配栏目
			$this->assign('category',$this->category);
			// 分配品牌
			$this->assign('brand',$this->brand);
			// 分配商品类型
			$this->assign('goods_type',$this->goods_type);
			$this->display();
		}
	}
	/**
	 * 删除商品
	 * @return [type] [description]
	 */
	public function del()
	{
		if ($this->db->delGoods()) {
			$this->success('删除成功','index');
		}else{
			$this->error($this->db->error);
		}
	}
	/**
	 * 回收站内容
	 * @return [type] [description]
	 */
	public function recover()
	{
		$data=$this->db->getPageList($recover=1);
		$this->assign($data);
		$this->display();
	}
	/**
	 * 获得商品属性
	 * @return [type] [description]
	 */
	public function getGoodsAttr()
	{
		$data=$this->goods_attr->get();
		$this->assign('data',$data);
		$this->display();
	}
	//删除商品图片goods_gallery
	public function delImg()
	{
		$id=Q('img_id',0,'intval');
		return K('GoodsGallery')->delImg($id);
	}
	/**
	 * 删除首页图片
	 * @return [type] [description]
	 */
	public function delIndexImg()
	{
		$id=Q('goods_id',0,'intval');
		return $this->db->delIndexImg($id);
	}
	/**
	 * 异步修改商品属性值
	 */
	public function goodsAttrValue()
	{
		$id=Q('post.id',0,'intval');
		$value=Q('post.value');
		return $this->goods_attr->upAttr(array('id'=>$id,'attr_value'=>$value));
	}
	/**
	 * 异步更新(价格,回收等）
	 * @return [type] [description]
	 */
	public function update()
	{
		$goods_id=Q('goods_id',0,'intval');
		//更新价格
		if ($price=Q('price',0,'intval')) {
			$data=array('goods_id'=>$goods_id,'goods_price'=>$price);
		}
		//更改回收
		$recover=Q('is_recover',0,'intval');
		if ($recover==0 || $recover==1) {
			$data=array('goods_id'=>$goods_id,'is_recover'=>$recover);
		}
		if ($this->db->save($data)) {
			$this->success('价格修改成功');
		}else{
			$this->error('价格修改失败');
		}
	}

}


 ?>