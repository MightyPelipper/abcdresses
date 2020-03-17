<?php

include_once 'db_configuration.php';

if (isset($_POST['new_rows'])){

    $rows = mysqli_real_escape_string($db, $_POST['new_rows']);
    $dresses = mysqli_real_escape_string($db, $_POST['new_dresses']);
    $favorite = mysqli_real_escape_string($db, $_POST['new_favorite']);
    $defaultView = mysqli_real_escape_string($db, $_POST['new_defaultView']);
    $gridHeight = mysqli_real_escape_string($db, $_POST['new_HeightGrid']);
    $gridWidth = mysqli_real_escape_string($db, $_POST['new_WidthGrid']);
    $carHeight = mysqli_real_escape_string($db, $_POST['new_HeightCar']);
    $carWidth = mysqli_real_escape_string($db, $_POST['new_WidthCar']);
      
    $sql1 = "UPDATE `preferences` SET `value`= $rows WHERE `name` = 'NO_OF_DRESSES_PER_ROW'";

    $sql2 = "UPDATE `preferences` SET `value`= $dresses WHERE `name` = 'NO_OF_DRESSES_TO_SHOW'";

    $sql3 = "UPDATE `preferences` SET `comments`= '$favorite' WHERE `name` = 'NAME_OF_FAVORITE_DRESS'";

    $sql4 = "UPDATE `preferences` SET `comments`= '$defaultView' WHERE `name` = 'DEFAULT_VIEW_FOR_HOME_PAGE'";

    $sql5 = "UPDATE `preferences` SET `value`= $gridHeight WHERE `name` = 'IMAGE_HEIGHT_IN_GRID'";

    $sql6 = "UPDATE `preferences` SET `value`= $gridWidth WHERE `name` = 'IMAGE_WIDTH_IN_GRID'";

    $sql7 = "UPDATE `preferences` SET `value`= $carHeight WHERE `name` = 'IMAGE_HEIGHT_IN_CAROUSAL'";

    $sql8 = "UPDATE `preferences` SET `value`= $carWidth WHERE `name` = 'IMAGE_WIDTH_IN_CAROUSAL'";

    mysqli_query($db, $sql1);
    mysqli_query($db, $sql2);
    mysqli_query($db, $sql3);
    mysqli_query($db, $sql4);
    mysqli_query($db, $sql5);
    mysqli_query($db, $sql6);
    mysqli_query($db, $sql7);
    mysqli_query($db, $sql8);
    header('location: index.php?preferencesUpdated=Success');

    
}//end if
?>
