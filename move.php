<?php
session_start();

//移除多出的S
if (isset($_SESSION['lastS'])) {
    $_SESSION["wall"][$_SESSION['lastS'][0][0]][$_SESSION['lastS'][0][1]] = '田';
    unset($_SESSION['lastS']);
}    
    
    $arr[]=$_SESSION["snake"][sizeof($_SESSION["snake"])-1][0];
    $arr[]=$_SESSION["snake"][sizeof($_SESSION["snake"])-1][1];


    for($i=sizeof($_SESSION["snake"])-1; $i > 0; $i--) {
        $_SESSION["snake"][$i] = $_SESSION["snake"][$i-1];
    }
    
if ($_GET["key"] == 38) {
    $_SESSION["snake"][0][0]-=1; //上
} else if ($_GET["key"] == 37) {
    $_SESSION["snake"][0][1]-=1; //左
} else if ($_GET["key"] == 39) {
    $_SESSION["snake"][0][1]+=1; //下
} else if($_GET["key"] == 40){
    $_SESSION["snake"][0][0]+=1; //右
}

if ($_SESSION["wall"][$_SESSION["snake"][0][0]][$_SESSION["snake"][0][1]] == "食") {
    $_SESSION["wall"][$_SESSION["snake"][0][0]][$_SESSION["snake"][0][1]] = "頭";
    $_SESSION["wall"][$_SESSION["snake"][1][0]][$_SESSION["snake"][1][1]] = "蛇";
    $_SESSION["wall"][$_SESSION["snake"][sizeof($_SESSION["snake"])-1][0]][($_SESSION["snake"][sizeof($_SESSION["snake"])-1][1])] = '蛇';
    $_SESSION['snake'][] = array($arr[0],$arr[1]);
    $_SESSION['lastS'] = array(array($arr[0],$arr[1]));
    getFood();
    
} else if($_SESSION["wall"][$_SESSION["snake"][0][0]][$_SESSION["snake"][0][1]] == "田") {
    $_SESSION["wall"][$_SESSION["snake"][0][0]][$_SESSION["snake"][0][1]] = "頭";
    $_SESSION["wall"][$_SESSION["snake"][1][0]][$_SESSION["snake"][1][1]] = "蛇";
    $_SESSION["wall"][$arr[0]][$arr[1]] = '田';
    
} else {
    echo "error";
    return "error";
}

foreach($_SESSION["wall"] as $k) {
    foreach($k as $v) {
        echo $v;
    }
    echo "\n";
    }

function getFood() {
    $length = 25;
    $width = 25;
    $row = rand(0, $width-1);
    $column = rand(0, $length-1);
    while ($_SESSION["wall"][$row][$column] == "蛇") {
        $row = rand(0, $width-1);
        $column = rand(0, $length-1);
    } 
        $_SESSION["wall"][$row][$column] = "食";
}

