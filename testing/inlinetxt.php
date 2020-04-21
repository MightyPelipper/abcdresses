
<script src="https://code.jquery.com/jquery-3.3.1.js"> </script>
<?php
//testing out inline text editing
//https://ajax.googleapis.com/ajax/libs/jquery/3.3.3/jquery.min.js
include 'db_config.php';


$sql = "SELECT * FROM preferences";

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
        url:'backend.php',
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

<table>
<th>Id</th>
<th>Name</th>
<th>Value</th>
<th>Comments</th>

<?php

while($row = $query->fetch()){
$id = $row['id'];
$name = $row['name'];
$value = $row['value'];
$comments = $row['comments'];

$nametag = "name";

?>

<tr>
    <td><div contenteditable="true" onblur="updateValue(this, 'id', '<?php echo $id ?>')" onclick="activate(this)"><?php echo $id ?></div>
    </td>



    <td><div contenteditable="true" onblur="updateValue(this, 'name', '<?php echo $id ?>')" onclick="activate(this)"><?php echo $name ?></div>
    </td>


    <td><div contenteditable="true" onblur="updateValue(this, 'value', '<?php echo $id ?>')" onclick="activate(this)"><?php echo $value ?></div>
    </td>



    <td><div contenteditable="true" onblur="updateValue(this, 'comments', '<?php echo $id ?>')" onclick="activate(this)"><?php echo $comments ?></div>
    </td>


</tr>



<?php


}
?>



</table>


