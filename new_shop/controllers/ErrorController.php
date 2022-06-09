<?php
class ErrorController extends Controller {

    public function process($params) {
        //HTTP header
        header('HTTP 1.0/ 404 not found');
        //HTML header
        $this->head['title'] = 'ERROR 404040404';
        //Sets the template
        $this->view = 'error';
    }
}