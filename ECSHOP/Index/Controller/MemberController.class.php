<?php 


class MemberController extends Controller{
	public function __init()
	{
		/**
         * 获得所有栏目
         */
        $category=Data::channelLevel(S('category'),0,'-');
        $this->assign('category',$category);
        /**
         * 登陆后操作
         */
        if (!isset($_SESSION['username'])) {
            $this->error('请登陆后再操作');
        }
	}
	/**
	 * 会员中心首页
	 * @return [type] [description]
	 */
	public function index()
	{
		
		$this->display();
	}
	/**
	 * 我的订单
	 * @return [type] [description]
	 */
	public function order()
	{
		/**
		 * 获得该会员订单
		 */
		$sql="SELECT * FROM orders os JOIN order_goods og 
                ON os.order_id=og.order_id where user_id=".$_SESSION['uid'];
        $data=M()->query($sql);
        $this->assign('data',$data);
		$this->display();
	}
	/**
	 * 取消订单列表的订单
	 * @return [type] [description]
	 */
	public function cancelOrder()
	{
		$id=Q('id',0,'intval');
		$status=M('order_goods')->save(array('order_goods_id'=>$id,'order_goods_status'=>2));
		if ($status) {
			$this->success('订单取消成功');
		}else{
			$this->error('订单取消失败');
		}
	}
	/**
	 * 账户余额
	 * @return [type] [description]
	 */
	public function shengyu()
	{
		$this->display();
	}
	/**
	 * 会员信息
	 * @return [type] [description]
	 */
	public function message()
	{
		$user=M('user')->where("uid={$_SESSION['uid']}")->find();
		$this->assign('user',$user);
		$this->display();
	}
	/**
	 * 收货信息
	 * @return [type] [description]
	 */
	public function address()
	{
		/**
		 * 默认地址
		 */
		$address=M('address')->where("uid={$_SESSION['uid']} and is_default=1")->find();
        $this->assign('address',$address);
		$this->display();
	}
	/**
	 * 修改收货地址
	 * @return [type] [description]
	 */
	public function editAddress()
	{
		$data=array(
			'address_id'=>Q('id',0,'intval'),
			'address_order'=>Q('order'),
			'address'=>Q('address'),
			'address_tel'=>Q('tel'),
		);
		if (M('address')->save($data)) {
			$this->success('修改成功');
		}else{
			$this->error('编辑失败');
		}
	}
	/**
	 * 修改用户资料
	 * @return [type] [description]
	 */
	public function eidtMsg()
	{
		$data=array();
		$data['uid']=Q('uid',0,'intval');
		$data['username']=Q('username');
		$data['password']=md5(Q('password'));
		$db=M('user');
		if ($db->save($data)) {
			$this->success('修改成功');
		}else{
			$this->error('修改失败');
		}
	}
	/**
	 * 检测用户名是否存在
	 * @return [type] [description]
	 */
	public function testUname()
	{
		$username=Q('username');
		$map['username']=array('EQ',$username);
		$map['uid']=array('NEQ',$_SESSION['uid']);
		if(M('user')->where($map)->find()){
			$this->error('用户名已存在');
		}else{
			$this->success('可以使用');
		}
	}

}


 ?>