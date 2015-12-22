<?php 

class RoleController extends Controller{
	private $db;
	public function __init()
	{
		$this->db=M('role');
	}
	/**
	 * 角色分配
	 * @return [type] [description]
	 */
	public function index()
	{
		$role=$this->db->all();
		$this->assign('role',$role);
		$this->display();
	}
	/**
	 * 添加角色
	 */
	public function add()
	{
		if (IS_POST) {
			if (empty($_POST['rname'])) {
				$this->error('名称不能为空');
			}else{
				if ($this->db->add()) {
					$this->success('添加成功','index');
				}else{
					$this->error($this->db->error);
				}
			}
		}else{
			$this->display();
		}
	}
	/**
	 * 编辑角色
	 */
	public function edit()
	{
		if (IS_POST) {
			if (empty($_POST['rname'])) {
				$this->error('名称不能为空');
			}else{
				if ($this->db->save()) {
					$this->success('编辑成功','index');
				}else{
					$this->error($this->db->error);
				}
			}
		}else{
			$role=$this->db->find($_GET['rid']);
			$this->assign('role',$role);
			$this->display();
		}
	}
	/**
	 * 删除角色
	 * @return [type] [description]
	 */
	public function del()
	{
		if ($this->db->del($_GET['rid'])) {
			$this->success('删除成功','index');
		}else{
			$this->error($this->db->error);
		}
	}
}


 ?>