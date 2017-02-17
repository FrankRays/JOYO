<?php
session_start();

if ($_SESSION['role'] == "Manager") {  
  //  echo $_SESSION['role']; 
    $wid = $_GET["wid"];
  //  echo $wid;
    $tname = $_POST["tname"];
    $time = $_POST["time"];
    $descr = $_POST["description"];
    $developer = $_POST["Developer"];

    echo $developer;
    require 'database_connection.php';

    $sql = "INSERT INTO task_create (task_name, estimate_time, description,workspace_id) VALUES('$tname', '$time', 'descr','$wid')";

    if ($conn->query($sql) === TRUE) {
       $tid = $conn->insert_id;
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "INSERT INTO developer (task_id, user_id) VALUES ('$tid', '$developer')";

    if ($conn->query($sql) === TRUE) {
      //echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    echo "Task Created for a developer whose id is " . $developer;
  }    
?>