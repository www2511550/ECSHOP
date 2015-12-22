<?php 

class ProductModel extends Model{
	/**
	 * 货品表
	 * @var string
	 */
	public $table='product';
	/**
	 * 获得商品属性
	 * @param  [type] $goods_gid [商品ID]
	 * @return [type]            [description]
	 */
	public function getAttr($goods_gid)
	{
		if (!$goods_gid)return;
		/**
		 * 商品属性
		 */
		$sql="SELECT * from attribute AS a INNER JOIN goods_attr AS ga 
			  ON a.attr_id=ga.attr_id where goods_gid=$goods_gid and a.attr_type=1
			  ORDER by a.attr_id ASC";
		$data=M()->query($sql);
		/**
		 * 相同属性id的放一起用于下拉列表
		 */
		$attr=array();
		foreach ($data as $k => $v) {
			$attr[$v['attr_id']][]=$v;
		}
		return $attr;
	}
	/**
	 * 添加货品
	 */
	public function addProduct()
	{
		/**
		 * 商品规格属性的id
		 */
		// p($_POST);
		$attrId=array();
		foreach ($_POST['attr'] as $k => $v) {
			foreach ($v as $key => $val) {
				$attrId[$key][]=$val;
			}
		}
		foreach ($attrId as $k => $v) {
			/**
			 * 当属性值为0
			 * 即没有选择，不存入货品表
			 */
			if (array_search(0, $v)!==false) continue;
			/**
			 * 货号与货品数量为空时也不存入货品表
			 */
			if (empty($_POST['product_sn'][$k]) || empty($_POST['product_number'][$k]) ) continue;
			/**
			 * goods_attr为id组合
			 * 货品数据
			 */
			$data['goods_attr']=implode('-', $v);
			$data['goods_gid']=$_POST['goods_gid'];
			$data['product_sn']=$_POST['product_sn'][$k];
			$data['product_number']=$_POST['product_number'][$k];
			if (!$this->add($data)) {
				$this->error='添加失败';
			}
		}
		return true;
	}
	/**
	 * 获得货品
	 * @param  [type] $goods_gid [商品id]
	 * @return [type]            [description]
	 */
	public function getProduct($goods_gid)
	{
		$data=$this->where("goods_gid=$goods_gid")->all();
		foreach ($data as $k => $v) {
			/**
			 * 找到对应的商品属性值
			 */
			$map['id']=array('IN',explode('-', $v['goods_attr']));
			/**
			 * 第 2 个参数为 true 时返回记录压入一个数组中
			 */
			$attr_string=M('goods_attr')->where($map)->order(" id asc")->getField('attr_value',true);
			$data[$k]['attr_string']=$attr_string;
		}
		return $data;
	}
	/**
	 * 删除货品
	 * @return [type] [description]
	 */
	public function delProduct()
	{
		$product_id=Q('product_id',0,'intval');
		if (!$product_id) {
			$this->error='商品货号不存在';
			return false;
		}
		return $this->del($product_id);
	}



}


 ?>