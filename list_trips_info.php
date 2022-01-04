<?php

	$query = 'SELECT * FROM Trip';

	$result = mysqli_query($connection, $query);

	if (!$result){
		die("database query failed");
	}
	while ($row = mysqli_fetch_assoc($result)){
		echo '<input type="radio" name="Trip" value="'.$row["Trip"].'">'.$row["tripname"].' - '.$row["country"].'<br>';
	}

	mysqli_free_result($result);
	mysqli_close($connection);
?>

