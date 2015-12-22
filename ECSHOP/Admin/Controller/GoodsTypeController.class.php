<?php
 
 class GoodsTypeController extends AuthController{
 	private $db;
 	private $cache;
 	public function __init()
 	{
 		$this->db=K('GoodsType');
 		$this->cache=S('goods_type');
 	}

 	public function index()
 	{
 		$this->assign('goodsType',$this->cache);
 		$this->display();
 	}
 	// 添加商品
 	public function add()
 	{
 		if (IS_POST) {
 			if ($this->db->addGoodsType()) {
 				//更新缓存数据
 				$this->updateCache();
 				$this->success('添加成功','index');
 			}else{
 				$this->error($this->db->error);
 			}
 		}else{
 			$this->display();
 		}
 	}
 	 // 编辑商品类型
 	public function edit()
 	{
 		if (IS_POST) {
 			if ($this->db->editGoodsType()) {
 				$this->success('编辑成功','index');
 			}else{
 				$this->error($this->db->error);
 			}
 		}else{
 			$cat_id=Q('cat_id',0,'intval');
 			if (!$cat_id) {
 				$this->error('类型不存在');
 			}
 			$data=$this->cache;
 			$this->assign('data',$data[$cat_id]);
 			$this->display();
 		}
 	}
 	 // 删除商品类型
 	public function del()
 	{
 		if ($this->db->delGoodsType()) {
 			$this->success('删除成功','index');
 		}else{
 			$this->error($this->db->error);
 		}
 	}
 	//更新缓存
 	public function updateCache()
 	{
 		if ($this->db->updateCache()) {
 			$this->success('更新缓存成功');
 		}else{
 			$this->error('更新缓存失败');
 		}
 	}







 }