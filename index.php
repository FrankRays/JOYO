<html>
<head>
	<link rel="stylesheet" type="text/css" href="sass/stylesheets/homepage.css">
</head>
<body></body>
</html>	
<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>JOYO Project Management Tool</title>
</head>
<body>
<?php
//	print_r($_SESSION);
//	echo "Login user is" . $_SESSION["user"];
	if(empty($_SESSION["user"])) {
		echo "<h1>JOYO - Project Management Tool</h1>";
		echo "<br><div class = 'main'><a href='signin.php' class='link'>Sign In</a>";
  	echo "<a href='signup.html' class='link'>Sign up</a></div><br>";
 }
	else {
		echo "<br>";
		require 'main_page.php';
	}
?>
</body>
</html>