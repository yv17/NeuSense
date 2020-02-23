<?php
    session_start();
    //echo 'In survey.php <br>';
    $consent = $_POST["consent"];
    $age = $_POST["age"];
    $handedness = $_POST["handedness"];
    $training = $_POST["training"];

    //echo $consent . '<br>' . $age . '<br>' . $handedness . '<br>' . $training;

    $db = pg_connect("host=localhost port=5432 dbname=neusense user=neusenseuser password=password");

    //Insert to db and print to screen
    $query = "INSERT INTO surveyresult VALUES (default, $consent, $age, $handedness, $training) RETURNING id";
    $result = pg_query($query);
    //echo '<br>Inserted into DB <br>';
    while ($row = pg_fetch_array($result)){
        $id = $row['id'];
        //echo "Last user id: " . $id;
    }

    $_SESSION['id'] = $id;

    //Insert to other table
    $db = pg_connect("host=localhost port=5432 dbname=neusense user=neusenseuser password=password");
    $query = "INSERT INTO pollresult (id) VALUES ($id)";
    $result = pg_query($query);

    //Go to overview page
    header('Location: overview_page.html');
?>