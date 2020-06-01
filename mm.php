<?php
    include 'db.php';
    
    session_start();
    $id = $_SESSION['id'];
    $mm = $_POST["mm"];

    // Insert poll response into database
    $query = "UPDATE pollresult SET mm={$mm} WHERE id=$id";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    // Fetching poll results
    $details = countEachMM(0,$pdo);
    $TTLS = $details["count"];
    $details = countEachMM(1,$pdo);
    $HBS = $details["count"];
    $details = countEachMM(2,$pdo);
    $TP = $details["count"];
    $details = countEachMM(3,$pdo);
    $OMDHAF = $details["count"];

    setMM($TTLS, $HBS, $TP, $OMDHAF);
    $_SESSION['mmflag'] = 1;

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