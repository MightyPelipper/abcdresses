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
    
    
    $dress_image = basename($_FILES["dress_image"]["name"]);
    //$solution_image = basename($_FILES["solution_image"]["name"]);
    //$validate = true;
    //$validate = emailValidate($answer);
    
    
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
                header('location: modify_dress.php?create_dress=fileRealFailed');
                $uploadOk = 0;
            }
        }
        
        //if (file_exists($target_file)) {
            //header('location: dresses_list.php?modify_dress=fileExistsFailed');
           // $uploadOk = 0;
        //}// doesnt work yet
        
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            header('location: modify_dress.php?modify_dress=fileTypeFailed');
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["dress_image"]["tmp_name"], $target_file)) {
                
                $sql = "UPDATE dresses
                SET name = '$name',
                    description ='$description',
                    did_you_know = '$did_you_know',
                    category = '$category',
                    type = '$type',
                    key_words = '$key_words',
                    image_url = '$dress_image'
                WHERE id ='$id'";

                mysqli_query($db, $sql);
                header('location: dresses_list.php?modifyDress=Success');
                }
            }
        //}else{
            //header('location: createPuzzle.php?createPuzzle=PuzzleFailed'); 
    //}        

}//end if
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