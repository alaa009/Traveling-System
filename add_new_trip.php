<!DOCTYPE html>
<html>
<head>
</head>

<body>
<?php
   include 'connecttodb.php';
?>
<h1>Adding new trip:</h1>
<ol>
<?php
   $tripid= $_POST["tripid"];
   $tripname = $_POST["tripname"];
   $start =$_POST["startdate"];
   $end =$_POST["enddate"];
   $country =$_POST["country"];
   $url = $_POST["url"];
   $bus =$_POST["bus"];
   $query = 'INSERT INTO Trip VALUES("'.$tripid.'", "'.$tripname.'","'.$start.'", "'.$end.'","'.$country.'","'.$bus.'","'.$url.'")';

   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
   echo "Your Trip was added!";
   mysqli_close($connection);
?>

</body>
</html>
