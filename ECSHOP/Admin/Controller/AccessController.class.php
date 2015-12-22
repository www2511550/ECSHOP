<?php 

class AccessController extends Controller{

	public function __init()
	{
		
	}
	/**
	 * 权限设置 
	 */
	public function set()
	{
		if (IS_POST) {
			//先删除原来
			M('access')->where("rid={$_POST['rid']}")->del();
			if (!empty($_POST['access'])) {
				$data=array();
				foreach ($_POST['access'] as $c => $a) {
					$data['rid']=$_POST['rid'];
					$data['nid']=$a;
					M('access')->add($data);
				}
			}
			$this->success('权限设置成功');
		}else{
			/****第一种方案***
			//找到有权限设置的节点
			$node=M('node')->all();
			$node=Data::channelLevel($node,0,'&nbsp','nid');
			//找到该角色的已有的权限
			$map['rid']=array('EQ',$_SESSION['rid']);
			$controller=M('access')->where($map)->getField('controller',true);
			$action=M('access')->where($map)->getField('action',true);
			$this->assign('controller',$controller);
			$this->assign('action',$action);
			$this->assign('node',$node);
			$this->display();*/
			// ***方案二***
			$data=M()->join("__access__ a join __node__ n on a.nid=n.nid")->all();
			$node=Data::channelLevel($data,0,'&nbsp','nid');
			$this->assign('node',$node);
			$this->assign('rid',$_SESSION['rid']);
			$this->display();
		}
		
	}
}

 ?>