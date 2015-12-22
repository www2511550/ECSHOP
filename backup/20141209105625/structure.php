<?php if(!defined('HDPHP_PATH'))EXIT;
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."access`");
$db->exe("CREATE TABLE `".$db_prefix."access`".$db_prefix." (
  `".$db_prefix."rid`".$db_prefix." int(11) DEFAULT NULL,
  `".$db_prefix."nid`".$db_prefix." int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."access1`");
$db->exe("CREATE TABLE `".$db_prefix."access1`".$db_prefix." (
  `".$db_prefix."aid`".$db_prefix." int(11) NOT NULL AUTO_INCREMENT,
  `".$db_prefix."rid`".$db_prefix." int(11) DEFAULT NULL,
  `".$db_prefix."module`".$db_prefix." char(30) DEFAULT NULL,
  `".$db_prefix."controller`".$db_prefix." char(30) DEFAULT NULL,
  `".$db_prefix."action`".$db_prefix." char(30) DEFAULT NULL,
  PRIMARY KEY (`".$db_prefix."aid`".$db_prefix.")
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."address`");
$db->exe("CREATE TABLE `".$db_prefix."address`".$db_prefix." (
  `".$db_prefix."address_id`".$db_prefix." mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '地址主键',
  `".$db_prefix."uid`".$db_prefix." mediumint(9) DEFAULT NULL,
  `".$db_prefix."address_order`".$db_prefix." varchar(25) DEFAULT NULL COMMENT '地址收货人',
  `".$db_prefix."address`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '收货地址',
  `".$db_prefix."address_tel`".$db_prefix." char(15) DEFAULT NULL COMMENT '地址电话',
  `".$db_prefix."is_default`".$db_prefix." tinyint(4) DEFAULT NULL COMMENT '是否是默认地址',
  PRIMARY KEY (`".$db_prefix."address_id`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='收货地址'");
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8");
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
  `".$db_prefix."cat_id`".$db_prefix." smallint(6) DEFAULT NULL COMMENT '商品类型id',
  PRIMARY KEY (`".$db_prefix."cid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."config`");
$db->exe("CREATE TABLE `".$db_prefix."config`".$db_prefix." (
  `".$db_prefix."id`".$db_prefix." smallint(5) NOT NULL AUTO_INCREMENT,
  `".$db_prefix."title`".$db_prefix." varchar(255) DEFAULT NULL,
  `".$db_prefix."name`".$db_prefix." varchar(45) DEFAULT NULL,
  `".$db_prefix."value`".$db_prefix." varchar(255) DEFAULT NULL,
  `".$db_prefix."type`".$db_prefix." enum('textarea','radio','text') DEFAULT NULL,
  `".$db_prefix."info`".$db_prefix." varchar(255) DEFAULT NULL,
  `".$db_prefix."isshow`".$db_prefix." tinyint(4) DEFAULT NULL,
  `".$db_prefix."orderlist`".$db_prefix." smallint(255) DEFAULT NULL,
  PRIMARY KEY (`".$db_prefix."id`".$db_prefix.")
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8");
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
  `".$db_prefix."is_index`".$db_prefix." tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否放在首页',
  `".$db_prefix."is_recover`".$db_prefix." tinyint(4) DEFAULT '0' COMMENT '1放入回收站',
  `".$db_prefix."market_price`".$db_prefix." decimal(9,2) DEFAULT NULL COMMENT '市场售价',
  `".$db_prefix."goods_price`".$db_prefix." decimal(9,2) DEFAULT NULL COMMENT '商城售价',
  `".$db_prefix."is_on_sale`".$db_prefix." tinyint(4) DEFAULT NULL COMMENT '是否上架',
  `".$db_prefix."brand_bid`".$db_prefix." smallint(5) unsigned DEFAULT NULL COMMENT '品牌id',
  `".$db_prefix."category_cid`".$db_prefix." smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`".$db_prefix."goods_id`".$db_prefix."),
  KEY `".$db_prefix."fk_goods_brand1_idx`".$db_prefix." (`".$db_prefix."brand_bid`".$db_prefix."),
  KEY `".$db_prefix."fk_goods_category1_idx`".$db_prefix." (`".$db_prefix."category_cid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='商品'");
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
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=utf8 COMMENT='商品属性表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."goods_data`");
$db->exe("CREATE TABLE `".$db_prefix."goods_data`".$db_prefix." (
  `".$db_prefix."gd_id`".$db_prefix." mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '副表id',
  `".$db_prefix."goods_key`".$db_prefix." varchar(100) DEFAULT NULL COMMENT '副表关键字',
  `".$db_prefix."goods_desc`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '副表描述',
  `".$db_prefix."goods_body`".$db_prefix." text COMMENT '商品详情',
  `".$db_prefix."goods_gid`".$db_prefix." mediumint(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`".$db_prefix."gd_id`".$db_prefix."),
  KEY `".$db_prefix."fk_goods_data_goods1_idx`".$db_prefix." (`".$db_prefix."goods_gid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='商品副表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."goods_gallery`");
$db->exe("CREATE TABLE `".$db_prefix."goods_gallery`".$db_prefix." (
  `".$db_prefix."goods_gallery_id`".$db_prefix." mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品图片id',
  `".$db_prefix."img_url`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '大图',
  `".$db_prefix."thumb_url`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '小图',
  `".$db_prefix."img_original`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '原图',
  `".$db_prefix."goods_gid`".$db_prefix." mediumint(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`".$db_prefix."goods_gallery_id`".$db_prefix."),
  KEY `".$db_prefix."fk_goods_gallery_goods1_idx`".$db_prefix." (`".$db_prefix."goods_gid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=177 DEFAULT CHARSET=utf8 COMMENT='商品图片'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."goods_type`");
$db->exe("CREATE TABLE `".$db_prefix."goods_type`".$db_prefix." (
  `".$db_prefix."cat_id`".$db_prefix." int(11) NOT NULL AUTO_INCREMENT COMMENT '类型id',
  `".$db_prefix."cat_name`".$db_prefix." varchar(45) DEFAULT NULL COMMENT '类型名',
  PRIMARY KEY (`".$db_prefix."cat_id`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."node`");
$db->exe("CREATE TABLE `".$db_prefix."node`".$db_prefix." (
  `".$db_prefix."nid`".$db_prefix." int(11) NOT NULL AUTO_INCREMENT,
  `".$db_prefix."name`".$db_prefix." char(30) DEFAULT NULL,
  `".$db_prefix."title`".$db_prefix." varchar(100) DEFAULT NULL,
  `".$db_prefix."pid`".$db_prefix." int(11) DEFAULT NULL,
  `".$db_prefix."level`".$db_prefix." tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`".$db_prefix."nid`".$db_prefix.")
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."order_goods`");
$db->exe("CREATE TABLE `".$db_prefix."order_goods`".$db_prefix." (
  `".$db_prefix."order_goods_id`".$db_prefix." mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '订单列表id',
  `".$db_prefix."goods_name`".$db_prefix." varchar(45) DEFAULT NULL COMMENT '商品名称',
  `".$db_prefix."goods_price`".$db_prefix." decimal(9,0) DEFAULT NULL COMMENT '本店售价',
  `".$db_prefix."market_price`".$db_prefix." decimal(9,0) DEFAULT NULL COMMENT '市场价',
  `".$db_prefix."goods_number`".$db_prefix." int(11) DEFAULT NULL COMMENT '购买数量',
  `".$db_prefix."goods_attr`".$db_prefix." varchar(105) DEFAULT NULL COMMENT '商品属性',
  `".$db_prefix."goods_sn`".$db_prefix." int(11) DEFAULT NULL COMMENT '商品货号',
  `".$db_prefix."order_id`".$db_prefix." smallint(6) NOT NULL COMMENT '订单id',
  `".$db_prefix."goods_gid`".$db_prefix." mediumint(8) unsigned NOT NULL COMMENT '商品id',
  `".$db_prefix."goods_img`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '商品图片',
  `".$db_prefix."total_price`".$db_prefix." decimal(10,0) DEFAULT NULL COMMENT '小计',
  `".$db_prefix."order_goods_status`".$db_prefix." tinyint(4) DEFAULT '0' COMMENT '订单列表状态 0待付款 1已付款 2取消订单',
  PRIMARY KEY (`".$db_prefix."order_goods_id`".$db_prefix."),
  KEY `".$db_prefix."fk_order_goods_order1_idx`".$db_prefix." (`".$db_prefix."order_id`".$db_prefix."),
  KEY `".$db_prefix."fk_order_goods_goods1_idx`".$db_prefix." (`".$db_prefix."goods_gid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."orders`");
$db->exe("CREATE TABLE `".$db_prefix."orders`".$db_prefix." (
  `".$db_prefix."order_id`".$db_prefix." smallint(6) NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `".$db_prefix."order_sn`".$db_prefix." int(11) DEFAULT NULL COMMENT '订单号',
  `".$db_prefix."user_id`".$db_prefix." smallint(6) DEFAULT NULL COMMENT '用户id',
  `".$db_prefix."consignee`".$db_prefix." varchar(25) DEFAULT NULL COMMENT '收货人',
  `".$db_prefix."address`".$db_prefix." varchar(250) DEFAULT NULL COMMENT '收货地址',
  `".$db_prefix."amount`".$db_prefix." int(11) DEFAULT NULL COMMENT '价格总计',
  `".$db_prefix."order_status`".$db_prefix." tinyint(4) DEFAULT '0' COMMENT '订单状态',
  `".$db_prefix."add_time`".$db_prefix." int(11) DEFAULT NULL COMMENT '生成时间',
  `".$db_prefix."tel`".$db_prefix." char(15) DEFAULT NULL COMMENT '电话',
  `".$db_prefix."order_note`".$db_prefix." varchar(255) DEFAULT NULL COMMENT '备注',
  `".$db_prefix."goods_gid`".$db_prefix." mediumint(8) unsigned NOT NULL COMMENT '商品id',
  `".$db_prefix."is_fapiao`".$db_prefix." tinyint(4) DEFAULT '0' COMMENT '是否开发票',
  PRIMARY KEY (`".$db_prefix."order_id`".$db_prefix."),
  KEY `".$db_prefix."fk_order_goods1_idx`".$db_prefix." (`".$db_prefix."goods_gid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."product`");
$db->exe("CREATE TABLE `".$db_prefix."product`".$db_prefix." (
  `".$db_prefix."product_id`".$db_prefix." int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `".$db_prefix."goods_attr`".$db_prefix." char(50) DEFAULT NULL COMMENT '属性ID组合',
  `".$db_prefix."product_sn`".$db_prefix." varchar(45) DEFAULT NULL COMMENT '货号',
  `".$db_prefix."product_number`".$db_prefix." smallint(6) DEFAULT NULL COMMENT '库存数量',
  `".$db_prefix."goods_gid`".$db_prefix." int(10) unsigned NOT NULL COMMENT '商品ID',
  PRIMARY KEY (`".$db_prefix."product_id`".$db_prefix."),
  KEY `".$db_prefix."fk_product_goods1_idx`".$db_prefix." (`".$db_prefix."goods_gid`".$db_prefix.")
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='货品表'");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."role`");
$db->exe("CREATE TABLE `".$db_prefix."role`".$db_prefix." (
  `".$db_prefix."rid`".$db_prefix." int(11) NOT NULL AUTO_INCREMENT,
  `".$db_prefix."rname`".$db_prefix." char(30) DEFAULT NULL,
  PRIMARY KEY (`".$db_prefix."rid`".$db_prefix.")
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."user`");
$db->exe("CREATE TABLE `".$db_prefix."user`".$db_prefix." (
  `".$db_prefix."uid`".$db_prefix." int(11) NOT NULL AUTO_INCREMENT,
  `".$db_prefix."username`".$db_prefix." char(30) DEFAULT NULL,
  `".$db_prefix."password`".$db_prefix." char(32) DEFAULT NULL,
  PRIMARY KEY (`".$db_prefix."uid`".$db_prefix.")
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8");
$db->exe("DROP TABLE IF EXISTS `".$db_prefix."user_role`");
$db->exe("CREATE TABLE `".$db_prefix."user_role`".$db_prefix." (
  `".$db_prefix."uid`".$db_prefix." int(11) DEFAULT NULL,
  `".$db_prefix."rid`".$db_prefix." int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8");
