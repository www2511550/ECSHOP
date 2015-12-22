<?php 

class CartController extends Controller{
	/**
	 * 构造函数
	 */
	public function __init()
	{
		/**
		 * 初始化购物车
		 */
		if (!isset($_SESSION['cart'])) {
			$_SESSION['cart']=array();
		}
	}
	/**
	 * 编辑购物车，数量
	 * @return [type] [description]
	 */
	public function edit()
	{
		$cartId=Q('cartId');
		$num=Q('num');
		$_SESSION['cart']['goods'][$cartId]['num']=$num;
		$_SESSION['cart']['goods'][$cartId]['total_price']=$num*$_SESSION['cart']['goods'][$cartId]['goods_price'];
		/**
		 * 更新购物车总价和数量
		 */
		return $this->total();
	}
	/**
	 * 删除购物车商品
	 * @return [type] [description]
	 */
	public function del()
	{
		if (!$cartId=Q('cartId')) {
			$this->error('删除失败');
		}else{
			/**
			 * 购物车只有一条记录直接清空
			 */
			$count=count($_SESSION['cart']['goods']);
			if ($count==1) {
				$_SESSION['cart']=array();
				$this->success('删除成功');
			}
			/**
			 * 批量删除
			 */
			if (is_array($cartId)) {
				$data=array();
				foreach ($cartId as $key => $val) {
					if ($val=='undefined') continue;
					if (in_array($_SESSION['cart']['goods'][$val], $_SESSION['cart']['goods'])) {
						unset($_SESSION['cart']['goods'][$val]);
					}
				}
				/**
				 * 更新购物车总价和数量
				 */
				$this->total();
				$this->success('删除成功');
			}
			/**
			 * 循环删除指定的一条
			 * @var array
			 */
			$data=array();
			foreach ($_SESSION['cart']['goods'] as $k=>$v) {
				if ($v['cartId']==$cartId) continue;	
				$data[$k]=$v;
			}
			$_SESSION['cart']['goods']=$data;
			/**
			 * 更新购物车总价和数量
			 */
			$this->total();
			$this->success('删除成功');
		}
	}
	/**
	 * 给session添加一个字段is_checked
	 * 用于结算列表显示
	 */
	public function addChecked()
	{
		$cartId=Q('cartId');
		foreach ($_SESSION['cart']['goods'] as $k => $v) {
			if (in_array($k, $cartId)) {
				$_SESSION['cart']['goods'][$k]['is_checked']=1;
			}else{
				$_SESSION['cart']['goods'][$k]['is_checked']=0;
			}
		}
		$this->success('字段添加成功');
	}
	/**
	 * 加入购物车 
	 */
	public function add()
	{
		$id=Q('post.id');//'-'连接的id
		$num=Q('post.num',0,'intval');
		$data=M('product')->where("goods_attr='{$id}'")->find();///'{$id}'
		if ($data) {
			/**
			 * 用于session中商品id
			 */
			$cartId=$data['goods_gid'].'-'.$data['product_id'];
			/**
			 * 如果购物车中已存在该商品，只更新数量即可
			 */
			if (isset($_SESSION['cart']['goods'][$cartId])) {
				$_SESSION['cart']['goods'][$cartId]['num']=$num;
				$_SESSION['cart']['goods'][$cartId]['total_price']=$num*$_SESSION['cart']['goods'][$cartId]['goods_price'];
			}
			/**
			 * 属性用于区分同商品不同属性
			 */
			$attr_value=M('goods_attr')->where('id IN ('.str_replace('-',',', $data['goods_attr']).')')
			->getField('attr_value',true);
			$goods=M('goods')->find($data['goods_gid']);
			/**
			 * 购物车中需要 goods_id,goods_name,goods_price,
			 * goods_thumb,num,total_price,attr_value,cartId
			 */
			$_SESSION['cart']['goods'][$cartId]['goods_id']=$data['goods_gid'];
			$_SESSION['cart']['goods'][$cartId]['product_number']=$data['product_number'];
			$_SESSION['cart']['goods'][$cartId]['goods_name']=$goods['goods_name'];
			$_SESSION['cart']['goods'][$cartId]['goods_price']=$goods['goods_price'];
			$_SESSION['cart']['goods'][$cartId]['goods_thumb']=$goods['goods_thumb'];
			$_SESSION['cart']['goods'][$cartId]['num']=$num;
			$_SESSION['cart']['goods'][$cartId]['total_price']=$goods['goods_price']*$num;
			$_SESSION['cart']['goods'][$cartId]['attr']="".implode(',', $attr_value)."";
			$_SESSION['cart']['goods'][$cartId]['cartId']=$cartId;
			/**
			 * 更新购物车总价和数量
			 */
			$this->total();
			$this->display();
		}else{	
			echo  0;
      		exit;
		}
		
	}
	/**
	 * 更新购物车总价和总数
	 * @return [type]        [description]
	 */
	public function total()
	{
		$total=$total_num='';
		foreach ($_SESSION['cart']['goods'] as $key => $value) {
			$total+=$value['total_price'];
			$total_num+=$value['num'];
		}
		$_SESSION['cart']['total']=$total;
		$_SESSION['cart']['total_num']=$total_num;
		return true;
	}
}

 ?>