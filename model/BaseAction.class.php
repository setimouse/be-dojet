<?php
/**
 * Action基类
 *
 * @author liyan
 * @version 2012.12.24
 */
abstract class BaseAction {

    protected $_tplData;

    protected $_pageTimeSpan;
    private $_startTime;

    protected $requestUri;

    function __construct() {
        $this->_startTime = microtime(true);
        $this->_tplData = array();
        $this->requestUri = $_SERVER['REQUEST_URI'];
    }

    /**
     * 为模板变量赋值
     *
     * @param string $key
     * @param mix $value
     */
    public function assign($key, $value) {
        $this->_tplData[$key] = $value;
    }

    /**
     * 渲染模板
     *
     * @param string $template
     */
    public function display($template) {
        $tplData = $this->_tplData;
        $this->_pageTimeSpan = microtime(true) - $this->_startTime;

        if (MDict::D('is_debug')
        && Config::configForKeyPath('global.runtime') !== C_RUNTIME_ONLINE
        ) {
        	header("Content-type: text/html; charset=utf-8");
            printbr(htmlspecialchars(print_r($tplData, true)));
            printbr('========================================================');
            printbr('cache stat:');
            printbr(ZQCache::getStat());
            printbr('db query num: '.DBProxy::getQueryNum());
            printbr('insert num: '.DBProxy::getInsertNum());
            printbr('delete num: '.DBProxy::getDeleteNum());
            printbr('update num: '.DBProxy::getUpdateNum());
            printbr('select num: '.DBProxy::getSelectNum());
            printbr('total db timespan: '.sprintf("%.3fms", DBProxy::getTimeSpan() * 1000));
            printbr('page timespan: '.sprintf("%.3fms", $this->_pageTimeSpan * 1000));
            printbr('========================================================');
            printbr('query log:');
            printbr(DBProxy::getSqlLog());
            return ;
        }

        $templateFile = TEMPLATE.$template;
        Dojet::assert(file_exists($templateFile), 'template not exist. '.$template);

        $collision = extract($tplData, EXTR_PREFIX_ALL, 'tpl');

        include($templateFile);
    }

    /**
     * 返回json结果
     *
     * @param MJsonRespond $jsonRespond
     */
    public function displayJson($jsonRespond) {
        if (MDict::D('is_debug') && Config::configForKeyPath('global.runtime') !== C_RUNTIME_ONLINE) {
            printbr(htmlspecialchars(print_r($jsonRespond, true)));
        }
        $json = $jsonRespond->toJson();
        $this->assign('json', $json);
        $this->display('jsonrespond.tpl.php');
    }

    public function displayJsonInfo($errCode, $msg = null, $data = null) {
        $jsonRespond = MJsonRespond::respond($errCode, $msg, $data);
        $this->displayJson($jsonRespond);
        exit();
    }


	public function resultBox($title, $message, $backurl) {
    	$msg = array(
    	    'title' => $title,
    	    'message'   => $message,
    	    'backurl' => $backurl,
    	);
    	$this->assign('msg', $msg);
    	$this->display('resultbox.tpl.php');
    	exit();
	}

    public function display404() {
        header('HTTP/1.1 404 Not Found', true);
        exit();
    }


    public abstract function execute();

}
