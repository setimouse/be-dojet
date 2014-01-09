<?php

//  错误代码
/*  系统内部保留 0 ~ 99 */
define('E_SERVICE_UNAVAILABLE', 16);

/* json respond code 100 ~ 299 */
define('E_JSON_SUCC', 100);
define('E_JSON_FAIL', 101);

define('E_JSON_ILLEGAL_PARAM', 111);    //  输入参数错误
define('E_JSON_INTERNAL_ERROR', 112);   //  内部错误

/*  用户相关    1000 ~ 1999*/
define('E_USER_ALREADY_EXIST', 1001);
define('E_USER_SIGNUP_FAILED', 1002);
define('E_USER_SIGNED_IN',     1003);
define('E_USER_NOT_SIGNED_IN', 1004);

define('E_USER_NICK_EXIST',    1051);   //  用户昵称已存在
define('E_USER_NICK_NOT_EXIST',1052);   //  用户昵称不存在

/*  passport    2000 ~ 2999 */
define('E_SESSION_EXPIRE',      2001);
define('E_SESSION_NOT_EXIST',   2002);

/* 图片服务器 3000 - 3999*/
//error code
define('S_OK', 0);
define('E_FAIL', 3001);

//upload result code
define('E_NOT_SUPPORT_FORMAT', 3002);
define('E_FILE_TOO_LARGE', 3003);
define('E_FILE_IS_NOT_UPLOADED', 3004);
define('E_MOVE_FILE_FAILED', 3005);
define('E_UPDATE_FAILED', 3006);
define('E_INSERT_FAILED', 3007);
define('E_NO_FILE_RECEIVED', 3008);
define('E_MD5_INVALID', 3101);
define('E_FILE_NOT_EXIST', 3102);
define('E_PARAM_INVALID', 3103);
define('E_CONVERT_FAILED', 3104);
define('E_CREATE_TMP_FAILED', 3104);

//册子    4000 ~ 4099
define('E_FOLDER_EMPTY', 4001);
define('E_ADD_COLLECTION_UNSIGNED', 4010);
define('E_ADD_COLLECTION_SIGNED', 4011);

define('E_FOLDER_EXIST', 4012); //  图册（名称）已存在
define('E_HAS_COLLECT',4013);//已收藏

/* CMS 5000 ~ 9999*/
define('E_PERMISSION_DENY', 5001);  //用户权限不足
define('E_USER_NOT_EXIST_IN_CMS', 5002);    //用户不是CMS用户

define('E_PERMISSION_INSERT_FAIL', 5101);   //新增权限失败
define('E_PERMISSION_DELETE_FAIL', 5102);   //删除权限失败

define('E_ROLE_DELETE_FAIL', 5201);         //删除角色失败

define('E_USER_DELETE_FAIL', 5301);         //删除用户失败

/* spider 10000 ~ 10999 */
define('E_TAOBAO_APP_CALL_SUCCESS',10000);//API调用成功
define('E_TAOBAO_APP_CALL_LIMITED', 10001); //API调用次数达到上限
define('E_TAOBAO_ITEM_CATEGORY_ILLEGAL', 10002);    //商品分类不在白名单中
define('E_TAOBAO_ITEM_NOT_EXIST',10003);//淘宝中某个商品不存在
define('E_TAOBAO_APP_CALL_UNKNOWN_ERROR',10004);//淘宝API未知错误
define('E_MONGO_ITEM_NOT_EXIST',10005);//商品在住趣商品库中不存在
define('E_TAOBAO_ITEM_REBATE_NOT_EXIST',11000);//商品没有优惠信息
define('E_TAOBAO_ITEM_REBATE_PARSE_ERROR',11001);//优惠信息解析错误
/* web 20000 ~ 29999 */
define('E_LIKE_NOT_EXPIRED', 20001);
define('E_LIKE_ALREADY_CLICKED', 20002);
define('E_COLLECTION_ALREADY_ADDED', 20003);
define('E_NOT_LIKED',20004);//没有喜欢过

//////////////////////////////////////////////////

$__c = &Config::configRefForKeyPath('error');

$__c[E_SERVICE_UNAVAILABLE] = '功能不可用';

//  common
$__c[MResult::SUCCESS] = 'success';
$__c[MResult::FAIL] = 'fail';

//  json
$__c[E_JSON_SUCC] = 'success';
$__c[E_JSON_FAIL] = 'fail';
$__c[E_JSON_ILLEGAL_PARAM] = '请求参数非法';
$__c[E_JSON_INTERNAL_ERROR] = '内部错误';

//  user
$__c[E_USER_NOT_SIGNED_IN] = '用户未登录';

//  passport
$__c[E_SESSION_NOT_EXIST] = 'session 不存在';

//  cms
$__c[E_PERMISSION_DENY] = '权限不足';
$__c[E_PERMISSION_INSERT_FAIL] = '新增权限失败';
$__c[E_PERMISSION_DELETE_FAIL] = '删除权限失败';

//  spider
$__c[E_TAOBAO_APP_CALL_LIMITED] = '应用调用次数超限，包含调用频率超限';

//  web
$__c[E_LIKE_ALREADY_CLICKED] = '已经点过了';

//  图册
$__c[E_FOLDER_EXIST] = '图册已存在';
$__c[E_HAS_COLLECT] = '已收藏';

/* openapi 30000 ~ 30999 */

//sinweibo
define('E_SINAWEIBO_GETWEIBO', 30001);	//获取微博信息错误
define('E_SINAWEIBO_LOGIN', 30002);		//微博登陆错误	
define('E_SINAWEIBO_LOGOUT', 30003);	//微博登出错误	
define('E_SINAWEIBO_UPDATE', 30004);	//发文字微博错误	
define('E_SINAWEIBO_UPLOAD', 30005);	//发图片微博错误

unset($__c);