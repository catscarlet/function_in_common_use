<?php

/* How to Test 
$xy = create_two_dimensional_array();
echo_two_dimensional_array($xy);
echo "\n";
$yx = switch_xy($xy);
echo_two_dimensional_array($yx);
*/

function create_two_dimensional_array()
{
    /* This function create a two_dimensional_array like this :
Aa Ab Ac Ad Ae Af Ag Ah Ai Aj Ak
Ba Bb Bc Bd Be Bf Bg Bh Bi Bj Bk
Ca Cb Cc Cd Ce Cf Cg Ch Ci Cj Ck
Da Db Dc Dd De Df Dg Dh Di Dj Dk
Ea Eb Ec Ed Ee Ef Eg Eh Ei Ej Ek
Fa Fb Fc Fd Fe Ff Fg Fh Fi Fj Fk
Ga Gb Gc Gd Ge Gf Gg Gh Gi Gj Gk
Ha Hb Hc Hd He Hf Hg Hh Hi Hj Hk
Ia Ib Ic Id Ie If Ig Ih Ii Ij Ik
Ja Jb Jc Jd Je Jf Jg Jh Ji Jj Jk
Ka Kb Kc Kd Ke Kf Kg Kh Ki Kj Kk
*/
    for ($x = 65; $x <= 75; ++$x) {
        $x_char = hex2bin(dechex($x));
        for ($y = 97; $y <= 107; ++$y) {
            $y_char = hex2bin(dechex($y));
            $xy[$x][$y] = $x_char.$y_char;
        }
    }

    return $xy;
}

function echo_two_dimensional_array($xy)
{
    /* Echo the array in shell for test */
    foreach ($xy as $x_key => $y_key_value) {
        foreach ($y_key_value as $y_key => $y_value) {
            echo $y_value.' ';
        }
        echo "\n";
    }
}

function switch_xy($xy)
{
    /*swtich the axis to change the array from:
Aa Ab
Ba Bb
to:
Aa Ba
Ab Bb
*/
    foreach ($xy as $x_key => $y_key_value) {
        foreach ($y_key_value as $y_key => $y_value) {
            $yx[$y_key][$x_key] = $y_value;
        }
    }

    return $yx;
}
