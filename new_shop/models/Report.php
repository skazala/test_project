<?php
class Report extends Dbh {

    public function countCards() {
  
        $query = $this->connect()->query('SELECT COUNT(*) FROM loyalty_cards;');
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $count = $row['COUNT(*)'];        
        $query = null;

        return $count;
    }

    public function countCustomers() {
        
        $query = $this->connect()->query('SELECT COUNT(*) FROM customers;');
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $count = $result['COUNT(*)'];
        $query = null;
    
        return $count;  
    }

    public function getAllCards() {

        $query = $this->connect()->query('SELECT number, type FROM loyalty_cards ORDER BY number ASC;');
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = null;
    
        return $result;  
    }

    public function getAllCustomers() {
        
        $query = $this->connect()->query('SELECT * FROM customers ORDER BY name ASC;');
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = null;
    
        return $result;  
    }

    public function getTop10Customers() {
        
        $query = $this->connect()->query('SELECT SUM(total_price) AS money_spent, customers.name AS name, 
                                        customers.surname AS surname 
                                        FROM purchases 
                                        INNER JOIN customers ON purchases.customer_id = customers.id 
                                        WHERE purchases.date BETWEEN NOW() - INTERVAL 1 MONTH AND NOW()
                                        GROUP BY purchases.customer_id ORDER BY 1 DESC LIMIT 10');
        
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = null;
    
        return $result;
    }
}