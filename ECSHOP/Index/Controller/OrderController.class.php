<?php 

class OrderController extends Controller{
	private $order;
	private $order_goods;
	/**
	 * 构造函数
	 */
	public function __init()
	{
		$this->order=M('orders');
		$this->order_goods=M('order_goods');
	}
	/**
	 * 订单列表中单个订单提交
	 * @return [type] [description]
	 */
	public function oneOrder()
	{
		$id=Q('get.id',0,'intval');
		$sql="SELECT * FROM order_goods og JOIN orders os
				ON og.order_id=os.order_id
				WHERE order_goods_status=0 and order_goods_id=".$id;
		$order=M()->query($sql);
		if (!$order) {
			$this->error('该订单不存在','Member/order');
		}
		$this->assign('data',$order[0]);
		$this->display('order');
	}
	/**
	 * 提交订单
	 * @return [type] [description]
	 */
	public function order()
	{
		$user=M('address')->where("uid={$_SESSION['uid']} and is_default=1")->find();
		if (!$user) {
			$this->error('填写地址后再提交');
		}
		/**
		 * 删除旧的订单
		 */
		$this->order->where("user_id={$user['uid']}")->del();
		/**
		 * 组合订单表数据
		 */
		$data=array();
		$data['order_sn']=time();
		$data['user_id']=$user['uid'];
		$data['consignee']=$user['address_order'];
		$data['address']=$user['address'];
		$data['amount']=$_POST['total_money'];
		$data['add_time']=time();
		$data['tel']=$user['address_tel'];
		$data['order_note']=$_POST['order_note'];
		$data['is_fapiao']=$_POST['IsFaPiao']?1:0;
		$data['goods_gid']=implode("-", $_POST['goods_gid']);
		$this->assign('data',$data);
		if (!$this->order->add($data)) {
			$this->error('订单提交失败');
		}
		
		/**
		 * 删除旧订单
		 */
		$map['goods_gid']=array('IN',$_POST['goods_gid']);
		$this->order_goods->where($map)->del();
		/**
		 * 订单列表
		 * 添加新订单
		 */
		$order=$this->order->where("user_id={$_SESSION['uid']}")->find();
		$order_goods=array();
		foreach ($_POST['goods_gid'] as $k => $v) {
			$goods=M('goods')->find($v);
			$order_goods['goods_name']=$goods['goods_name'];
			$order_goods['goods_price']=$goods['goods_price'];
			$order_goods['market_price']=$goods['market_price'];
			$order_goods['total_price']=$goods['goods_price']*$_POST['num'][$k];
			$order_goods['goods_img']=$goods['goods_img'];
			$order_goods['goods_number']=$_POST['num'][$k];
			$order_goods['goods_attr']=$_POST['attr'][$k];
			$order_goods['goods_sn']=$order['order_sn'];
			$order_goods['order_id']=$order['order_id'];
			$order_goods['goods_gid']=$_POST['goods_gid'][$k];
			$this->order_goods->add($order_goods);
		}
		/**
		 * 删除购物车中订单
		 */
		// $gs=array();
		// foreach ($_SESSION[''] as $key => $value) {
		// 	# code...
		// }
		$this->display();
	}
	
}


 ?>