<?php
    require_once "../php/db.php";
    require_once "../php/util.php";

    $db = new Database;
    $util = new Util;

    //Handle add new user Ajax request
    if(isset($_POST["add"])){
        $fName = $util->testInput($_POST["firstName"]);
        $lName = $util->testInput($_POST["lastName"]);
        $pwd = $util->testInput($_POST["pwd"]);
        $email = $util->testInput($_POST["email"]);
        $phone = $util->testInput($_POST["phone"]);

        if($db->insert($fName, $lName, $pwd, $email, $phone)){
            echo $util->showMessage("success", "User inserted succesfully!");
        }else{
            echo $util->showMessage("danger", "Something went wrong!");
        }
    }

    //Handle Fetch all users Ajax request
    if(isset($_GET["read"])){
        $users = $db->read();
        $output = "";
        if($users){
            foreach($users as $row){
                $output .= '<tr>
                                <td>'.$row["id"].'</td>
                                <td>'.$row["first_name"].'</td>
                                <td>'.$row["last_name"].'</td>
                                <td>'.$row["email"].'</td>
                                <td>'.$row["phone"].'</td>
                                <td>
                                    <button type="button" id="'.$row["id"].'" class="btn btn-success btn-sm 
                                        edit-user-btn">Edit</button>
                                    <button type="button" id="'.$row["id"].'" class="btn btn-danger btn-sm
                                        delete-user-btn">Delete</button>
                                </td>
                            </tr>';
            }
            echo $output;
        }else{
            echo '<tr>
                    <td colspan="6">No Users Found In The Database!</td>        
                </tr>';
        }
    }

    //Handle edit user Ajax request
    if(isset($_GET["edit"])){
        $id = $_GET["id"];
        $user = $db->readOne($id);
        echo json_encode($user);
    }

    //Handle update user Ajax request
    if(isset($_POST["update"])){
        $id = $util->testInput($_POST["id"]);
        $fName = $util->testInput($_POST["firstName"]);
        $lName = $util->testInput($_POST["lastName"]);
        $email = $util->testInput($_POST["email"]);
        $phone = $util->testInput($_POST["phone"]);

        if($db->update($id, $fName, $lName, $email, $phone)){
            echo $util->showMessage("success", "User Updated Successfully!");
        }else{
            echo $util->showMessage("danger", "Something went wrong!");
        }
    }

    //Handle delete user ajax request
    if(isset($_GET["delete"])){
        $id = $_GET["id"];

        if($db->delete($id)){
            echo $util->showMessage("info", "User deleted Successfully!");
        }else{
            echo $util->showMessage("danger", "Something went wrong!");
        }
    }
?>