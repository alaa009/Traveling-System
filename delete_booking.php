<?php
   include 'connecttodb.php';
   $tripid = $_POST["trip"];
   $passengerid = $_POST["passenger"];
   $query = 'DELETE FROM Ticket WHERE tripid='.$tripid.' and passengerid='.$passengerid;

   $result=mysqli_query($connection,$query);

   if (!result) {
        die("Error: Search failed" . mysqli_error($connection));
    }
   echo "Booking was deleted!";
   mysqli_close($connection);
?>
