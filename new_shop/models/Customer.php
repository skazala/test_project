<?php
class Customer {

    private $name;
    private $surname;
    private $email;
    private $address;
    private $phone;
    private $dor;

    public function __construct($name, $surname, $email, $address, $phone) {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->address = $address;
        $this->phone = $phone;
        $this->dor = date('Y-m-d');
    }

    public function setCustomer() {
    
        $query = Dbh_static::$connection->prepare('INSERT INTO customers (name, surname, email, address, phone, date_of_registration) VALUES (?, ?, ?, ?, ?, ?);');
        $query->execute(array($this->name, $this->surname, $this->email, $this->address, $this->phone, $this->dor));
        $query = null;
    }

    public static function getCustomersByName($name) {
        
        $query = Dbh_static::$connection->prepare('SELECT * FROM customers WHERE name = ? ORDER BY surname ASC;');
        $query->execute(array($name));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = null;

        return $result;
    }

    public static function getCustomersBySurname($surname) {
        
        $query = Dbh_static::$connection->prepare('SELECT * FROM customers WHERE surname = ? ORDER BY name ASC;');
        $query->execute(array($surname));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = null;

        return $result;
    }

    public static function getCustomerByCardNumber($cardnumber) {
        $query = Dbh_static::$connection->prepare('SELECT name, surname, email, address, phone, date_of_registration FROM customers JOIN loyalty_cards ON loyalty_cards.customer_id = customers.id WHERE loyalty_cards.number = ?;');
        $query->execute(array($cardnumber));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = null;
        
        return $result;
    }

    public static function countCustomers() {
        
        $query = Dbh_static::$connection->query('SELECT COUNT(*) FROM customers;');
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $count = $result['COUNT(*)'];
        $query = null;
    
        return $count;  
    }   

    public static function getAllCustomers() {
        
        $query = Dbh_static::$connection->query('SELECT * FROM customers ORDER BY name ASC;');
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = null;
    
        return $result;  
    }

    public static function getTop10Customers() {
        
        $query = Dbh_static::$connection->query('SELECT SUM(total_price) AS money_spent, customers.name AS name, 
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