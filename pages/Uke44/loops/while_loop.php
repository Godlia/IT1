<?php
for ($i = 0; $i < 10; $i++) {
    $tallrekke = array();
    for ($j = 0; $j < 5; $j++) {
        $tallrekke[] = $i * $j + mt_rand(1, 10);
    }
    
    echo "Tallrekken er: ";
    foreach ($tallrekke as $tall) {
        echo "$tall ";
    }
    echo "<br>";
}
?>