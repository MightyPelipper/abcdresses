<?php

include_once 'db_configuration.php';

if (isset($_POST['category'])){

    echo "HERE";
    $name = mysqli_real_escape_string($db,$_POST['name']);
    $description = mysqli_real_escape_string($db,$_POST['description']);
    $did_you_know = mysqli_real_escape_string($db,$_POST['did_you_know']);
    $category = mysqli_real_escape_string($db,$_POST['category']);
    $type = mysqli_real_escape_string($db,$_POST['type']);
    $state_name = mysqli_real_escape_string($db,$_POST['state_name']);
    $key_words = mysqli_real_escape_string($db,$_POST['key_words']);
    $dress_image = basename($_FILES["dress_image"]["name"]);
    //$validate = true;    
    
    //if($validate){
        
        $target_dir = "dress_images/";
        $target_file = $target_dir . basename($_FILES["dress_image"]["name"]);
        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["dress_image"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                header('location: create_dress.php?create_dress=fileRealFailed');
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            header('location: create_dress.php?create_dress=fileExistFailed');
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            header('location: create_dress.php?create_dress=fileTypeFailed');
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["dress_image"]["tmp_name"], $target_file)) {
                
                $sql = "INSERT INTO dresses(name,description,did_you_know,category,type,state_name,key_words,image_url)
                VALUES ('$name','$description','$did_you_know','$category','$type','$state_name','$key_words','$dress_image')
                ";

                mysqli_query($db, $sql);
                header('location: dresses_list.php?create_dress=Success');
                }
            }
        //}else{
            //header('location: create_dress.php?create_dress=answerFailed'); 
    //}        

}//end if

?>