<?php
class LoyaltyCard {

    private $type;

    public function __construct($type) {
        $this->type = $type;
    }
    
    protected function getLastNumber() {
        $query = Dbh_static::$connection->query('SELECT MAX(number) FROM loyalty_cards LIMIT 1;');
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $number = $row['MAX(number)'];
        $query = null;

        return $number;
    }

    protected function getNewCustomerId() {
        
        $query = Dbh_static::$connection->query('SELECT id FROM customers ORDER BY id DESC LIMIT 1;');
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $id = $row['id'];        
        $query = null;

        return $id;
    }

    public function setLoyaltyCard() {
        
        $number = (int)$this->getLastNumber() + 1;
        $customer_id = (int)$this->getNewCustomerId(); 
  
        $query = Dbh_static::$connection->prepare('INSERT INTO loyalty_cards (number, type, customer_id) VALUES (?, ?, ?);');
        $query->execute(array($number, $this->type, $customer_id));
        $query = null;

    }

    public static function countCards() {
  
        $query = Dbh_static::$connection->query('SELECT COUNT(*) FROM loyalty_cards;');
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $count = $row['COUNT(*)'];        
        $query = null;

        return $count;
    }

    public static function getAllCards() {

        $query = Dbh_static::$connection->query('SELECT number, type FROM loyalty_cards ORDER BY number ASC;');
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = null;
    
        return $result;  
    }
}