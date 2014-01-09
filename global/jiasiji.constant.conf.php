<?php
//  全局变量
define('C_SIGNOUT_CALLBACK', 0);    //  登出成功后直接跳转callback
define('C_SIGNIN_CALLBACK', 1);     //  登出成功后跳转到登录，在跳转到callback

//passport登录action
define('C_POSSPORT_SIGNIN_ACTION', '/signin');
//passport注销action
define('C_POSSPORT_SIGNOUT_ACTION', '/signout');

define('C_THUMB_WIDTH_300', 300);
define('C_THUMB_HEIGHT_300', 300);
define('C_THUMB_WIDTH_230', 230);
define('C_THUMB_HEIGHT_230', 230);
define('C_THUMB_WIDTH_60', 60);
define('C_THUMB_HEIGHT_60', 60);
define('C_THUMB_WIDTH_960', 960);
define('C_THUMB_WIDTH_980', 980);
define('C_THUMB_HEIGHT_500', 500);
define('C_THUMB_WIDTH_225', 225);
define('C_THUMB_HEIGHT_225', 225);
define('C_THUMB_FOLDER_PAGE_WIDTH', 160);
define('C_THUMB_FOLDER_PAGE_HEIGHT', 160);
define('C_THUMB_FOLDER_LR_PAGE_WIDTH', 120);
define('C_THUMB_FOLDER_LR_PAGE_HEIGHT', 76);
define('FIX_WIDTH_H_701', 701);
define('FIX_WIDTH_H_640', 640);
define('FIX_WIDTH_H_630', 630);
define('FIX_WIDTH_H_460', 460);
define('FIX_WIDTH_V', 422);
define('C_THUMB_WIDTH_80', 80);
define('C_THUMB_HEIGHT_80', 80);
define('C_THUMB_WIDTH_258', 258);
define('C_THUMB_HEIGHT_244', 244);
define('C_THUMB_WIDTH_132', 132);
define('C_THUMB_HEIGHT_132', 132);
define('C_THUMB_HEIGHT_69', 69);
define('C_THUMB_WIDTH_69', 69);
define('C_THUMB_WIDTH_182', 182);
define('C_THUMB_HEIGHT_72', 72);
define('C_THUMB_WIDTH_320', 320);
define('C_THUMB_HEIGHT_430', 430);

define('C_THUMB_WIDTH_306',306);
define('C_THUMB_HEIGHT_306',306);
define('C_THUMB_WIDTH_469',469);
define('C_THUMB_HEIGHT_419',419);

define('C_THUMB_WIDTH_450',450);

define('C_THUMB_WIDTH_90', 90);
define('C_THUMB_HEIGHT_115', 115);
define('C_THUMB_WIDTH_180', 180);
define('C_THUMB_HEIGHT_210', 210);

//	comment
define('C_THUMB_WIDTH_120', 120);
define('C_THUMB_HEIGHT_76', 76);

//  专题详情图片定宽
define('FIX_WIDTH_TOPIC_H', 702);
define('FIX_WIDTH_TOPIC_V', 422);

//  移动端首页大图尺寸
define('C_THUMB_MOBILE_HOMEPAGE_SLIDE_WIDTH', 640);
define('C_THUMB_MOBILE_HOMEPAGE_SLIDE_HEIGHT', 320);

//  移动端缩略图尺寸
define('C_THUMB_MOBILE_BIGIMAGE_WIDTH', 640);
define('C_THUMB_MOBILE_BIGIMAGE_HEIGHT', 860);

//图片详情页
define('C_THUMB_WIDTH_671', 671);
define('C_THUMB_HEIGHT_671', 671);
define('C_THUMB_WIDTH_341', 341);

//  移动端图片列表图片尺寸
define('C_THUMB_MOBILE_IDEALIST_SMALL_WIDTH', 110);
define('C_THUMB_MOBILE_IDEALIST_SMALL_HEIGHT', 110);
define('C_THUMB_MOBILE_IDEALIST_LARGE_WIDTH', 220);
define('C_THUMB_MOBILE_IDEALIST_LARGE_HEIGHT', 220);
define('C_THUMB_MOBILE_CLN_LIST_WIDTH', 160);
define('C_THUMB_MOBILE_CLN_LIST_HEIGHT', 160);
define('C_THUMB_MOBILE_CLN_DETAIL_WIDTH', 460);
define('C_THUMB_MOBILE_TOPIC_DETAIL_WIDTH', 215);
define('C_THUMB_MOBILE_TOPIC_DETAIL_HEIGHT', 320);

define('C_THUMB_MOBILE_HOMEPAGE_ITEM_FOLDER_WIDTH', 610);
define('C_THUMB_MOBILE_HOMEPAGE_ITEM_FOLDER_HEIGHT', 163);

//  完整抓取单品的crawl_status
define('C_CRAWL_STATUS', 0x3);

//  CMS blocks
define('C_CMS_BLOCK_HOMEPAGE_SLIDE',    'home_page_slider');  //  首页大图幻灯片
define('C_CMS_BLOCK_HOMEPAGE_RAND_SLIDE', 'home_page_rand_slide');  //  首页大图随机幻灯片
define('C_CMS_BLOCK_HOMEPAGE_POPULAR_FOLDER',     'home_page_popular_folder');   //  首页流行册子
define('C_CMS_BLOCK_HOMEPAGE_MALL_SUGG',     'home_page_mall_sugg');   //  首页商城推荐
define('C_CMS_BLOCK_HOMEPAGE_POPULAR_TOPIC',     'home_page_popular_topic');   //  首页流行专题
define('C_CMS_BLOCK_HOMEPAGE_CATEGORY', 'home_page_category');
define('C_CMS_BLOCK_HOMEPAGE_TOPIC', 'home_page_topic');
define('C_CMS_BLOCK_HOMEPAGE_FOLDER_SUBCATEGORY',     'home_page_folder_subcategory');   //  首页流行册子小分类
define('C_CMS_BLOCK_FOLDER_LIST_REC_FOLDER',     'folder_list_rec_folder');   //  册子列表的推荐册子
define('C_CMS_BLOCK_HOMEPAGE_AD_TOP',     'C_CMS_BLOCK_HOMEPAGE_AD_TOP');   //  首页大图下广告位
define('C_CMS_BLOCK_HOMEPAGE_AD_NAV',     'C_CMS_BLOCK_HOMEPAGE_AD_NAV');   //  首页大图下广告位

//  首页v2
define('C_CMS_BLOCK_HOMEPAGE_HOT_PIC_TAGS',     'home_page_hotpic_tags');   //  首页热门图片标签云
define('C_CMS_BLOCK_HOMEPAGE_HOUSE',     'home_page_house');   //  首页搭配速成
define('C_CMS_BLOCK_HOMEPAGE_JIAJU_TOP',     'home_page_jiaju_top');   //  首页优选家具顶部分类列表
define('C_CMS_BLOCK_HOMEPAGE_BIG_PIC_GENE',     'home_page_bigpic_generalize');   //  首页大图推广位
define('C_CMS_BLOCK_HOMEPAGE_BANNER',     'home_page_banner');   //  首页banner
define('C_CMS_BLOCK_HOMEPAGE_FURNITURE_LEVELONE',     'home_page_furniture_levelone');   //  首页优选家具第一层图片
define('C_CMS_BLOCK_HOMEPAGE_FURNITURE_LEVELTWO',     'home_page_furniture_leveltwo');   //  首页优选家具第二层图片
define('C_CMS_BLOCK_HOMEPAGE_EXPERIENCESHARE_TOP',     'home_page_experienceshare_top');   //  今日分享顶部文字链接
define('C_CMS_BLOCK_HOMEPAGE_EXPERIENCESHARE_FOLDER',     'home_page_experienceshare_folder');   //  首页今日经验分享图册列表
define('C_CMS_BLOCK_HOMEPAGE_BLOGROLL',     'home_page_blogroll');   //  友情链接


define('C_CMS_BLOCK_MOBILE_HOMEPAGE_SLIDE',     'C_CMS_BLOCK_MOBILE_HOMEPAGE_SLIDE');   //  移动端首页幻灯片
define('C_CMS_BLOCK_MOBILE_HOMEPAGE_STYLE',     'C_CMS_BLOCK_MOBILE_HOMEPAGE_STYLE');   //  移动端首页风格分类图片

define('C_CMS_BLOCK_MALL_HOMEPAGE_TOP', 'C_CMS_BLOCK_MALL_HOMEPAGE_TOP');
define('C_CMS_BLOCK_MALL_HOMEPAGE_TOP2', 'C_CMS_BLOCK_MALL_HOMEPAGE_TOP2');
define('C_CMS_BLOCK_MALL_ITEM_CATEGORY', 'C_CMS_BLOCK_MALL_ITEM_CATEGORY');
define('C_CMS_BLOCK_MALL_HOMEPAGE_SHOP_STYLE', 'C_CMS_BLOCK_MALL_HOMEPAGE_SHOP_STYLE');
define('C_CMS_BLOCK_MALL_ITEM_LIST', 'C_CMS_BLOCK_MALL_ITEM_LIST');
define('C_CMS_BLOCK_MALL_HOMEPAGE_SHOP_LIST_SUGG', 'C_CMS_BLOCK_MALL_HOMEPAGE_SHOP_LIST_SUGG');   //  商城首页风格家具店顶部推荐
define('C_CMS_BLOCK_MALL_HOMEPAGE_SHOP_LIST_SHOPS', 'C_CMS_BLOCK_MALL_HOMEPAGE_SHOP_LIST_SHOP');   //  商城首页风格家具店风格点列表
define('C_CMS_BLOCK_MALL_CAT_STYLE_INFO', 'C_CMS_BLOCK_MALL_CAT_STYLE_INFO');
define('C_CMS_BLOCK_MALL_CAT_THUMB', 'C_CMS_BLOCK_MALL_CAT_THUMB');
define('C_CMS_BLOCK_MALL_ITEM_FOLDER', 'mall_item_folder'); //  商城商品册子
define('C_CMS_BLOCK_MALL_SHOP_FOLDER', 'mall_shop_folder'); //  商城商品册子
define('C_CMS_BLOCK_MALL_CATEGORY_IMAGE', 'C_CMS_BLOCK_MALL_CATEGORY_IMAGE'); // 商城设置分类图片

define('C_CMS_BLOCK_FOLDER_SUGG', 'C_CMS_BLOCK_FOLDER_SUGG');   //  图册列表的2个推荐位
define('C_CMS_BLOCK_FOLDER_CATEGORY_IDEA', 'C_CMS_BLOCK_FOLDER_CATEGORY_IDEA');   //  图册列表分类-灵感图册
define('C_CMS_BLOCK_FOLDER_CATEGORY_CASE', 'C_CMS_BLOCK_FOLDER_CATEGORY_CASE');   //  图册列表分类-案例图册

define('C_CMS_BLOCK_SEO_IDEALIST_KEYWORDS', 'C_CMS_BLOCK_SEO_IDEALIST_KEYWORDS');   //  SEO 图片列表页关键词优化

define('C_CMS_BLOCK_PERSON_LIKE_STYLE', 'C_CMS_BLOCK_PERSON_LIKE_STYLE');   //  个人中心，喜欢风格和格调
define('C_CMS_BLOCK_PERSON_TOP_PIC', 'C_CMS_BLOCK_PERSON_TOP_PIC');   //  个人中心，头图设置

// define('C_CMS_BLOCK_HOMEPAGE_IDEA',     'homepage_idea');   //  首页推荐灵感
// define('C_CMS_BLOCK_HOMEPAGE_ITEM',     'homepage_item');   //  首页推荐商品
define('C_CMS_BLOCK_HOUSE_CASE', 'C_CMS_BLOCK_HOUSE_CASE'); //  户型案例
define('C_CMS_BLOCK_HOUSE_TAGS', 'C_CMS_BLOCK_HOUSE_TAGS'); //  户型案例标签
define('C_CMS_BLOCK_HIGHLIGHT_TAGS','C_CMS_BLOCK_HIGHLIGHT_TAGS');//亮点频道标签

define('C_CMS_BLOCKTYPE_NORMAL', 'normal');
define('C_CMS_BLOCKTYPE_ITEM', 'item');
define('C_CMS_BLOCKTYPE_SHOP', 'shop');

//environment
define('C_RUNTIME_EDIT', 'edit');
define('C_RUNTIME_DEV', 'dev');
define('C_RUNTIME_LOCAL', 'local');
define('C_RUNTIME_QA', 'qa');
define('C_RUNTIME_ONLINE', 'online');
define('C_RUNTIME_OFFLINE', 'offline');
define('C_RUNTIME_IMPORT_ONLINE', 'import');
define('C_RUNTIME_IMPORT_OFFLINE','import-offline');

//image server
define('C_SET_WATER', 1);
define('C_NOT_SET_WATER', 0);

//  毕老师服务器状态心跳值
define('C_TICK_OK', 'ok');
define('C_TICK_NOK', 'nok');

define('C_TICK_KEY_PREFIX', 'bj_http_status');

//  mi_img state状态
define('C_IMAGE_STATUS_UPLOAD', -1);       //  用户上传
define('C_IMAGE_STATUS_CHECKING', 0);       //  审核
define('C_IMAGE_STATUS_STORED', 1);         //  储备
define('C_IMAGE_STATUS_BAD', 2);            //  较差
define('C_IMAGE_STATUS_PUBLISHING', 3);     //  待发布
define('C_IMAGE_STATUS_OFFLINE', 5);        //  储备（已上线）
define('C_IMAGE_STATUS_PLUGINCOLLECT', 6);  //  外聘编辑收藏
define('C_IMAGE_STATUS_PUBLISHED', 10);     //  已上线

//  通用数据记录status状态
define('C_COMMON_STATUS_FRESH', 0);         //  新数据
define('C_COMMON_STATUS_BAD', 32);          //  较差
define('C_COMMON_STATUS_STORED', 64);       //  储备
define('C_COMMON_STATUS_PUBLISHING', 128);  //  待上线
define('C_COMMON_STATUS_PUBLISHED', 256);   //  已上线

// 专题状态
define('C_TOPIC_STORED', 64);
define('C_TOPIC_STATUS_PUBLISHING', 128);
define('C_TOPIC_STATUS_PUBLISHED', 256);

//  图册类型
define('C_FOLDER_TYPE_EDITOR', 0);
define('C_FOLDER_TYPE_PEOPLE', 1);
define('C_FOLDER_TYPE_UPLOAD_BY_USER', 2);

//权限
//1~100 通用权限
define('C_PERMISSION_INTERFACE_SX_TOP_NAV', 1);

//界面权限
define('C_PERMISSION_INTERFACE_SX_FG_EDIT_NEW_SEARCH', 101);
define('C_PERMISSION_INTERFACE_SX_FG_EDIT_OLD_SEARCH', 102);

//模块权限
define('C_PERMISSION_MODULE_SX_DP_CHOOSE', 101);
define('C_PERMISSION_MODULE_SX_DP_EDIT', 102);
define('C_PERMISSION_MODULE_SX_FG_CHOOSE', 103);
define('C_PERMISSION_MODULE_SX_FG_TAG', 104);
define('C_PERMISSION_MODULE_SX_FG_MARK', 105);
define('C_PERMISSION_MODULE_SX_FG_FOLDER_OR_TOPIC', 106);
define('C_PERMISSION_MODULE_SX_FG_TAG_MANAGEMENT', 107);
define('C_PERMISSION_MODULE_SX_FG_STAT', 108);
define('C_PERMISSION_MODULE_SX_FG_DESIGNER', 109);
define('C_PERMISSION_MODULE_SX_FG_TASK', 110);
define('C_PERMISSION_MODULE_SX_FG_QZONE', 111);
define('C_PERMISSION_MODULE_SX_FG_SHOP', 112);

//  专题
define('C_TOPIC_TYPE_ALL',         -1); //  全部专题
define('C_TOPIC_TYPE_HOME',         1); //  家居专题
define('C_TOPIC_TYPE_DECORATION',   2); //  装修专题

//  喜欢类型
define('C_LIKE_IDEA', 1);
define('C_LIKE_ITEM', 2);
define('C_LIKE_COLLECTION_FOLDER', 3);
define('C_LIKE_TOPIC', 4);
define('C_LIKE_FOLDER_ITEM', 5);    //  商品册子
define('C_LIKE_FOLDER_SHOP', 6);    //  店铺册子
define('C_LIKE_HOUSE', 7);          //  户型案例

/*  不能这么整，现在tagid通过tagpool获取，请参考zqbaseaction
//  prop for m.zhuqu.com
define('C_DETAIL_TAG_PROP_ID', 1);
define('C_STYLE_TAG_PROP_ID', 3);
define('C_COLOR_TAG_PROP_ID', 4);
define('C_FEATURE_TAG_PROP_ID', 5);
define('C_ZQSPECIAL_TAG_PROP_ID', 6);
define('C_SPACE_TAG_PROP_ID', 9);
define('C_ROOM_TAG_PROP_ID', 12);   //  户型
define('C_AREA_TAG_PROP_ID', 14);   //  地域
//end for m.zhuqu.com
//*/

//  prop name
define('C_DETAIL_TAG_PROP',     '细节');
define('C_STYLE_TAG_PROP',      '风格');
define('C_COLOR_TAG_PROP',      '颜色');
define('C_FEATURE_TAG_PROP',    '灵感分类');
define('C_ZQSPECIAL_TAG_PROP',  '住趣特色');
define('C_SPACE_TAG_PROP',      '空间');
define('C_ROOM_TAG_PROP',       '户型分类');   //  户型
define('C_AREA_TAG_PROP',       '地域');   //  地域

//  跳转到web端的cookie key
define('C_REDIRECT_WEB_COOKIE_KEY', '__zq_web');

//  跳转来源
define('C_WEB_FROM_KEY', 'from');
define('C_FROM_MOBILE', 'mobile');

//  登录类型
define('C_LOGIN_TYPE_KEY', 'zq_lt');
define('C_LOGIN_TYPE_WEIBO', 'weibo');
define('C_LOGIN_TYPE_QQ', 'qq');

//  腾讯openid key
define('C_COOKIE_KEY_OPEN_ID', 'openId');
define('C_COOKIE_KEY_QQ_ACCESS_TOKEN', 'qq_access_token');


//  角色id
define('C_ROLE_EDITOR', 1);
define('C_ROLE_MEMBER', 3);
define('C_ROLE_DESIGNER', 4);

define('C_DEFAULT_FOLDER_TITLE', '临时图册');

define('C_JUST_SIGNIN_SUCCESS', 'signin_succ'); //  刚刚登录成功

/* kafka常量 */

//operation code of image
define("TOPIC_IMAGE", "topic_image");
define("OC_IMAGE_ONLINE", 0x0001);  //风格图上线
define("OC_IMAGE_OFFLINE", 0x0002); //风格图下线
define("OC_IMAGE_UPDATE", 0x0003);  //风格图修改

//operation code of image-folder
define("TOPIC_IMAGEFOLDER", "topic_imagefolder");
define("OC_IMAGEFOLDER_ONLINE", 0x0001);  //图册上线
define("OC_IMAGEFOLDER_OFFLINE", 0x0002); //图册下线

//operation code of item
define("TOPIC_ITEM", "topic_item");
define("OC_ITEM_ONLINE", 0x0001); #商品上线
define("OC_ITEM_OFFLINE", 0x0002); #商品下线（包括自动删除、自动下线、人工下线）
define("OC_ITEM_BASE_INFO_CHANGE", 0x0003); #商品基础信息修改（目前包括title,approve_status,freight_payer,price,original_price,activity_type,rebate,activity_end_time,delist_time,item_img,pic_url,cover_url,tagids,extinfo,spider_shop）
define("OC_ITEM_REBATE_INFO_CHANGE", 0x0004); #商品折扣信息修改（目前包括price,original_price,activity_type,rebate,activity_end_time）
//operation code of user
define("TOPIC_USER", "topic_user");
define("OC_USER_ADDED", 0x0001); #新增用户
