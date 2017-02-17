<?php
  $arr = array(array());
  $add_name = "Manager";
  echo "Select managers";
  echo "<br>";
  $wid = $_GET['wid'];
//  echo $wid;
  $set = 3;
  list_members();  echo "<br><br>";
  echo "Select Developers";
  echo "<br>";
  list_members();


  function list_members() {
    global $i, $arr, $add_name, $role_id, $set, $wid;
    require 'database_connection.php';
     $sql = "SELECT role_id from roles WHERE role_name = '" . $add_name . "'";
     $result = $conn->query($sql);
     if ($row = $result->fetch_assoc()) {
       $role_id = $row['role_id'];
     //  echo $role_id;
    }

    if (!empty($result)) {
      $sql = "SELECT distinct s.user_id, s.user_name FROM signup AS s LEFT JOIN members AS m ON s.user_id = m.user_id WHERE m.role_id is NULL or (m.role_id =" . $set . " and workspace_id = " . $wid . ")";

   $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $i = 0;
     while($row = $result->fetch_assoc()) {
      $uname = $row["user_name"];
      $key = $row["user_id"];
      for ($j = 0; $j < 2; $j++) { 
        if ($j == 0)
        $arr[$i][$j] = $uname;
        else 
        $arr[$i][$j] = $key;
      }

      $i++;
    }  
  }
    for ($j = 0; $j < $i; $j++) {
      for ($k = 0; $k < 2; $k++) { 
        if($k == 0)
        echo $arr[$j][$k];
        else 
        echo "<input type='checkbox' name='". $add_name . "[]' value= " . $arr[$j][$k] . ">"; //. $add_name . $arr[$j][$k];
       } 
    }
    $add_name = "Developer";
    $set = 2;
    echo "<br>";
  }
 }  
?>