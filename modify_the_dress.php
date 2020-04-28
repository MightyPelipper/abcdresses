<?php
//this will upload the inputs into the localhost database
include_once 'db_configuration.php';

if (isset($_POST['id'])){

    echo "HERE";
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $description = mysqli_real_escape_string($db,$_POST['description']);
    $did_you_know = mysqli_real_escape_string($db,$_POST['did_you_know']);
    $category = mysqli_real_escape_string($db,$_POST['category']);
    $type  = mysqli_real_escape_string($db,$_POST['type']);
    $key_words = mysqli_real_escape_string($db,$_POST['key_words']);
    
    
    $first_dress = basename($_FILES["first_dress"]["name"]);
    $final_dress = basename($_FILES["final_dress"]["name"]);

    //$solution_image = basename($_FILES["solution_image"]["name"]);
    //$validate = true;
    //$validate = emailValidate($answer);
    
    
    //if($validate){
        
    //design_image directory information
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
                header('location: modify_dress.php?create_dress=fileRealFailed');
                $uploadOk = 0;
            }
        }
        
    //final_design directory information
        $target_dir_final = "./images/final_designs/";
        $target_file_final = $target_final_dir . basename($_FILES["final_dress"]["name"]);
        $uploadOk_final = 1;
        $imageFileType_final = strtolower(pathinfo($target_file_final,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check_final = getimagesize($_FILES["final_dress"]["tmp_name"]);
            if($check_final !== false) {
                $uploadOk_final = 1;
            } else {
                header('location: modify_dress.php?create_dress=fileRealFailed');
                $uploadOk_final = 0;
            }
        }

        /*if (file_exists($target_file)) {
            header('location: dresses_list.php?modify_dress=fileExistsFailed');
            $uploadOk = 3;
        }*/
    
    //design image checks
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            header('location: modify_dress.php?modify_dress=fileTypeFailed');
            $uploadOk = 0;
        }
        
    //final design checks
        // Allow certain file formats
        if($imageFileType_final != "jpg" && $imageFileType_final != "png" && $imageFileType_final != "jpeg"
        && $imageFileType_final != "gif" ) {
            header('location: modify_dress.php?modify_dress=fileTypeFailed');
            $uploadOk_final = 0;
        }
                
        //1. Update if both images are correct
        if ($uploadOk == 1 && $uploadOk_final == 1) {        
        
            $sql_11 = "UPDATE dresses
            SET dresses.name = '$name',
                dresses.description ='$description',
                dresses.did_you_know = '$did_you_know',
                dresses.category = '$category',
                dresses.type = '$type',
                dresses.key_words = '$key_words',
                dresses.dress_image = '$first_dress',
                dresses.final_design = '$final_dress'
            WHERE dresses.id ='$id';";

            mysqli_query($db, $sql_11);
            header('location: dresses_list.php?modifyDress=ImagesUpdateSuccess'.$uploadOk.$uploadOk_final);
        
        //2. If first image is incorrect but final design is okay
        } elseif ($uploadOk_final == 1) {
            $sql_01 = "UPDATE dresses
            SET dresses.name = '$name',
                dresses.description ='$description',
                dresses.did_you_know = '$did_you_know',
                dresses.category = '$category',
                dresses.type = '$type',
                dresses.key_words = '$key_words',
                dresses.final_design = '$final_dress'
            WHERE dresses.id ='$id';";

            mysqli_query($db, $sql_01);
            header('location: dresses_list.php?modifyDress=FinalImageSuccess'.$uploadOk.$uploadOk_final);
        
        } elseif ($uploadOk_final == 0 && $uploadOk == 0){
        //3. Update if no image changes are present
            $sql_00 = "UPDATE dresses
            SET dresses.name = '$name',
                dresses.description ='$description',
                dresses.did_you_know = '$did_you_know',
                dresses.category = '$category',
                dresses.type = '$type',
                dresses.key_words = '$key_words'
            WHERE dresses.id ='$id';";

            mysqli_query($db, $sql_00);
            header('location: dresses_list.php?modifyDress=TextUpdateSuccess'.$uploadOk.$uploadOk_final);   
        
        //4. If first image is okay, but final design is not    
        } else{
            $sql_10 = "UPDATE dresses
            SET dresses.name = '$name',
                dresses.description ='$description',
                dresses.did_you_know = '$did_you_know',
                dresses.category = '$category',
                dresses.type = '$type',
                dresses.key_words = '$key_words',
                dresses.dress_image = '$first_dress'
            WHERE dresses.id ='$id';";

            mysqli_query($db, $sql_10);
            header('location: dresses_list.php?modifyDress=FirstImageUpdateSuccess'.$uploadOk.$uploadOk_final);
        }
        // Move image files into folders
        /*
        if ($uploadOK == 1){
            move_uploaded_file($_FILES["first_dress"]["tmp_name"], $target_file);
        }
        if ($uploadOk_final == 1){
            move_uploaded_file($_FILES["final_dress"]["tmp_name"], $target_file_final);
        }else{
            header('location: createPuzzle.php?createPuzzle=PuzzleFailed'); 
        } */     
    }  
//end if
/*
function emailValidate($answer){
    global $choice1,$choice2,$choice3,$choice4;
    if($answer == $choice1 or $answer == $choice2 or $answer == $choice3 or $answer == $choice4){
        return true;
    }else{
        return false;
    }      
}
**/
?>