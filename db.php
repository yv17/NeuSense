<?php

$host = "ec2-18-232-143-90.compute-1.amazonaws.com";
$dbname = "dc5oj7nljkdpa8";
$user = "uvhslhwhgqeqfd";
$port = "5432";
$password = "8a346654d6716611a0c11a9ee8fa05d397795ea4812f1fb01d9e99d40401741f";

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
    echo "Error connecting to database<br><br>";
    echo "Connection failed: " . $e->getMessage();
}

?>