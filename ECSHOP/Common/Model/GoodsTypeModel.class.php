<?php 

class GoodsTypeModel extends Model{
	public $table='goods_type';

	// 验证
 	public $validate=array(
 		array('cat_name','nonull','商品名不能为空',2,3),
 		array('cat_name','is_catName','类型已存在',2,3),
 		);
 	/**
 	 * 判断商品名称是否已经存在
 	 *有id就是编辑，没有就是添加
 	 */
 	public function is_catName($name,$value,$msg,$org)
 	{
 		if ($id=Q('cat_id'))$map['cat_id']=array('NEQ',$id);
 		$map['cat_name']=array('EQ',$value);
 		// p($this->where($map)->find());exit;
 		return $this->where($map)->find()?$msg:true;
 		
 	}

	// 添加商品类型
	public function addGoodsType()
	{
		if ($this->create()) {
			if ($this->add()) {
				//更新缓存
				$this->updateCache();
				return true;
			}else{
				$this->error='商品添加失败';
			}
		}
	}
	// 编辑商品类型
	public function editGoodsType()
	{
		if ($this->create()) {
			if ($this->save()) {
				//更新缓存
				$this->updateCache();
				return true;
			}else{
				$this->error='商品编辑失败';
			}
		}
	}
	//删除商品类型 
	public function delGoodsType()
	{
		if ($cat_id=Q('cat_id')) {
			if ($this->del($cat_id)) {
				//更新缓存
				$this->updateCache();
				return true;
			}else{
				$this->error='删除失败1';
			}
		}else{
			$this->error='删除失败2';
		}
	}
	//更新缓存数据
 	public function updateCache()
 	{
 		$data=$this->all();
 		//改变键名让其与id相同
 		$cache=array();
	 	foreach ($data as $k => $v) {
	 		$cache[$v['cat_id']]=$v;
	 	}
 		return S('goods_type',$cache);
 	}

}


 ?>