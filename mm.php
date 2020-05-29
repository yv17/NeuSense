<?php
    session_start();
    $id = $_SESSION['id'];
    $mm = $_POST["mm"];

    $db = pg_connect("host=localhost port=5432 dbname=neusense user=neusenseuser password=password");

    $query = "UPDATE pollresult SET mm={$mm} WHERE id=$id";
    $result = pg_query($query);

    $result = countEachOI(0);
    while($row = pg_fetch_array($result)){
        $TTLS = $row["count"];
    }

    $result = countEachOI(1);
    while($row = pg_fetch_array($result)){
        $HBS = $row["count"];
    }

    $result = countEachOI(2);
    while($row = pg_fetch_array($result)){
        $TP = $row["count"];
    }

    $result = countEachOI(3);
    while($row = pg_fetch_array($result)){
        $OMDHAF = $row["count"];
    }

    setOI($TTLS, $HBS, $TP, $OMDHAF);
    $_SESSION['mmflag'] = 1;
    printOI();

    header('Location: Mysterious_melody.php');

    function countEachOI($which){
        $query = "SELECT COUNT(mm) FROM pollresult WHERE mm={$which}";
        $result = pg_query($query);
        return $result;
    }

    function setOI($TTLS, $HBS, $TP, $OMDHAF){
        $_SESSION['TTLS'] = $TTLS;
        $_SESSION['HBS'] = $HBS;
        $_SESSION['TP'] = $TP;
        $_SESSION['OMDHAF'] = $OMDHAF;
    }

    function printOI(){
        echo 'Left: ' . $_SESSION['left'] . '<br>' . 
        'Right: ' . $_SESSION['right'] . '<br>' .
        'Unclear: ' . $_SESSION['unclear'];
    }
?>