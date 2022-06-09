<?php
class ReportsController extends Controller {

    public function process($params) {
        //HTML header
        $this->head['title'] = 'Reports page';
        $this->data['count'] = '';
        $this->data['result_view'] = '';
        
        //Was the form submitted?
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $report = new Report();
            
            switch ($_POST['topic']) {
                case 'cards':
                    //get cards report
                    $this->data['count'] = 'There are ' . $report->countCards()  . ' cards in the shop.';
                    $this->data['cards'] = $report->getAllCards();

                    $this->data['result_view'] = 'allcards';
                    break;
                case 'customers':
                    //get customers report
                    $this->data['count'] = 'There are ' . $report->countCustomers() . ' customers in the shop.';
                    $this->data['customers'] = $report->getAllCustomers();
                    
                    $this->data['result_view'] = 'allcustomers';
                    break;
                case 'topten':    
                    //get top10 customers
                    $this->data['count'] = 'Top10 buyers at Crazy shop:';
                    $this->data['topten'] = $report->getTop10Customers();

                    $this->data['result_view'] = 'topten';
                    
                    break;
            }
        }
        
        //Sets the template
        $this->view = 'reports';
    }
    
}