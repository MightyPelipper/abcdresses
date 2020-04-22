<?php
//this will upload the inputs into the localhost database
include_once 'db_configuration.php';

if (isset($_POST['submit'])){

    echo "HERE";

    //$import_file = basename($_FILES["file_name"]["name"]);

    //sql file directory information
        $file_dir = "./sql/";
        $filename = $file_dir . basename($_FILES["file_name"]["name"]);
        echo $filename;
        $ext=substr($filename,strrpos($filename,"."),(strlen($filename)-strrpos($filename,".")));
         
        //we check,file must be have csv extention
        if($ext=="csv")
        {
          $file = fopen($filename, "r");
                 while (($dressData = fgetcsv($file, 10000, ",")) !== FALSE)
                 {
                    $sql = "INSERT into dresses(name,description,did_you_know,category,type,state_name,key_words,dress_image,final_design,status,notes) 
                    values('$dressData[1]','$dress_data[2]','$dress_data[3]','$dress_data[4]','$dress_data[5]','$dress_data[6]','$dress_data[7]','$dress_data[8]','$dress_data[9]','$dress_data[10]','$dress_data[11]','$dress_data[12]')";
                    mysqli_query($db, $sql);
                 }
                 fclose($file);
                 header('location: admin_import.php?import_csv=ImportSuccess'.$uploadOk);
        }
        else {
          //header('location: admin_import.php?import_csv=ImportError'.$uploadOk);
          echo "Error: Please Upload only CSV File";
        }
        }
?>