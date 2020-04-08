<?php

require 'bin/functions.php';
require 'db_configuration.php';
$nav_selected = "ADMIN";
$left_buttons = "NO";
$left_selected = "";

$query = "SELECT * FROM dresses";

$GLOBALS['data'] = mysqli_query($db, $query);

?>

<?php $page_title = 'ABC > Export'; ?>
<?php 
    include('nav.php');
    @include('header.php'); 

    $page="admin_export.php";
   // verifyLogin($page);
?>

<!--Styling for the page-->
<style>
    #title {
        text-align: center;
        color: darkgoldenrod;
    }
</style>

<!-- Page Content -->
<div>    
    <h1 id="title">Export</h1><br>
    
    <div>
        <table id="dataTable" >
            <div >
                <thead style="display: none">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Did you know?</th>
                    <th>Category</th>
                    <th>Type</th>
                    <th>State Name </th>
                    <th>Key Words</th>
                    <th>Dress Image</th>
                    <th>Status</th>
                    <th>Final Design</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // fetch the data from $_GLOBALS
                if ($data->num_rows > 0) {
                    // output data of each row
                    while($row = $data->fetch_assoc()) {
                        echo '<tr style = "display:none ">
                                <td>'.$row["id"].'</td>
                                <td>'.$row["name"].'</td>
                                <td>'.$row["description"].'</td>
                                <td>'.$row["did_you_know"].'</td>
                                <td>'.$row["category"].'</td>
                                <td>'.$row["type"].'</td>
                                <td>'.$row["state_name"].'</td>
                                <td>'.$row["key_words"].'</td>
                                <td>'.$row["dress_image"].'</td>
                                <td>'.$row["status"].'</td>
                                <td>'.$row["final_design"].'</td>
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
        <a class="btn btn-info btn-sm" href="admin.php">Back To Admin</a>
        <a class="btn btn-info btn-sm" href="index.php">Home</a>
    </div>
</div>

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



</body>
<div align="center">
<!-- jquery datatables and buttons to export the data table to different formats  -->
<script type="text/javascript" language="javascript">
    
        $('#dataTable').DataTable( {
            dom: 'B',
            buttons: [
                'copy', 'excel', 'csv', 'pdf'
            ] }
        );        
   

</script>
</html>
