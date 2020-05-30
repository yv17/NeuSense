<?php
    session_start();
    $id = $_SESSION['id'];

    $tp1 = $_POST["tp1"];
    $tp2 = $_POST["tp2"];
    $tp3 = $_POST["tp3"];
    $tp4 = $_POST["tp4"];

    $db = pg_connect("host=localhost port=5432 dbname=neusense user=neusenseuser password=password");

    //Insert to db
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

    $result = countEachTP('tp2',2);
    while($row = pg_fetch_array($result)){
        $atp2 = $row["count"];
    }
    $result = countEachTP('tp2',3);
    while($row = pg_fetch_array($result)){
        $dtp2 = $row["count"];
    }

    $result = countEachTP('tp3',4);
    while($row = pg_fetch_array($result)){
        $atp3 = $row["count"];
    }
    $result = countEachTP('tp3',5);
    while($row = pg_fetch_array($result)){
        $dtp3 = $row["count"];
    }

    $result = countEachTP('tp4',6);
    while($row = pg_fetch_array($result)){
        $atp4 = $row["count"];
    }
    $result = countEachTP('tp4',7);
    while($row = pg_fetch_array($result)){
        $dtp4 = $row["count"];
    }

    setTP($atp1, $dtp1, $atp2, $dtp2, $atp3, $dtp3, $atp4, $dtp4);

    // Fetching number of responses linked to user survey
    $tpres = array();

    $j_loop = array('age','handedness','training');
    $k_loop = array(5,3,3);
    $resp_loop = array('tp1','tp2','tp3','tp4');

    // Initialise all elements to zero
    for($i=0; $i<8; $i++){
        for($j=0; $j<3; $j++){
            for($k=0; $k<$k_loop[$j]; $k++){
                $tpres[$i][$j][$k]=0;
            }
        }
    }

    // Count number of each response in relation to user survey response
    // i loops over poll responses
    // j loops over different categories
    // k loops over different groups in each category
    // e.g. array(0,0,0): First 0 means response 0; Second 0 means age; Third 0 means below 18
    for($i=0; $i<8; $i++){
        if($i==0 || $i==1){
            $col = $resp_loop[0];
        }
        elseif($i==2 || $i==3){
            $col = $resp_loop[1];
        }
        elseif($i==4 || $i==5){
            $col = $resp_loop[2];
        }
        elseif($i==6 || $i==7){
            $col = $resp_loop[3];
        }

        for($j=0; $j<3; $j++){
            for($k=0; $k<$k_loop[$j]; $k++){
                $category = $j_loop[$j];
                $query = "SELECT COUNT($category) FROM surveyresult
                FULL OUTER JOIN pollresult
                ON surveyresult.id = pollresult.id
                WHERE pollresult.$col={$i}
                AND surveyresult.$category={$k}";

                $res = pg_query($query);
                while($row = pg_fetch_array($res)){
                    $count = $row["count"];
                }
                $tpres[$i][$j][$k] = $tpres[$i][$j][$k] + $count;
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
        AND pollresult.tp1 IS NOT NULL";
        $result = pg_query($query);
        while($row = pg_fetch_array($result)){
            $ageN = $row["count"];
        }
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
        AND pollresult.tp1 IS NOT NULL";
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
        AND pollresult.tp1 IS NOT NULL";
        $result = pg_query($query);
        while($row = pg_fetch_array($result)){
            $trainingN = $row["count"];
        }
        $trainingsN[$i] = $trainingN;
        $totalN = $totalN + $trainingN;
    }

    // Normalising to percentage
    for($i=0; $i<8; $i++){
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
                if($tpres[$i][$j][$k]!=0){
                    $tpres[$i][$j][$k] = 100*$tpres[$i][$j][$k] / $factor[$k];
                }
            }
        }
    }
    
    // Display percentage values
    for($i=0; $i<8; $i++){
        for($j=0; $j<3; $j++){
            for($k=0; $k<$k_loop[$j]; $k++){
                echo 'Element ' . $i . $j . $k . 'Value:' . $tpres[$i][$j][$k];
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
    for($i=0; $i<8; $i++){
        for($j=0; $j<3; $j++){
            for($k=0; $k<$k_loop[$j]; $k++){
                if($tpres[$i][$j][$k]>0 && $tpres[$i][$j][$k]<15){
                    $count++;
                    if($tpres[$i][$j][$k] < $firstMin){
                        $thirdMin = $secondMin;
                        $secondMin = $firstMin;
                        $firstMin = $tpres[$i][$j][$k];
                        $speciali[0] = $i;
                        $specialj[0] = $j;
                        $specialk[0] = $k;
                    }
                    elseif($tpres[$i][$j][$k] < $secondMin){
                        $thirdMin = $secondMin;
                        $secondMin = $tpres[$i][$j][$k];
                        $speciali[1] = $i;
                        $specialj[1] = $j;
                        $specialk[1] = $k;
                    }
                    elseif($tpres[$i][$j][$k] < $thirdMin){
                        $thirdMin = $tpres[$i][$j][$k];
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
    $textresp = array('ascending', 'descending');
    $resptext_loop = array('1','2','3','4');

    if($count>0){
        $_SESSION['tptextflag'] = 1;
        $tptext = '';
        for($l=0; $l<$noMin; $l++){
            $i = $speciali[$l];
            $j = $specialj[$l];
            $k = $specialk[$l];
            if($i>-1 || $j>-1 || $k>-1){
                if($i==0 || $i==1){
                    $resp = $resptext_loop[0];
                }
                elseif($i==2 || $i==3){
                    $resp = $resptext_loop[1];
                }
                elseif($i==4 || $i==5){
                    $resp = $resptext_loop[2];
                }
                elseif($i==6 || $i==7){
                    $resp = $resptext_loop[3];
                }
                $val = number_format($tpres[$i][$j][$k], 1);  
                $tptext = $tptext . $val . '% of people ' . $text[$j][$k] . ' heard tritone set ' . $resp . ' as ' . $textresp[$i%2] . '<br><br>';
            }
        }
        $tptext = $tptext . '*Data compiled over ' . $totalN . ' people';
        $_SESSION['tptext'] = $tptext;
    }
    else{
        $_SESSION['tptextflag'] = 0;
    }


    $_SESSION['tpflag'] = 1;

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