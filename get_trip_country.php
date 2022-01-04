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
	$order = $_POST["country"];
	$name = $_POST["choice"];
	$query = 'SELECT * FROM Trip WHERE country="'.$order.'"';
	$result = mysqli_query($connection,$query);
	if (!result){
		die("database query failed.");
	}
	echo '<h2>Country Trip List</h2><br>';
	while ($row=mysqli_fetch_assoc($result)){
		echo '<li>'.$row["tripname"].' - '.$row["country"].'</li><br>';
	}
	mysqli_free_result($result);
?>

</ol>
<?php
	mysqli_close($connection);
?>
</body>
</html>
