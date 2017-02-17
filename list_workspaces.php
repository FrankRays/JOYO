<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="sass/stylesheets/homepage.css">
</head>
<body>
</body>
</html>
<?php
require 'logoutdisplay.php';
 session_start();
 if ($_SESSION['role'] == "Admin" || $_SESSION['uid'] == 1) {
 require 'database_connection.php';
 echo "<table class='table'> <tr><th>Workspace Name</th><th>Created On</th><th>Description</th><th>Edit Workspace</th></tr>";

 $sql = "SELECT distinct  w.workspace_id, w.project_name,w.Created_on, w.description FROM workspace AS w";
 $result = $conn->query($sql);
 
    if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
      $wid = $row['workspace_id'];	

      echo "<tr></td><td>".  $row['project_name'] . "</td><td>" . $row['Created_on'] . "</td><td>". $row['description'] . "</a></td><td><a class='list' href=workspace_task.php?wid=" . $wid . ">EDIT</td></tr>";
      echo "<br>"; 
     }
   }
 	echo "</table>";  
  } 
?>      
