<?php

require 'bin/functions.php';
require 'db_configuration.php';

$nav_selected = "LIST";
$left_buttons = "NO";
$left_selected = "";



$query = "SELECT * FROM dresses";

$GLOBALS['data'] = mysqli_query($db, $query);

$GLOBALS['id'] = mysqli_query($db, $query);
 $GLOBALS['name'] = mysqli_query($db, $query);
 $GLOBALS['dress_image'] = mysqli_query($db, $query);
 $GLOBALS['final_design'] = mysqli_query($db, $query);
?>



<?php $page_title = 'ABC > dresses'; ?>
<?php 
    include('nav.php');
    @include('header.php'); 
    

    $page="dresses_list.php";
   // verifyLogin($page);
?>




<!--Styling for the tables and page-->
<style>
    #title {
        text-align: center;
        color: darkgoldenrod;
    }
    thead input {
        width: 100%;
    }
    .thumbnailSize{
        height: 100px;
        width: 100px;
        transition:transform 0.25s ease;
    }
    .thumbnailSize:hover {
        -webkit-transform:scale(3.5);
        transform:scale(3.5);
    }
</style>


<!-- Page Content -->
<br><br>
<div class="container-fluid">
    <?php
        if(isset($_GET['fix_names'])){
            if($_GET["fix_names"] == "Success"){
                echo '<br><h3>Success! Your image name has been changed!</h3>';
            }
        }

    

    ?>
   
    <form action="fix_image_names.php" method="POST" enctype="multipart/form-data">

    <div id="customerTableView">
        <button><a class="btn btn-lg" href="fix_names.php">Fix Image Names</a></button>
    