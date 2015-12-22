<?php 
/**
 * 栏目搜索区块的属性链接
 * @param  [type] $index [s中的索引值]
 * @param  [type] $id    [商品属性id]
 * @param  [type] $value [属性值]
 * @return [type]        [description]
 */
function getAttrLink($index,$id,$value)
{
	//栏目id
	$cid=Q('cid',0,'intval');
	$s=Q('get.s','','tirm');
	$s=explode('-',$s);
	//选中
	$class=$s[$index-1]==$id?" class='dd_a1'":'';
	$s[$index-1]=$id;
	$s=implode('-', $s);
	$url=U('lists',array('cid'=>$cid,'s'=>$s));
	$html="<a href='".$url."' $class >".$value."</a>";
	return $html;
}

 ?>