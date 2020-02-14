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

        $sql = "SELECT id, firstname, middlename, lastname, email FROM StRec2 WHERE email LIKE '%example.com%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["middlename"]." ".$row["lastname"]."</td><td>". $row["email"]."</td></tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();

    }
    catch (PDOException $e) {

        echo $e->errorMessage(); 
        echo 'error with database transaction';
    }
?> 
