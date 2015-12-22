<?php 

class BackupController extends AuthController{

	public function index()
	{
		$this->display();
	}
	/**
	 * 数据库备份
	 * @return [type] [description]
	 */
	public function backup()
	{
		$result = Backup::backup(
					array(
					"size" => 200,//每个卷多大,单位是KB 
					"dir" => C("DB_BACKUP") . date("Ymdhis")
					)
				);
		if ($result['status'] == 'success') {
			$this->success($result['message'], U('index'));
		} else {
			$this->success($result['message'], $result['url'], 0.2);
		}
	}
	/**
	 * 备份列表
	 * @return [type] [description]
	 */
	public function backList()
	{
		$dirs=Dir::tree('Backup');
		$this->assign('dirs',$dirs);
		$this->display();
	}
	/**
	 * 数据还原
	 * @return [type] [description]
	 */
	public function recovery()
	{
		$dir = C("DB_BACKUP") . Q("dir");
		$result = Backup::recovery(array('dir' => $dir));
		if ($result['status'] == 'success') {
			$this->success($result['message'], U('index'));
		} else {
			$this->success($result['message'], $result['url'], 0.2);
		}

	}


}

 ?>