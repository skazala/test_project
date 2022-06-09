<?php
class Search extends Dbh {

    public function getCustomersByName($name) {
        
        $query = $this->connect()->prepare('SELECT * FROM customers WHERE name = ? ORDER BY surname ASC;');
        $query->execute(array($name));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = null;

        return $result;
    }

    public function getCustomersBySurname($surname) {
        
        $query = $this->connect()->prepare('SELECT * FROM customers WHERE surname = ? ORDER BY name ASC;');
        $query->execute(array($surname));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = null;

        return $result;
    }

    public function getCustomerByCardNumber($cardnumber) {
        $query = $this->connect()->prepare('SELECT name, surname, email, address, phone, date_of_registration FROM customers JOIN loyalty_cards ON loyalty_cards.customer_id = customers.id WHERE loyalty_cards.number = ?;');
        $query->execute(array($cardnumber));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = null;
        
        return $result;
    }
}