<?php
class Dispatcher {

    public static function dispatch($requestUri) {
        $routes = Config::configForKeyPath('dispatch');

        DAssert::assert(is_array($routes), 'route error');

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

