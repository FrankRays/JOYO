<?php
session_start();
$wid =  $_GET["wid"]; 
$manager = $_POST["Manager"];
$developer = $_POST["Developer"];
$rem_manager = $_POST["RemMng"];
//$rem_dev = $_POST["RemDev"];
$man_size = count($manager);
$dev_size = count($developer);
$removemng = count($rem_manager);
echo $removemng;
print_r($rem_manager);
//$remove_dev = count($rem_dev);

//echo "Count for removing " . $removemng . "Developer is" . $remove_dev;    
    require 'database_connection.php';

   // $removemng > $remove_dev? $max = $removemng : $max = $remove_dev;
    
    for ($i = 0; $i < $removemng; $i++) {
      if (strpos($rem_manager[$i], '-') !== false) {
        echo $rem_manager[$i];
        $id = explode("-",$rem_manager[$i]);
        echo $id[0];
        if ($id[1] == 'm') {
          $sql = "DELETE FROM members WHERE user_id = " . $id[0] . " AND role_id = 2";
          $result = $conn->query($sql);
        }
        elseif ($id[1] == 'd') {
          $sql = "DELETE FROM members WHERE user_id = " . $id[0] . " AND role_id = 3";
          $result = $conn->query($sql);
        }
      }
    }  

    ///////////Inserting new managers
    $sql = "SELECT role_id FROM roles WHERE role_name = 'Manager'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $role = $row['role_id'];
    
    //echo $man_size;
    for ($i = 0; $i < $man_size; $i++) {
      //echo $manager[$i];
      $sql = "INSERT INTO members (workspace_id, user_id, role_id) VALUES('$wid', '$manager[$i]', '$role')";
      if ($conn->query($sql) === TRUE) {
        echo "manager added";
    }
      else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
////////////////////////Inserting new developers
    $sql = "SELECT role_id FROM roles WHERE role_name = 'Developer'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $role =  $row['role_id'];
     
     for ($i = 0; $i < $dev_size; $i++) {
      echo $developer[$i];
      $sql = "INSERT INTO members (workspace_id, user_id, role_id) VALUES('$wid', '$developer[$i]', '$role')";
      if ($conn->query($sql) === TRUE) {
        echo "developer added";
      }
    else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
?>
