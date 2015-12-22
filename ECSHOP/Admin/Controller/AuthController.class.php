<?php 

class AuthController extends Controller{
	/**
	 * 如果使用__init(),继承的控制器__init不会执行
	 */
	public function __construct()
	{
		parent::__construct();	
	}
	/**
	 * 权限验证
	 * @return [type] [description]
	 */
	protected function access()
	{	
		/**
		 * 未登录用户验证
		 */
		if (!isset($_SESSION['id'])) {
			go('Login/login');
		}
		/**
		 * 站长获得所有权限
		 */
		$uname=isset($_SESSION['uname'])?$_SESSION['uname']:'';
		if (C('WEB_MASTER')==$uname) {
			return true;
		}
		//第一种方案
		/*$map['rid']=array('EQ',$_SESSION['rid']);
		$map['module']=array('EQ',MODULE);
		$map['controller']=array('EQ',CONTROLLER);
		$map['action']=array('EQ',ACTION);
		if (!M('access')->where($map)->all()) {
			$this->error('没有操作权限');
		}
*/

		//权限判断
		$sql="SELECT * FROM node n JOIN access a ON n.nid=a.nid";
		$data=M()->query($sql);
		$access=array();
		foreach ($data as $v) {
			if ($v['level']==1) {
				$access[$v['name']]=array();
				foreach ($data as $val) {
					if ($v['nid']==$val['pid']) {
						$access[$v['name']][$val['name']]=array();
						foreach ($data as $value) {
							if ($val['nid']==$value['pid']) {
								$access[$v['name']][$val['name']][$value['name']][]=$value['rid'];
							}
						}
					}
				}
			}
		}
		if (isset($access[MODULE])) {
			if (isset($access[MODULE][CONTROLLER])) {
				if (isset($access[MODULE][CONTROLLER][ACTION])) {
					if (in_array($_SESSION['rid'],$access[MODULE][CONTROLLER][ACTION] )) {
						return true;
					}else{
						return false;
					}
				}
			}
		}
		return false;

	}

	
	
}

 ?>