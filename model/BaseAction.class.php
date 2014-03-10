<?php
/**
 * Action基类
 *
 * @author liyan
 * @version 2012.12.24
 */
abstract class BaseAction {

    protected $_tplData;

    function __construct() {
        $this->_tplData = array();
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
        $templateFile = TEMPLATE.$template;
        DAssert::assert(file_exists($templateFile), 'template not exist. '.$template);

        $collision = extract($this->_tplData, EXTR_PREFIX_ALL, 'tpl');

        include($templateFile);
    }

    /**
     * 返回json结果
     *
     * @param MJsonRespond $jsonRespond
     */
    public function displayJson($jsonRespond) {
        $json = $jsonRespond->toJson();
        $this->assign('json', $json);
        $this->display('jsonrespond.tpl.php');
    }

    public function display404() {
        header('HTTP/1.1 404 Not Found', true);
        exit();
    }


    public abstract function execute();

}
