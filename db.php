<?php

$host = "ec2-52-70-15-120.compute-1.amazonaws.com";
$user = "dyhbaaxixmlwrx";
$password = "f2a626be912f270752b8316dfbe2a15870dd3bdd230345951a5d3f92471cf03c";
$dbname = "da4poich2l1dvu";
$port = "5432";

try{
    // Set DSN data source name
    $dsn = "pgsql:host=" . $host . ";port=" . $port . ";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";

    // Create PDO instance
    $pdo = new PDO($dsn,$user,$password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

?>