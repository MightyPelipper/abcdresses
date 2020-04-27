
<?php $page_title = 'Modify Dress'; ?>
<?php $page_title = 'ABC Dresses > Modify Dress'; ?>
<?php 
      $nav_selected = "LIST";
      $left_buttons = "NO";
      $left_selected = "";
    
    require 'bin/functions.php';
    require 'db_configuration.php';
    //include('header.php'); dont need this anymore ( old nav bar )
    @include('nav.php');
    $page="modify_dress.php";
    verifyLogin($page);

?>


<?php
include_once 'db_configuration.php';

if (isset($_GET['id'])){

    $id = $_GET['id'];
    
    $sql = "SELECT * FROM dresses
            WHERE id = '$id'";
    

    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }//end if
}//end if

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      if(isset($_GET['modifyDress'])){
        if($_GET["modifyDress"] == "fileRealFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not real, Please Try Again!</h3>';
        }
      }
      if(isset($_GET['modifyDress'])){
        if($_GET["modifyDress"] == "answerFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your answer was not one of the choices, Please Try Again!</h3>';
        }
      }
      if(isset($_GET['modifyDress'])){
        if($_GET["modifyDress"] == "fileTypeFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image is not a valid image type (jpg,jpeg,png,gif), Please Try Again!</h3>';
        }
      }
      if(isset($_GET['modifyDress'])){
        if($_GET["modifyDress"] == "fileExistFailed"){
            echo '<br><h3 align="center" class="bg-danger">FAILURE - Your image does not exist, Please Try Again!</h3>';
        }
      }

      echo '<h2 id="title">Modify Dress</h2><br>';
      echo '<form action="modify_the_dress.php" method="POST" enctype="multipart/form-data">
      <br>
      <h3>'.$row["id"].' - '.$row["name"].' </h3> <br>
      
      <div>
        <label for="id">Id</label>
        <input type="text" class="form-control" name="id" value="'.$row["id"].'"  maxlength="5" style=width:400px readonly><br>
      </div>
      
      <div>
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="'.$row["name"].'"  maxlength="255" style=width:400px required><br>
      </div>
      
      <div>
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" value="'.$row["description"].'"  maxlength="255" style=width:400px required><br>
      </div>
          
      <div>
        <label for="did_you_know">Did You Know</label>
        <input type="text" class="form-control" name="did_you_know" value="'.$row["did_you_know"].'"  maxlength="255" style=width:400px required><br>
      </div>
          
      <div>
        <label for="category">Category</label>
        <input type="text" class="form-control" name="category" value="'.$row["category"].'"  maxlength="255" style=width:400px required><br>
      </div>

      <div>
        <label for="type">Type</label>
        <input type="text" class="form-control" name="type" value="'.$row["type"].'"  maxlength="255" style=width:400px required><br>
      </div>

      <div>
        <label for="key_words">Key Words</label>
        <input type="text" class="form-control" name="key_words" value="'.$row["key_words"].'"  maxlength="255" style=width:400px required><br>
      </div>
      

      <div class="form-group col-md-4">
        <label for="first_dress">New Dress Image (Not Required if not changing)</label>

        <input type="file" name="first_dress" id="first_dress" maxlength="255">
      </div>

      <br><br><br><br>

      <div class="form-group col-md-4">
        <label for="final_dress">New Final Design (Not Required if not changing)</label>

        <input type="file" name="final_dress" id="final_dress" maxlength="255">
      </div>      
      
      <br><br><br><br>

      <div class="text-left">
          <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Modify Dress</button>
      </div>
      <br> <br>
      
      </form>';
    
    }//end while
}//end if
else {
    echo "0 results";
}//end else

?>

</div>


