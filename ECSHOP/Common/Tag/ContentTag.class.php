<?php 
/**
 * 使用前配置项中开启自定义标签
 */
class ContentTag{
	/**
	 * 设置 block 标签为块标签，支持四层嵌套
	 */
	public $tag = array(
		'category' => array('block' => 1, 'level' => 4),
	);
	/**
	 * 首页分类图片展示,头三张css样式不同
	 * @param  [type] $attr    [行内属性]
	 * @param  [type] $content [标签内的内容]
	 * @return [type]          [description]
	 */
	public function _category($attr,$content)
	{
		$pid=$attr['pid'];
		$row=isset($attr['row'])?$attr['row']:6;

		$php='';
		$php.="<?php
				\$pid='$pid';
				\$row='$row';
				\$data=K('Goods')->limit(\$row)->where('is_index=1')->getAll(\$pid);
				foreach (\$data as \$k=>\$field){
					\$url=U('Index/Index/detail',array('goods_id'=>\$field['goods_id']));
				?>";
		
		$php.=$content;
		$php.='<?php  }; ?>';
		return $php;

	}

}


?>