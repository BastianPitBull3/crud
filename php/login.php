<?php
    require_once "../php/db.php";

    $db = new Database;
    $conn = $db->getConn();
    if(!empty($_GET["loginBtn"])){
        if(!empty($_GET["loginEmail"]) and !empty($_POST["loginPassword"])){
            echo "<p class='alert alert-danger'>E-mail and Password fields are empty!</p>";
        }else{
            $email = $_GET["loginEmail"];
            $pwd = $_GET["loginPassword"];
            $sql = $conn->query("SELECT * FROM user WHERE email = '$email' and pwd = '$pwd'");
            if($data = $sql->fetch()){
                header("Location: crud.php");
            }else{
                echo "<p class='alert alert-danger'>The E-mail and/or Password you entered is incorrect!</p>";
            }
        }
    }
?>