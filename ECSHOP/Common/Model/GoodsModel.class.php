<?php 

class GoodsModel extends Model{
	public $table='goods';
	/**
	 * 自动验证
	 */
	public $validate=array(
		array('goods_name','nonull','商品名称不能为空',2,3),
	);
	/**
	 * 自动转换时间
	 */
	public $auto=array(
		array('sale_time','strtotime','function',2,3),
	);
	/**
	 * 获得所有商品 
	 */
	public function getAll($pid=null)
	{
		if ($pid) {
			$data=$this->join('__goods__ g LEFT join __category__ c on g.category_cid=c.cid')->
			where("pid=$pid")->order(" goods_id desc")->all();
			return $data;
		}
		$data=$this->join('__goods__ g LEFT join __category__ c on g.category_cid=c.cid')->order(" goods_id desc")->all();
		return $data;
	}
	/**
	 * 商品分页 
	 */
	public function getPageList($recover=null)
	{
		if ($goods_type=Q('cat_id',0,'intval')) {
			$map['goods_type']=array('EQ',$goods_type);
			$page = new Page($this->where($map)->count(),5);
		}else{
			if ($recover) {
				$map['is_recover']=array('EQ',$recover);//回收站商品
			}else{
				$map['is_recover']=array('EQ',0);//去掉回收站商品
			}
			$page = new Page($this->where($map)->count(),5);
		}
		
		$data=$this->where($map)->join('__goods__ g LEFT join __category__ c on g.category_cid=c.cid')->limit($page->limit())->order(" goods_id desc")->all();
		int_to_string($data,array('is_on_sale'=>array('0'=>'下架','1'=>'上架')));
		return array('data'=>$data,'page'=>$page->show());
	}
	//删除首页图片
	public function delIndexImg($goods_id)
	{
		$img=$this->find($goods_id);
		is_file($img['goods_img']) and unlink($img['goods_img']);
		is_file($img['original_img']) and unlink($img['original_img']);
		is_file($img['goods_thumb']) and unlink($img['goods_thumb']);
		$data=array(
			'goods_id'=>$goods_id,
			'goods_img'=>null,
			'original_img'=>null,
			'goods_thumb'=>null,
			);
		return $this->save($data);
		
	}
	/**
	 * 添加商品
	 */
	public function addGoods()
	{
		if ($this->create()) {		
			if ($goods_gid=$this->add()) {
				//添加到副表
				$_POST['goods_gid']=$goods_gid;
				M('goods_data')->add();
				//处理首页列表图片
				$this->updateOriginalImg($goods_gid);
				//添加到商品图片表
				$this->updateGoodsGallery($goods_gid);
				//添加到商品属性表goods_attr
				K('GoodsAttr')->addAttr($goods_gid);
				return true;
			}else{
				$this->error='添加商品失败';
			}
		}
	}
	//删除商品
	public function delGoods()
	{
		$goods_id=Q('goods_id',0,'intval');
		if (!$goods_id) {
			$this->error='商品不存在';
			return false;
		}
		if ($this->del($goods_id)) {
			//删除商品副表的数据goods_data
			M('goods_data')->where("goods_gid=$goods_id")->del();
			//删除goods_gallery表的数据
			K('GoodsGallery')->delAllImg($goods_id);
			//删除属性表对应的值goods_attr
			K('GoodsAttr')->delAttr($goods_id);
			return true;
		}else{
			$this->error='删除失败';
		}
	}
	/**
	 * 编辑商品
	 */
	public function editGoods()
	{
		Q('post.is_new',0,'intval');
		Q('post.is_hot',0,'intval');
		Q('post.is_best',0,'intval');
		Q('post.is_index',0,'intval');//对付check没选中的,空
		if ($this->create()) {	
			if ($this->save()) {
				$goods_gid=Q('goods_id',0,'intval');
				// 添加到副表
				M('goods_data')->save();
				//处理首页列表图片
				$this->updateOriginalImg($goods_gid);
				//更新商品图片表
				$this->updateGoodsGallery($goods_gid);
				//添加到商品属性表goods_attr
				K('GoodsAttr')->saveAttr($goods_gid);
				return true;
			}else{
				$this->error='编辑商品失败';
			}
		}
	}
	/**
	 * 更新商品图片表(详情页)
	 *$gid为与商品关联的键
	 */
	private function updateGoodsGallery($gid)
	{
		$upload=new Upload('Upload/goods_gallery/'.date('Y/m/d'));
		$img=new Image();
		$file=$upload->upload('img_original');

		foreach ($file as  $v) {
			//详情页小图
			$minImg=$v['dir'].$v['filename'].'_min_55x55.'.$v['ext'];
			//详情页大图
			$bigImg=$v['dir'].$v['filename'].'_max_428x428.'.$v['ext'];
			//生成对应所缩略图
			$img->thumb($v['path'],$minImg,55,55,6);
			$img->thumb($v['path'],$bigImg,428,428,6);
			$data=array(
				'goods_gid'=>$gid,//
				'img_original'=>$v['path'],//原图
				'img_url'=>$bigImg,//大图
				'thumb_url'=>$minImg,//小图
			);
			M('goods_gallery')->add($data);	
		}
		return true;
	}
	/**
	 * 更新商品首页图片
	 *$gid为商品ID
	 */
	private function updateOriginalImg($gid)
	{
		/**
		 * 没有图片或者图片上传错误直接返回
		 */
		if($_FILES['original_img']['error']!=0)return;
		$upload=new Upload('Upload/goods/'.date('Y/m/d'));
		$file=$upload->upload('original_img');
		//上传失败，直接返回
		if (empty($file))return;
		$file=current($file);
		//生成首页图片(路径)
		$indexImg=$file['dir'].$file['filename'].'_index_'.C('INDEX_WIDTH').'x'.C('INDEX_HEIGHT').'.'.$file['ext'];
		//生成列表页图片(路径)
		$listImg=$file['dir'].$file['filename'].'_list_'.C('LIST_WIDTH').'x'.C('LIST_HEIGHT').'.'.$file['ext'];
		/**
		 * 生成缩略图
		 *目前尺寸是写死，到时候配置项改
		 */
		$img = new 	Image();
		$img->thumb($file['path'],$indexImg,C('INDEX_WIDTH'),C('INDEX_HEIGHT'),6);
		$img->thumb($file['path'],$listImg,C('LIST_WIDTH'),C('LIST_HEIGHT'),6);
		//更新
		$data=array(
			'goods_id'=>$gid,//更新需要id
			'original_img'=>$file['path'],//原图
			'goods_img'=>$indexImg,//首页图片
			'goods_thumb'=>$listImg,//列表页图片
		);
		return M('goods')->save($data);
	}



}


 ?>