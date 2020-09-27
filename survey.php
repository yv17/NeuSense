<?php
    include 'db.php';

    echo 'Unexpected input <br><br>';

    session_start();

    $consent = $_POST["consent"];
    $age = $_POST["age"];
    $handedness = $_POST["handedness"];
    $training = $_POST["training"];

    if($consent!=0){
        $query = "INSERT INTO surveyresult VALUES (default, $consent, $age, $handedness, $training) RETURNING id";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $details = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $details["id"];

        //Fill pollresult table
        $query = "INSERT INTO pollresult (id) VALUES ($id)";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
    }
    else{
        $id = 0;
    }

    $_SESSION['consent'] = $consent;
    $_SESSION['id'] = $id;
    $_SESSION['oiflag'] = 0;
    $_SESSION['tpflag'] = 0;
    $_SESSION['mmflag'] = 0;
    $_SESSION['imflag'] = 0;
    
    //Go to overview page
    header('Location: overview_page.html');
?>