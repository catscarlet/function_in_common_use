<?php

/*
The function snakeArray can generate an array like:
1       20      19      18      17      16
2       21      32      31      30      15
3       22      33      36      29      14
4       23      34      35      28      13
5       24      25      26      27      12
6       7       8       9       10      11
It was a Interview question. I got this question from https://spdf.me/fill-spiral-shape-matrix/ .
Should it be called as 'spiral-shape-matrix' ? or 'snake array' ? I don't know.

If you have a better idea, please let me know.
*/

$snakeArray = snakeArray(5, 5);
printXYarray($snakeArray);

function snakeArray($width = 5, $height = 5)
{
    $Top = 0;
    $Bottom = $height;
    $Left = 0;
    $Right = $width;
    $arrayXY = array();
    $i = 1;
    $x = 0;
    $y = 0;
    $max = ($width + 1) * ($height + 1);
    while ($i <= $max) {
        for ($x = $Left, $y = $Top; $x <= $Right; ++$x) {
            $arrayXY[$x][$y] = $i;
            ++$i;
        }
        $Top = $Top + 1;

        for ($x = $Right, $y = $Top; $y <= $Bottom; ++$y) {
            $arrayXY[$x][$y] = $i;

            ++$i;
        }
        $Right = $Right - 1;

        for ($x = $Right, $y = $Bottom; $x >= $Left; --$x) {
            $arrayXY[$x][$y] = $i;

            ++$i;
        }
        $Bottom = $Bottom - 1;

        for ($x = $Left, $y = $Bottom; $y >= $Top; --$y) {
            $arrayXY[$x][$y] = $i;

            ++$i;
        }
        $Left = $Left + 1;
    }
    $arrayXY = reksortXYarray($arrayXY);

    return $arrayXY;
}

function reksortXYarray($arrayXY)
{
    foreach ($arrayXY as &$arrayY) {
        ksort($arrayY);
    }
    ksort($arrayXY);

    return $arrayXY;
}

function printXYarray($arrayXY)
{
    foreach ($arrayXY as $key1 => $value1) {
        foreach ($value1 as $key2 => $value2) {
            //echo "x:$key1,y:$key2,value:".$value2.'\t';
            echo $value2."\t";
        }
        echo "\n";
    }
}
