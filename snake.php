<?php
unset($_SESSION["wall"]);
unset($_SESSION["snake"]);
$length = 25;
$width = 25;

//範圍陣列
for ($x=0; $x < $length; $x++) {
    for ($y=0; $y < $width; $y++) {
        $_SESSION["wall"][$x][$y] = '田';
    }
}

//隨機食物
if ($_SESSION["wall"][$row][$column] != "蛇") {
    $row = rand(0, $width-1);
    $column = rand(0, $length-1);
    $_SESSION["wall"][$row][$column] = "食";
}

$_SESSION["snake"] = array(
                            array(5, 7),
                            array(5, 6),
                            array(5, 5)
                    );

foreach($_SESSION["snake"] as $num) {
            $_SESSION["wall"][$num[0]][$num[1]] = "蛇";
}
