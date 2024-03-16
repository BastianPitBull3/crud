<?php
    require_once "config.php";

    class Database extends Config{
        //Insert user into database
        public function insert($fName, $lName, $email, $phone){
            $sql = "INSERT INTO user(first_name, last_name, email, phone) 
            VALUES(:firstName, :lastName, :email, :phone)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                "firstName" => $fName,
                "lastName" => $lName,
                "email" => $email,
                "phone" => $phone
            ]);
            return true;
        }

        public function read(){
            $sql = "SELECT * FROM user ORDER BY id DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }
    }
?>