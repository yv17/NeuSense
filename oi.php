<?php
    session_start();
    $id = $_SESSION['id'];
    $oi = $_POST["oi"];

    $db = pg_connect("host=localhost port=5432 dbname=neusense user=neusenseuser password=password");

    $query = "UPDATE pollresult SET oi={$oi} WHERE id=$id";
    $result = pg_query($query);

    $result = countEachOI(0);
    while($row = pg_fetch_array($result)){
        $left = $row["count"];
    }

    $result = countEachOI(1);
    while($row = pg_fetch_array($result)){
        $right = $row["count"];
    }

    $result = countEachOI(2);
    while($row = pg_fetch_array($result)){
        $unclear = $row["count"];
    }

    setOI($left, $right, $unclear);
    $_SESSION['oiflag'] = 1;
    printOI();

    header('Location: Octave_illusion.php');

    function countEachOI($which){
        $query = "SELECT COUNT(oi) FROM pollresult WHERE oi={$which}";
        $result = pg_query($query);
        return $result;
    }

    function setOI($left, $right, $unclear){
        $_SESSION['left'] = $left;
        $_SESSION['right'] = $right;
        $_SESSION['unclear'] = $unclear;
    }

    function printOI(){
        echo 'Left: ' . $_SESSION['left'] . '<br>' . 
        'Right: ' . $_SESSION['right'] . '<br>' .
        'Unclear: ' . $_SESSION['unclear'];
    }
?>