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
    while ($row = pg_fetch_array($result)){
        $id = $row['id'];
    }

    // Obtain frequency of response for age
    // Indexed by 0, 18, 25, 40, 60
    $_SESSION['agesN'] = array();

    for($i=0; $i<5; $i++){
        $query = "SELECT COUNT(age) FROM surveyresult WHERE age={$i}";
        $result = pg_query($query);
        while($row = pg_fetch_array($result)){
            $ageN = $row["count"];
            array_push($_SESSION['agesN'],$ageN);
        }
    }

    // Obtain frequency of response for handedness
    // Indexed by: left, right, ambidextrous
    $_SESSION['handsN'] = array();

    for($i=0; $i<3; $i++){
        $query = "SELECT COUNT(handedness) FROM surveyresult WHERE handedness={$i}";
        $result = pg_query($query);
        while($row = pg_fetch_array($result)){
            $handN = $row["count"];
            array_push($_SESSION['handsN'],$handN);
        }
    }

    // Obtain frequency of response for training
    // Indexed by: none, some, formal
    $_SESSION['trainingsN'] = array();

    for($i=0; $i<3; $i++){
        $query = "SELECT COUNT(training) FROM surveyresult WHERE training={$i}";
        $result = pg_query($query);
        while($row = pg_fetch_array($result)){
            $trainingN = $row["count"];
            array_push($_SESSION['trainingsN'],$trainingN);
        }
    }
    
    /*
    // Check correct values
    for($x = 0; $x < 3; $x++) {
        echo $_SESSION['trainingsN'][$x];
        echo "<br>";
    }
    */
    

    $_SESSION['id'] = $id;
    $_SESSION['oiflag'] = 0;
    $_SESSION['tpflag'] = 0;
    $_SESSION['mmflag'] = 0;
    $_SESSION['imflag'] = 0;

    //Insert to other table
    $db = pg_connect("host=localhost port=5432 dbname=neusense user=neusenseuser password=password");
    $query = "INSERT INTO pollresult (id) VALUES ($id)";
    $result = pg_query($query);

    //Go to overview page
    header('Location: overview_page.html');
?>