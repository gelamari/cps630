<?php
session_start(); 
if ( isset( $_SESSION['id'] ) ) {
    $bool = 'yes';
} 

    include 'test.php';
    $conn = OpenCon();  
    $plans = $conn->query("SELECT * FROM plans");
    CloseCon($conn);


echo "<html>";
 
    $title = "Shopping Cart";
    $personalcss = "";
    include 'assets/includes/header.php';

echo "<body>";
    
    $page = 'cart';
    include 'assets/includes/nav.php';
?>
    <div class="row">
        <div class="col s12">
            <div class="col s12 m6 plans">
                <?php
                    if ($plans->num_rows > 0) {
                        // output data of each row
                        while($row = $plans->fetch_assoc()) {
                            echo "<div id=\"map".$row["id"]."\" class=\"hide\">".$row["map_link"]."</div>";
                            echo "<div value=\"".$row["id"]."\" class=\"hoverable card plan blue-grey card-action\">";
                                echo "<div class=\"card-content white-text\">";
                                    echo "<span class=\"card-title\">Vacation Plan ".$row["id"]."</span>";
                                    echo "<p>Start Date: ".$row["start_date"]."</p>";
                                    echo "<p>Duration: ".$row["duration"]." days </p>";
                                    echo "<p>Air/Cruise Fare: ".$row["fare"]."</p>";
                                    echo "<p>Total Price: ".$row["total_price"]."</p>";
                                    echo "<p> Description: ".$row["description"]."<p>";
                                echo "</div>";
                            echo "</div>";
                        }
                    }
                ?>
            </div>
            <div id="vacationPlan" class="hide col s12 m6">  
                    <h2 id="vacationTitle"></h2>
                    <div>
                        <div class="input-field col s12">
                            <label for="planSelect"># of Travelers:</label>
                            <input type="number" id="planSelect" value="1" min="1" max="100"/>
                        </div>
                    </div>
                    <br><br><br>
                    <div>
                        <div id="traveler0" class="col s12 m3 traveler-age input-field align-right">
                            <label id="traveler0-label" for="traveler0-input" >Traveler 1 age: </label>
                            <input id="traveler0-input" type="text" class="traveler-age"/>
                        </div>
                    </div>
                    <div id="numOfTravelers"></div>
                    <br><br>
                    <div>
                        <div class="col s12">
                            <h5 class="inline">Total Price (with taxes): $</h5>
                            <h5 class="inline" id="totalPrice"> </h5>
                            <br><br>
                            <div><a id="purchaseButton" data-id="" class="btn white-text waves-effect waves-light">Purchase <i class="material-icons right">send</i></a></div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="center-align col s12">
        <iframe id="map" src="" class="col s12" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
</body>

</html>

<script>
    $(document).ready(function () {
        var totalPrice = 0;

        // When a plan is clicked on, GET the info
        $(".plan").on('click', function() {
            $("#vacationPlan").removeClass('hide');
            $("#purchaseButton").removeClass('hide');
            $('#planSelect').prop('disabled', false);
            $("#traveler0-input").prop('disabled', false);
            $('#numOfTravelers').empty();
            $('#planSelect').val(1);
            $("#traveler0-input").val('');
            $("#totalPrice").html('');
            $("#purchaseButton").attr('data-id', $(this).attr("value"));
            $("#map").attr("src",$("#map" + $(this).attr("value")).html());

            $("#vacationTitle").html('Vacation Plan ' + $(this).attr("value"));
			var request = $.ajax({
				url: "test.php",
				type: "POST",
				data: { plan_id : $(this).attr("value") }
            });
            request.done(function(msg) {
                //if already ordered or not.
                if (isJson(msg)) {
                    $("#purchaseButton").addClass('hide');
                    msgJson = JSON.parse(msg);
                    fillTravellers(msgJson.num_travelers, msgJson.ages.split(','));
                    $("#totalPrice").html(msgJson.total);
                } else {
                    totalPrice = msg.split("|")[1];
                    $("#totalPrice").html((msg.split("|")[1] * 1.13).toFixed(2));
                }
            });
            request.fail(function(jqXHR, textStatus) {
            alert( "Request failed: " + textStatus );
            });
		});

        // when clicking on a plan, must get the info from the database.
        $('#planSelect').bind('input', function() { 
            var numOfTravelers = $(this).val();
            $('#numOfTravelers').empty();
            for (i = 1; i < numOfTravelers; i++) {
                // probably better way to check but will do for now
                if (numOfTravelers < 101) {
                    $('#numOfTravelers').append('<div id="traveler' + i + '" class="col s12 m3 traveler-age input-field align-right">');
                        $('#traveler' + i).append('<label for="traveler-age">Traveler ' + (i + 1) + ' age: </label>');
                        $('#traveler' + i).append('<input id="traveler' + i + '-input" type="text" class="traveler-age"/>');
                    $('#numOfTravelers').append('</div>');
                }
            }
            $("#totalPrice").html((totalPrice * numOfTravelers * 1.13).toFixed(2));
        });

        // adds the plan to the orders table
        $("#purchaseButton").on('click', function() {
            var agesArray = [];
            var numTravelers = $("#planSelect").val();
            for (i = 0; i < numTravelers; i++) {
                agesArray.push($("#traveler" + i + "-input").val());
            }

            var request = $.ajax({
				url: "test.php",
				type: "POST",
				data: { 
                    purchase : true,
                    plan_id: $(this).attr('data-id'),
                    num_travelers: numTravelers,
                    ages: agesArray.toString(),
                    total: $("#totalPrice").html()
                    }
            });
            request.done(function(msg) {
                console.log(msg);
            });
            request.fail(function(jqXHR, textStatus) {
            alert( "Request failed: " + textStatus );
            });
        });
    });

    // If already ordered, fill in the details from the order
    function fillTravellers(length, array) {
        $('#planSelect').val(length);
        $('#planSelect').prop('disabled', true);
        $('#numOfTravelers').empty();
        for (i = 0; i < length; i++) {
                if (length > 0) { 
                    $("#traveler0-input").val(array[0]);
                    $("#traveler0-input").prop('disabled', true);
                    $("#traveler0-label").addClass('active');
                    } 
                if (i > 0 && length < 101) {
                    $('#numOfTravelers').append('<div id="traveler' + i + '" class="col s12 m3 traveler-age input-field align-right">')
                        $('#traveler' + i).append('<label for="traveler-age" class="active">Traveler ' + (i + 1) + ' age: </label>')
                        $('#traveler' + i).append('<input disabled type="text" class="traveler-age" value="' + array[i] + '"/>')
                    $('#numOfTravelers').append('</div>')
                }
            }
    }
    // is the output json? true/false
    function isJson(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }
</script>
