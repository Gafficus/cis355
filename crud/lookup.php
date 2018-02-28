<?php
/*
 * Create and populate a drop down menu from customers data
 */
  require 'database.php';
  echo "<form action='lookup.php' method = 'get'>";
	echo "<select name='id'>";
    $pdo = Database::connect();
    $sql = "SELECT * FROM customers";
    foreach ($pdo->query($sql) as $row) {
      //Display the contents of the row
      //Conventionis to not use the array index but the 
      echo "<option value= '".$row[0]."'>".$row['name']."</option>";
    }
    Database::disconnect();
  echo "</select>";
  
  echo"<input type='submit' value='Submit'>";
  echo "</form>";
  
?>
</html>