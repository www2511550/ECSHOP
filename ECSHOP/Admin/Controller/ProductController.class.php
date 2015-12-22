<?php 

class ProductController extends AuthController{
	/**
	* 货品模型 
	*/
	private $db;
	/**
	 * 构造函数
	 */
	public function __init()
	{
		$this->db=K('Product');
	}
	/**
	 * 商品管理
	 * @return [type] [description]
	 */
	public function manage()
	{
		if (IS_POST) {
			if ($this->db->addProduct()) {
				$this->success('添加成功','Goods/index');
			}else{
				$this->error('添加失败');
			}
		}else{
			$goods_gid=Q('goods_id',0,'intval');

			/**
			 * 用于选择的规格商品属性
			 */
			$attr=$this->db->getAttr($goods_gid);
			$this->assign('attr',$attr);
			/**
			 * 已经存在的商品
			 */
			$product=$this->db->getProduct($goods_gid);
			$this->assign('product',$product);
			$this->display();
		}	
	}
	/**
	 * 删除货品
	 * @return [type] [description]
	 */
	public function del()
	{
		if ($this->db->delProduct()) {
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
}



 ?>