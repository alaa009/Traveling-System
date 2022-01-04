<?php

	$query = 'SELECT * FROM Trip';

	$result = mysqli_query($connection, $query);

	if (!$result){
		die("database query failed");
	}
	while ($row = mysqli_fetch_assoc($result)){
	#echo $row["urlimage"];
		echo '<input type="radio" id="trip" name="Trip" value="'.$row["tripid"].'"> <figure class="image"><img src="'.$row["urlimage"].'" onerror="this.onerror=null; this.src=\'https://csd.uwo.ca/~lreid2/cs3319/assignments/assignment3/pics/beaches.png\'" alt="" width="200" height="200"/> <figcaption class="caption">'.$row["tripname"].' - '.$row["country"].'</figcaption></figure><br>';
}
	mysqli_free_result($result);
	mysqli_close($connection);
?>

