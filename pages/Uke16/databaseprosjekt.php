<?php
//connect to database at localhost with username root and password root
$connection = mysqli_connect("localhost", "helgerud", "f8sodfDVJaPJ", "databaseprosjekt");
if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>