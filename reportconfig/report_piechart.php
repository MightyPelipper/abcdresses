<?php

    //$nav_selected = "REPORTS";
    //$left_buttons = "YES";
    //$left_selected = "REPORTSPIECHART";

    //include("nav.php");
    $db = mysqli_connect("localhost", "root", "", "abcdresses_db");

?>
<html>

    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <script type="text/javascript">

        function createPieChart(pieChart){
            let name = pieChart[0];
            let columnTitle = pieChart[1];

            let queryArray = [[columnTitle, 'Count', {role:'annotation'}]];

            switch(name){
                case 'Category':
                    <?php
                    $query = $db->query("SELECT DISTINCT category, count(category) as number_cat FROM dresses GROUP BY category;");
                    //$query = $db->query("SELECT app_status, COUNT(app_status) AS occurrences FROM (SELECT DISTINCT app_name, app_version, app_status from sbom) as subquery group by app_status;");
                    while($query_row = $query->fetch_assoc()) {
                        echo 'queryArray.push(["'.$query_row["category"].'", '.$query_row["number_cat"].'"]);';
                    }
                    ?>
                    break;
                case 'Type':
                    <?php
                    $query = $db->query("SELECT DISTINCT type, count(type) as number_type FROM dresses GROUP BY type;");
                    while($query_row = $query->fetch_assoc()) {
                        echo 'queryArray.push(["'.$query_row["type"].'", '.$query_row["number_type"].'"]);';
                    }
                    ?>
                    break;
                case 'State_Name':
                    <?php
                    $query = $db->query("SELECT DISTINCT state_name, count(state_name) as number_state FROM dresses GROUP BY state_name;");
                    while($query_row = $query->fetch_assoc()) {
                        echo 'queryArray.push(["'.$query_row["state_name"].'", '.$query_row["number_state"].'"]);';
                    }
                    ?>
                    break;
                case 'Key_Words':
                    <?php
                    $query = $db->query("SELECT key_words, count(key_words) as number_key FROM dresses GROUP BY type;");
                    while($query_row = $query->fetch_assoc()) {
                        echo 'queryArray.push(["'.$query_row["key_words"].'", '.$query_row["number_key"].'"]);';
                    }
                    ?>
                    break;
            }

            return queryArray;
        }

        let pieCharts = [['Category', 'Categories'], ['Type', 'Types'], ['State_Name', 'State_Names'], ['Key_Words', 'Keys_words']];

        for(let i = 0; i < pieCharts.length; i++){
            pieCharts[i] = createPieChart(pieCharts[i]);
        }
        </script>

        <!-- Google Pie Chart API Code -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawPieCharts);

        function drawPieCharts() {
            pieCharts.forEach(queryArray => drawPieChart(queryArray));
        }

        function drawPieChart(queryArray){
            var data = google.visualization.arrayToDataTable(queryArray);

            let title = queryArray[0][0] + ' Report';

            var options = {
                title: title,
                width: 500,
                height: 500
            };

            var chart = new google.visualization.PieChart(document.getElementById(title.replace(/ /g, '')));

            google.visualization.events.addListener(chart, 'select', selectHandler);

            chart.draw(data, options);

            function selectHandler(){
                var selectedItem = chart.getSelection()[0];

                if (selectedItem) {
                    var statusSelection = data.getValue(selectedItem.row, 0);
                    var reportName = queryArray[0][0].toLowerCase().replace(/ /g, '');

                    document.cookie = encodeURI("category_cookie=");
                    document.cookie = encodeURI("type_cookie=");
                    document.cookie = encodeURI("state_name_cookie=");
                    document.cookie = encodeURI("key_word_cookie=");

                    switch(reportName){
                        case "category":
                            document.cookie = encodeURI("category_cookie=" + statusSelection); break;
                        case "type":
                            document.cookie = encodeURI("type_cookie=" + statusSelection); break;
                        case "state_name":
                            document.cookie = encodeURI("state_name_cookie=" + statusSelection); break;
                        case "key_word":
                            document.cookie = encodeURI("key_word_cookie=" + statusSelection); break;
                    }

                    location.reload();
                }
            }

            let reportName = queryArray[0][0].toLowerCase().replace(/ /g, '');

            let length = 0;

            queryArray.forEach((slice, index) => {
                if(index !== 0){
                    length += slice[1];
                }
            });

            switch(reportName){
                        case "category":
                            document.getElementById('totalCategoryReport').innerHTML = "Total: " + length; break;
                        case "type":
                            document.getElementById('totalTypeReport').innerHTML = "Total: " + length; break;
                        case "state_name":
                            document.getElementById('totalStateReport').innerHTML = "Total: " + length; break;
                        case "key_word":
                            document.getElementById('totalKeyReport').innerHTML = "Total: " + length; break;
                    }
        }
        </script>
        <!-- End Google Pie Chart API Code -->


    </head>

    <body>
        <div class="right-content">
            <div class="container">
                <h3 style = "color: #01B0F1;">Reports --> Pie Chart.</h3>
                <h3><img src="images/reports.png" style="max-height: 35px;" /> Pie Chart</h3>
            </div>
        </div>
        <div class="container">
            <table>
                <tr>
                    <td>
                        <div style=" width:400px; height:400px; disply:inline-block;" id="categoryReport" style="width: 900px; height: 500px;"></div>
                        <p style="position:relative;z-index:1000;text-align:center" id="totalCategoryReport"></p>
                    </td>
                    <td>
                        <div style="width:400px; height:400px; disply:inline-block;" id="typeReport" style="width: 900px; height: 500px;"></div>
                        <p  style="position:relative;z-index:1000;text-align:center" id="totalTypeReport"></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style=" width:400px; height:400px; disply:inline-block;" id="stateReport" style="width: 900px; height: 500px;"></div>
                        <p  style="position:relative;z-index:1000;text-align:center" id="totalStateReport"></p>
                    </td>
                    <td>
                        <div style=" width:400px; height:400px; disply:inline-block;" id="keyReport" style="width: 900px; height: 500px;"></div>
                        <p  style="position:relative;z-index:1000;text-align:center" id="totalKeyReport"></p>
                    </td>
                </tr>
            </table><br><br><br><br><br><br>
        <?php
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        if ($_COOKIE['category_cookie']!= null) {
            $categorySelection = $_COOKIE['category_cookie'];
            $sql = "SELECT DISTINCT category, id from dresses";
            //$sql = "SELECT DISTINCT app_name, app_version, app_status from sbom;";
            setcookie("category_cookie", "", time()-3600);
            echo "<table id='info' cellpadding='0' cellspacing='0' border='0'
            class='datatable table table-striped table-bordered datatable-style table-hover'
            width='100px' style='width: 750px;'>
                    <thead>
                        <tr id='table-first-row'>
                        <th>Category</th>
                            


                        </tr>
                    </thead>
                    <tbody>";
                    $result = $db->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo '<tr>
                                        <td>'.$row["category"].' </span> </td>
                                        <td>'.$row["id"].' </span> </td>
                                        
                                        </tr>';

                            }//end while
                        }//end if
                        else {
                            echo "0 results";
                        }//end else

                        $result->close();
                        echo "</tbody>

                    <tfoot>
                    <tr>
                    <th>category</th>
                    
                    </tr>
                </tfoot>


                        </table>";
            }elseif($_COOKIE['type_cookie']!= null) {
                $typeSelection = $_COOKIE['type_cookie'];
                $sql = "SELECT DISTINCT type, id from dresses;";
                setcookie("type_cookie", "", time()-3600);
                echo "<table id='info' cellpadding='0' cellspacing='0' border='0'
                class='datatable table table-striped table-bordered datatable-style table-hover'
                width='100%' style='width: 50px;'>
                        <thead>
                            <tr id='table-first-row'>
                                    <th>ID</th>
                                    <th>Type</th>
                                    

                            </tr>
                        </thead>

                        <tbody>";
                        $result = $db->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo '<tr>
                                            <td>'.$row["type"].'</td>
                                            <td>'.$row["id"].'</td>
                                           

                                        </tr>';

                                }//end while
                            }//end if
                            else {
                                echo "0 results";
                            }//end else

                            $result->close();
                            echo "</tbody>

                        <tfoot>
                        <tr>
                        <th>Type</th>
                        <th>ID</th>
                        
                        </tr>
                    </tfoot>

                            </table>";
        }elseif ($_COOKIE['state_name_cookie']!= null) {
            $stateSelection = $_COOKIE['state_name_cookie'];
            $sql = "SELECT DISTINCT state_name, id from dresses;";
            setcookie("state_name_cookie", "", time()-3600);
            echo "<table id='info' cellpadding='0' cellspacing='0' border='0'
            class='datatable table table-striped table-bordered datatable-style table-hover'
            width='100%' style='width: 75px;'>
                    <thead>
                        <tr id='table-first-row'>
                        <th>State Name</th>
                        <th>ID</th>
                        
                        </tr>
                    </thead>

                    <tbody>";
                    $result = $db->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo '<tr>
                                <td>'.$row["state_name"].'</td>
                                <td>'.$row["id"].'</td>
                                </tr>';

                            }//end while
                        }//end if
                        else {
                            echo "0 results";
                        }//end else

                        $result->close();
                        echo "</tbody>

                    <tfoot>
                    <tr>
                    <th>State Name</th>
                    <th>ID</th>
                    
                    </tr>
                </tfoot>

                        </table>";
        }elseif ($_COOKIE['key_word_cookie']!= null) {
            $keySelection = $_COOKIE['key_word_cookie'];
            $sql = "SELECT DISTINCT key_word, id from dresses;";
            setcookie("key_word_cookie", "", time()-3600);
            echo "<table id='info' cellpadding='0' cellspacing='0' border='0'
            class='datatable table table-striped table-bordered datatable-style table-hover'
             style='width:100%;'>
             <thead>
                <tr id='table-first-row'>
                <th>Key Word</th>
                <th>ID</th>
                
                </tr>
            </thead>

            <tbody>";
            $result = $db->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>
                        <td>'.$row["key_words"].'</td>
                        <td>'.$row["id"].'</td>
                        
                        </tr>';

                    }//end while
                }//end if
                else {
                    echo "0 results";
                }//end else

                $result->close();
                echo "</tbody>

            <tfoot>
            <tr>
            <th>Key Word</th>
            <th>ID</th>
           
            </tr>
        </tfoot>
        </table>";
        }
        ?>

                    </tbody>
                </table>


                <script type="text/javascript" language="javascript">

                var cat_status, type_status, state_status, key_status = null;
                <?php
                if ($categorySelection != null) {
                    echo "app_status ='".$categorySelection."';";
                } else if ($typeSelection != null) {
                    echo  "cmp_status ='".$typeSelection."';";
                } else if ($stateSelection!= null) {
                    echo "request_status ='".$stateSelection."';";
                } else if ($keySelection != null) {
                    echo "request_step ='".$keySelection."';";
                } else {
                    echo "console.log(\"No Cookies Set\");";
                }
                ?>

               $(document).ready( function () {

                $('#info').DataTable( {
                    dom: 'lfrtBip',
                    buttons: [
                        'copy', 'excel', 'csv', 'pdf'
                    ] }
                );



                $('#info thead tr').clone(true).appendTo( '#info thead' );
                $('#info thead tr:eq(1) th').each( function (i) {
                    var title = $(this).text();
                    if (title == 'Cat Status' && cat_status != null) {
                        $(this).html( '<input id = "mytext" type="text" placeholder="Search '+title+'" value = "'+cat_status+'" autofocus/>' );

                        $( this ).trigger( 'keyup' );
                    } else if (title == 'type Status' && type_status != null) {
                        $(this).html( '<input id = "mytext" type="text" placeholder="Search '+title+'" value = "'+type_status+'" autofocus/>' );
                        $( 'input', this ).trigger( 'keyup change' );
                    } else if (title == 'state Status' && title != 'state Step' && state_status != null) {
                        $(this).html( '<input id = "mytext" type="text" placeholder="Search '+title+'" value = "'+state_status+'" autofocus/>' );
                        $( this ).trigger( 'change' );
                    } else if (title == 'Key Status' && title != 'Key Status' && key_step != null) {
                        $(this).html( '<input id = "mytext" type="text" placeholder="Search '+title+'" value = "'+key_step+'" autofocus/>' );
                        $( this ).trigger( 'change' );
                    } else {
                        $(this).html( '<input id = "mytext" type="text" placeholder="Search '+title+'"/>' );
                    }

                    $( 'input', this ).on( 'keyup change', function () {
                        if ( table.column(i).search() !== this.value ) {
                            table
                                .column(i)
                                .search( this.value )
                                .draw();
                        }
                    } );


                } );

                var table = $('#info').DataTable( {
                    orderCellsTop: true,
                    fixedHeader: true,
                    retrieve: true
                } );
                table.columns(0).search( $('#mytext').val() ).draw();
            } );



        </script>
        </div>
    </body>

</html>


 <style>
   tfoot {
     display: table-header-group;
   }
 </style>

  <?php include("./footer.php"); ?>
