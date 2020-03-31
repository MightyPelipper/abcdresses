<?php 
require 'bin/functions.php';
require 'db_configuration.php';
$page_title = 'ABC Dresses > Preferences';
@include('nav.php');
@include('header.php'); //TODO fix the errors
    //$page="questions_list.php";  DONT NEED LOGIN. THIS WILL USE COOKIES if not logged in.
    //verifyLogin($page);

$sql1 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_DRESSES_PER_ROW'";
$sql2 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_DRESSES_TO_SHOW'";
$sql3 = "SELECT `comments` FROM `preferences` WHERE `name`= 'NAME_OF_FAVORITE_DRESS'";
$sql4 = "SELECT `comments` FROM `preferences` WHERE `name`= 'DEFAULT_VIEW_FOR_HOME_PAGE'";
$sql5 = "SELECT `value` FROM `preferences` WHERE `name`= 'IMAGE_HEIGHT_IN_GRID'";
$sql6 = "SELECT `value` FROM `preferences` WHERE `name`= 'IMAGE_WIDTH_IN_GRID'";
$sql7 = "SELECT `value` FROM `preferences` WHERE `name`= 'IMAGE_HEIGHT_IN_CAROUSAL'";
$sql8 = "SELECT `value` FROM `preferences` WHERE `name`= 'IMAGE_WIDTH_IN_CAROUSAL'";

$results = mysqli_query($db,$sql1);
$results2 = mysqli_query($db,$sql2);
$results3 = mysqli_query($db,$sql3);
$results4 = mysqli_query($db,$sql4);
$results5 = mysqli_query($db,$sql5);
$results6 = mysqli_query($db,$sql6);
$results7 = mysqli_query($db,$sql7);
$results8 = mysqli_query($db,$sql8);

//gets number of rows
if(mysqli_num_rows($results)>0){
    while($row = mysqli_fetch_assoc($results)){
        $column[] = $row;
    }
}
$rows = $column[0]['value'];

//gets number of dresses
if(mysqli_num_rows($results2)>0){
    while($row = mysqli_fetch_assoc($results2)){
        $dresses[] = $row;
    }
}
$dresses = $dresses[0]['value'];

//gets favorite dress
if(mysqli_num_rows($results3)>0){
    while($row = mysqli_fetch_assoc($results3)){
        $favorite[] = $row;
    }
}
$favorite = $favorite[0]['comments'];

//gets default view for home page
if(mysqli_num_rows($results4)>0){
    while($row = mysqli_fetch_assoc($results4)){
        $defaultView[] = $row;
    }
}
$defaultView = $defaultView[0]['comments'];

//gets height in grid view
if(mysqli_num_rows($results5)>0){
    while($row = mysqli_fetch_assoc($results5)){
        $gridHeight[] = $row;
    }
}
$gridHeight = $gridHeight[0]['value'];


//gets width in grid view
if(mysqli_num_rows($results6)>0){
    while($row = mysqli_fetch_assoc($results6)){
        $gridWidth[] = $row;
    }
}
$gridWidth = $gridWidth[0]['value'];

//gets height in carousal view
if(mysqli_num_rows($results7)>0){
    while($row = mysqli_fetch_assoc($results7)){
        $carHeight[] = $row;
    }
}
$carHeight = $carHeight[0]['value'];

//gets width in carousal view
if(mysqli_num_rows($results8)>0){
    while($row = mysqli_fetch_assoc($results8)){
        $carWidth[] = $row;
    }
}
$carWidth = $carWidth[0]['value'];


//SQL statements for drop down select tag

$sql_dropdown = "SELECT `name` FROM `dresses`";
$result_dropdown = mysqli_query($db,$sql_dropdown);

//stores all dresses into an array
if(mysqli_num_rows($result_dropdown)>0){
    while($row = mysqli_fetch_assoc($result_dropdown)){
        $dress_names[] = $row;
    }
}

$count_dresses = count($dress_names);





// show user correct preference page ( logged in or logged out)



if( isset( $_SESSION['logged_in'] ) ) { //use database for index layout
    include('db_preferences.php');
 }else { //use temporary cookies for index layout
    include('cookie_preferences.php');
 }


?>


