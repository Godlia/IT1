<?php
$hostname = "localhost";
$user = "inforjza_B2prove6";
$password = "mandag240423";
$db = "inforjza_db4";
$conn = mysqli_connect($hostname, $user, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}

//mysqli_query($conn, "CREATE TABLE tbl_kjoretoy_helgerud (id int not null primary key auto_increment, dato varchar(10), bilprodusent VARCHAR(50), bilmodell VARCHAR(50), motor VARCHAR(50), årgang INT, regnr VARCHAR(50), skilttype VARCHAR(50), aircondition VARCHAR(50), antallseter INT);");
if($_POST["error"] != "1") {

$query = "INSERT INTO `tbl_kjoretoy_helgerud` (`dato`, `bilprodusent`, `bilmodell`, `motor`, `argang`, `regnr`, `skilttype`, `aircondition`, `antallseter`)
    VALUES ('" . 
    $_POST["dato"] . "','" .  
    $_POST["bilprodusent"] . "','" . 
    $_POST["bilmodell"] . "','" . 
    $_POST["motor"] . "','" . 
    $_POST["årgang"] . "','" . 
    $_POST["regnr"] . "','" . 
    $_POST["skilttype"] . "','" . 
    $_POST["aircondition"] . "'," .
    $_POST["antallseter"] .
    ");";

echo "query: " . $query;

} else {
    echo "Error, check form on last page.";
}
print_r($_POST);
print("<br>");
if (mysqli_query($conn, $query)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
?>