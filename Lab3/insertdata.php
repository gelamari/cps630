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

        $sql = "INSERT INTO StRec (firstname, lastname, middlename, email)
        VALUES ('Johni', 'Smith', 'Steve', 'john@example.com'),  ('Kevin', 'Jones', 'Jeff', 'kevin@different.com'),  ('Orange', 'Lemon', 'Mango', 'orange@different.com'), ('Person', 'Two', 'Last', 'person2@example.com')";

        if ($conn->query($sql) === TRUE) {
            echo "New record(s) created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    catch (mysqli_sql_exception $e) {
        throw $e;
        echo 'error with database transaction';
    }
?> 
