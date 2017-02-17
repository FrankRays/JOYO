 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" type="text/css" href="sass/stylesheets/homepage.css">
 	<title></title>
 </head>
 <body>
 
 </body>
 </html>
 
 <?php
 echo "<br><form method='post' action=update_log.php?tid=" . $task_id ."&uid=" . $uid . ">Timelog <input type='text' name='log' required='required'><br>Percentage Complete <input type='text' name='progress' required='required'><br>Comments <textarea name='comments' required='required'></textarea><br><input type='submit'>";
 ?>