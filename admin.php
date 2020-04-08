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
    include('nav_admin.php'); 
    

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



