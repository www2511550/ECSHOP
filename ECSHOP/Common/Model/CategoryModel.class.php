<?php 

class CategoryModel extends Model{
	public $table='category';
	//验证栏目名不能为空
	public $validate=array(
		array('cat_name','nonull','栏目名不能为空',2,3),
	);
	//添加栏目
	public function addCategory()
	{
		if ($this->create()) {
			if ($this->add()) {
				//更新缓存
				$this->updateCache();
				return true;
			}else{
				$this->error='添加失败';
			}
		}
	}
	//编辑栏目
	public function editCategory()
	{
		if ($this->create()) {
			if ($this->save()) {
				//更新缓存
				$this->updateCache();
				return true;
			}else{
				$this->error='编辑失败';
			}
		}
	}
	//删除栏目
	public function delCategory()
	{
		$cid=Q('cid',0,'intval');
		if (!$cid) {
			$this->error='栏目不存在';
		}
		$child=$this->where("pid=$cid")->all();
		foreach ($child as $v) {
			$all[]=$v['cid'];
		}
		$all[]=$cid;
		$all=implode(',',$all);
		$map['cid']=array('IN',$all);
		if ($this->where($map)->del()) {
			$this->updateCache();
			return true;
		}else{
			$this->error='删除失败';
		}
	}

	/**
	 * 更新栏目缓存
	 */
	public function updateCache()
	{
		$data=M('category')->all();
		$data=Data::tree($data,'cat_name','cid','pid');
		return S('category',$data);
	}
}



 ?>