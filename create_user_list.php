<?php $page_title = 'ABC Dresses > Create User'; ?>
<?php

require 'db_configuration.php';
require 'bin/functions.php';
@include('nav.php');

//@include('header.php');

$page="create_user_list.php";

verifyLogin($page);

//$results = mysqli_query($db,$sql);
?>
<?php 
    $mysqli = NEW MySQLi('localhost','root','','abcdresses_db');

?>
<link rel="stylesheet" href="css/mainStyleSheet.css" type="text/css">
	

	<link href="css/form.css" rel="stylesheet">
	<style>#title {text-align: center; color: darkgoldenrod;}</style>
	<div class="container">
	  
	    <form action="create_the_user.php" method="POST" enctype="multipart/form-data">
	        <br>
	        <h3 id="title">Create User List</h3> <br>
	        
	        <table>

	            <tr>
	                <td style="width:100px">First Name: </td>
	                <td><input type="text"  name="first_name" maxlength="50" size="50" required title="Please enter the first name."></td>
	            </tr>
	            <tr>
	                <td style="width:100px">Last Name: </td>
	                <td><input type="text"  name="last_name" maxlength="50" size="50" required title="Please enter the last name."></td>
	            </tr>
	            <tr>
	                <td style="width:100px">Email: </td>
	                <td><input type="text"  name="email" maxlength="50" size="50" required title="Please enter the email."></td>
	            </tr>
				<tr>
	                <td style="width:100px">Role: </td>
	                <td><input type="text"  name="role" maxlength="50" size="50" required title="Please enter the role."></td>
	            </tr>
				<tr>
                <td style="width:100px">Password: </td>
                <td><input type="text"  name="hash" maxlength="50" size="50" required title="Please create a password."></td>
            </tr>
			
	        </table>
	

	        <br><br>
	        <div align="center" class="text-left">
	            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Create User List</button>
	        </div>
	        <br> <br>
	

	    </form>
	</div>



