<?php

if (isset($_POST['new_rows'])){
    //cookie names
    $cookie1 = "numberOfRows";
    $cookie2 = "numberOfDresses";
    $cookie3 = "favoriteDress";
    $cookie4 = "defaultView";
    $cookie5 = "heightGrid";
    $cookie6 = "widthGrid";
    $cookie7 = "heightCar";
    $cookie8 = "widthCar";

    //values of cookies
    $cookie_rows =  $_POST['new_rows'];
    $cookie_dresses = $_POST['new_dresses'];
    $cookie_favorite = $_POST['new_favorite'];
    $cookie_defaultView = $_POST['new_defaultView'];
    $cookie_gridHeight = $_POST['new_HeightGrid'];
    $cookie_gridWidth = $_POST['new_WidthGrid'];
    $cookie_carHeight = $_POST['new_HeightCar'];
    $cookie_carWidth = $_POST['new_WidthCar'];

    setcookie($cookie1, $cookie_rows);
    setcookie($cookie2, $cookie_dresses);
    setcookie($cookie3, $cookie_favorite);
    setcookie($cookie4, $cookie_defaultView); // 86400 = 1 day
    setcookie($cookie5, $cookie_gridHeight);
    setcookie($cookie6, $cookie_gridWidth);
    setcookie($cookie7, $cookie_carHeight);
    setcookie($cookie8, $cookie_carWidth);
}

if($cookie_defaultView == "List"){
    header('location: dresses_list.php?preferencesUpdated=Success');
}
else{
    header('location: index.php?preferencesUpdated=Success');
}