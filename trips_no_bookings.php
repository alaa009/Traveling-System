<?php
   $query = 'SELECT * FROM Trip WHERE tripid NOT IN (SELECT tripid FROM Ticket GROUP BY tripid HAVING COUNT(*)>0)';
   $result=mysqli_query($connection,$query);

   if (!$result) {
        die("Error: Search failed" . mysqli_error($connection));
    }
   while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo ''. $row["tripname"] .' - '. $row["country"] . '<br>';
     }

   mysqli_free_result($result);
   mysqli_close($connection);
?>
