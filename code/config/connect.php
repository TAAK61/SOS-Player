<?php
    /**
     * connection à la base de donnée par PDO 
     */
    define('DB_NAME','buvettes');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_HOST','127.0.0.1');

    try {
    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER ,DB_PASSWORD );
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?> 