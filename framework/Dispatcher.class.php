<?php
class Dispatcher {

    public static function dispatch($requestUri) {
        $requestUri = (string)$requestUri;
        $routes = $GLOBALS['config']['dispatch'];

        DAssert::assert(is_array($routes), 'route error');

        if (false !== strpos($requestUri, 'debug/')) {
            MDict::D('is_debug', true);
            $requestUri = (string)substr($requestUri, strlen('debug/'));
        }

        if (0 === strpos($requestUri, 'preview/')) {
            MDict::D('is_preview', true);
            $requestUri = (string)substr($requestUri, strlen('preview/'));

            if (preg_match('/^(.*?)\//', $requestUri, $reg)) {
                $preview_arg = $reg[1];
                MDict::D('preview_arg', $preview_arg);
                $requestUri = (string)substr($requestUri, strlen($preview_arg));
            }
        }

        foreach ($routes as $routeRegx => $actionName) {
    		if ( preg_match($routeRegx, $requestUri, $reg) ) {
    		    for ($i = 1; $i < count($reg); $i++) {
                    RequestParam::setParam($i - 1, $reg[$i]);
                    MRequest::setParam($i - 1, $reg[$i]);
    		    }

                $classFile = UI.$actionName.'.class.php';

                DAssert::assert(file_exists($classFile), 'ui action does not exist', __FILE__, __LINE__);

                require_once($classFile);

                $className = basename($actionName);
                $action = new $className;

                DAssert::assert($action instanceof BaseAction, 'action is not BaseAction. '.$actionName);

    		    $action->execute();

    		    return ;
    		}
        }

        header('HTTP/1.1 404 Not Found');
        die();
    }

}

