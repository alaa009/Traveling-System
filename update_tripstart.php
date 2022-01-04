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
	include 'connecttodb.php';
	$update = $_POST["Trip"];
	$id = $_POST["startdate"];
	$query = 'UPDATE Trip SET startdate="'.$id.'" WHERE tripid='.$update;
	
	
	$result = mysqli_query($connection,$query);
	if (!$result){
		die("database query failed.");
	}
	else{
	echo '<h2>Trip Start Date</h2><br>';
	echo '<p> Success! the trip start date was updated to '.$id.'.</p>';
	}
?>

</ol>
<?php
	mysqli_close($connection);
?>
</body>
</html>
