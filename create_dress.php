<?php $page_title = 'ABC Dresses > Create Dresses'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    include('nav.php'); 
    $page="create_dress.php";
    verifyLogin($page);

?>
<?php 
    $mysqli = NEW MySQLi('localhost','root','','abcdresses_db');
    $resultset = $mysqli->query("SELECT DISTINCT name FROM dresses ORDER BY id ASC");   
?>
<link href="css/form.css" rel="stylesheet">
<style>#title {text-align: center; color: darkgoldenrod;}</style>
<div class="container">
    <!--Check the CeremonyCreated and if Failed, display the error message-->
    <?php
    if(isset($_GET['create_dress'])){
        if($_GET["create_dress"] == "fileRealFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not real, Please Try Again!</h3>';
        }
    }
    if(isset($_GET['create_dress'])){
        if($_GET["create_dress"] == "answerFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your answer was not one of the choices, Please Try Again!</h3>';
        }
    }
    if(isset($_GET['create_dress'])){
        if($_GET["create_dress"] == "fileTypeFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not a valid image type (jpg,jpeg,png,gif), Please Try Again!</h3>';
        }
    }
    if(isset($_GET['create_dress'])){
        if($_GET["create_dress"] == "fileExistFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image does not exist, Please Try Again!</h3>';
        }
    }
  
    ?>
    <form action="create_the_dress.php" method="POST" enctype="multipart/form-data">
        <br>
        <h3 id="title">Create The Dress</h3> <br>
        
        <table>
            <!--<tr>
                <td style="width:100px">Dress:</td>
                <td><select name="category">
                    <?php 
                    //while($rows = $resultset->fetch_assoc()){
                    //    $topic=$rows['topic']; 
                    //echo"<option Value='$topic'>$topic</option>";}
                    ?>
                    </select></td>
            </tr>
            -->
            <tr>
                <td style="width:100px">Name:</td>
                <td><input type="text"  name="name" maxlength="100" size="50" required title="Please enter the name."></td>
            </tr>
            <tr>
                <td style="width:100px">Description:</td>
                <td><input type="text"  name="description" maxlength="50" size="50" required title="Please enter the description."></td>
            </tr>
            <tr>
                <td style="width:100px">Did you know?:</td>
                <td><input type="text"  name="did_you_know" maxlength="50" size="50" required title="Please enter the 'did you know'."></td>
            </tr>
            <tr>
                <td style="width:100px">Category:</td>
                <td><input type="text"  name="category" maxlength="50" size="50" required title="Please enter the category."></td>
            </tr>
            <tr>
                <td style="width:100px">Type:</td>
                <td><input type="text"  name="type" maxlength="50" size="50" required title="Please enter the type."></td>
            </tr>
            <tr>
                <td style="width:100px">State Name:</td>
                <td><input type="text"  name="state_name" maxlength="50" size="50" required title="Please enter the state name."></td>
            </tr>
            <tr>
                <td style="width:100px">Key Words:</td>
                <td><input type="text"  name="key_words" maxlength="50" size="50" required title="Please enter the key words."></td>
            </tr>            
            <tr>
                <td style="width:100px">Image URL:</td>
                <td><input type="file" name="dress_image" id="dress image" maxlength="50" size="50" title="Select a Image please."></td>
            </tr>
        </table>

        <br><br>
        <div align="center" class="text-left">
            <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Create Dress</button>
        </div>
        <br> <br>

    </form>
</div>

