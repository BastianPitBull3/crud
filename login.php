<?php
    require_once "../php/db.php";

    $db = new Database;
    $conn = $db->getConn();
    if(!empty($_POST["loginBtn"])){
        $email = $_POST["loginEmail"];
        $pwd = $_POST["loginPassword"];
        $sql = $conn->query("SELECT * FROM user WHERE email = '$email' and pwd = '$pwd'");
        if($data = $sql->fetch()){
            header("Location: crud.php");
        }else{
            echo "<p class='alert alert-danger'>The E-mail and/or Password you entered is incorrect!</p>";
        }
    }
?>