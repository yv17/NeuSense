<?php
    session_start();
    $id = $_SESSION['id'];
    $oi = $_POST["oi"];

    echo 'ID: ' . $id . '<br>';

    $db = pg_connect("host=localhost port=5432 dbname=neusense user=neusenseuser password=password");

    // Insert poll response into database
    $query = "UPDATE pollresult SET oi={$oi} WHERE id=$id";
    $result = pg_query($query);

    // Fetching number of each response
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

    // Setting session variables to be accessed on respective illusion page
    setOI($left, $right, $unclear);

    // Fetching number of responses linked to user survey
    $oires = array();

    $j_loop = array('age','handedness','training');
    $k_loop = array(5,3,3);

    // Initialise all elements to zero
    for($i=0; $i<3; $i++){
        for($j=0; $j<3; $j++){
            for($k=0; $k<$k_loop[$j]; $k++){
                $oires[$i][$j][$k]=0;
            }
        }
    }

    // i loops over poll responses
    // j loops over different categories
    // k loops over different groups in each category
    for($i=0; $i<3; $i++){
        for($j=0; $j<3; $j++){
            for($k=0; $k<$k_loop[$j]; $k++){
                $category = $j_loop[$j];
                $query = "SELECT COUNT($category) FROM surveyresult
                FULL OUTER JOIN pollresult
                ON surveyresult.id = pollresult.id
                WHERE pollresult.oi={$i}
                AND surveyresult.$category={$k}";

                $res = pg_query($query);
                while($row = pg_fetch_array($res)){
                    $count = $row["count"];
                }
                $oires[$i][$j][$k] = $oires[$i][$j][$k] + $count;
            }
        }
    }

    // To obtain percentage, each element divide by total of category
    // Obtain normalising factor
    
    // Obtain frequency of response for age
    // Indexed by 0, 18, 25, 40, 60
    $agesN = array();

    for($i=0; $i<5; $i++){
        $query = "SELECT COUNT(age) FROM surveyresult 
        FULL OUTER JOIN pollresult
        ON surveyresult.id = pollresult.id
        WHERE age={$i}
        AND pollresult.oi IS NOT NULL";
        $result = pg_query($query);
        while($row = pg_fetch_array($result)){
            $ageN = $row["count"];
        }
        $agesN[$i] = $ageN;
    }
    /*
    for($i=0; $i<5; $i++){
        echo 'Age'.$i.': '.$agesN[$i];
        echo '<br>';
    }
    */

    // Obtain frequency of response for handedness
    // Indexed by left, right, ambidextrous
    $handsN = array();

    for($i=0; $i<3; $i++){
        $query = "SELECT COUNT(handedness) FROM surveyresult 
        FULL OUTER JOIN pollresult
        ON surveyresult.id = pollresult.id
        WHERE handedness={$i}
        AND pollresult.oi IS NOT NULL";
        $result = pg_query($query);
        while($row = pg_fetch_array($result)){
            $handN = $row["count"];
        }
        $handsN[$i] = $handN;
    }

    // Obtain frequency of response for training
    // Indexed by none, some, formal
    $trainingsN = array();
    $totalN = 0;

    for($i=0; $i<3; $i++){
        $query = "SELECT COUNT(training) FROM surveyresult 
        FULL OUTER JOIN pollresult
        ON surveyresult.id = pollresult.id
        WHERE training={$i}
        AND pollresult.oi IS NOT NULL";
        $result = pg_query($query);
        while($row = pg_fetch_array($result)){
            $trainingN = $row["count"];
        }
        $trainingsN[$i] = $trainingN;
        $totalN = $totalN + $trainingN;
    }


    // Normalising
    for($i=0; $i<3; $i++){
        for($j=0; $j<3; $j++){
            if($j==0){
                $factor = $agesN;
            }
            elseif($j==1){
                $factor = $handsN;
            }
            elseif($j==2){
                $factor = $trainingsN;
            }
            for($k=0; $k<$k_loop[$j]; $k++){
                if($oires[$i][$j][$k]!=0){
                    $oires[$i][$j][$k] = 100*$oires[$i][$j][$k] / $factor[$k];
                }
            }
        }
    }

    for($i=0; $i<3; $i++){
        for($j=0; $j<3; $j++){
            for($k=0; $k<$k_loop[$j]; $k++){
                echo 'Element ' . $i . $j . $k . 'Value:' . $oires[$i][$j][$k];
                echo '<br>';
            }
        }
    }

    $text = array();
    $text[0] = array('who are under 18','who are between 18 and 25','who are between 25 and 40','who are between 40 and 60','who are above 60');
    $text[1] = array('who are left handed', 'who are right handed', 'who are ambidextrous');
    $text[2] = array('with no training', 'with some training', 'with formal training');
    $textresp = array('heard it in the left ear', 'heard it in the right ear', 'found it unclear');

    $speciali = array();
    $specialj = array();
    $specialk = array();
    $count = 0;
    for($i=0; $i<3; $i++){
        for($j=0; $j<3; $j++){
            for($k=0; $k<$k_loop[$j]; $k++){
                if($oires[$i][$j][$k]>0 && $oires[$i][$j][$k]<15){
                    $speciali[$count] = $i;
                    $specialj[$count] = $j;
                    $specialk[$count] = $k;
                    $count++;
                }
            }
        }
    }

    if($count>0){
        $_SESSION['oitextflag'] = 1;
        $oitext = '';
        for($l=0; $l<$count; $l++){
            $i = $speciali[$l];
            $j = $specialj[$l];
            $k = $specialk[$l];
            $val = number_format($oires[$i][$j][$k], 1);
            echo $val . '% of people who are ' . $text[$j][$k] . ' ' . $textresp[$i];
            echo '<br>';
    
            $oitext = $oitext . $val . '% of people ' . $text[$j][$k] . ' ' . $textresp[$i] . '<br><br>';
        }
        $oitext = $oitext . '*Data compiled over ' . $totalN . ' people';
        $_SESSION['oitext'] = $oitext;
    }
    else{
        $_SESSION['oitextflag'] = 0;
    }

    $_SESSION['oiflag'] = 1;

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