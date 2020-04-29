<?php

	
	  include_once 'db_configuration.php';
	
	     
	    $first_name = mysqli_real_escape_string($db,$_POST['first_name']);
	    $last_name = mysqli_real_escape_string($db,$_POST['last_name']);
	    $email = mysqli_real_escape_string($db,$_POST['email']);
	    $role = mysqli_real_escape_string($db,$_POST['role']);
        $hash = $_POST['hash'];
        $password = password_hash($hash, PASSWORD_DEFAULT);
	    $validate = true;    
	    
	

	    $sql = "INSERT INTO users(first_name, last_name, email, hash, role)
	
	    VALUES ('$first_name','$last_name','$email','$password','$role')
	    ";
	

	    mysqli_query($db, $sql);
        header('location: user_list.php?create_user_list=Success');
      
 ?>
		<link rel="stylesheet" href="css/mainStyleSheet.css" type="text/css">

