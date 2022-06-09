<?php
class Customer extends Dbh{

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
    
        $query = $this->connect()->prepare('INSERT INTO customers (name, surname, email, address, phone, date_of_registration) VALUES (?, ?, ?, ?, ?, ?);');
        $query->execute(array($this->name, $this->surname, $this->email, $this->address, $this->phone, $this->dor));
        $query = null;
    }

}