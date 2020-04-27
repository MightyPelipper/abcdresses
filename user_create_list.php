<?php $page_title = 'ABC Dresses > User Create List'; ?>
<script src="https://code.jquery.com/jquery-3.3.1.js"> </script>
<?php
//testing out inline text editing
//https://ajax.googleapis.com/ajax/libs/jquery/3.3.3/jquery.min.js
include 'testing/db_config.php';
require 'bin/functions.php';
@include('nav.php');
//@include('header.php');

$page="user_list.php";

verifyLogin($page);


$sql = "SELECT * FROM users";

$query = $db->prepare($sql);
$query->execute();
//$results = mysqli_query($db,$sql);
?>

<link rel="stylesheet" href="css/mainStyleSheet.css" type="text/css">
	

	<link href="css/form.css" rel="stylesheet">
	<style>#title {text-align: center; color: darkgoldenrod;}</style>
	<div class="container">
	    <!--Check the CeremonyCreated and if Failed, display the error message-->
	  
	    <form action="createTheUser.php" method="POST" enctype="multipart/form-data">
	        <br>
	        <h3 id="title">Create User</h3> <br>
	        
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
	            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Create User</button>
	        </div>
	        <br> <br>
	

	    </form>
	</div>



