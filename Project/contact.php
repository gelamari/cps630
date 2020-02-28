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
                        <ul>
                            <li>Created the Cart page</li>
                            <li>Created the Search function</li>
                            <li>Established 'Published' Database Server</li>
                            <li>Created Database Structure and Entries for Travel Plans and Orders for Shopping Cart</li>
                            <li>Main Backend Developer; created the PHP logic of the website</li>
                            <li>Technical Report Editor</li>
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
                        <li>Created the Read More Page</li>
                        <li>Link from Home Page to Read More Page</li>
                        <li>Implement the Nearby Attractions (CSS and Linking to Appropriate Read More Page using PHP) of the Home Page</li>
                        <li>Created Database Structure and Entries for Attractions, Photos and Reviews</li>
                        <li>Technical Report Main Writer</li>
                        <li>UI Design and Layout Website Editor</li>

                    </ul>
                    </div>
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
                    <div class="collapsible-body">
                    <ul>
                        <li>Created the Home Page</li>
                        <li>Created the About Page</li>
                        <li>Created the Contact page</li>
                        <li>Added entries to Photos table of the Database</li>
                        <li>UI Design and Layout Website Editor</li>
                        <li>Technical Report Main Editor</li>
                    </ul>
                    </div>
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
                   $('.collapsible-body li').css('font-size', '16px');
                     $('.collapsible-header').css('font-size', '16px');
       });
   </script>
<body>