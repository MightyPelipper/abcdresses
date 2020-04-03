<?php

require 'bin/functions.php';
require 'db_configuration.php';
$nav_selected = "LIST";
$left_buttons = "NO";
$left_selected = "";



$query = "SELECT * FROM dresses";

$GLOBALS['data'] = mysqli_query($db, $query);

$GLOBALS['id'] = mysqli_query($db, $query);
 $GLOBALS['name'] = mysqli_query($db, $query);
 $GLOBALS['dress_image'] = mysqli_query($db, $query);
 $GLOBALS['final_design'] = mysqli_query($db, $query);
?>



<?php $page_title = 'ABC > dresses'; ?>
<?php 
    include('nav.php');
    include('header.php'); 

    $page="dresses_list.php";
   // verifyLogin($page);
?>




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
    <?php
        if(isset($_GET['fix_names'])){
            if($_GET["fix_names"] == "Success"){
                echo '<br><h3>Success! Your image name has been changed!</h3>';
            }
        }

        if(isset($_GET['dress_updated'])){
            if($_GET["dress_updated"] == "Success"){
                echo '<br><h3>Success! Your Dress has been modified!</h3>';
            }
        }

    ?>
   
    <h2 id="title">Dresses List</h2><br>
    <form action="fix_image_names.php" method="POST" enctype="multipart/form-data">

    <div id="customerTableView">
        <button><a class="btn btn-lg" href="fix_names.php">Fix Image Names</a></button>
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
                // fetch the data from $_GLOBALS
                if ($data->num_rows > 0) {
                    // output data of each row

               
                    while($row = $data->fetch_assoc()) {
                        
                        echo '<tr>
                                <td>'.$row["id"].'</td>
                                <td><a href="view_dress.php?id='.$row["id"].'">'.$row["name"].'</a></td>
                                <td> '.$row["dress_image"]. '</td>
                                <td> '.$row["final_design"]. '</td>   

                                                           
                                

                            </tr>';
                           


                    }//end while
                    
                }//end if
                
                else {
                    echo "0 results";
                }//end else

                ?>
                </tbody>
            </div>
        </table>
    </div>
</div>

<!-- /.container -->
<!-- Footer -->
<footer class="page-footer text-center">
    <p>Created for ICS 325 Summer Project "Team Alligators"</p>
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

</script>
</body>
</html>
