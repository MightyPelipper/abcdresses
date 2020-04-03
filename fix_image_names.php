<?php

include_once 'db_configuration.php';

if (isset($_POST['category'])){

    echo "HERE";
    $name = mysqli_real_escape_string($db,$_POST['name']);
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
                header('location: fix_names.php?fix_names=fileRealFailed');
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            header('location: fix_names.php?fix_names=fileExistFailed');
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            header('location: fix_names.php?fix_names=fileTypeFailed');
            $uploadOk = 0;
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
                    header('location: admin.php?fix_names=Success');
                    }
                }
            }
    
    ?>

<?php


$path = realpath('./images/dress_images/');


$di = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS),
    RecursiveIteratorIterator::LEAVES_ONLY
);


foreach($di as $name => $fio) {

    $newname = $fio->getPath() . DIRECTORY_SEPARATOR . strtolower( $fio->getFilename() );
    $newname = preg_replace('/\s+/', '_', $newname);
    $newname = preg_replace('@\..*$@', '.jpg', $newname);

  // echo $newname, "\r\n";
  //echo $newname, "\r\n"; 


    rename($name, $newname); 
 


                
       
        
}
    ?>


<?php


$path_final = realpath('./images/final_designs/');


$dir = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($path_final, FilesystemIterator::SKIP_DOTS),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach($dir as $name_final => $file) {
    $new_name = $file->getPath() . DIRECTORY_SEPARATOR . strtolower( $file->getFilename() );
    $new_name = preg_replace('/\s+/', '_', $new_name);
    $new_name = preg_replace('@\..*$@', '.jpg', $new_name);

    rename($name_final, $new_name); 

}

    ?>








  

    
   
    