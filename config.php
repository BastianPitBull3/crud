<?php
    class Config{
        private const SERVER = "localhost";
        private const USER = "root";
        private const PASSWORD = "";
        private const DATABASE = "crud";
        private const CHARSET = "utf8";

        private $dsn = "mysql:host=".self::SERVER.";dbname=".self::DATABASE.";charset=".self::CHARSET;
        protected $conn = null;

        //Method for connection to the database
        public function __construct(){
            try{
                $this->conn = new PDO($this->dsn, self::USER, self::PASSWORD);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                die("Error: ".$e->getMessage());
            }
        }
    }
?>