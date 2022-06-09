<?php
class RouterController extends Controller {

    protected $controller;

    public function process($params) {
        
        $parsedUrl = $this->parseUrl($params[0]);
        // even if $parsedUrl[0] = '' function empty($parsedUrl) does not return true! 
        if (empty($parsedUrl[0])) {
            $this->redirect('new_shop/home');
        }
        
        $controllerClass = $this->getControllerName(array_shift($parsedUrl) . 'Controller');
        // echo 'controllerClass = ' . $controllerClass;
        if (file_exists('controllers/' . $controllerClass . '.php')) {
            $this->controller = new $controllerClass;
        } else {
            $this->redirect('new_shop/error');
        }
        $this->controller->process($parsedUrl);
        $this->data['title'] = $this->controller->head['title'];
        $this->data['description'] = $this->controller->head['description'];

        // Sets the main template
        $this->view = 'layout';

        // passes messages to the template
        $this->data['messages'] = $this->getMessages();
    }

    private function parseUrl($url) {
        $parsedUrl = parse_url($url);
        $parsedUrl['path'] = ltrim($parsedUrl['path'], '/');
        $parsedUrl['path'] = trim($parsedUrl['path']);

        $explodedUrl = explode('/', $parsedUrl['path']);
        array_shift($explodedUrl); //removes the project folder's name e.g. new_shop
        // print_r ($explodedUrl);
        return $explodedUrl;
    }

    private function getControllerName($text) {
        $text = str_replace('-', ' ', $text);
        $text = ucwords($text);
        $text = str_replace(' ', '', $text);
        return $text;
    }
}