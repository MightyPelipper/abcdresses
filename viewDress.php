
<?php $page_title = 'View Dress'; ?>
<?php $page_title = 'ABC Dresses > View Dress'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    $left_buttons = "NO";
    include('nav.php');
    $page="dresses_list.php";

    verifyLogin($page);

?>
<div class="container">
<style>
#title {text-align: center; color: darkgoldenrod;}
.thumbnailSize{
        height: 300px;
        width: 300px;
        transition:transform 0.25s ease;
</style>
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
        echo '<form action="view_the_dress.php" method="POST">
    <br>
    <h3 id="title">View Dress</h3><br>
    <h2>'.$row["name"].' - '.$row["description"].' </h2> <br>
    
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

    <div>
      <label for="cadence">image_url</label>
      <img class="thumbnailSize"  src="' . "dress_images/" .$row["image_url"]. '" alt="'.$row["image_url"]. '"></td>

    </div>
           
    
    
    </form>';

    }//end while
}//end if
else {
    echo "0 results";
}//end else

?>

</div>


