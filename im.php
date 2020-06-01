<?php
    include 'db.php';

    session_start();
    $id = $_SESSION['id'];
    $im = $_POST["im"];

    // Insert poll response into database
    $query = "UPDATE pollresult SET im={$im} WHERE id=$id";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    // Fetching poll results
    $details = countEachIM(0,$pdo);
    $im0 = $details["count"];
    $details = countEachIM(1,$pdo);
    $im1 = $details["count"];
    $details = countEachIM(2,$pdo);
    $im2 = $details["count"];

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