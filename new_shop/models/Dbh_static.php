<?php
  class Dbh_static {

      public static $connection;

      private static $host = "localhost";
      private static $user = "Juliajulia";
      private static $pass = "dlyachteniya";
      private static $dbName = "newshop";
      
      public static function connect() {
          if (!isset(self::$connection))
            try {
              self::$connection = new PDO('mysql:host=' . self::$host . ';dbname=' . self::$dbName, self::$user, self::$pass);
            } 
            catch (PDOException $e) {
              print ("Error!: " . $e->getMessage() . "<br />");
              die();
            }
      }
  }