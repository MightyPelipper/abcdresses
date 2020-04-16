<script src="https://code.jquery.com/jquery-3.3.1.js"> </script>
<?php
//testing out inline text editing
//https://ajax.googleapis.com/ajax/libs/jquery/3.3.3/jquery.min.js
include 'db_config.php';
@include('nav.php');
@include('header.php'); 

$sql = "SELECT * FROM dresses";

$query = $db->prepare($sql);
$query->execute();
//$results = mysqli_query($db,$sql);
?>

<script>
function activate(element){
    //alert('clicked')
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