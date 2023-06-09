<?php
include '../../functions.php';

//norway in the winterolympics medals
//[0] = year [1] = gold [2] = silver [3] = bronze [4] = total
/*
1924 	4 	7 	6 	17
1928 	6 	4 	5 	15
1932 	3 	4 	3 	10
1936 	7 	5 	3 	15
1948 	4 	3 	3 	10
1952 	7 	3 	6 	16
1956 	2 	1 	1 	4
1960 	3 	3 	– 	6
1964 	3 	6 	6 	15
1968 	6 	6 	2 	14
1972 	2 	5 	5 	12
1976 	3 	3 	1 	7
1980 	1 	3 	6 	10
1984 	3 	2 	4 	9
1988 	– 	3 	2 	5
1992 	9 	6 	5 	20
1994 	10 	11 	5 	26
1998 	10 	10 	5 	25
2002 	13 	5 	7 	25
2006 	2 	8 	9 	19
2010 	9 	8 	6 	23
2014 	11 	5 	10 	26
2018 	14 	14 	11 	39
2022 	16 	8 	13 	37
*/
$medals = [
    [1924, 4, 7, 6, 17],
    [1928, 6, 4, 5, 15],
    [1932, 3, 4, 3, 10],
    [1936, 7, 5, 3, 15],
    [1948, 4, 3, 3, 10],
    [1952, 7, 3, 6, 16],
    [1956, 2, 1, 1, 4],
    [1960, 3, 3, 0, 6],
    [1964, 3, 6, 6, 15],
    [1968, 6, 6, 2, 14],
    [1972, 2, 5, 5, 12],
    [1976, 3, 3, 1, 7],
    [1980, 1, 3, 6, 10],
    [1984, 3, 2, 4, 9],
    [1988, 0, 3, 2, 5],
    [1992, 9, 6, 5, 20],
    [1994, 10, 11, 5, 26],
    [1998, 10, 10, 5, 25],
    [2002, 13, 5, 7, 25],
    [2006, 2, 8, 9, 19],
    [2010, 9, 8, 6, 23],
    [2014, 11, 5, 10, 26],
    [2018, 14, 14, 11, 39],
    [2022, 16, 8, 13, 37]
];
WriteCSVFile("test.csv", $medals);
$return = ReadCSVFile("test.csv");

print_r('<pre>');
print_r($return);
print_r('</pre>');

?>