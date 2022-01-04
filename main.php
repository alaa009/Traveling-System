<!DOCTYPE html>
<!-- The code used in all of the files uploaded for this assignment are from the workshop php and the flipped4 classroom -->
<html>
<head>
 <link rel="stylesheet" href="theme.css">
 <meta charset="utf-8">
 <title>CS3319 Assignment 3</title>
</head>
<body>


<!-- introduction to my website -->
<h1>Welcome to the Trip Database</h1>

<!-- Query option to have the person query all the trip name or country and sort them by name, and ascending or decending -->

<h2>Bus Trip Query</h2>
<form action="get_trip.php" method="post" enctype="multipart/form-data" >
	<fieldset id="name">
		<input type="radio" value="tripname" name="choice">Trip Name<br>
		<input type="radio" value="country" name="choice">Country<br>
	</fieldset>
	<fieldset id="order">
		<input type="radio" value="ASC" name="order">Ascending<br>
		<input type="radio" value="DESC" name="order">Decending<br>
	</fieldset>
	<input type="submit" value="Query Time!">
</form>
<p>


<!-- updating an already existing Trip name -->

<p>
<h2>Update a Trip Name</h2>
<form action="update_tripname.php" method="post">
	<p>Select Trip:</p><br> 
	<fieldset id="trip">
	<?php
		include'connecttodb.php';
		include'list_trips.php';
	?>
	</fieldset>
	<br>
	Update:<br>
	Trip Name: <input type="text" name="tripname" id="tripname"><br>
	<input type="submit" value="update"><br>
</form>
<br>
<p>
<hr>


<p>
<h2>Update a Trip Start Date</h2>
<form action="update_tripstart.php" method="post">
	<p>Select Trip:</p><br> 
	<fieldset id="trip">
	<?php
		include'connecttodb.php';
		include'list_trips.php';
	?>
	</fieldset>
	<br>
	Start Date: <input type="date" name="startdate"> <br>
	<input type="submit" value="Update"><br>
</form>
<br>
<p>
<hr>

<p>
<h2>Update a Trip End Date</h2>
<form action="update_tripend.php" method="post">
	<p>Select Trip:</p><br> 
 
	<?php
		include'connecttodb.php';
		include'list_trips.php';
	?>
	<br>
	End Date: <input type="date" name="enddate"><br>
	<input type="submit" value="Update"><br>
</form>
<br>
<p>
<hr>

<p>
<h2>Update a Trip Image</h2>
<form action="update_tripimage.php" method="post">
	<p>Select Trip:</p><br> 
 
	<?php
		include'connecttodb.php';
		include'list_trips.php';
	?>
	<br>
	Image URL: <input type="url" name="url"><br>	
	<input type="submit" value="Update"><br>
</form>
<br>
<p>
<hr>


<!-- deleting a trips from the database -->

<p>
<h2>Remove Trip</h2>
<?php
include 'connecttodb.php';
?>
<h1>List of Trips:</h1>
<form action="delete.php" method="post">



<!-- inserting php code to have the trips displayed to be removed -->

<?php
	
   $query = 'SELECT * FROM Trip';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="trip" value="';
        echo $row["tripid"];
        echo '">' . $row["tripname"] . " " . $row["country"] . '</li>'. "<br>";
     }
     mysqli_free_result($result);
?>

<input type="submit" value="Remove trip" onclick="return confirm('ArE yOu SuRe?')">
</form>
<?php
   mysqli_close($connection);
?>
<hr>

<!-- adding a trip to the database -->


<p>
<h2>Insert New Trip</h2>
<form action="add_new_trip.php" method="post">
	Trip ID: <input type="text" name="tripid"><br>
	Trip Name: <input type="text" name="tripname"><br>
	Start Date: <input type="date" name="startdate"> <br>
	End Date: <input type="date" name="enddate"><br>
	Country: <input type="text" name="country"><br>
	Image URL: <input type="url" name="url"><br>
	<fieldset id="bus">
		<?php
			include 'connecttodb.php';
			$query = 'SELECT plate FROM Bus';
			$result=mysqli_query($connection,$query);

    			if (!$result) {
         			die("database query2 failed.");
     			}
    			while ($row=mysqli_fetch_assoc($result)) {
        	echo '<input type="radio" name="bus" value="'.$row["plate"].'">'.$row["plate"].'<br>';
     }
     mysqli_free_result($result);

		?>
	</fieldset>
	<br>
		<?php
			//include 'connecttodb.php';
			//include 'list_hospitals.php';
			//include 'list_buses.php';
		?>
	<input type="submit" value="Insert Trip"> <br>
</form>

<p>
<hr>


<!-- list all the bus trips with the country desired -->
<p>
<h2>Country Bus Trip Info:</h2>
<form action="get_trip_country.php" method="post" enctype="multipart/form-data">
	<?php
		include 'connecttodb.php';
		$query = 'SELECT country FROM Trip GROUP BY country';
		$result=mysqli_query($connection,$query);

    		if (!$result) {
         		die("database query2 failed.");
     		}
    		while ($row=mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="country" value="';
        echo $row["country"];
        echo '">' . $row["country"]. "<br>";
     }
     mysqli_free_result($result);

		
	?>
	<input type="submit" value="submit"><br>
</form>
<p>
<hr>


<!-- Create bookings! -->
<h2>New Booking</h2>
<form action="new_bookings.php" method="post">
<?php
	include 'connecttodb.php';
   echo 'Select Passenger:<br>';
   $query = 'SELECT * FROM Passenger';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="passenger" value="';
        echo $row["passengerid"];
        echo '">' . $row["firstname"] . ", " . $row["lastname"] . "<br>";
     }
     mysqli_free_result($result);
?>

<?php

   echo 'Select Trip:<br>';
   $query = 'SELECT * FROM Trip';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="trip" value="';
        echo $row["tripid"];
        echo '">' . $row["tripname"] . " " . $row["country"] . "<br>";
     }
     mysqli_free_result($result);

?>
Enter a trip price: <input name="price" type="number"  step="0.01">
<input type="submit" value="New Booking">
</form>
<p>
<hr>


<!-- Displaying the passenger information for the passengers in the database -->

<p>
<h1>Passenger Information</h1>
<?php
	include 'connecttodb.php';
	$query = ' SELECT * FROM Passenger INNER JOIN Passport on Passenger.passengerid = Passport.passengerid ORDER BY lastname ASC';
	$result = mysqli_query($connection,$query);
	if(!$result){
		die("database query failed X(");
	}
	while ($row = mysqli_fetch_assoc($result)){
		echo '<li>';
		echo $row["firstname"] . ", " . $row["lastname"] . " - ". $row["passportid"]." - ". $row["dateofbirth"]." - ".$row["expirydate"]." - ". $row["countryofcitizenship"];
	}
	mysqli_free_result($result);
?>
<p>
<hr>

<!-- list all the bookings for a specific passenger -->

<h1>Passenger Bookings:</h1>
<form action="bookings.php" method="post">

<?php
   include 'connecttodb.php';
   echo 'Select Passenger:<br>';
   $query = 'SELECT * FROM Passenger';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="passenger" value="';
        echo $row["passengerid"];
        echo '">' . $row["firstname"] . " " . $row["lastname"] . "<br>";
     }
     mysqli_free_result($result);
?>
<input type="submit" value="List Bookings">
</form>


<!-- Allowing the user to remove bookings for existing trips and passengers -->

<h1>Delete a Booking</h1>
<form action="delete_booking.php" method="post" enctype="multipart/form-data">


   <h3> Select Passenger: </h3>
<?php
   $query = 'SELECT * FROM Passenger';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="passenger" value="';
        echo $row["passengerid"];
        echo '">' . $row["firstname"] . " " . $row["lastname"] . "<br>";
     }
     mysqli_free_result($result);
?>




   <h3> Select Trip: </h3>
   <?php
   $query = 'SELECT * FROM Trip';
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo '<input type="radio" name="trip" value="';
        echo $row["tripid"];
        echo '">' . $row["tripname"] . ", " . $row["country"] . "<br>";
     }
     mysqli_free_result($result);

?>

<input type="submit" value="Delete Booking" onclick="return confirm('ArE YoU sUrE?')">
</form>
<p>
<hr>


<!-- List all the trips without bookings -->


<p>
<h1>Trips without bookings</h1>
<?php
	include 'connecttodb.php';
	include 'trips_no_bookings.php';

?>

</body>
</html> 
