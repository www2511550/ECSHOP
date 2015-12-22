/*
详情页图片追加
*/
$('.detail_add').live('click',function() {
	var tr='<tr class="detail_tr">\
		 			<th class="w100">详情页图片</th>\
		 			<td>\
		 				<a href="javascript:;" class="detail_del">[-]</a>\
		 				<input type="file" name="img_original[]">\
		 			</td>\
		 		</tr>';
	$('#img>table').prepend(tr);
});
$('.detail_del').live('click',function() {
	$(this).parents('.detail_tr').remove();
})
/*
编辑时异步改变属性的值，弥补GoodsAttrModel.class.php中
if ($attr_type==1) {
	$map['attr_value']=$v['attr_value'];
}
	$id=$this->where($map)->getField('id');
存在的问题(修改后获得不到原来的id)
*/
function attrValue (obj,id) {
	var value=$(obj).val()?$(obj).val():$(obj).text();
	$.ajax({
		url:CONTROLLER+'&a=goodsAttrValue',
		data:{id:id,value:value},
		type:'POST',
		dataType:'JSON',
		success:function(json) {
			
		}
	})
}
/*
再添加一行属性
*/
function addAttr (obj) {
	var tr=$(obj).parents('tr').eq(0).clone();
	tr.find('a').attr('onclick','removeAttr(this)').html('[-]');
	tr.find('input').eq(0).attr('onkeyup','');
	tr.find('textarea').eq(0).attr('onkeyup','');
	tr.find('select').eq(0).attr('onchange','');
	$(obj).parents('tr').eq(0).after(tr);
}
/*
移除一行
*/
function removeAttr (obj) {
	$(obj).parents('tr').eq(0).remove();
}
//添加商品属性
function GoodsAttr () {
	var a=$("[name='goods_type']").val();
	if (!a) return;
	$.ajax({
		url:CONTROLLER+'&a=getGoodsAttr',
		data:{cat_id:a,url:URL},
		type:'POST',
		success:function(html) {
			$('.attr').html(html);///html取代原来的
		}
	})
}

/*
编辑时删除图片
*/
function  delImg(obj,img_id) {
	var gallery_id=img_id;
	if(confirm('确定要删除？')){
		$.ajax({
			url:CONTROLLER+'&a=delImg',
			data:{img_id:gallery_id},
			type:'POST',
			success:function(msg) {
				if (msg) {
					$(obj).parents('tr').remove();
				}else{
					alert('删除失败');
				}
			}
		})	
	}	
}

//删除首页图片
function delIndexImg (obj,index_img) {
	var goods_id=index_img;
	if(confirm('确定要删除？')){
		$.ajax({
			url:CONTROLLER+'&delIndexImg',
			data:{goods_id:goods_id},
			type:'POST',
			success:function(msg) {
				if (msg) {
					$(obj).parent('div').remove();
				}else{
					alert('删除失败');
				}
			}
		})	
	}	
}

