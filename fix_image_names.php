<?php

include_once 'db_configuration.php';

if (isset($_POST['category'])){

    echo "HERE";
    $name = mysqli_real_escape_string($db,$_POST['name']);
    $first_dress = basename($_FILES["first_dress"]["name"]);
    $final_dress = basename($_FILES["final_dress"]["name"]);
    
       }
       $sql = "UPDATE INTO dresses(name,dress_image,final_design)
       VALUES ('$name','$first_dress','$final_dress')
       ";
       mysqli_query($db, $sql);
       header('location: admin.php?fix_names=Success');


       
    
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








  

    
   
    