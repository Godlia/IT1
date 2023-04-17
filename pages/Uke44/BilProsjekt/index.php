<!DOCTYPE html>

<?php
$dir;

$historictext = '
Subaru ble veldig kjenti rally-scenen med Impreza WRX STI og Legacy B4. <br> 
Mange kjenner til sjåfører som Colin McRae fra Skottland, og Petter Solberg fra Norge.
';

$moderntext = 'Subaru har mange biler som er kjent for å være gode på snø og is. <br> De er hyllet for sine gode biler på vinterveier og sitt firehjulsdriftsystem. <br>';


$historicpath = './media/historic/';
$modernpath = './media/modern/';


if (isset($_GET['con'])) {
    $con = $_GET['con'];
    if ($con == 'history') {
        $content = $historictext;
        $dir = $historicpath;
    } else if ($con == 'modern') {
        $content = $moderntext;
        $dir = $modernpath;
    }

    $carimages = glob($dir . "*.jpg");
} else {
    $content = 'Subaru er et japansk bilselskap basert i Shibuya, Japan.';
}

?>
<html>

<head>
    <title>Subaru</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div id="logodiv" style="display: flex;">
        <a href="./index.php" id="img"><img id="img" src="./media/logo.png" alt=""></a>
        <a href="./index.php?con=modern">Moderne tid</a>
        <a href="./index.php?con=history">Historie</a>
    </div>
    <div class="content">
        <?php
        print("<p>" . $content . "</p>");
        if (isset($carimages)) {
            foreach ($carimages as $carimage) {
                echo "<img class='carimage' src=" . $carimage . " alt='carimage' width='300' height='200'>";
            }
        }
        ?>
    </div>
</body>



</html>