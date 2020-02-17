<?php
    $servername = "us-cdbr-iron-east-04.cleardb.net";
    $username = "b14d132ab0daf1";
    $password = "4235e037";
    $dbname = "heroku_fe29b274b3b479c";

    try {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // sql to create table
        $sql = "CREATE TABLE StRec (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP,
        middlename VARCHAR(30)
        )";

        if ($conn->query($sql) === TRUE) {
            echo "Table Student Records created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }

        $conn->close();
    }
    catch (mysqli_sql_exception $e) {
        echo 'error with database transaction';
    }
?> 
