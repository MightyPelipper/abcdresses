<?php

  // set the current page to one of the main buttons
  $nav_selected = "HOME";

  $nav_selected == "LIST";
  $nav_selected == "TIMELINE";
  $nav_selected == "REPORTS";
  $nav_selected == "SCANNER";
  $nav_selected == "HISTORY";
  $nav_selected == "TREND";

  // make the left menu buttons visible; options: YES, NO
  $left_buttons = "NO";

  // set the left menu button selected; options will change based on the main selection
  $left_selected = "";
  require 'db_configuration.php';
  include("nav.php");

  //get the number of question shown on page from preferences
$sqlnum = "SELECT `value` FROM preferences WHERE `name`= 'NO_OF_DRESSES_TO_SHOW'";

$thing = mysqli_query($db,$sqlnum);

$resultnum = mysqli_fetch_array($thing);


//echo "<br>";


$questNum = $resultnum['value'];
//echo $questNum;
// end of that

?>

<html>

<head>
<style>
table.center {
    margin-left:auto; 
    margin-right:auto;
  }
  .image {
            width: 200px;
            height: 200px;
            padding: 20px 20px 20px 20px;
            transition: transform .2s;
        }
        .image:hover {
            transform: scale(1.2)
        }
        #table_1 {
            border-spacing: 300px 0px;
        }
        #table_2 {
            margin-left: auto;
            margin-right: auto;
        }

</style>
</head>

<body>
<h2 style = "color: #01B0F1;">Welcome to ABC Dresses </h3>

<!--Displaying images in grid view-->

<?php
        if(isset($_GET['preferencesUpdated'])){
            if($_GET["preferencesUpdated"] == "Success"){
                echo "<br><h3 align=center style='color:green'>Success! The Preferences have been updated!</h3>";
            }
        }
    ?>
    
    <br>
    <h2 id = "directions">Latest Dresses</h2><br>
    
    <?php

    $sql1 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_DRESSES_PER_ROW'";
    $sql4 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_DRESSES_TO_SHOW'";
    //this is to get the numbers of questions from preferences so i can limit the number of questions printed
    //$sqlpref = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_QUESTIONS_TO_SHOW'";
    //$resultspref = mysqli_query($db,$sqlpref);
    //if(mysqli_num_rows($resultspref)>0){
    //    while($row = mysqli_fetch_assoc($resultspref)){
    //         $pref[] = $row;
   //     }
    //}

    //select puzzles using the preferences restrictions
    $sql2 = "SELECT `name` FROM `dresses` ORDER BY RAND() LIMIT $questNum";
    $sql3 = "SELECT `image_url` FROM `dresses` ORDER BY RAND() LIMIT $questNum";

    $results1 = mysqli_query($db,$sql1);
    $results2 = mysqli_query($db,$sql2);
    $results3 = mysqli_query($db,$sql3);
    $results4 = mysqli_query($db,$sql4);

    if(mysqli_num_rows($results1)>0){
        while($row = mysqli_fetch_assoc($results1)){
            $column[] = $row;
        }
    }
    
    
    if(mysqli_num_rows($results2)>0){
        while($row = mysqli_fetch_assoc($results2)){
            $dresses[] = $row;
        }
    }

    if(mysqli_num_rows($results3)>0){
        while($row = mysqli_fetch_assoc($results3)){
            $pics[] = $row;
        }
    }

    if(mysqli_num_rows($results4)>0){
        while($row = mysqli_fetch_assoc($results4)){
            $numDress[] = $row;
        }
    }



    $columns = $column[0]['value'];

    $numDresses = $numDress[0]['value'];

    $count= count($dresses);
    
    echo "<table id = 'table_2'>
    <!--Links to quizzes can be put inside the href = -->";
    echo "<tr>";
    for($a=0;$a<$count;$a){
        for($b=0;$b<$columns;$b++){
            
            if($a>=$count){
                break;
            }else{
                
        $dress = $dresses[$a]['name'];
        $pic = $pics[$a]['image_url'];
        echo "
        <td>
            <a href = 'display_quiz.php?topic=$dress' title = $dress>
            <img class = 'image' src='dress_images/$pic'  alt= $pic>
                
            </a>
        </td>";
        $a++;
            }
        }
    echo "</tr>";
    }   
    echo"</table>";
    ?>




</body>

</html>