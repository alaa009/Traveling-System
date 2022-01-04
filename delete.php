<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
   include 'connecttodb.php';
?>
<h2>Deleted Trip</h2>
<ol>
<?php
   $delv= $_POST["trip"];
   $query = 'DELETE FROM Trip WHERE tripid = "'.$delv.'"';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
   echo 'Trip with tripid '.$delv.' was deleted';
   mysqli_close($connection);
?>
</ol>
</body>
</html>
