<?php
    session_start();
    $id = $_SESSION['id'];

    $tp1 = $_POST["tp1"];
    $tp2 = $_POST["tp2"];
    $tp3 = $_POST["tp3"];

    //echo $id . '<br>' . $tp1 . '<br>'. $tp2 . '<br>'. $tp3 . '<br>';

    $db = pg_connect("host=localhost port=5432 dbname=neusense user=neusenseuser password=password");

    //Insert to db and print to screen
    $query = "UPDATE pollresult SET tp1={$tp1}, tp2={$tp2}, tp3={$tp3} WHERE id=$id";
    $result = pg_query($query);

    //Go to tp page
    header('Location: Tritone_paradox.html');
?>