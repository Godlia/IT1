<?php

//returns season as string
function getSeason($_month)
{
    if ($_month == "12" || $_month == "01" || $_month == "02") {
        $season = "Vinter";
    } elseif ($_month == "03" || $_month == "04" || $_month == "05") {
        $season = "Vår";
    } elseif ($_month == "06" || $_month == "07" || $_month == "08") {
        $season = "Sommer";
    } elseif ($_month == "09" || $_month == "10" || $_month == "11") {
        $season = "Høst";
    } else {
        $season = "Invalid month";
    }
    return $season;
}
function tekstomårstid($_årstid)
{
    switch ($_årstid) {
        case "Vinter":
            return "Det er kaldt ute, kanskje du vil stå på ski?";
            break;
        case "Vår":
            return "Endelig smelter snøen og plantene kommer til live!";
            break;
        case "Sommer":
            return "Det er fint vær ute, kanskje du vil bade?";
            break;
        case "Høst":
            return "Regnet har begynt å komme og bladene bytter farger!";
            break;
        default:
            return "Ugyldig måned";
    }
}


//get month 
$måned = date('m');
//årstid i string formt
$årstid = getSeason($måned);
//tekst om årstid
$tekst = tekstomårstid($årstid);
//makes a random image path for the season --- example: ../media/Høst_2.jpg
$imagepath = "../media/" . $årstid . "_" . mt_rand(1, 4) . ".jpg";
?>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Det er <?php echo $årstid ?></h1>
    <div>
        <p><?php echo $tekst; ?></p>
        <img src="<?php echo $imagepath; ?>" alt="Årstid">
    </div>
</body>

</html>