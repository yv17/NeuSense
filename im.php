<?php
    session_start();
    $id = $_SESSION['id'];
    $im = $_POST["im"];

    $db = pg_connect("host=localhost port=5432 dbname=neusense user=neusenseuser password=password");

    $query = "UPDATE pollresult SET im={$im} WHERE id=$id";
    $result = pg_query($query);

    $result = countEachOI(0);
    while($row = pg_fetch_array($result)){
        $im0 = $row["count"];
    }

    $result = countEachOI(1);
    while($row = pg_fetch_array($result)){
        $im1 = $row["count"];
    }

    $result = countEachOI(2);
    while($row = pg_fetch_array($result)){
        $im2 = $row["count"];
    }

    setOI($im0, $im1, $im2);
    $_SESSION['imflag'] = 1;
    printOI();

    header('Location: Interleaved_melodies.php');

    function countEachOI($which){
        $query = "SELECT COUNT(im) FROM pollresult WHERE im={$which}";
        $result = pg_query($query);
        return $result;
    }

    function setOI($im0, $im1, $im2){
        $_SESSION['im0'] = $im0;
        $_SESSION['im1'] = $im1;
        $_SESSION['im2'] = $im2;
    }

    function printOI(){
        echo 'Left: ' . $_SESSION['left'] . '<br>' . 
        'Right: ' . $_SESSION['right'] . '<br>' .
        'Unclear: ' . $_SESSION['unclear'];
    }
?>