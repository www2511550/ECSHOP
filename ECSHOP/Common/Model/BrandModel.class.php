<?php 

class BrandModel extends Model{
	public $table='brand';
	//自动验证
	public $validate=array(
		array('brand_name','nonull','品牌名不能为空',2,3),
	);
	/**
	 *将品牌转化为一维数组
	 */
	public $auto=array(
		array('brand_logo','AutoPath','method',1,3),
	);
	public function AutoPath($v)
	{
		$d=current($v);
		return $d['path'];
	}
	/**
	 * 添加品牌
	 */
	public function addBrand()
	{
		if ($this->create()) {
			if ($this->add()) {
				$this->updateCache();
				return true;
			}else{
				$this->error='添加品牌失败';
			}
		}
	}
	/**
	 * 编辑品牌
	 */
	public function editBrand()
	{
		if ($this->create()) {
			if ($this->save()) {
				$this->updateCache();
				return true;
			}else{
				$this->error='编辑品牌失败';
			}
		}
	}
	//删除品牌
	public function delBrand()
	{
		$data=S('brand');
		$path=$data[Q('bid')]['brand_logo'];
		if ($this->del(Q('bid'))) {
			if ($path) unlink($path);
			$this->updateCache();
			return true;
		}else{
			$this->error='删除失败';
		}
	}
	/**
	 * 更新品牌缓存
	 */
	public function updateCache()
	{
		$data=$this->all();
		$cache=array();
		foreach ($data as $k => $v) {
			$cache[$v['bid']]=$v;
		}
		return S('brand',$cache);
	}
}