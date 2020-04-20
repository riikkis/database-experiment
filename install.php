<?php

/**
 * Opens a connection with PHP data object
 * and creates a new database with a structure 
 * defined in init.sql file.
 *
 */

require "config.php";

try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $sql = file_get_contents("data/init.sql");
    $connection->exec($sql);
    
    echo "Database created successfully.";
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}