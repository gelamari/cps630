

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

        // sql to delete a record
        $sql = "DELETE FROM StRec WHERE middlename='Mango'";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $conn->close();
    }
    catch (PDOException $e) {
        echo "<br><hr><strong>Error: </strong>";
        die($e->getMessage());
    }
?> 


