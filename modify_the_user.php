<?php

include_once 'db_configuration.php';
if (isset($_POST['id'])){
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $role = mysqli_real_escape_string($db, $_POST['role']);
    $hash = $_POST['hash'];
    $hashed_password = password_hash($hash, PASSWORD_DEFAULT);


    $sql = "UPDATE users
    SET first_name = '$first_name',
        last_name = '$last_name',
        email = '$email',
        role = '$role',
        hash = '$hashed_password'
    WHERE id = '$id'";

    mysqli_query($db, $sql);
    header('location: user_list.php?userUpdated=Success');

}
?>