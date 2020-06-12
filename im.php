<?php
    include 'db.php';
    
    echo 'Unexpected input <br><br>';

    session_start();
    $consent = $_SESSION['consent'];
    $id = $_SESSION['id'];
    $im = $_POST["im"];

    if($consent!=0){
        // Insert poll response into database
        $query = "UPDATE pollresult SET im={$im} WHERE id=$id";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
    }

    // Fetching poll results
    $details = countEachIM(0,$pdo);
    $im0 = $details["count"];
    $details = countEachIM(1,$pdo);
    $im1 = $details["count"];
    $details = countEachIM(2,$pdo);
    $im2 = $details["count"];

    if($consent==0){
        if($im==0) $im0++;
        elseif($im==1) $im1++;
        elseif($im==2) $im2++;
    }

    setIM($im0, $im1, $im2);
    $_SESSION['imflag'] = 1;

    header('Location: Interleaved_melodies.php');

    function countEachIM($which,$pdo){
        $query = "SELECT COUNT(im) FROM pollresult WHERE im={$which}";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $details = $stmt->fetch(PDO::FETCH_ASSOC);
        return $details;
    }

    function setIM($im0, $im1, $im2){
        $_SESSION['im0'] = $im0;
        $_SESSION['im1'] = $im1;
        $_SESSION['im2'] = $im2;
    }
?>