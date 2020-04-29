<?php

require 'bin/functions.php';
require 'testing/db_config.php';
$nav_selected = "LIST";
$left_buttons = "NO";
$left_selected = "";



?>



<?php $page_title = 'ABC > dresses'; ?>
<?php 
    include('nav.php');
    //@include('header.php'); 
    

    $page="dresses_list3.php";
    verifyLogin($page);


//SQL stuff 

$sql = "SELECT * FROM dresses";

$query = $db->prepare($sql);
$query->execute();
?>

<script>
function activate(element){
    //alert('clicked')
}
function updateValue(element, column, id){
    var value = element.innerText;
    

    $.ajax({
        url:'testing/backend.php',
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


<!-- Page Content -->
<br><br>
<div class="container-fluid">
  
   
    <h2 id="title">Fix image names</h2><br>
    
    <div id="customerTableView">
        <button><a class="btn btn-sm" href="admin.php">Admin Page</a></button>
        <table class="display" id="ceremoniesTable" style="width:100%">
            <div class="table responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Dress Image</th>
                    <th>Final Design</th>
                   
                </tr>
                </thead>
                <tbody>
                <?php
                //get the query
                while($row = $query->fetch()){
                    $id = $row['id'];
                    $name = $row['name'];
                    $dress_image = $row['dress_image'];
                    $final_design = $row['final_design'];

                    
                
                ?>
                
                <tr>
                <td><div ><?php echo $id ?></div>
                </td>



                <td><div contenteditable="true" onblur="updateValue(this, 'name', '<?php echo $id ?>')" onclick="activate(this)"><?php  echo $name;  ?></div>
                </td>

                <td><div contenteditable="true" onblur="updateValue(this, 'dress_image', '<?php echo $id ?>')" onclick="activate(this)"><?php  echo $new1;  ?></div>
                </td>


                <td><div ><?php echo $final_design ?></div>
                </td>

              

               
            </tr>
                <?php
                }
            
        
                ?>
                </tbody>
            </div>
        </table>
    </div>
</div>

<!-- /.container -->
<!-- Footer -->


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

</script>
</body>
</html>
