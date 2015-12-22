<?php 

class GoodsGalleryModel extends Model{
	public $table='goods_gallery';
	/**
	 * 删除商品图片$id goods_gallery_id
	 *编辑时单张图片
	 */
	public function delImg($id)
	{
		$data=current($this->all($id));
		is_file($data['img_url']) and unlink($data['img_url']);
		is_file($data['thumb_url']) and unlink($data['thumb_url']);
		is_file($data['img_original']) and unlink($data['img_original']);
		return $this->del($id);
	}
	/**
	 * 批量删除图片
	 *$goods_id商品id
	 */
	public function delAllImg($goods_gid)
	{
		$imgs=$this->where("goods_gid=$goods_gid")->all();
		foreach ($imgs as $k => $val) {
			is_file($val['img_url']) and unlink($val['img_url']);
			is_file($val['thumb_url']) and unlink($val['thumb_url']);
			is_file($val['img_original']) and unlink($val['img_original']);
			$this->where("goods_gid=$goods_gid")->del();
		}
		return true;
	}
}

 ?>