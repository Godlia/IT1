<?php
if (isset($_POST['tall1']) && isset($_POST['tall2'])) {
    $tall1 = $_POST['tall1'];
    $tall2 = $_POST['tall2'];
    $tegn = $_POST['tegn'];
    switch ($tegn) {
        case "+":
            echo $tall1 + $tall2;
            break;
        case "-":
            echo $tall1 - $tall2;
            break;
        case "*":
            echo $tall1 * $tall2;
            break;
        case "/":
            echo $tall1 / $tall2;
            break;
    }
} else {
    echo "Du må fylle ut begge feltene";
}
?>