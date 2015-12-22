<?php 

class LoginController extends Controller{
	public function __init()
	{

	}
	/**
	 * 登录
	 */
	public function login()
	{
		if (IS_POST) {
			$db=M('user');
			$db->validate=array(
				array('username','nonull','用户名不能为空',2,3),
				array('password','nonull','密码不能为空',2,3),
			);
			if ($db->create()) {
				$user=$db->where("username='{$_POST['username']}'")->find();
				if (!$user) {
					$this->error('用户不存在');
				}
				if ($user['password']!=md5($_POST['password'])) {
					$this->error('密码错误');
				}
				//用于权限判断
				$_SESSION['rid']=M('user_role')->where("uid={$user['uid']}")->getField('rid');
				$_SESSION['id']=$user['uid'];
				$_SESSION['uname']=$user['username'];
				$this->success('登录成功','Index/index');
			}else{
				$this->error($db->error);
			}
		}else{
			$this->display();
		}
		
	}

}



 ?>