<style>
    * {
        padding: 0px;
        margin: 0px;
        font-size: larger;
    }
</style>
<?php
$navn = array("Ole", "Per", "Kari", "Jens", "Anne");
for ($i = 0; $i < count($navn); $i++) {

    //hvis partall, print rød, oddetall blå
    $i % 2 == 0 ? $farge = "red" : $farge = "blue";

    print("<div style='background-color:$farge'>$navn[$i]</div>");
}
?>