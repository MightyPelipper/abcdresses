
  

<?php $page_title = 'Modify User'; ?>
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
<link rel="stylesheet" href="css/mainStyleSheet.css" type="text/css">

<?php
include_once 'db_configuration.php';

if (isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "SELECT * FROM users
            WHERE id = '$id'";

    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }//end if
}//end if

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


      echo '<h2 id="title">Modify User</h2><br>';
      echo '<form action="modify_the_user.php" method="POST" enctype="multipart/form-data">
      <br>
      <h3>'.$row["first_name"].' '.$row["last_name"].' </h3> <br>
      <div>
        <label for="id">ID</label>
        <input type="text" class="form-control" name="id" value="'.$row["id"].'"  maxlength="5" style=width:400px readonly><br>
      </div>
      <div>
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" name="first_name" value="'.$row["first_name"].'"  maxlength="255" style=width:400px required><br>
      </div>
      <div>
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" name="last_name" value="'.$row["last_name"].'"  maxlength="255" style=width:400px required><br>
      </div>
      <div>
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" value="'.$row["email"].'"  maxlength="255" style=width:400px required><br>
      </div>
      <div>
        <label for="role">Role</label>
        <input type="text" class="form-control" name="role" value="'.$row["role"].'"  maxlength="255" style=width:400px required><br>
      </div>
      <div>
        <label for="role">Password</label>
        <input type="text" class="form-control" name="hash" maxlength="255" style=width:400px ><br>
      </div>
     
      <br>
      <div class="text-left">
          <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Modify User</button>
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
