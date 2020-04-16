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
    $first_dress = basename($_FILES["first_dress"]["name"]);
    $final_dress = basename($_FILES["final_dress"]["name"]);
    //$validate = true;    
    
    //if($validate){
      
    //design image validation    
        $target_dir = "./images/dress_images/";
        $target_file = $target_dir . basename($_FILES["first_dress"]["name"]);
        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["first_dress"]["tmp_name"]);
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

    //final design validation    
        $target_dir_final = "./images/final_designs/";
        $target_file_final = $target_dir_final . basename($_FILES["final_dress"]["name"]);
        $uploadOk_final = 1;

        $imageFileType_final = strtolower(pathinfo($target_file_final,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check_final = getimagesize($_FILES["final_dress"]["tmp_name"]);
            if($check_final !== false) {
                $uploadOk_final = 1;
            } else {
                header('location: create_dress.php?create_dress=fileRealFailed');
                $uploadOk_final = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file_final)) {
            header('location: create_dress.php?create_dress=fileExistFailed');
        }

        // Allow certain file formats
        if($imageFileType_final != "jpg" && $imageFileType_final != "png" && $imageFileType_final != "jpeg"
        && $imageFileType_final != "gif" ) {
            header('location: create_dress.php?create_dress=fileTypeFailed');
            $uploadOk_final = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOK == 0 && $uploadOk_final == 0) {
            

        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["first_dress"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["final_dress"]["tmp_name"], $target_file_final)) {
                
                $sql = "INSERT INTO dresses(name,description,did_you_know,category,type,state_name,key_words,dress_image,final_design)
                VALUES ('$name','$description','$did_you_know','$category','$type','$state_name','$key_words','$first_dress','$final_dress')
                ";

                mysqli_query($db, $sql);
                header('location: dresses_list.php?create_dress=Success');
                }

                if(isset($_GET['name'])){

                    $name = str_replace(' ', '_', $name);
                    $name = strtolower(pathinfo($name,PATHINFO_EXTENSION));

                
                     }
                    $directory = "./images/"; 
                    chdir($directory);
                    $images = glob($directory . "*"); 
                    foreach($images as $image) {
                        if (substr($image, -4) === '.jpg') {
                          continue;
                 
                    }
                            $newname = preg_replace('@\..*$@', '.jpg', $image);
                            `convert $image $new_name`;
                
                 
                   
                // Checking If File Already Exists 
                if(file_exists($new_name)) 
                 {  
                   echo "Error While Renaming $images" ; 
                 } 
                else
                 { 
                   if(rename( $images, $new_name)) 
                     {  
                        echo "Successfully Renamed $images to $new_name" ; 
                     } 
                     else
                     { 
                        echo "A File With The Same Name Already Exists" ; 
                     } 
                  } 
                }
            }
        //}else{
            //header('location: create_dress.php?create_dress=answerFailed'); 
    //}        

}//end if

?>