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
//echo "mohitbansal";
$start_date = $_GET['sd'];
//echo $start_date;

$end_date = $_GET['ed'];
//echo "<br>" . $end_date;

$task_id = $_GET['tid'];
require 'database_connection.php';

$sql = "SELECT time_log, comments, time_in_sec FROM dev_time_logs WHERE time_in_sec >= " . $start_date . "   and time_in_sec <= " . $end_date . " AND task_id = " . $task_id;

 $result = $conn->query($sql);
 print_r($result);
 if ($result->num_rows <= 0) {
 		echo "<br><h2 class='list'>No time logs and comments";
}
 else {
 	echo "<table><tr><th>Time Log</th><th>Comments</th></tr>";
  	while ($row = $result->fetch_assoc()) {
 		echo "<tr><td>" . $row['time_log'] . "</td><td>" . $row['comments'] . "</td></tr>";
 	}
 		echo "</table>";	
 } 
?>