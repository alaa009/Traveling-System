<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
	include"connecttodb.php";
?>

<ol>


<?php
	$update = $_POST["Trip"];
	$id = $_POST["tripname"];
	$query = 'UPDATE Trip SET tripname="'.$id.'" WHERE tripid='.$update;

	$result = mysqli_query($connection,$query);
	if (!result){
		die("database query failed.");
	}
	else{
	echo '<h2>Trip Name</h2><br>';
	echo '<p> Success! the trip name was updated to '.$id.'.</p>';
	}	
?>

</ol>

<?php
	mysqli_close($connection);
?>
</body>
</html>
