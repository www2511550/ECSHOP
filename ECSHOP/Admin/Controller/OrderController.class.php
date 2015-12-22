<?php 

class OrderController extends AuthController{
	private $db;
	public function __init()
	{
		$this->db=M('order_goods');
	}
	/**
	 * 查看订单
	 * @return [type] [description]
	 */
	public function index()
	{
		$page=new Page($this->db->count(),5);
		$data=$this->db->limit($page->limit())->all();
		$this->assign(array('data'=>$data,'page'=>$page->show()));
		$this->display();
	}
}

 ?>