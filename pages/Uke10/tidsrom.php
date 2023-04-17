<html>
<form action="">
    <input type="date" name="date1" id="date1">
    <input type="date" name="date2" id="date2">
    <input type="submit" value="Submit">
</form>

</html>
<?php
$date1 = $_GET['date1'];
$date2 = $_GET['date2'];
echo $date1 . "<br>";
echo $date2 . "<br>";

//get the difference between the two dates
$seconds = abs(strtotime($date2) - strtotime($date1));
$output = sprintf('%02d:%02d:%02d', ($seconds / 3600), ($seconds / 60 % 60), $seconds % 60);
echo $output
?>