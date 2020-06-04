<?php

$host = "ec2-52-44-55-63.compute-1.amazonaws.com";
$user = "blcnajqcdilkdu";
$password = "02a8100b19b8e94e7265511faa6ed9da8e420724dcc12a0722028eba091a389e";
$dbname = "db8j18c8uas5d3";
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