<?php 
    require 'bin/functions.php';
    require 'rename_test/db_config.php';
    include('nav.php');
    $page="fix_image_names.php";
    verifyLogin($page);


    $sql = "SELECT * FROM dresses";

    $query = $db->prepare($sql);
    $query->execute();

    ?>
    



<?php

//$mysqli = NEW MySQLi('localhost','root','','abcdresses_db');
//$resultset = $mysqli->query("SELECT DISTINCT name FROM images ORDER BY id ASC");   
?>


<?php
include_once 'db_configuration.php';

//$sql1 = "SELECT `name`, `id`, `dress_image`, `final_design` FROM `dresses` ORDER BY name, id, dress_image, final_design ASC";
$sql1 = "SELECT `name`, `id`, `dress_image`, `final_design` FROM `dresses` where `id` = `id` ORDER BY id ASC";
//$sql = "CREATE  di1 AS './images/dress_images/'";

$result1 = mysqli_query($db,$sql1);
$query = $db->prepare($sql1);
$query->execute();
if(mysqli_num_rows($result1)>0){
    while($row = mysqli_fetch_assoc($result1)){
        $dresses[] = $row;
        $row++;
    }
}
$count= count($dresses);
//include_once 'db_configuration.php';

//foreach($dresses as $dress => $fio) {
while($row = $query->fetch()){
    $id = $row['id'];
    $pic1 = $row['dress_image'];
    $pic2 = $row['final_design'];
    $name = $row['name'];
   


for ($a=0; $a<$count; $a++){

    //loop through all the dresses
    $pic1 = $dresses[$a]['dress_image'];
    $pic2 = $dresses[$a]['final_design'];
    $name = $dresses[$a]['name'];
    $id = $dresses[$a]['id'];
    
    $uploadOk = 1;

    $extension = strtolower(pathinfo($pic1,PATHINFO_EXTENSION));
    
    
    $di1 = './images/dress_images/';
    $di2 = './images/final_designs/';

    $image = glob($di1);
    $image2 = glob($di2);

    foreach($image as $images){
    $new1 = strtolower($name.".".$extension);
    $new1 = preg_replace('/\s+/', '_', $new1);
    $new1 = preg_replace('@\..*$@', '.jpg', $new1);

   
   if ($di1.$new1 != $di1.$pic1) {
    rename($di1.$pic1, $di1.$new1);

  //  echo "rename1 = " . $new1. "<br/>";
 }//if
 else{
     echo "ok";
 }

// if ($di2.$new1 != $di2.$pic2) {
 //   rename($di2.$pic2, $di2.$new1);

 //   echo "rename1 = " . $new1. "<br/>";
// }//if

 move_uploaded_file($di1.$pic1, $di1.$new1);



    }//foreach

   

  }//for

}//end while loop

$path = realpath('./images/dress_images/');

$di = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach($di as $names => $fio) {
    $newname = $fio->getPath() . DIRECTORY_SEPARATOR . strtolower( $fio->getFilename() );
    $newname = preg_replace('/\s+/', '_', $newname);
    $newname = preg_replace('@\..*$@', '.jpg', $newname);
    rename($names, $newname); 

}   


?>
  <?php



$path_final = realpath('./images/final_designs/');


$dir = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($path_final, FilesystemIterator::SKIP_DOTS),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach($dir as $name_final => $file) {
    $new_name = $file->getPath() . DIRECTORY_SEPARATOR . strtolower( $file->getFilename() );
    $new_name = preg_replace('/\s+/', '_', $new_name);
    $new_name = preg_replace('@\..*$@', '.jpg', $new_name);

    rename($name_final, $new_name); 

}

    ?>










<script>
function activate(element){
    //alert('clicked')
    console.log("clicked");
}
function updateValue(element, column, id){
    var value = element.innerText

    $.ajax({
        url:'rename_test/fix_names.php',
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


<h2 id="title">Dresses List</h2><br>
    
<div id="customerTableView">
    <button><a class="btn btn-sm" href="create_dress.php">Create a Dress</a></button>


    <table class="display" id="ceremoniesTable" style="width:100%">
    <th>Id</th>
    <th>Name</th>
    <th>Description</th>
    <th>Did you Know</th>
    <th>Category</th>
    <th>Type</th>
    <th>State</th>
    <th>Dress Image</th>
    <th>Final Design</th>
    <th>Status</th>
    <th>Notes</th>

    <?php

    while($row = $query->fetch()){
    $id = $row['id'];
    $name = $row['name'];
    $description = $row['did_you_know'];
    $did_you_know = $row['category'];
    $category = $row['type'];
    $type = $row['state_name'];
    $state_name = $row['key_words'];
    $dress_image = $row['dress_image'];
    $final_design = $row['final_design'];
    $status = $row['status'];
    $notes = $row['notes'];

    ?>





            <tr>
                <td><div ><?php echo $id ?></div>
                </td>



                <td><div contenteditable="true" onblur="updateValue(this, 'name', '<?php echo $id ?>')" onclick="activate(this)"><?php echo $name ?></div>
                </td>


                <td><div contenteditable="true" onblur="updateValue(this, 'description', '<?php echo $id ?>')" onclick="activate(this)"><?php echo $description ?></div>
                </td>



                <td><div contenteditable="true" onblur="updateValue(this, 'did_you_know', '<?php echo $id ?>')" onclick="activate(this)"><?php echo $did_you_know ?></div>
                </td>

                <td><div contenteditable="true" onblur="updateValue(this, 'category', '<?php echo $id ?>')" onclick="activate(this)"><?php echo $category ?></div>
                </td>

                <td><div contenteditable="true" onblur="updateValue(this, 'type', '<?php echo $id ?>')" onclick="activate(this)"><?php echo $type ?></div>
                </td>

                <td><div contenteditable="true" onblur="updateValue(this, 'state_name', '<?php echo $id ?>')" onclick="activate(this)"><?php echo $state_name ?></div>
                </td>

                <td><div ><?php echo $dress_image ?></div>
                </td>

                <td><div ><?php echo $final_design ?></div>
                </td>

                <td><div ><?php echo $status ?></div>
                </td>

                <td><div contenteditable="true" onblur="updateValue(this, 'notes', '<?php echo $id ?>')" onclick="activate(this)"><?php echo $notes ?></div>
                </td>

            </tr>
</div>


<?php
}
?>


</table>

<!--Data Table-->
<script type="text/javascript" charset="utf8"
        src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

<script type="text/javascript" language="javascript">
    $(document).ready( function () {
        
        $('#ceremoniesTable').DataTable( {
            dom: 'lfrtBip',
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ] }
        );

        $('#ceremoniesTable thead tr').clone(true).appendTo( '#ceremoniesTable thead' );
        $('#ceremoniesTable thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    
        var table = $('#ceremoniesTable').DataTable( {
            orderCellsTop: true,
            fixedHeader: true,
            retrieve: true
        } );
        
    } );

</script>