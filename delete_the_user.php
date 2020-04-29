<?php

include_once 'db_configuration.php';

if (isset($_POST['id'])){

    $id = mysqli_real_escape_string($db, $_POST['id']);


    $sql = "DELETE FROM users
            WHERE id = '$id'";

    mysqli_query($db, $sql);
    header('location: user_list.php?delete_user=Success');
}//end if
?>

