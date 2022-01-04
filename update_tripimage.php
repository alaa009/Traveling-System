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
	$id = $_POST["url"];
	$query = 'UPDATE Trip SET urlimage="'.$id.'" WHERE tripid='.$update;
	
	$result = mysqli_query($connection,$query);
	if (!result){
		die("database query failed.");
	}
	else{
	echo '<h2>Trip Image Update!</h2><br>';
	echo '<p> Success! the trip image was updated to this picture:</p>';
	echo  '<img src="'.$id.'"/>';
	}	
?>

</ol>

<?php
	mysqli_close($connection);
?>
</body>
</html>
