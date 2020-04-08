<?php

include_once('db_configuration.php');

//Get the values from DB to set as default settings for cookie prefs

$sql1 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_DRESSES_PER_ROW'";
$sql2 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_DRESSES_TO_SHOW'";
$sql3 = "SELECT `comments` FROM `preferences` WHERE `name`= 'DEFAULT_VIEW_FOR_HOME_PAGE'";
$sql4 = "SELECT `value` FROM `preferences` WHERE `name`= 'IMAGE_HEIGHT_IN_GRID'";
$sql5 = "SELECT `value` FROM `preferences` WHERE `name`= 'IMAGE_WIDTH_IN_GRID'";
$sql6 = "SELECT `value` FROM `preferences` WHERE `name`= 'IMAGE_HEIGHT_IN_CAROUSAL'";
$sql7 = "SELECT `value` FROM `preferences` WHERE `name`= 'IMAGE_WIDTH_IN_CAROUSAL'";

//run the queries

$results1 = mysqli_query($db,$sql1);
$results2 = mysqli_query($db,$sql2);
$results3 = mysqli_query($db,$sql3);
$results4 = mysqli_query($db,$sql4);
$results5 = mysqli_query($db,$sql5);
$results6 = mysqli_query($db,$sql6);
$results7 = mysqli_query($db,$sql7);

//put the values of query into array

if(mysqli_num_rows($results1)>0){
    while($row = mysqli_fetch_assoc($results1)){
        $num_per_row[] = $row;
    }
}

if(mysqli_num_rows($results2)>0){
    while($row = mysqli_fetch_assoc($results2)){
        $num_to_show[] = $row;
    }
}

if(mysqli_num_rows($results3)>0){
    while($row = mysqli_fetch_assoc($results3)){
        $default_view[] = $row;
    }
}

if(mysqli_num_rows($results4)>0){
    while($row = mysqli_fetch_assoc($results4)){
        $height_grid[] = $row;
    }
}

if(mysqli_num_rows($results5)>0){
    while($row = mysqli_fetch_assoc($results5)){
        $width_grid[] = $row;
    }
}


if(mysqli_num_rows($results6)>0){
    while($row = mysqli_fetch_assoc($results6)){
        $height_car[] = $row;
    }
}


if(mysqli_num_rows($results7)>0){
    while($row = mysqli_fetch_assoc($results7)){
        $width_car[] = $row;
    }
}

//assign values to a variable
$num_rows =  $num_per_row[0]['value'];
$num_show =  $num_per_row[0]['value'];
$defaultView = $default_view[0]['comments'];

$height_grids = $height_grid[0]['value'];
$width_grids = $width_grid[0]['value'];
$height_cars = $height_car[0]['value'];
$width_cars = $width_car[0]['value'];

