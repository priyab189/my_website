<?php
//including the database connection file
include("configemp.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$sql = "DELETE FROM emp WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

//redirecting to the display page (index.php in our case)
header("Location:admin.php");
?>