
<?php $page_title = 'ABC > Delete User'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    $left_buttons = "NO";
    @include('nav.php');
    $page="user_list.php";
    verifyLogin($page);

?>
<div class="container">
<style>#title {text-align: center; color: darkgoldenrod;}</style>
<?php
include 'testing/db_config.php';

if (isset($_GET['id'])){

    $id = $_GET['id'];
    
    $sql = "SELECT * FROM users
            WHERE id = '$id'";

    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }//end if
}//end if

if ($result->rowCount() > 0){
    // output data of each row
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<form action="delete_the_user.php" method="POST">
    <br>
    <h3 id="title">Delete User</h3><br>
    
    <div>
      <label for="id">Id</label>
      <input type="text" class="form-control" name="id" value="'.$row["id"].'"  maxlength="5" readonly>
    </div>
    
    <div>
      <label for="name">First Name</label>
      <input type="text" class="form-control" name="first_name" value="'.$row["first_name"].'"  maxlength="255" readonly>
    </div>
    
    <div>
      <label for="category">Last Name</label>
      <input type="text" class="form-control" name="last_name" value="'.$row["last_name"].'"  maxlength="255" readonly>
    </div>
        
    <div>
      <label for="level">Email</label>
      <input type="text" class="form-control" name="email" value="'.$row["email"].'"  maxlength="255" readonly>
    </div>
        
    <div>
      <label for="facilitator">Role</label>
      <input type="text" class="form-control" name="role" value="'.$row["role"].'"  maxlength="255" readonly>
    </div>

 
           
    <br>
    <div class="text-left">
        <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Confirm Delete</button>
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


