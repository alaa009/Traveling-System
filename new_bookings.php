<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
   include 'connecttodb.php';
?>
<h1>Change it here to trip:</h1>
<ol>
<?php
   $passenger= $_POST["passenger"];
   $trip = $_POST["trip"];
   $cost = $_POST["price"];
   
   $query = 'INSERT INTO Ticket VALUES ('.$passenger.','.$trip.','.$cost.')';
   if (!mysqli_query($connection, $query)) {
        die("Error: Assign failed" . mysqli_error($connection));
    }
   echo "Booking was added!";
   mysqli_close($connection);
?>
</ol>
</body>
</html>

