<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    function updateValue(element,column,id){
        var value = element.innerText
        $.ajax({
            url:'editableList.php',
            type: 'post',
            data:{
                value: value,
                column: column,
                id: id
            },
            success:function(php_result){
				console.log(php_result);
				
            }
            
        })
    }

    $(document).ready(function() {
        $.fn.dataTable.ext.errMode = 'none';

  var table = $('#ceremoniesTable').DataTable({
  });

  $('a.showHideColumn').on('click', function(e) {
    e.preventDefault();

    // Get the column API object
    var column = table.column($(this).attr('data-columnindex'));

    // Toggle the visibility
    column.visible(!column.visible());
  });
});
</script> 

<!-- Add show/hide column -->
<style> 
	.ShowHideColumn {
			cursor: pointer;
			color:blue;
	}

</style> 
<!-- Add show/hide column -->
<?php
  $nav_selected = "LIST";
  $left_buttons = "NO";
  $left_selected = "";
  
require 'bin/functions.php';
require 'db_configuration.php';

$query = "SELECT * FROM dresses";
//list
$GLOBALS['data'] = mysqli_query($db, $query);
// $GLOBALS['ID'] = mysqli_query($db, $query);
// $GLOBALS['Name'] = mysqli_query($db, $query);
// $GLOBALS['Type'] = mysqli_query($db, $query);
// $GLOBALS['State'] = mysqli_query($db, $query);
// $GLOBALS['Country'] = mysqli_query($db, $query);
// $GLOBALS['Description'] = mysqli_query($db, $query);
// $GLOBALS['Recipe_links'] = mysqli_query($db, $query);
// $GLOBALS['Video_links'] = mysqli_query($db, $query);
// $GLOBALS['Status'] = mysqli_query($db, $query);
// $GLOBALS['Notes'] = mysqli_query($db, $query);
// $GLOBALS['Image'] = mysqli_query($db, $query);
  @include("nav.php");
  
?>

<?php //include("./footer.php"); ?>

<?php $page_title = 'Dress list'; ?>
<?php 
    $page="list.php";
    //verifyLogin($page);
?>

<link rel="stylesheet" href="css/mainStyleSheet.css" type="text/css">

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
<?php
        if(isset($_GET['createDishes'])){
            if($_GET["createDishes"] == "Success"){
                echo '<br><h3>Success! Your dish has been added!</h3>';
            }
        }

        if(isset($_GET['dishUpdated'])){
            if($_GET["dishUpdated"] == "Success"){
                echo '<br><h3>Success! Your dish has been modified!</h3>';
            }
        }

        if(isset($_GET['dishDeleted'])){
            if($_GET["dishDeleted"] == "Success"){
                echo '<br><h3>Success! Your dish has been deleted!</h3>';
            }
        }

    ?>
   
   
    <h2 id="title">Dresses List</h2><br>    
    <div id="customerTableView">
	
        <button><a class="btn btn-sm" href="create_dress.php">Create a Dress</a></button>
        <table class="display" id="ceremoniesTable" style="width:100%">
	
            <div class="table responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Names</th>
                    <th>Description</th>
                    <th>Did You Know</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>State Name</th>
                    <th>Key Words</th>
                    <th>Dress Image</th>                
                    <th>Final Design</th>
                    <th>Status</th>
                    <th>Notes</th>
                    <th>Modify</th>
                    <th>Delete</th>
                    <th>View</th>
                </tr>
                </thead>
                <tbody>
				
					<!-- Add show/hide column -->	
	<div style="padding:5px; padding-left:0px">
		<b>Show/Hide Columns:  </b>
		<a class="showHideColumn" data-columnindex="0">ID</a> -
		<a class="showHideColumn" data-columnindex="1">Names</a> -
		<a class="showHideColumn" data-columnindex="2">Description</a> -
		<a class="showHideColumn" data-columnindex="3">Did You Know</a> -
		<a class="showHideColumn" data-columnindex="4">Category</a> -
		<a class="showHideColumn" data-columnindex="5">Type</a> -
        <a class="showHideColumn" data-columnindex="6">State Names</a> -
        <a class="showHideColumn" data-columnindex="7">Key Words</a> -
		<a class="showHideColumn" data-columnindex="8">Dress Image</a> -
		<a class="showHideColumn" data-columnindex="9">Final Design</a> -
		<a class="showHideColumn" data-columnindex="10">Status</a> -
		<a class="showHideColumn" data-columnindex="11">Notes</a> -
		<a class="showHideColumn" data-columnindex="12">Modify </a> -
        <a class="showHideColumn" data-columnindex="13">Delete</a> -
        <a class="showHideColumn" data-columnindex="14">View</a>
	</div>
	<!-- Add show/hide column -->	
    
                <?php
                while($row = $data->fetch_assoc()) {
                    $id = $row["id"];
                    $name = $row["name"];
                    $description = $row["description"];
                    $did_you_know = $row["did_you_know"];
                    $category = $row["category"];
                    $type = $row["type"];
                    $state_name = $row["state_name"];
                    $key_words = $row["key_words"];
                    $dress_image = $row["dress_image"];
                    $final_design = $row["final_design"];
                    $status = $row["status"];
                    $notes = $row["notes"];
                    //$Image = $row["Image"];
                
                    if(isset($_SESSION['role'])) { //logged in, allow in cell editing
                        ?>
                        <tr>
                    <td><?php echo $id; ?></td>
                    <td><div contenteditable="true" onBlur="updateValue(this,'name','<?php echo $id; ?>')"><?php echo $name; ?></div></span> </td>
                    <td><div contenteditable="true" onBlur="updateValue(this,'description','<?php echo $id; ?>')"><?php echo $description; ?></div></span> </td>
                    <td><div contenteditable="true" onBlur="updateValue(this,'did_you_know','<?php echo $id; ?>')"><?php echo $did_you_know; ?></div></span> </td>
                    <td><div contenteditable="true" onBlur="updateValue(this,'category','<?php echo $id; ?>')"><?php echo $category; ?></div></span> </td>
                    <td><div contenteditable="true" onBlur="updateValue(this,'type','<?php echo $id; ?>')"><?php echo $type; ?></div></span> </td>
                    <td><div contenteditable="true" onBlur="updateValue(this,'state_name','<?php echo $id; ?>')"><?php echo $state_name; ?></div></span> </td>
                    <td><div contenteditable="true" onBlur="updateValue(this,'key_words','<?php echo $id; ?>')"><?php echo $key_words; ?></div></span> </td>
                    <td><div><?php echo '<img src="images/dress_images/'.$row["dress_image"].'" style="width:100px;height:120px;">' ?></div> </td>
                    <td><?php echo '<img src="images/final_designs/'.$row["final_design"].'" style="width:100px;height:120px;">' ?> </td>
                    <td><div contenteditable="true" onBlur="updateValue(this,'status','<?php echo $id; ?>')"><?php echo $status; ?></div></span> </td>
                    <td><div contenteditable="true" onBlur="updateValue(this,'status','<?php echo $id; ?>')"><?php echo $notes; ?></div></span> </td>
                    
                    
                    <?php echo '<td><a class="btn btn-warning btn-sm" href="modify_dress.php?id='.$row["id"].'">Modify</a></td>' ?>
                    <?php echo '<td><a class="btn btn-danger btn-sm" href="delete_dress.php?id='.$row["id"].'">Delete</a></td>' ?>
                    <?php echo '<td><a class="btn btn-danger btn-sm" href="view_dress.php?id='.$row["id"]."&mode=image".'">View</a></td>' ?>
                </tr>

                        <?php
                    }else{//not logged in, not allowed to do in cell editing
                        ?>
                        <tr>
                    <td><?php echo $id; ?></td>
                    <td><div><?php echo $name; ?></div></span> </td>
                    <td><div><?php echo $description; ?></div></span> </td>
                    <td><div><?php echo $did_you_know; ?></div></span> </td>
                    <td><div><?php echo $category; ?></div></span> </td>
                    <td><div><?php echo $type; ?></div></span> </td>
                    <td><div><?php echo $state_name; ?></div></span> </td>
                    <td><div><?php echo $key_words; ?></div></span> </td>
                    <td><div><?php echo '<img src="images/dress_images/'.$row["dress_image"].'" style="width:100px;height:120px;">' ?> </div> </td>
                    <td><div><?php echo '<img src="images/final_designs/'.$row["final_design"].'" style="width:100px;height:120px;">' ?></div></td>
                    <td><div><?php echo $status; ?></div></span> </td>
                    <td><div><?php echo $notes; ?></div></span> </td>
                    
                    <?php echo '<td><a class="btn btn-warning btn-sm" href="modify_dress.php?id='.$row["id"].'">Modify</a></td>' ?>
                    <?php echo '<td><a class="btn btn-danger btn-sm" href="delete_dress.php?id='.$row["id"].'">Delete</a></td>' ?>
                    <?php echo '<td><a class="btn btn-danger btn-sm" href="view_dress.php?id='.$row["id"]."&mode=image".'">View</a></td>' ?>
                </tr>

                        <?php
                    }
                }//end while
                ?>

                </tbody>
            </div>
        </table>
    </div>
</div>

<!-- /.container -->
<!-- Footer -->
<footer class="page-footer text-center">
   
</footer>

<!--JQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

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

    
	//add visible coloumn


</script>
</body>
</html>
