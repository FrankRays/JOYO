<?php
// define variables and set to empty values
$uid = $name = $email = $passwd = $select = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["uname"];
  $email = $_POST["email"];
  $passwd = $_POST["pwd"];
  $passwd = md5($passwd);
  
 require 'database_connection.php';

$sql = "INSERT INTO signup (user_name, email_id, password) VALUES ('$name', '$email','$passwd')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header('Location: signin.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();	
}