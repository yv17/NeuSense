<?php
    include 'db.php';
    
    echo 'Unexpected input <br><br>';

    session_start();
    $consent = $_SESSION['consent'];
    $id = $_SESSION['id'];
    $mm = $_POST["mm"];

    if($consent!=0){
        // Insert poll response into database
        $query = "UPDATE pollresult SET mm={$mm} WHERE id=$id";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
    }

    // Fetching poll results
    $details = countEachMM(0,$pdo);
    $TTLS = $details["count"];
    $details = countEachMM(1,$pdo);
    $HBS = $details["count"];
    $details = countEachMM(2,$pdo);
    $TP = $details["count"];
    $details = countEachMM(3,$pdo);
    $OMDHAF = $details["count"];

    if($consent==0){
        if($mm==0) {$TTLS++; $ans='Twinkle Twinkle Little Star';}
        elseif($mm==1) {$HBS++; $ans='Happy Birthday Song';}
        elseif($mm==2) {$TP++; $ans='The Entertainer';}
        elseif($mm==3) {$OMDHAF++; $ans='Old McDonald Had A Farm';}
    }

    setMM($TTLS, $HBS, $TP, $OMDHAF);
    $_SESSION['mmflag'] = 1;
    $_SESSION['mmans'] = $ans;

    header('Location: Mysterious_melody.php');

    function countEachMM($which,$pdo){
        $query = "SELECT COUNT(mm) FROM pollresult WHERE mm={$which}";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $details = $stmt->fetch(PDO::FETCH_ASSOC);
        return $details;
    }

    function setMM($TTLS, $HBS, $TP, $OMDHAF){
        $_SESSION['TTLS'] = $TTLS;
        $_SESSION['HBS'] = $HBS;
        $_SESSION['TP'] = $TP;
        $_SESSION['OMDHAF'] = $OMDHAF;
    }
?>