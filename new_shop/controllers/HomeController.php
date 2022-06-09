<?php
class HomeController extends Controller {

    public function process($params) {
        
        $this->head['title'] = 'Welcome to the home page';
        $this->head['description'] = 'This is the first page';
        $this->view = 'home';
        
    }
}