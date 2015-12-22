<?php 

class GoodsAttrModel extends Model{
	public $table='goods_attr';
	/**
	 * 删除商品属性
	 */
	public function delAttr($goods_gid)
	{
		return $this->where("goods_gid=$goods_gid")->del();
	}
	/**
	 * 更新商品属性
	 *根据主键更新
	 */
	public function upAttr($data)
	{
		return $this->save($data);
	}
	/**
	 * 获得前台详情页的规格属性
	 * @return [type] [description]
	 */
	public function getDetailAttr()
	{
		$goods_gid=Q('goods_id',0,'intval');
		$data=$this->join("__attribute__ a join __goods_attr__ ga on a.attr_id=ga.attr_id 
				where goods_gid=$goods_gid")->order("id asc")->all();
		$d=array();$canshu=array();
		foreach ($data as $k => $val) {
			if ($val['attr_type']==1) {
			/**
			 * 规格属性分组，制式一组，颜色一组
			 */
				$d[$val['attr_id']]['attr_name']=$val['attr_name'];
				$d[$val['attr_id']]['value'][]=$val;
			}else{
				$canshu[]=$val;
			}
			
		}
		return array('goods_attr'=>$d,'canshu'=>$canshu);
	}
	/**
	 * 获得商品属性
	 * @return [type] [description]
	 */
	public function get()
	{
		$cat_id=Q('cat_id',0,'intval');
		/**
		 * 拆分地址判断是否是传参
		 *也可以在html自定义属性传参
		 */
		$url=preg_split("/\//", Q('url'));
		$goods_gid=intval(end($url));       
		//获得类型属性和商品属性
		if ($goods_gid) {
			/**
			 * 编辑商品
			 *先找出编辑商品之前添加的属性和值
			 *再关联属性表left
			 */
		/***********************************************************************************************/
			$sql="SELECT *,a.attr_value default_value,a.attr_id attr_id from attribute AS a LEFT JOIN
					(SELECT * from goods_attr WHERE goods_gid=$goods_gid) AS ga 
					ON a.attr_id=ga.attr_id WHERE cat_id=$cat_id";
			$data=M()->query($sql);
		/***********************************************************************************************/
		}else{
			//添加
			$data=M('attribute')->field('*,attr_value default_value,attr_id')->where("cat_id=$cat_id")->all();
		}
		/**
		 * 显示方式
		 */
		$type=array(0=>'_text',1=>'_select',2=>'_textarea');
		foreach ($data as $k => $v) {
			$data[$k]['html']=$this->$type[$v['attr_input_type']]($v,$goods_gid);
		}
		return $data;
	}
	//文本框
	private function _text($v,$goods_gid)
	{
		/**
		 * 记录已经处理的属性
		 *用于js中的[+],[-]
		 */
		static $recordAttrId=array();
		//类型值,添加为空
		$value=$goods_gid?$v['attr_value']:'';
		//规格属性加价，添加为空
		$attr_price=$goods_gid?$v['attr_price']:'';
		/**
		  * 规格属性有加价
		  *并且可以添加多个
		  */ 
		if ($v['attr_type']==1) {	
			$id=isset($v['id'])?$v['id']:'0';
			$name=$v['attr_id'].'[]';
			$html="<input type='text' name='$name' value='$value' onkeyup='attrValue(this,$id)'/>";
			$name_price=$v['attr_id'].'[attr_price][]';
			$html.="加价 <input type='text' name='$name_price' value='$attr_price'/>元";
			/**
			 * 规格属性的[+],[-]设置
			 */
			if (in_array($v['attr_id'], $recordAttrId)) {
				$html.="<a href='javascript:;' onclick=removeAttr(this)>[-]</a>";
			}else{
				$html.="<a href='javascript:;' onclick=addAttr(this)>[+]</a>";
			}	
		}else{
			//类型属性id作为name
			$name=$v['attr_id'].'[][]';
			$html="<input type='text' name='$name' value='$value'/>";
		}
		$recordAttrId[]=$v['attr_id'];
		return $html;
	}
	//下拉框
	private function _select($v,$goods_gid)
	{
		/**
		 * 记录已经处理的属性
		 *用于js中的[+],[-]
		 */
		static $recordAttrId=array();
		//类型值,添加为空
		$attr_value=unserialize($v['default_value']);
		//规格属性加价，添加为空
		$attr_price=$goods_gid?$v['attr_price']:'';
		/**
		 * 规格属性有加价
		 */
		if ($v['attr_type']==1) {
			//类型属性id作为name
			$id=isset($v['id'])?$v['id']:'0';
			$name=$v['attr_id'].'[]';
			$html="<select name='$name' onchange='attrValue(this,$id)'>";
			foreach ($attr_value as $val) {
				////文字间可能有前后空格，加trim()
				$selected=(trim($val)==trim($v['attr_value']))?" selected='' ":'';
				$html.="<option value='$val' $selected >".$val."</option>";
			}
			$html.="</select>";
			$name_price=$v['attr_id'].'[attr_price][]';
			$html.="加价 <input type='text' name='$name_price' value='$attr_price'/>元";
			/**
			 * 规格属性的[+],[-]设置
			 */
			if (in_array($v['attr_id'], $recordAttrId)) {
				$html.="<a href='javascript:;' onclick=removeAttr(this)>[-]</a>";
			}else{
				$html.="<a href='javascript:;' onclick=addAttr(this)>[+]</a>";
			}	
		}else{
			//类型属性id作为name
			$name=$v['attr_id'].'[][]';
			$html="<select name='$name'>";
			foreach ($attr_value as $val) {
				////文字间可能有前后空格，加trim()
				$selected=(trim($val)==trim($v['attr_value']))?" selected='' ":'';
				$html.="<option value='$val' $selected >".$val."</option>";
			}
			$html.="</select>";
		}
		$recordAttrId[]=$v['attr_id'];
		return $html;
				
	}
	//文本域
	private function _textarea($v,$goods_gid)
	{
		/**
		 * 记录已经处理的属性
		 *用于js中的[+],[-]
		 */
		static $recordAttrId=array();
		//类型值,添加为空
		$value=$goods_gid?$v['attr_value']:'';
		//规格属性加价，添加为空
		$attr_price=$goods_gid?$v['attr_price']:'';
		/**
		  * 规格属性有加价
		  */ 
		if ($v['attr_type']==1) {
			//类型属性id作为name
			$id=isset($v['id'])?$v['id']:'0';
			$name=$v['attr_id'].'[]';
			$name_price=$v['attr_id'].'[attr_price][]';
			$html="<textarea name='$name' onkeyup='attrValue(this,$id)'>".$value."</textarea>";
			$html.="加价 <input type='text' name='$name_price' value='$attr_price'/>元";
			/**
			 * 规格属性的[+],[-]设置
			 */
			if (in_array($v['attr_id'], $recordAttrId)) {
				$html.="<a href='javascript:;' onclick=removeAttr(this)>[-]</a>";
			}else{
				$html.="<a href='javascript:;' onclick=addAttr(this)>[+]</a>";
			}	
		}else{
			//类型属性id作为name
			$name=$v['attr_id'].'[][]';
			$html="<textarea name='$name'>".$value."</textarea>";
		}
		$recordAttrId[]=$v['attr_id'];
		return $html;
	}
	/**
	 * 编辑
	 *商品副表goods_attr
	 */
	public function saveAttr($goods_gid)
	{
		return $this->addAttr($goods_gid);
	}
	/**
	 * 添加
	 *type为0表示添加，为1表示修改
	 */
	public function addAttr($goods_gid)
	{
		$data=array();
		foreach ($_POST as $kk=>$v) {
			if (is_array($v)) {
				foreach ($v as $k => $value) {
					if (is_array($value)) {
						if (trim($k)=='attr_price') {
							foreach ($value as $key => $val) {
								$data[]=array(
										'attr_id'=>$kk,
										'attr_value'=>$v[$key],
										'goods_gid'=>$goods_gid,
										'attr_price'=>$val,
									);
							}
						}else{
							$data[]=array(
								'attr_id'=>$kk,
								'attr_value'=>$value[0],
								'goods_gid'=>$goods_gid,
								'attr_price'=>null,
							);
						}	
					}
				}
			}
		}
	/**
	 * 检测数据，为空的去掉
	 *判断是规格属性还是普通，规格可以重复
	 */
	foreach ($data as $k => $v) {
		/**
		 * 属性值为空的不压入
		 */
		// if (empty($v['attr_value'])) continue;

		/**
		 * 获得属性类型 1规格 0普通
		 */
		$attr_type=M('attribute')->where("attr_id={$v['attr_id']}")->getField('attr_type');
		$map['goods_gid']=$goods_gid;
		$map['attr_id']=$v['attr_id'];
		/**
		 * 规格属性的可以多个
		 *加条件attr_value
		 *防止操作导致重复，记录
		 */
		static $record=array();
		if ($attr_type==1) {
			if (in_array($v['attr_value'],$record )) continue;
			$map['attr_value']=$v['attr_value'];
			$record[]=$v['attr_value'];
		}
		$id=$this->where($map)->getField('id');
		if ($id) {
			$data[$k]['id']=$id;
		}else{
			$data[$k]=$v;
		}
	}
	/**
	 * 删除原有的
	 */
	$this->where("goods_gid=$goods_gid")->del();
	/**
	 * 批量添加
	 */
	if (!$data) return;
		foreach ($data as  $v) {
			/**
			 * 属性值为空不添加
			 */
			if (empty($v['attr_value'])) continue;
			if (!$this->add($v)) {
				$this->error="商品属性添加失败";
			}
		}
		return true;
	}
	
}

 ?>