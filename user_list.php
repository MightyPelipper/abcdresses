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

<script>
function activate(element){
    //alert('clicked')
    console.log("clicked");
}
function updateValue(element, column, id){
    var value = element.innerText

    $.ajax({
        url:'testing/user_list_backend.php',
        type: 'post',
        data: {
            value: value, 
            column: column,
            id: id

        },
        success: function(php_result){
            console.log(php_result);
        }
    })

}
</script>

<style>#title {text-align: center; color: darkgoldenrod;}</style>

<h2 id="title">User List</h2><br>    
<div id="customerTableView">
    <button><a class="btn btn-sm" href="create_user_list.php">Add New User</a></button>
    <table class="display" id="ceremoniesTable" style="width:100%">

    <div class="table responsive">
        <thead>
        <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>last Name</th>
        <th>Email</th>
        <th>Role</th>
        </tr>
        </thead>
        <tbody>


<?php

while($row = $query->fetch()){
$id = $row['id'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$role = $row['role'];



?>

<tr>

    

    <td><div ><?php echo $id ?></div>
    </td>




    <td><div contenteditable="true" onblur="updateValue(this, 'first_name', '<?php echo $id ?>')" onclick="activate(this)"><?php echo $first_name ?></div>
    </td>


    <td><div contenteditable="true" onblur="updateValue(this, 'last_name', '<?php echo $id ?>')" onclick="activate(this)"><?php echo $last_name ?></div>
    </td>



    <td><div contenteditable="true" onblur="updateValue(this, 'email', '<?php echo $id ?>')" onclick="activate(this)"><?php echo $email ?></div>
    </td>

    
    <td><div contenteditable="true" onblur="updateValue(this, 'role', '<?php echo $id ?>')" onclick="activate(this)"><?php echo $role ?></div>
    </td>

    <?php echo '<td><a class="btn btn-warning btn-sm" href="modify_user.php?id='.$row["id"].'">Modify</a></td>' ?>

    <?php echo '<td><a class="btn btn-danger btn-sm" href="delete_user.php?id='.$row["id"].'">Delete</a></td>' ?>


</tr>



<?php


}
?>



</table>