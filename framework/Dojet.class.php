<?php
/**
 * MIT License
 * ===========
 *
 * Copyright (c) 2012 Leeyan <setimouse@gmail.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
 * CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @category   Dojet
 * @package    
 * @subpackage 
 * @author     Leeyan <setimouse@gmail.com>
 * @copyright  2012 Leeyan.
 * @license    http://www.opensource.org/licenses/mit-license.php  MIT License
 * @version    0.1
 * @link       http://
 */
class Dojet {

    public static function start() {
        $this->init();
        $requestUri = substr($_SERVER['REQUEST_URI'], 1);
        $dispatcher = SingletonFactory::getInstance('Dispatcher');
        $dispatcher->dispatch($requestUri);
    }

    private function init() {
        //  include global packages
        $this->load_all_packages();

        //  include configs
        $this->load_all_configs();

        ini_set('display_errors', Config::configForKeyPath('global.display_errors'));
    }

    private function load_all_configs() {
        $dir = opendir(CONFIG);
        while (false !== ($confFile = readdir($dir))) {
            if ('.' === $confFile || '..' === $confFile || substr($confFile, -9) !== '.conf.php' || $confFile=='package.conf.php') {
            	continue;
            }

            include_once(CONFIG.$confFile);
        }
    }

    private function load_all_packages() {
    	include(CONFIG."package.conf.php");
        $packages = Config::configForKeyPath('package');
        foreach ((array)$packages as $thePackage) {
        	$confFile = DGLOBAL.$thePackage.'.conf.php';
        	assert(file_exists($confFile));
        	include_once($confFile);
        }
    }


}