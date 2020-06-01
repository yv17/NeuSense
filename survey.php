<?php
    include 'db.php';

    session_start();

    $consent = $_POST["consent"];
    $age = $_POST["age"];
    $handedness = $_POST["handedness"];
    $training = $_POST["training"];

    /*
    $sql = "SELECT * FROM surveyresult";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rowCount = $stmt->rowCount();
    $details = $stmt->fetch();

    print_r($details);
   */

    //Insert to db and print to screen
    /*$query = "INSERT INTO surveyresult VALUES (default, $consent, $age, $handedness, $training) RETURNING id";
    $result = pg_query($query);
    while ($row = pg_fetch_array($result)){
        $id = $row['id'];
    }*/
    $query = "INSERT INTO surveyresult VALUES (default, $consent, $age, $handedness, $training) RETURNING id";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $details = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = $details["id"];

    $_SESSION['id'] = $id;
    $_SESSION['oiflag'] = 0;
    $_SESSION['tpflag'] = 0;
    $_SESSION['mmflag'] = 0;
    $_SESSION['imflag'] = 0;


    //Insert to other table
    /*$db = pg_connect("host=localhost port=5432 dbname=neusense user=neusenseuser password=password");
    $query = "INSERT INTO pollresult (id) VALUES ($id)";
    $result = pg_query($query);*/
    $query = "INSERT INTO pollresult (id) VALUES ($id)";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    echo "End of survey.php";
    
    //Go to overview page
    header('Location: overview_page.html');
?>