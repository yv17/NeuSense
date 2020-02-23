<?php
    session_start();
    $id = $_SESSION['id'];

    //echo 'In oi.php <br>';
    $oi = $_POST["oi"];

    //echo $id . '<br>' . $oi . '<br>';

    $db = pg_connect("host=localhost port=5432 dbname=neusense user=neusenseuser password=password");

    //Insert to db and print to screen
    //$query = "INSERT INTO pollresult (id, oi) VALUES ($id, $oi)";
    $query = "UPDATE pollresult SET oi={$oi} WHERE id=$id";
    $result = pg_query($query);
    //echo '<br>Inserted into DB <br>';

    //Go to oi page
    header('Location: Octave_illusion.html');
?>