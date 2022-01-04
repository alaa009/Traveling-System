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
	$id = $_POST["enddate"];
	$query = 'UPDATE Trip SET enddate="'.$id.'" WHERE tripid='.$update;
	#echo $query;
	#echo $_POST["trip"] . " " . $_POST["startdate"];
	$result = mysqli_query($connection,$query);
	if (!result){
		die("database query failed.");
	}
	else{
	echo '<h2>Trip End Date</h2><br>';
	echo '<p> Success! the trip end date was updated to '.$id.'.</p>';
	}
?>

</ol>

<?php
	mysqli_close($connection);
?>
</body>
</html>
