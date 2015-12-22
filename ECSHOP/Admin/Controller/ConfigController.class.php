<?php 

class ConfigController extends AuthController{
	/**
	 * 模型
	 */
	private $db;
	/**
	 * 构造函数
	 */
	public function __init()
	{
		$this->db=K('Config');
	}
	/**
	 * 设置配置项 
	 */
	public function set()
	{
		if (IS_POST) {
			if ($this->db->updateConfig()) {
				$this->success('更新成功');
			}else{
				$this->error('修改失败');
			}	
		}else{
			$data=$this->db->get();
			$this->assign('config',$data);
			$this->display();
		}
	}

}


 ?>