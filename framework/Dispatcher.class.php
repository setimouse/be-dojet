<?php
class Dispatcher {

    /**
     * @var BaseWebService
     **/
    private $webService;

    function __construct(WebService $webService) {
        $this->webService = $webService;
        $dispatchConf = $webService->getDispatchConf();
        Config::loadConfig($dispatchConf);
    }

    public function dispatch($requestUri) {
        $routes = Config::configForKeyPath('dispatch');

        DAssert::assert(is_array($routes), 'route error');

        foreach ($routes as $routeRegx => $actionName) {
            if ( preg_match($routeRegx, $requestUri, $reg) ) {
                foreach ($reg as $key => $value) {
                    MRequest::setParam($key, $value);
                }

                $actionPath = $this->webService->getActionPath();

                $classFile = $actionPath.$actionName.'.class.php';

                DAssert::assert(file_exists($classFile),
                    'ui action does not exist', __FILE__, __LINE__);

                require_once($classFile);

                $className = basename($actionName);
                $action = new $className;

                DAssert::assert($action instanceof BaseAction,
                    'action is not BaseAction. '.$actionName);

                $action->execute();

                $this->webService->dispatchFinished();

                return ;
            }
        }

        header('HTTP/1.1 404 Not Found');

        $this->webService->dispatchFinished();
    }

}
