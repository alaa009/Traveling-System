<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Passenger bookings:</h1>
<ol>
<?php
   include 'connecttodb.php';
   $passenger= $_POST["passenger"];
  
   $query = 'SELECT * FROM Ticket INNER JOIN Passenger ON Passenger.passengerid=Ticket.passengerid INNER JOIN Trip ON Ticket.tripid=Trip.tripid WHERE Ticket.passengerid='.$passenger;

   $result = mysqli_query($connection, $query);
	if (!$result) {
        die("Error: Assign failed" . mysqli_error($connection));
    }
  while ($row = mysqli_fetch_assoc($result)) {

                echo '<li>'.$row["firstname"].' '.$row["lastname"].' - '.$row["tripname"].', '.$row["country"].' - price:$'.$row["price"].' - '.$row["startdate"].' -> '.$row["enddate"];
}
        mysqli_free_result($result);   	
	mysqli_close($connection);
?>	
</ol>
</body>
</html>
