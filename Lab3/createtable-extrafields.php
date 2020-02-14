<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "testnew";

    try {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // sql to create table
        $sql = "CREATE TABLE StRec2 (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP,
        middlename VARCHAR(30)
        )";

        if ($conn->query($sql) === TRUE) {
            echo "Table Student Records 2 created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }

        $conn->close();
    }
    catch (PDOException $e) {
        echo 'error with database transaction';
    }
?> 
