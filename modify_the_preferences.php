<?php

include_once 'db_configuration.php';

if (isset($_POST['new_rows'])){

    $rows = mysqli_real_escape_string($db, $_POST['new_rows']);
    $dresses = mysqli_real_escape_string($db, $_POST['new_dresses']);
    $favorite = mysqli_real_escape_string($db, $_POST['new_favorite']);
    $defaultView = mysqli_real_escape_string($db, $_POST['new_defaultView']);
      
    $sql1 = "UPDATE `preferences` SET `value`= $rows WHERE `name` = 'NO_OF_DRESSES_PER_ROW'";

    $sql2 = "UPDATE `preferences` SET `value`= $dresses WHERE `name` = 'NO_OF_DRESSES_TO_SHOW'";

    $sql3 = "UPDATE `preferences` SET `comments`= '$favorite' WHERE `name` = 'NAME_OF_FAVORITE_DRESS'";

    $sql4 = "UPDATE `preferences` SET `comments`= '$defaultView' WHERE `name` = 'DEFAULT_VIEW_FOR_HOME_PAGE'";

    mysqli_query($db, $sql1);
    mysqli_query($db, $sql2);
    mysqli_query($db, $sql3);
    mysqli_query($db, $sql4);
    header('location: index.php?preferencesUpdated=Success');

    
}//end if
?>
