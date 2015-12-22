<?php 

class AttributeModel extends Model{
	public $table='attribute';
	//属性名不能为空
	public $validate=array(
		array('attr_name','nonull','属性名不能为空',2,3),
		/**
		 * 属性值的验证
		 * 当录入方式为下拉列表框时才要验证他
		 * 其他几种录入方式根本就没这个值
		 * 所以不需要验证
		 */
		array('attr_value','nonull','属性值不能为空',1,3),
	);
	/**
	 *转换attr_value的值，序列化
	 */
	public $auto=array(
		array('attr_value','AutoAttrValue','method',1,3),
		);
	public function AutoAttrValue($v)
	{
		$v=preg_split('/[\n]/', $v);
		return serialize($v);
	}

	//添加属性
	public function addAttribute()
	{
		if ($this->create()) {
			if ($this->add()) {
				return true;
			}else{
				$this->error='添加失败';
			}
		}
	}
	//编辑属性
	public function editAttribute()
	{
		if ($this->create()) {
			if ($this->save()) {
				return true;
			}else{
				$this->error='编辑失败';
			}
		}
	}
	//删除属性
	public function delAttribute()
	{
		if ($this->del(Q('attr_id'))) {
			return true;
		}else{
			$this->error='删除失败';
		}
	}

}


 ?>