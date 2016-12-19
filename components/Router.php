<?php

defined('_JEXEC') or die('Restricted access');

/**
 * Класс Router
 * Компонент для работы с маршрутами
 */
class Router
{

    private $uri;
    private $segments;
    private $controller;
    private $action;
    private $get;
    private $post;
    private $files;

    public function __construct()
    {
        $this->uri = Security::safe_getUri();
        $this->segments = $this->getSegments($this->uri);
        $t = $this->getControllerAndAction($this->segments);
        $this->controller = $t['controller'];
        $this->action = $t['action'];
        $this->get = $t['params']['get'];
        $this->post = $t['params']['post'];
        $this->files = $t['params']['files'];
    }

    public function getParsedURI()
    {
        return $this->segments;
    }

    public function getGet()
    {
        return $this->get;
    }

    public function getPost()
    {
        return $this->post;
    }

    public function getFiles()
    {
        return $this->files;
    }

    private function getControllerAndAction($segments)
    {
        $controllerName = 'ErrorController';
        $actionName = 'action404';
        if(!empty($segments['address']))
        {
            $adressArray = explode('/', $segments['address']);
            $numOfParts = count($adressArray);
            if($numOfParts == 1)
            {
                if($this->actionIsFounded($adressArray[0], 'Index'))
                {
                    $controllerName = ucfirst($adressArray[0]).'Controller';
                    $actionName = 'actionIndex';
                }
                elseif($this->actionIsFounded('Site', $adressArray[0]))
                {
                    $controllerName = 'SiteController';
                    $actionName = 'action'.ucfirst($adressArray[0]);
                }
            }
            elseif($numOfParts == 2 && $this->actionIsFounded($adressArray[0], $adressArray[1]))
            {
                $controllerName = ucfirst($adressArray[0]).'Controller';
                $actionName = 'action'.ucfirst($adressArray[1]);
            }
        }
        else
        {
            $controllerName = 'SiteController';
            $actionName = 'actionIndex';
        }
        return array('controller' => $controllerName, 'action' => $actionName, 'params' => $segments['params']);
    }

    private function getSegments($address)
    {
        $segments = array(
            'params' => array(
                'get' => array(),
                'post' => array(),
                'files' => array()
            ),
            'address' => '',
        );
        /* $segments['params']['get'] = array();
          $segments['params']['post'] = array();
          $segments['params']['files'] = array();
          $segments['address'] = ''; */

        $params_string = '';
        if(($pos = strpos($address, "?")) !== false)
        {
            $segments['address'] = substr($address, 0, $pos);
            $segments['address'] = trim($segments['address']);
            $params_string = substr($address, $pos);
            $params_string = str_ireplace(array('?', '/', '\\', '\'', '"', '~', '*'), '', trim($params_string));
            $params_string = trim($params_string, '&');
        }
        else
        {
            $segments['address'] = $address;
        }

        if(!empty($params_string))
        {
            parse_str($params_string, $segments['params']['get']); //$segments['params'] = $_GET;
            $segments['params']['get']['count'] = count($segments['params']['get']);
            $segments['params']['get']['param_string'] = $params_string;
        }
        $segments['params']['post'] = $_POST;
        $segments['params']['post']['count'] = count($segments['params']['post']);
        $segments['params']['files'] = $_FILES;
        return $segments;
    }

    private function controllerFileExists($controllername)
    {
        $filename = $controllername.'.php';
        $array_str = 'controllers'.PATH_SEPARATOR.'controllers/admin'.PATH_SEPARATOR.'views/layouts';
        $arr = explode(PATH_SEPARATOR, $array_str);
        foreach($arr as $val)
        {
            if(file_exists($val."/".$filename))
                return true;
        }
        return false;
    }

    private function actionIsFounded($controllername, $actionname)
    {
        $controllername = ucfirst($controllername).'Controller';
        $actionname = 'action'.ucfirst($actionname);
        if($this->controllerFileExists($controllername))
        {
            //require_once $controllername.'.php';
            $object = new $controllername;
            return method_exists($object, $actionname);
        }
        else
            return false;
    }

    private function generateBadActionError()
    {
        require_once 'ErrorController.php';
        $controller = new ErrorController();
        $controller->actionActionReturnsFalse();
    }

    public static function headerLocation($location = '/')
    {
        header("Location: $location");
    }

    public function run()
    {
        $obj = new $this->controller();
        if(!$obj->{$this->action}(array('get' => $this->get, 'post' => $this->post, 'files' => $this->files)))
        {
            $this->generateBadActionError();
        }
    }

}
