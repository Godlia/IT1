<style>
    .chart div {
        font: 1vw sans-serif;
        background-color: red;
        text-align: right;
        padding: 3px;
        margin: 1px;
        color: white;
        max-width: 80%;
        border: 1px solid black;
        border-radius: 50px;
    }
</style>
<html>

<body>

    <div class="chart">
        <?php
        
        $money = array(4, 100, 50, 20, 15.3, 42, 10, 5, 2, 1);
        $max = max($money);
        rsort($money);
        foreach ($money as $value) {
            //make a div for each value with width a percentage of the max value
            echo "<div style='width:" . ($value / $max) * 100 . "%'>$value</div>";
        }

        ?>
    </div>
</body>

</html>