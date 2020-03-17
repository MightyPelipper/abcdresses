
<?php $page_title = 'ABC > Delete Dress'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    $left_buttons = "NO";
    include('nav.php');
    $page="dresses_list.php";
    //verifyLogin($page);

?>
<div class="container">
<style>#title {text-align: center; color: darkgoldenrod;}</style>
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
        echo '<form action="delete_the_dress.php" method="POST">
    <br>
    <h3 id="title">Delete Dress</h3><br>
    
    <div>
      <label for="id">Id</label>
      <input type="text" class="form-control" name="id" value="'.$row["id"].'"  maxlength="5" readonly>
    </div>
    
    <div>
      <label for="name">name</label>
      <input type="text" class="form-control" name="name" value="'.$row["name"].'"  maxlength="255" readonly>
    </div>
    
    <div>
      <label for="category">description</label>
      <input type="text" class="form-control" name="description" value="'.$row["description"].'"  maxlength="255" readonly>
    </div>
        
    <div>
      <label for="level">did_you_know</label>
      <input type="text" class="form-control" name="did_you_know" value="'.$row["did_you_know"].'"  maxlength="255" readonly>
    </div>
        
    <div>
      <label for="facilitator">category</label>
      <input type="text" class="form-control" name="category" value="'.$row["category"].'"  maxlength="255" readonly>
    </div>

    <div>
      <label for="description">type</label>
      <input type="text" class="form-control" name="type" value="'.$row["type"].'"  maxlength="255" readonly>
    </div>

    <div>
      <label for="required">state_name</label>
      <input type="text" class="form-control" name="state_name" value="'.$row["state_name"].'"  maxlength="255" readonly>
    </div>
    
    <div>
      <label for="optional">key_words</label>
      <input type="text" class="form-control" name="key_words" value="'.$row["key_words"].'"  maxlength="255" readonly>
    </div>

    <div class="form-group col-md-4">
      <label for="cadence">image_url</label>
      <input type="text" class="form-control" name="image_url" value="'.$row["image_url"].'"  maxlength="255" readonly>
    </div>
           
    <br>
    <div class="text-left">
        <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Confirm Delete Dress</button>
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


