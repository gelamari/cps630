

<html>
<?php 
    $title = "Database Maintaining";
    $personalcss = "";
    include 'assets/includes/header.php';
?>
<body>
    <?php 
    $page = 'dbMaintain';
    include 'assets/includes/nav.php';
    ?>
    <div class="drops">
       <form action="/action_page.php" id="dbMaintain">
        <select id="cars" name="select" form="dbMaintain">
            <option value="Display">SELECT</option>
            <option value="Display">SELECT ALL ENTRIES</option>
            <option value="saab" disabled>DELETE</option>
            <option value="opel" disabled>Modify</option>
        </select>
     <input type="submit">
    </form>
    </div>
<br>


    <div class="row">

    <?php
        include 'test.php';
        $conn = OpenCon();  


        $queryAttractions = "SELECT * FROM `attractions`";
        $queryOrders = "SELECT *  FROM `orders`";
        $queryPhotos = "SELECT *  FROM `photos` ";
        $queryPlans = "SELECT *  FROM `plans` ";
        $queryReviews ="SELECT *  FROM `reviews` ";
    
        $tables = array('Attractions', 'Orders', 'Photos', 'Plans', 'Reviews');
        $count = 0;
        $queries = array($queryAttractions, $queryOrders, $queryOrders, $queryPhotos, $queryPlans, $queryReviews);
    
        foreach($queries as $query) {
            $searchResult = $conn->query($query);
            echo "<h2>".$tables[$count]."</h2>";
            $count++;
            echo("<table class=\"responsive-table striped\">");
            $first_row = true;
            try {
                while ($row = $searchResult->fetch_assoc()) {
                    if ($first_row) {
                        $first_row = false;
                        // Output header row from keys.
                        echo '<tr>';
                        foreach($row as $key => $field) {
                            echo '<th>' . htmlspecialchars($key) . '</th>';
                        }
                        echo '</tr>';
                    }
                    echo '<tr>';
                    foreach($row as $key => $field) {
                        echo '<td style="overflow: hidden; max-width: 300px;">' . htmlspecialchars($field) . '</td>';
                    }
                    echo '</tr>';
                }
            } catch (Exception $e) {echo '';}
            echo("</table>");
        }

        CloseCon($conn);
    ?>
    </div>

    <script type="text/javascript">
         $(document).ready(function(){
               $('.header').hide();

                 $('.card').hide().fadeIn(1000);
       });

    </script>

</body>