<?php
class LoyaltyCard extends Dbh {

    private $type;

    public function __construct($type) {
        $this->type = $type;
    }
    
    protected function getLastNumber() {
        $query = $this->connect()->query('SELECT MAX(number) FROM loyalty_cards LIMIT 1;');
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $number = $row['MAX(number)'];
        $query = null;

        return $number;
    }

    protected function getNewCustomerId() {
        
        $query = $this->connect()->query('SELECT id FROM customers ORDER BY id DESC LIMIT 1;');
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $id = $row['id'];        
        $query = null;

        return $id;
    }

    public function setLoyaltyCard() {
        
        $number = (int)$this->getLastNumber() + 1;
        $customer_id = (int)$this->getNewCustomerId(); 
  
        $query = $this->connect()->prepare('INSERT INTO loyalty_cards (number, type, customer_id) VALUES (?, ?, ?);');
        $query->execute(array($number, $this->type, $customer_id));
        $query = null;

    }

}