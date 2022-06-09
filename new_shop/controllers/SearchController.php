<?php
class SearchController extends Controller {

    public function process($params) {
        //HTML header
        $this->head['title'] = 'Search page';

        $this->data['result_view'] = '';

        //$this->data['result_set'] = '';

        // Was the form submitted?
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $search = new Search();
            
            switch ($_POST['search_by']) {
                case 'name':
                    
                    $this->data['result_set'] = $search->getCustomersByName($_POST['search_text']);
                    break;
                case 'surname':
                    
                    $this->data['result_set'] = $search->getCustomersBySurname($_POST['search_text']);
                    break;
                case 'card_number':    
                    
                    $this->data['result_set'] = $search->getCustomerByCardNumber($_POST['search_text']);
                    break;
            }

            $this->data['result_view'] = 'searchresults';
        }

        //Sets the template
        $this->view = 'search';
    }
    
}