<html>
<?php 
    $title = "Contact us";
    include 'assets/includes/header.php';
?>
<body>
    <?php 
    $page = 'contact';
    include 'assets/includes/nav.php';
    ?>
    <div class="container-fluid">
    <div class="row">
        <div class="col s12 m4 l4 xl4">
            <div class="card">
                <div class="card-image">
                    <img src="assets/img/dog.png" class="cont center">
                </div>
                <div class="card-content center">
                    <span class="card-title">Nick De Santo</span>
                    <p>
                        Student ID: 500686917<br>
                        Email: ndesanto@ryerson.ca
                    </p>
                </div>
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">filter_drama</i>Responsibilities</div>
                        <div class="collapsible-body">
                            <ul>• Created the Cart page</ul>
                            <ul>• Created the Search function</ul>
                            <ul>• Helped with database (notably the plans & orders)</ul>
                            <ul>• Helped with PHP logic throughout website<ul>
                            <ul>• Helped with questions on report</ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col s12 m4 l4 xl4">
            <div class="card">
                <div class="card-image">
                    <img src="assets/img/dog1.png" class="cont center">
                </div>
                <div class="card-content center">
                    <span class="card-title">Angela Gavin</span>
                    <p>
                        Student ID: 500761490<br>
                        Email: angela.gavin@ryerson.ca
                    </p>
                </div>
                <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>Responsibilities</div>
                    <div class="collapsible-body">
                    <ul>
                        <li>Read More Page</li>
                        <li>Link from Home Page to Read More Page</li>
                        <li>Implement the Nearby Attractions (CSS and Linking to Appropriate Read More Page using PHP) of the Home Page</li>
                        <li>Created Database Structure and Entries for Attractions, Photos and Reviews</li>
                        <li>Technical Report Main Writer</li>
                        <li>UI Design and Layout Website Editor</li>

                    </ul>

                </li>
                </ul>
            </div>
        </div>
        <div class="col s12 m4 l4 xl4">
            <div class="card">
                <div class="card-image">
                    <img src="assets/img/dog2.png" class="cont center">
                </div>
                <div class="card-content center">
                    <span class="card-title">Alison Der</span>
                    <p>
                        Student ID: 500815229<br>
                        Email: ader@ryerson.ca
                    </p>
                </div>
                <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>Responsibilities</div>
                    <div class="collapsible-body"><span><ul>
                    <li>Created the Home page</li>
                    <li>Designed About and Contact page</li>
                    <li>Added photos to database for Home page</li>
                    <li>UI Design and Layout Website Editor</li>
                    <li>Technical Report Editor</li></span></div>
                </li>
                </ul>
            </div>
        </div>
    </div>
</div>
   <script type="text/javascript">
       
       $(document).ready(function(){
                 $('.collapsible').collapsible();
                 $('.collapsible-body li').css('list-style-type', 'circle');
       });
   </script>
<body>