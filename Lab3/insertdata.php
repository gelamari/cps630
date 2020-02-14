<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "testnew";

    try {
        // Create connection
        $conn = new PDO('mysql:host=' + $servername + 'dbname=' + $dbname, $username, $password);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO StRec2 (firstname, lastname, middlename, email)
        VALUES ('Johni', 'Smith', 'Steve', 'john@example.com'),  ('Kevin', 'Jones', 'Jeff', 'kevin@different.com'),  ('Orange', 'Lemon', 'Mango', 'orange@different.com'), ('Person', 'Two', 'Last', 'person2@example.com')";

        if ($conn->query($sql) === TRUE) {
            echo "New record(s) created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    catch (PDOException $e) {
        echo "<br><hr><strong>Error: </strong>";
        die($e->getMessage());
    }
?> 
