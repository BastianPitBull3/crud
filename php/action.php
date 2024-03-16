<?php
    require_once "../php/db.php";
    require_once "../php/util.php";

    $db = new Database;
    $util = new Util;

    //Handle add new user Ajax request
    if(isset($_POST["add"])){
        $fName = $util->testInput($_POST["firstName"]);
        $lName = $util->testInput($_POST["lastName"]);
        $email = $util->testInput($_POST["email"]);
        $phone = $util->testInput($_POST["phone"]);

        if($db->insert($fName, $lName, $email, $phone)){
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
                                <td class=>
                                    <button type="button" id="'.$row["id"].'" class="btn btn-success btn-sm 
                                        edit-user-btn edit-link">Edit</button>
                                    <button type="button" id="'.$row["id"].'" class="btn btn-danger btn-sm
                                        delete-user-btn edit-link">Delete</button>
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
?>