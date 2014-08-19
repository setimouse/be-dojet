<?php
/**
 * Action基类
 *
 * @author liyan
 * @version 2012.12.24
 */
abstract class BaseAction {

    protected $tplData;

    protected $arrHeader;

    function __construct() {
        $this->tplData = array();
        $this->arrHeader = array();
    }

    /**
     * 为模板变量赋值
     *
     * @param string $key
     * @param mix $value
     */
    protected function assign($key, $value) {
        $this->tplData[$key] = $value;
    }

    /**
     * 渲染模板
     *
     * @param string $template
     */
    protected function display($template) {
        $templateFile = $template;
        DAssert::assert(file_exists($templateFile), 'template not exist. '.$template);

        $collision = extract($this->tplData, EXTR_PREFIX_ALL, 'tpl');

        foreach ($this->arrHeader as $key => $value) {
            header($key.":".$value);
        }

        include($templateFile);
    }

    protected function display404() {
        header('HTTP/1.1 404 Not Found', true);
        exit();
    }

    protected function addHeader($key, $value) {
        DAssert::assert(is_string($key) && is_string($value), 'header must be string',
            __FILE__, __LINE__);
        $this->arrHeader[$key] = $value;
    }

    protected function setExpire($timestamp) {
        $gmtime = date("r", $timestamp);
        $this->addHeader('Expires', $gmtime);
    }

    abstract public function execute();

}
