<?php

include_once 'db_configuration.php';

if (isset($_POST['id'])){

    $id = mysqli_real_escape_string($db, $_POST['id']);
    $file = mysqli_real_escape_string($db, $_POST['dress_image']);
    $file_final = mysqli_real_escape_string($db, $_POST['final_design']);

    unlink($file);
    unlink($file_final);

}//end if
?>

