<?php

include 'db_config.php';

if(isset($_POST['id'])){
    $value = $_POST['value'];
    $column = $_POST['column'];
    $id = $_POST['id'];

    $sql= "UPDATE dresses SET $column = :value WHERE id = :id LIMIT 1 ";
    

    $query = $db->prepare($sql);
    $query->bindParam('value',$value);
    $query->bindParam('id',$id);

    if($query->execute()){

        echo "Update Successfull";
    }else{
        echo "failure";
    }

}



?>