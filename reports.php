<?php

@include('nav.php');

//verify logins
//$page="modify_dress.php";
//verifyLogin($page);

//run necessary queries

//include_once 'db_configuration.php';
$connect = mysqli_connect("localhost", "root", "", "abcdresses_db");

//these are for the pie charts
$query = "SELECT type, count(*) as number FROM dresses GROUP BY type";
$result = mysqli_query($connect, $query);

$query2 = "SELECT category, count(*) as number FROM dresses GROUP BY category";
$result2 = mysqli_query($connect, $query2);

$query3="SELECT state_name, count(*) as number FROM dresses GROUP BY state_name" ;
$result3 = mysqli_query($connect, $query3);

$query4="SELECT key_words, count(*) as number FROM dresses GROUP BY key_words" ;
$result4 = mysqli_query($connect, $query4);

//these are for the tables down below

$sql3="SELECT category, count(*) as counts FROM dresses GROUP BY category" ;
    $sql4="SELECT type, count(*) as counts FROM dresses GROUP BY type";
    $sql5="SELECT state_name, count(*) as counts FROM dresses GROUP BY state_name" ;
    $sql6="SELECT key_words, count(*) as counts FROM dresses GROUP BY key_words" ;

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
      google.charts.setOnLoadCallback(drawStateNameChart);
      google.charts.setOnLoadCallback(drawKeyWordsChart);


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
        var options = {'title':'Dresses by Type',
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

    

    //THIRD CHART STATE NAME CHART    
    function drawStateNameChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'StateName');
        data.addColumn('number', 'Dresses');

        data.addRows([
            <?php
            while($row = mysqli_fetch_array($result3))
            {
                echo "['".$row["state_name"] ."', " .$row["number"] . "], ";
            }
            ?>
        ]);




        // Set chart options
        var options = {'title':'Dresses by State Name',
                    'width':400,
                    'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('state_name_chart_div'));
        chart.draw(data, options);
    } 


    //FOURTH CHART KEY WORDS

        
    function drawKeyWordsChart() {

      // Create the data table.
      var data = new google.visualization.DataTable();

      data.addColumn('string', 'KeyWords');
      data.addColumn('number', 'Dresses');

      data.addRows([
          <?php
          while($row = mysqli_fetch_array($result4))
          {
              echo "['".$row["key_words"] ."', " .$row["number"] . "], ";
          }
          ?>
      ]);




      // Set chart options
      var options = {'title':'Dresses by KeyWords',
                  'width':400,
                  'height':300};

      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('key_words_chart_div'));
      chart.draw(data, options);
      } 

    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <table>
      <tr>
        <td><div  id="chart_div" style="border: 1px solid #ccc"></div></td>
        <td><div  id="category_chart_div" style="border: 1px solid #ccc"></div></td>
        
      </tr>
    </table>

    <style>
table {
  border-collapse: collapse;
  width: 25%;
  
}

th, td {
  text-align: left;
  padding: 15px;
  width: 2%
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
          
          <th>Category</th>
          <th>Count</th>
          
                      
        </tr>
    </thead>
    <tbody>
        
  <?php
  //generate content
  for($a=0;$a<$count_cat;$a++){

    
    $catname = $category[$a]['category'];
    $catcat = $category[$a]['counts'];

    echo'<tr>
    
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
          
          <th>Type</th>
          <th>Count</th>
          
                      
        </tr>
    </thead>
    <tbody>
        
  <?php
  //generate content
  for($a=0;$a<$count_cat;$a++){

    
    $typename = $type[$a]['type'];
    $typetype = $type[$a]['counts'];

    echo'<tr>
    
    <td>'.$typename.'</td>
    <td>'.$typetype.'</td>

    </tr>';
  }


  ?>

        

    </tbody>

  </table>

    <table>
      <tr>
        
        <td><div  id="state_name_chart_div" style="border: 1px solid #ccc"></div></td>
        <td><div  id="key_words_chart_div" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>


    <!--Table for State Name-->
<table style="display: inline-block;">
<caption>State Name</caption>
    <thead>
      <tr>
         
          <th>State Name</th>
          <th>Count</th>
          
                      
        </tr>
    </thead>
    <tbody>
        
  <?php
  //generate content
  for($a=0;$a<$count_cat;$a++){

    
    $statename = $state_name[$a]['state_name'];
    $statestate =$state_name[$a]['counts'];

    echo'<tr>
    
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
          
          <th>Key Word</th>
          <th>Count</th>
          
                      
        </tr>
    </thead>
    <tbody>
        
  <?php
  //generate content
  for($a=0;$a<$count_cat;$a++){

    
    $keyname = $key_words[$a]['key_words'];
    $keykey = $key_words[$a]['counts'];

    echo'<tr>
    
    <td>'.$keyname.'</td>
    <td>'.$keykey.'</td>

    </tr>';
  }


  ?>

        

    </tbody>

  </table>


    <?php
    //prepare SQL statements for data for each table

    


    //include_once("report_tables.php");


    //Jquery Tables go here


    ?>

  

  </body>
</html>