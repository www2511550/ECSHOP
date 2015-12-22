<?php 

class UserModel extends Model{
	public $table='user';
	/**
	 * 自动验证
	 */
	public $validate=array(
		array('username','nonull','用户名不能为空',2,3),
		array('password','nonull','密码不能为空',2,3),
		array('code','nonull','验证码不能为空',2,3),
	);
	/**
	 * 自动完成
	 */
	public $auto=array(
		array('password','md5','function',2,3),
	);
	/**
	 * 用户登录
	 * @return [type] [description]
	 */
	public function login()
	{
		if ($this->create()) {
			$user=$this->where("username='{$_POST['username']}'")->find();
			if (!$user) {
				$this->error='用户不存在';
				return false;
			}
			if (md5($_POST['password'])!=$user['password']) {
				$this->error='密码错误';
				return false;
			}
			$_SESSION['username']=$user['username'];
			$_SESSION['uid']=$user['uid'];
			return true;
		}
	}
	/**
	 * 用户注册
	 * @return [type] [description]
	 */
	public function zhuce()
	{
		if ($this->create()) {
			if ($this->add()) {
				$user=$this->where("username='{$_POST['username']}'")->find();
				$_SESSION['username']=$user['username'];
				$_SESSION['uid']=$user['uid'];
				return true;
			}else{
				$this->error='注册失败';
				return false;
			}
		}
	}
}


 ?>