<?php

@include('nav.php');

//verify logins
//$page="modify_dress.php";
//verifyLogin($page);

//run necessary queries

//include_once 'db_configuration.php';
$connect = mysqli_connect("localhost", "root", "", "abcdresses_db");

$query = "SELECT type, count(*) as number FROM dresses GROUP BY type";
$result = mysqli_query($connect, $query);

$query2 = "SELECT category, count(*) as number FROM dresses GROUP BY type";
$result2 = mysqli_query($connect, $query2);

?>

<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawCategoryChart);


      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Type');
        data.addColumn('number', 'Dresses');

          data.addRows([
            <?php
            while($row = mysqli_fetch_array($result))
            {
                echo "['".$row["type"] ."', " .$row["number"] . "], ";
            }
            ?>
          ]);


        
        
        // Set chart options
        var options = {'title':'Dresses by Audience',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

     //SECOND REPORT
    function drawCategoryChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Category');
        data.addColumn('number', 'Dresses');

        data.addRows([
            <?php
            while($row = mysqli_fetch_array($result2))
            {
                echo "['".$row["category"] ."', " .$row["number"] . "], ";
            }
            ?>
        ]);




        // Set chart options
        var options = {'title':'Dresses by Catagory',
                    'width':400,
                    'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('category_chart_div'));
        chart.draw(data, options);
    }     


    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    
    <td><div id="category_chart_div" style="border: 1px solid #ccc"></div></td>
    <td><div id="chart_div" style="border: 1px solid #ccc"></div></td>

  </body>
</html>