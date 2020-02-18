<html>
<?php 
    $title = "Shopping Cart";
    include 'assets/includes/header.php';
?>
<body>
    <?php 
    $page = 'cart';
    include 'assets/includes/nav.php';
    ?>
    <div class="grid-two p-4">
        <div id="plans">
            <!-- This list will be dynamic through PHP  -->
            <!-- for all plans -->
                <div class="plan">
                    <h2>Plan [php plan num]</h2>
                    <!-- php attributes -->
                        <p>Start Date:</p>
                        <p>Duration:</p>
                        <p>Air Fare:</p>
                        <p>Cruse Fare:</p>
                        <p>Tour Number:</p>
                        <p>Price in Total:</p>
                    <!--/php attributes  -->
                </div>
            <!--/for all plans -->
        </div>
        <div class="p-4">  
            <!-- if !purchased -->
            <form>
                <div class="grid-two-unbalanced align-right">
                    <p>Number of Travelers:</p>
                    <input class="input-field num" type="number" id="planSelect" min="1"  max="100" default="1"/>
                </div>
                <div id="numOfTravelers">
                    <div id="traveler0" class="traveler-age grid-two-unbalanced align-right">
                        <p>Traveler 1 Age: </p>
                        <input type="text" class="traveler-age"/>
                    </div>
                </div>
            </form>
            <!-- /if !purchased -->

            <div class="invoices">
                
            </div>
        </div>
    </div>
    <div class="center p-4">
        map 
        <!-- php plan.selected.map? see how this works -->
    </div>
</body>

</html>

<script>
    $(document).ready(function () {
        $('#planSelect').val('1');
        $('#planSelect').bind('input', function() { 
            var numOfTravelers = $(this).val();
            $('#numOfTravelers').empty();
            for (i = 0; i < numOfTravelers; i++) {
                // probably better way to check but will do for now
                if (numOfTravelers < 101) {
                    $('#numOfTravelers').append('<div id="traveler' + i + '" class="traveler-age grid-two-unbalanced align-right">')
                    $('#traveler' + i).append('<p>Traveler ' + (i + 1) + ' Age: </p>')
                    $('#traveler' + i).append('<input type="text" class="traveler-age"/>')
                    $('#numOfTravelers').append('</div>')
                }
            }
        });
    });
    // probably need a script to send the form data? rest call through php im assuming...
</script>