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

        //Fetch single user from database
        public function readOne($id){
            $sql = "SELECT * FROM user WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(["id" => $id]);
            $result = $stmt->fetch();
            return $result;
        }

        //Update single user
        public function update($id, $fName, $lName, $email, $phone){
            $sql = "UPDATE user SET first_name = :firstName, last_name = :lastName, 
                    email = :email, phone = :phone WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                "id" => $id,
                "firstName" => $fName,
                "lastName" => $lName,
                "email" => $email,
                "phone" => $phone
            ]);
            return true;
        }

        //Delete user from database
        public function delete($id){
            $sql = "DELETE FROM user WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(["id" => $id]);
            return true;
        }
    }
?>