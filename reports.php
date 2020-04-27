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

    <?php
    //prepare SQL statements for data for each table

    $sql3="SELECT id, name, category FROM dresses" ;
    $sql4="SELECT id, name, type FROM dresses";
    $sql5="SELECT id, name, state_name FROM dresses" ;
    $sql6="SELECT id, name, key_words FROM dresses" ;

    $results3 = mysqli_query($connect, $sql3);
    $results4 = mysqli_query($connect, $sql4);
    $results5 = mysqli_query($connect, $sql5);
    $results6 = mysqli_query($connect, $sql6);


    if(mysqli_num_rows($results3)>0){
      while($row = mysqli_fetch_assoc($results3)){
          $category[] = $row;
      }
  }

  if(mysqli_num_rows($results4)>0){
    while($row = mysqli_fetch_assoc($results4)){
        $type[] = $row;
    }
}

if(mysqli_num_rows($results5)>0){
  while($row = mysqli_fetch_assoc($results5)){
      $state_name[] = $row;
  }
}

if(mysqli_num_rows($results6)>0){
  while($row = mysqli_fetch_assoc($results6)){
      $key_words[] = $row;
  }
}

$count_cat= count($category);


    //Jquery Tables go here


    ?>
<style>
table {
  border-collapse: collapse;
  width: 25%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
</style>
  
  <table style="display: inline-block;">
  <caption>Category</caption>
    <thead>
      <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Category</th>
          
                      
        </tr>
    </thead>
    <tbody>
        
  <?php
  //generate content
  for($a=0;$a<$count_cat;$a++){

    $catid = $category[$a]['id'];
    $catname = $category[$a]['name'];
    $catcat = $category[$a]['category'];

    echo'<tr>
    <td>'.$catid.'</td>
    <td>'.$catname.'</td>
    <td>'.$catcat.'</td>

    </tr>';
  }


  ?>

        

    </tbody>

  </table>
<!--Table for type-->
<table style="display: inline-block;">
<caption>Type</caption>
    <thead>
      <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Type</th>
          
                      
        </tr>
    </thead>
    <tbody>
        
  <?php
  //generate content
  for($a=0;$a<$count_cat;$a++){

    $typeid = $type[$a]['id'];
    $typename = $type[$a]['name'];
    $typetype = $type[$a]['type'];

    echo'<tr>
    <td>'.$typeid.'</td>
    <td>'.$typename.'</td>
    <td>'.$typetype.'</td>

    </tr>';
  }


  ?>

        

    </tbody>

  </table>

<!--Table for State Name-->
<table style="display: inline-block;">
<caption>State Name</caption>
    <thead>
      <tr>
          <th>ID</th>
          <th>Name</th>
          <th>State</th>
          
                      
        </tr>
    </thead>
    <tbody>
        
  <?php
  //generate content
  for($a=0;$a<$count_cat;$a++){

    $stateid = $state_name[$a]['id'];
    $statename = $state_name[$a]['name'];
    $statestate = "";//$state_name[$a]['type'];

    echo'<tr>
    <td>'.$stateid.'</td>
    <td>'.$statename.'</td>
    <td>'.$statestate.'</td>

    </tr>';
  }


  ?>

        

    </tbody>

  </table>

<!--Table for Keywords-->
<table style="display: inline-block;">
<caption>Keywords</caption>
    <thead>
      <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Type</th>
          
                      
        </tr>
    </thead>
    <tbody>
        
  <?php
  //generate content
  for($a=0;$a<$count_cat;$a++){

    $keyid = $key_words[$a]['id'];
    $keyname = $key_words[$a]['name'];
    $keykey = $key_words[$a]['key_words'];

    echo'<tr>
    <td>'.$keyid.'</td>
    <td>'.$keyname.'</td>
    <td>'.$keykey.'</td>

    </tr>';
  }


  ?>

        

    </tbody>

  </table>


  </body>
</html>