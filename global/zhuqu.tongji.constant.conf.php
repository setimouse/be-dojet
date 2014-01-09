<?php
//  统计系统topic
define('C_STAT_TOPIC_ZHUQU_STAT', 'zhuqu_stat');    //  住趣统计kafka话题

//  统计系统channel
define('C_STAT_CHANNEL_ZHUQU_ALL_PV', 'zhuqu_all_pv');  //  全站pv
define('C_STAT_CHANNEL_ZHUQU_ITEMCLICK', 'zhuqu_itemclick');  //  商品点击行为渠道

//  统计项
define('C_STAT_TYPE_PV', 100);  //  pv统计
define('C_STAT_TYPE_UA', 200);  //  USERAGENT统计
define('C_STAT_TYPE_REFERER', 300);  //  referer统计
define('C_STAT_TYPE_UV', 400);  //  uv统计, user相关统计 400+
define('C_STAT_TYPE_PAGE', 500);  //  页面统计, user相关统计
define('C_STAT_TYPE_ITEM', 600);  	//  商城商品统计
define('C_STAT_TYPE_ITEM_CATEGORY', 700);  	//  商城商品分类
define('C_STAT_TYPE_ITEM_CLICK', 800);  	//  商品点击
define('C_STAT_TYPE_VISIT_DURATION', 900);  	//  访问时长
define('C_STAT_TYPE_COMMENT', 1000);  	//  评论

//  统计key
define('C_STAT_KEY_ITEM_CLICK', 'zhuqu_item_click');    //  商品点击
define('C_STAT_KEY_ITEM_CATEGORY_CLICK', 'zhuqu_item_category_click');    //  商品在分类下的点击次数
define('C_STAT_KEY_ITEM_VISIT_DURATION', 'zhuqu_visit_duration_all');    //  全站浏览平均时长

//  商品类别统计key前缀
define('C_STAT_KEYPREFIX_MALLCATEGORY', 'zhuqu_mall_category_');