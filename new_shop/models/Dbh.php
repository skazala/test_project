<?php
  class Dbh {
      private $host = "localhost";
      private $user = "Juliajulia";
      private $pass = "dlyachteniya";
      private $dbName = "newshop";
      
      protected function connect() {
          try {
            $dbh = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName, $this->user, $this->pass);
            // HERE WE CAN SET DEFAULT FETCH MODE:
            //$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $dbh;
          } 
          catch (PDOException $e) {
            print ("Error!: " . $e->getMessage() . "<br />");
            die();
          }
      }
  }