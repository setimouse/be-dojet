<?php
/**
 * AgileDispatcher
 *
 * @author leeyan (setimouse@gmail.com)
 * @since 2014 7 15
 */
class AgileDispatcher implements IDispatcher {

    /**
     * @var BaseWebService
     **/
    private $webService;

    function __construct(WebService $webService) {
        $this->webService = $webService;
    }

    public function dispatch($requestUri) {

        $urlInfo = parse_url($requestUri);
        $path = trim($urlInfo['path'], "/");

        do {
            if ('' === $path) {
                $ui = 'index.php';
                $func = 'index';
                $segs = array();
            } else {
                $segs = explode('/', $path);
                $ui = array_shift($segs);
                $phpfile = UI.$ui.'.php';
                if (!file_exists($phpfile)) {
                    break;
                }
                require $phpfile;
                $func = $ui.'_'.$segs[0];
                if (function_exists($func)) {
                    array_shift($segs);
                } else {
                    $func = 'index';
                }
            }

            if (!function_exists($func)) {
                break;
            }

            $query = array();
            if (isset($urlInfo['query'])) {
                $query = $urlInfo['query'];
            }

            parse_str($query, $get);
            $param_arr = array($segs, $get);
            call_user_func_array($func, $param_arr);

            return;
        } while (false);

        header('HTTP/1.1 404 Not Found');

    }

}
