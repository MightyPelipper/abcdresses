

<?php 
    require 'bin/functions.php';
    require 'rename_test/db_config.php';
    include('nav.php');
    $page="fix_image_names.php";
    verifyLogin($page);

    ?>


<!--Styling for the tables and page-->
<style>
    #title {
        text-align: center;
        color: darkgoldenrod;
    }
    thead input {
        width: 100%;
    }
    .thumbnailSize{
        height: 100px;
        width: 100px;
        transition:transform 0.25s ease;
    }
    .thumbnailSize:hover {
        -webkit-transform:scale(3.5);
        transform:scale(3.5);
    }
</style>


<!-- Page Content -->
<br><br>
<div class="container-fluid">
  
   
    <h2 id="title">Fix image names</h2><br>
    
    <div id="customerTableView">
        <button><a class="btn btn-sm" href="admin.php">Admin Page</a></button>
<?php


    try {
        $db = new pdo ('mysql:host=localhost;dbname=abcdresses_db;charset=utf8','root','');   
             // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM dresses";
        
        $query = $db->prepare($sql);
        $query->execute();
        
                        //get the query
                        while($row = $query->fetch()){
                            $id = $row['id'];
                            $name = $row['name'];
                            $dress_image = $row['dress_image'];
                            $final_design = $row['final_design'];
        
                            $extension = strtolower(pathinfo($dress_image,PATHINFO_EXTENSION));
        
                            $di1 = './images/dress_images/';
                            $di2 = './images/final_designs/';
                        
                            $image = glob($di1);
                            $image2 = glob($di2);
                        
                            foreach($image as $images){
                            $new1 = strtolower($name.".".$extension);
                            $new1 = preg_replace('/\s+/', '_', $new1);
                            $new1 = preg_replace('@\..*$@', '.jpg', $new1);
                        
                            if ($di1.$dress_image != $di1.$new1) {
                                rename($di1.$dress_image, $di1.$new1);
                                
        $sql = "UPDATE dresses SET dress_image=dress_image WHERE id=id";
    
        // Prepare statement
        $stmt = $db->prepare($sql);
    
        // execute the query
        $stmt->execute();
                            }
                            }
                        }
        // echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
    
    $db = null;

?>
