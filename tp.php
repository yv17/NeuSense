<?php
    session_start();
    $id = $_SESSION['id'];

    $tp1 = $_POST["tp1"];
    $tp2 = $_POST["tp2"];
    $tp3 = $_POST["tp3"];
    $tp4 = $_POST["tp4"];

    //echo $id . '<br>' . $tp1 . '<br>'. $tp2 . '<br>'. $tp3 . '<br>';

    $db = pg_connect("host=localhost port=5432 dbname=neusense user=neusenseuser password=password");

    //Insert to db and print to screen
    $query = "UPDATE pollresult SET tp1={$tp1}, tp2={$tp2}, tp3={$tp3}, tp4={$tp4} WHERE id=$id";
    $result = pg_query($query);


    $result = countEachTP('tp1',0);
    while($row = pg_fetch_array($result)){
        $atp1 = $row["count"];
    }
    $result = countEachTP('tp1',1);
    while($row = pg_fetch_array($result)){
        $dtp1 = $row["count"];
    }

    $result = countEachTP('tp2',0);
    while($row = pg_fetch_array($result)){
        $atp2 = $row["count"];
    }
    $result = countEachTP('tp2',1);
    while($row = pg_fetch_array($result)){
        $dtp2 = $row["count"];
    }

    $result = countEachTP('tp3',0);
    while($row = pg_fetch_array($result)){
        $atp3 = $row["count"];
    }
    $result = countEachTP('tp3',1);
    while($row = pg_fetch_array($result)){
        $dtp3 = $row["count"];
    }

    $result = countEachTP('tp4',0);
    while($row = pg_fetch_array($result)){
        $atp4 = $row["count"];
    }
    $result = countEachTP('tp4',1);
    while($row = pg_fetch_array($result)){
        $dtp4 = $row["count"];
    }

    setTP($atp1, $dtp1, $atp2, $dtp2, $atp3, $dtp3, $atp4, $dtp4);
    $_SESSION['tpflag'] = 1;
    printTP();

    //Go to tp page
    header('Location: Tritone_paradox.php');

    function countEachTP($tp, $which){
        $query = "SELECT COUNT({$tp}) FROM pollresult WHERE $tp={$which}";
        $result = pg_query($query);
        return $result;
    }

    function setTP($atp1, $dtp1, $atp2, $dtp2, $atp3, $dtp3, $atp4, $dtp4){
        $_SESSION['atp1'] = $atp1;
        $_SESSION['dtp1'] = $dtp1;
        $_SESSION['atp2'] = $atp2;
        $_SESSION['dtp2'] = $dtp2;
        $_SESSION['atp3'] = $atp3;
        $_SESSION['dtp3'] = $dtp3;
        $_SESSION['atp4'] = $atp4;
        $_SESSION['dtp4'] = $dtp4;
    }

    function printTP(){
        echo 'ATP1: ' . $_SESSION['atp1'] . '<br>' . 
        'DTP1: ' . $_SESSION['dtp1'] . '<br>' .
        'ATP2: ' . $_SESSION['atp2'] . '<br>' .
        'DTP2: ' . $_SESSION['dtp2'] . '<br>' .
        'ATP3: ' . $_SESSION['atp3'] . '<br>' .
        'DTP3: ' . $_SESSION['dtp3'] . '<br>';
    }
?>