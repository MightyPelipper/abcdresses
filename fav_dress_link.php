<?php
session_start();
//link to correct image from index using a button
require 'db_configuration.php';
$test =0;
//if the user is logged in use database information
if( isset( $_SESSION['logged_in'] )){


    $sql1 = "SELECT `comments` FROM `preferences` WHERE `name` = 'NAME_OF_FAVORITE_DRESS' ";
    

    $results1 = mysqli_query($db,$sql1);

    if(mysqli_num_rows($results1)>0){
        while($row = mysqli_fetch_assoc($results1)){
            $favorites[] = $row;
        }
    }
    
    $favoriteDress = $favorites[0]['comments'];
    
    
    //now get the id using the name stored in favorite

    $sql2 = "SELECT `id` FROM `dresses` WHERE `name` = '$favoriteDress' ";

    $results2 = mysqli_query($db,$sql2);

    if(mysqli_num_rows($results2)>0){
        while($row = mysqli_fetch_assoc($results2)){
            $favorites_id[] = $row;
        }
    }

    $favorite_id = $favorites_id[0]['id'];

    //echo "logged in ";
    //echo $favorite_id;
    header("location: view_dress.php?id=$favorite_id");


}else{  //if the user is not logged in use the stored cookies

    $cookie_favorite = $_COOKIE["favoriteDress"];
    
echo "<br>";
echo $cookie_favorite;


$sql2 = "SELECT `id` FROM `dresses` WHERE `name` = '$cookie_favorite' ";

    $results2 = mysqli_query($db,$sql2);

    if(mysqli_num_rows($results2)>0){
        while($row = mysqli_fetch_assoc($results2)){
            $favorites_id[] = $row;
        }
    }

    $favorite_id = $favorites_id[0]['id'];
    //echo $favorite_id;

    header("location: view_dress.php?id=$favorite_id");

}












