<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."attribute`");
$db->exe("CREATE TABLE `".$db_prefix."attribute`".$db_prefix." (
  `".$db_prefix."attr_id`".$db_prefix." int(11) NOT NULL AUTO_INCREMENT,
  `".$db_prefix."attr_name`".$db_prefix." varchar(45) DEFAULT NULL COMMENT '属性名称',
  `".$db_prefix."attr_type`".$db_prefix." tinyint(4) DEFAULT NULL COMMENT '属性类型 0 普通 1规格',
  `".$db_prefix."attr_value`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '属性值',
  `".$db_prefix."attr_input_type`".$db_prefix." tinyint(4) DEFAULT NULL COMMENT '录入方式',
  `".$db_prefix."cat_id`".$db_prefix." int(11) NOT NULL,
  PRIMARY KEY (`".$db_prefix."attr_id`".$db_prefix."),
  KEY `".$db_prefix."fk_goods_attr_goods_type1_idx`".$db_prefix." (`".$db_prefix."cat_id`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."brand`");
$db->exe("CREATE TABLE `".$db_prefix."brand`".$db_prefix." (
  `".$db_prefix."bid`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '品牌id',
  `".$db_prefix."brand_name`".$db_prefix." varchar(25) DEFAULT NULL COMMENT '品牌名称',
  `".$db_prefix."brand_logo`".$db_prefix." varchar(45) DEFAULT NULL COMMENT '品牌logo',
  `".$db_prefix."brand_order`".$db_prefix." tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`".$db_prefix."bid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."category`");
$db->exe("CREATE TABLE `".$db_prefix."category`".$db_prefix." (
  `".$db_prefix."cid`".$db_prefix." smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `".$db_prefix."cat_name`".$db_prefix." varchar(45) DEFAULT NULL COMMENT '栏目名',
  `".$db_prefix."pid`".$db_prefix." smallint(6) DEFAULT NULL COMMENT '父级id',
  `".$db_prefix."is_show`".$db_prefix." tinyint(4) DEFAULT NULL COMMENT '是否上架 0隐藏 1显示',
  `".$db_prefix."cat_key`".$db_prefix." varchar(80) DEFAULT NULL COMMENT '栏目关键字',
  `".$db_prefix."cat_desc`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '栏目描述',
  `".$db_prefix."measure_unit`".$db_prefix." varchar(8) DEFAULT NULL COMMENT '单位',
  `".$db_prefix."grade`".$db_prefix." tinyint(4) DEFAULT NULL COMMENT '价格区间',
  PRIMARY KEY (`".$db_prefix."cid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."goods`");
$db->exe("CREATE TABLE `".$db_prefix."goods`".$db_prefix." (
  `".$db_prefix."goods_id`".$db_prefix." mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `".$db_prefix."goods_name`".$db_prefix." varchar(100) DEFAULT NULL COMMENT '商品名称',
  `".$db_prefix."goods_title`".$db_prefix." char(100) DEFAULT NULL COMMENT '首页标题描述',
  `".$db_prefix."goods_index_title`".$db_prefix." varchar(100) DEFAULT NULL COMMENT '首页标题''_''拆分',
  `".$db_prefix."goods_sn`".$db_prefix." varchar(50) DEFAULT NULL COMMENT '商品货号',
  `".$db_prefix."goods_type`".$db_prefix." int(10) DEFAULT NULL COMMENT '商品类型',
  `".$db_prefix."goods_weight`".$db_prefix." mediumint(9) DEFAULT NULL COMMENT '商品重量',
  `".$db_prefix."weight_unit`".$db_prefix." varchar(25) DEFAULT NULL COMMENT '重量单位',
  `".$db_prefix."goods_img`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '商品图片',
  `".$db_prefix."original_img`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '首页原图',
  `".$db_prefix."sale_time`".$db_prefix." int(10) DEFAULT NULL COMMENT '上架时间',
  `".$db_prefix."goods_thumb`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '缩略图',
  `".$db_prefix."goods_number`".$db_prefix." varchar(45) DEFAULT NULL COMMENT '库存数量',
  `".$db_prefix."goods_click`".$db_prefix." mediumint(9) DEFAULT NULL COMMENT '查看次数',
  `".$db_prefix."uid`".$db_prefix." mediumint(9) DEFAULT NULL COMMENT '管理员',
  `".$db_prefix."is_hot`".$db_prefix." tinyint(4) DEFAULT NULL COMMENT '热销',
  `".$db_prefix."is_new`".$db_prefix." tinyint(4) DEFAULT NULL COMMENT '新品',
  `".$db_prefix."is_best`".$db_prefix." tinyint(4) DEFAULT NULL COMMENT '精品',
  `".$db_prefix."market_price`".$db_prefix." decimal(9,2) DEFAULT NULL COMMENT '市场售价',
  `".$db_prefix."goods_price`".$db_prefix." decimal(9,2) DEFAULT NULL COMMENT '商城售价',
  `".$db_prefix."is_on_sale`".$db_prefix." tinyint(4) DEFAULT NULL COMMENT '是否上架',
  `".$db_prefix."brand_bid`".$db_prefix." smallint(5) unsigned DEFAULT NULL COMMENT '品牌id',
  `".$db_prefix."category_cid`".$db_prefix." smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`".$db_prefix."goods_id`".$db_prefix."),
  KEY `".$db_prefix."fk_goods_brand1_idx`".$db_prefix." (`".$db_prefix."brand_bid`".$db_prefix."),
  KEY `".$db_prefix."fk_goods_category1_idx`".$db_prefix." (`".$db_prefix."category_cid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='商品'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."goods_attr`");
$db->exe("CREATE TABLE `".$db_prefix."goods_attr`".$db_prefix." (
  `".$db_prefix."id`".$db_prefix." int(11) NOT NULL AUTO_INCREMENT COMMENT '商品属性id',
  `".$db_prefix."attr_value`".$db_prefix." varchar(200) DEFAULT NULL COMMENT '商品属性值',
  `".$db_prefix."attr_price`".$db_prefix." decimal(9,0) DEFAULT NULL COMMENT '附加价格',
  `".$db_prefix."goods_gid`".$db_prefix." mediumint(8) unsigned NOT NULL COMMENT '商品id',
  `".$db_prefix."attr_id`".$db_prefix." int(11) NOT NULL,
  PRIMARY KEY (`".$db_prefix."id`".$db_prefix."),
  KEY `".$db_prefix."fk_goods_attr_goods1_idx`".$db_prefix." (`".$db_prefix."goods_gid`".$db_prefix."),
  KEY `".$db_prefix."fk_goods_attr_attribute1_idx`".$db_prefix." (`".$db_prefix."attr_id`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COMMENT='商品属性表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."goods_data`");
$db->exe("CREATE TABLE `".$db_prefix."goods_data`".$db_prefix." (
  `".$db_prefix."gd_id`".$db_prefix." mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '副表id',
  `".$db_prefix."goods_key`".$db_prefix." varchar(100) DEFAULT NULL COMMENT '副表关键字',
  `".$db_prefix."goods_desc`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '副表描述',
  `".$db_prefix."goods_body`".$db_prefix." text COMMENT '商品详情',
  `".$db_prefix."goods_gid`".$db_prefix." mediumint(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`".$db_prefix."gd_id`".$db_prefix."),
  KEY `".$db_prefix."fk_goods_data_goods1_idx`".$db_prefix." (`".$db_prefix."goods_gid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='商品副表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."goods_gallery`");
$db->exe("CREATE TABLE `".$db_prefix."goods_gallery`".$db_prefix." (
  `".$db_prefix."goods_gallery_id`".$db_prefix." mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品图片id',
  `".$db_prefix."img_url`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '大图',
  `".$db_prefix."thumb_url`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '小图',
  `".$db_prefix."img_original`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '原图',
  `".$db_prefix."goods_gid`".$db_prefix." mediumint(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`".$db_prefix."goods_gallery_id`".$db_prefix."),
  KEY `".$db_prefix."fk_goods_gallery_goods1_idx`".$db_prefix." (`".$db_prefix."goods_gid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COMMENT='商品图片'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."goods_type`");
$db->exe("CREATE TABLE `".$db_prefix."goods_type`".$db_prefix." (
  `".$db_prefix."cat_id`".$db_prefix." int(11) NOT NULL AUTO_INCREMENT COMMENT '类型id',
  `".$db_prefix."cat_name`".$db_prefix." varchar(45) DEFAULT NULL COMMENT '类型名',
  PRIMARY KEY (`".$db_prefix."cat_id`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."product`");
$db->exe("CREATE TABLE `".$db_prefix."product`".$db_prefix." (
  `".$db_prefix."product_id`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `".$db_prefix."goods_attr`".$db_prefix." char(50) DEFAULT NULL COMMENT '属性ID组合',
  `".$db_prefix."product_sn`".$db_prefix." varchar(45) DEFAULT NULL COMMENT '货号',
  `".$db_prefix."product_number`".$db_prefix." smallint(6) DEFAULT NULL COMMENT '库存数量',
  `".$db_prefix."goods_gid`".$db_prefix." int(10) unsigned NOT NULL COMMENT '商品ID',
  PRIMARY KEY (`".$db_prefix."product_id`".$db_prefix."),
  KEY `".$db_prefix."fk_product_goods1_idx`".$db_prefix." (`".$db_prefix."goods_gid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='货品表'");
