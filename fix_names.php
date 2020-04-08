
<?php $page_title = 'ABC > Delete Dress'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    $left_buttons = "NO";
    include('nav.php');
    $page="admin.php";
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

    <form action="fix_image_names.php" method="POST" enctype="multipart/form-data">
        <br>
        <h3 id="title">Fix Image Names</h3> <br>
    
    
           
    <br>
    <div align="center" class="text-left">
        <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Confirm</button>
    </div>
    <br> <br>
    
    </form>

   


    </div>





