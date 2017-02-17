<?php
session_start();
$wid = $_GET['wid'];
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="sass/stylesheets/homepage.css">
  <script>
  function getuser() {
     xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
      document.getElementById("add").innerHTML = this.responseText;
      }
     };
     xmlhttp.open("POST","getmoreman&dev.php?wid=<?php echo $wid; ?>",true);
     xmlhttp.send();
  } 

  function get() {
     xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
      document.getElementById("remove").innerHTML = this.responseText;
      }
     };
     xmlhttp.open("POST","getremove.php?wid=<?php echo $wid; ?>",true);
     xmlhttp.send();
  } 
  </script>
</head>

<body>
<form action="addrem.php?wid=<?php echo $wid;?>" method="POST">
  <input type="button" onclick="getuser()" value ="Add more managers and developers"><br><br>
    <div id ="add" class></div>
    <br><br>
     <input type="button" onclick="get()" value ="Remove managers and developers"><br><br>
     <div id ="remove"></div>
    <input type="submit" name="submit" value="save">
  </form> 
 <!--  <a class ='link' href='filter.php?wid=<?php echo $wid;?>'> List of tasks acc. to timelogs of this workspace.</a><br><br> -->
  <br><br>
  <a class ='link' href='list_of_tasks.php?wid=<?php echo $wid;?>'> List of Tasks</a>   
</body>
</html>    