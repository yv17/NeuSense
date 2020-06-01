<?php
    include 'db.php';

    session_start();
    $id = $_SESSION['id'];
    $oi = $_POST["oi"];

    // Insert poll response into database
    $query = "UPDATE pollresult SET oi={$oi} WHERE id=$id";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    // Fetching poll results
    $details = countEachOI(0,$pdo);
    $left = $details["count"];
    $details = countEachOI(1,$pdo);
    $right = $details["count"];
    $details = countEachOI(2,$pdo);
    $unclear = $details["count"];

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

    // Count number of each response in relation to user survey response
    // i loops over poll responses
    // j loops over different categories
    // k loops over different groups in each category
    // e.g. array(0,0,0): First 0 means response 0; Second 0 means age; Third 0 means below 18
    for($i=0; $i<3; $i++){
        for($j=0; $j<3; $j++){
            for($k=0; $k<$k_loop[$j]; $k++){
                $category = $j_loop[$j];
                $query = "SELECT COUNT($category) FROM surveyresult
                FULL OUTER JOIN pollresult
                ON surveyresult.id = pollresult.id
                WHERE pollresult.oi={$i}
                AND surveyresult.$category={$k}";

                $stmt = $pdo->prepare($query);
                $stmt->execute();
                $details = $stmt->fetch(PDO::FETCH_ASSOC);
                $count = $details["count"];

                $oires[$i][$j][$k] = $oires[$i][$j][$k] + $count;
            }
        }
    }


    // To obtain percentage, each element divide by total of category
    // Obtain normalising factors
    
    // Obtain frequency of response for age
    // Indexed by 0, 18, 25, 40, 60
    $agesN = array();

    for($i=0; $i<5; $i++){
        $query = "SELECT COUNT(age) FROM surveyresult 
        FULL OUTER JOIN pollresult
        ON surveyresult.id = pollresult.id
        WHERE age={$i}
        AND pollresult.oi IS NOT NULL";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $details = $stmt->fetch(PDO::FETCH_ASSOC);
        $ageN = $details["count"];

        $agesN[$i] = $ageN;
    }
    

    // Obtain frequency of response for handedness
    // Indexed by left, right, ambidextrous
    $handsN = array();

    for($i=0; $i<3; $i++){
        $query = "SELECT COUNT(handedness) FROM surveyresult 
        FULL OUTER JOIN pollresult
        ON surveyresult.id = pollresult.id
        WHERE handedness={$i}
        AND pollresult.oi IS NOT NULL";
        
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $details = $stmt->fetch(PDO::FETCH_ASSOC);
        $handN = $details["count"];

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

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $details = $stmt->fetch(PDO::FETCH_ASSOC);
        $trainN = $details["count"];

        $trainingsN[$i] = $trainN;

        $totalN = $totalN + $trainN;
    }

    // Normalising to percentage
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

    // Display percentage values
    for($i=0; $i<3; $i++){
        for($j=0; $j<3; $j++){
            for($k=0; $k<$k_loop[$j]; $k++){
                echo 'Element ' . $i . $j . $k . 'Value:' . $oires[$i][$j][$k];
                echo '<br>';
            }
        }
    }

    // Finding the three lowest percentages between 0% and 15%
    $noMin = 3;
    $firstMin = 100;
    $secondMin = 100;
    $thirdMin = 100;
    $speciali = array(-1,-1,-1);
    $specialj = array(-1,-1,-1);
    $specialk = array(-1,-1,-1);
    $count = 0;
    for($i=0; $i<3; $i++){
        for($j=0; $j<3; $j++){
            for($k=0; $k<$k_loop[$j]; $k++){
                if($oires[$i][$j][$k]>0 && $oires[$i][$j][$k]<15){
                    $count++;
                    if($oires[$i][$j][$k] < $firstMin){
                        $thirdMin = $secondMin;
                        $secondMin = $firstMin;
                        $firstMin = $oires[$i][$j][$k];
                        $speciali[0] = $i;
                        $specialj[0] = $j;
                        $specialk[0] = $k;
                    }
                    elseif($oires[$i][$j][$k] < $secondMin){
                        $thirdMin = $secondMin;
                        $secondMin = $oires[$i][$j][$k];
                        $speciali[1] = $i;
                        $specialj[1] = $j;
                        $specialk[1] = $k;
                    }
                    elseif($oires[$i][$j][$k] < $thirdMin){
                        $thirdMin = $oires[$i][$j][$k];
                        $speciali[2] = $i;
                        $specialj[2] = $j;
                        $specialk[2] = $k;
                    }
                }
            }
        }
    }

    $text = array();
    $text[0] = array('who are under 18','who are between 18 and 25','who are between 25 and 40','who are between 40 and 60','who are above 60');
    $text[1] = array('who are left handed', 'who are right handed', 'who are ambidextrous');
    $text[2] = array('with no music training', 'with some music training', 'with formal music training');
    $textresp = array('heard the high tones in the left ear', 'heard the high tones in the right ear', 'found it unclear');

    if($count>0){
        $_SESSION['oitextflag'] = 1;
        $oitext = '';
        for($l=0; $l<$noMin; $l++){
            $i = $speciali[$l];
            $j = $specialj[$l];
            $k = $specialk[$l];
            if($i>-1 || $j>-1 || $k>-1){
                $val = number_format($oires[$i][$j][$k], 1);
                echo $val . '% of people who are ' . $text[$j][$k] . ' ' . $textresp[$i];
                echo '<br>';
        
                $oitext = $oitext . $val . '% of people ' . $text[$j][$k] . ' ' . $textresp[$i] . '<br><br>';
            }
        }
        $oitext = $oitext . '*Data compiled over ' . $totalN . ' people';
        $_SESSION['oitext'] = $oitext;
    }
    else{
        $_SESSION['oitextflag'] = 0;
    }

    // Poll has been answered
    $_SESSION['oiflag'] = 1;

    // Return to illusion page
    header('Location: Octave_illusion.php');

    function countEachOI($which,$pdo){
        $query = "SELECT COUNT(oi) FROM pollresult WHERE oi={$which}";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $details = $stmt->fetch(PDO::FETCH_ASSOC);
        return $details;
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