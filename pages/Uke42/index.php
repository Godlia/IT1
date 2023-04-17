<?php
$rand = mt_rand(0,2);
showWebsite($rand);


function showWebsite($var) {
    echo("Rand: " . $var);
    if($var == 0) {
        include "./spooks/filA.php";
    } else if($var == 1) {
        include "./spooks/filB.php";
    } else if($var == 2) {
        include("./spooks/filC.php");
    } else {
        echo("Noe gikk galt");
    }
}
?>