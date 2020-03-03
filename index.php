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

        <!--This is for bootstrap for carousel-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
    

<body>
<h2 style = "color: #01B0F1;">Welcome to ABC Dresses </h3>


<!--style for indicator on carosel-->
<style>
.carousel-control-prev-icon,
.carousel-control-next-icon {
  height: 100px;
  width: 100px;
  outline: black;
  background-size: 100%, 100%;
  border-radius: 50%;
  border: 1px solid black;
  background-color: black;
}

.carousel-control-next-icon:after
{
  content: '';
  font-size: 55px;
  color: red;
}

.carousel-control-prev-icon:after {
  content: '';
  font-size: 55px;
  color: red;
}

</style>

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
    $sql5 = "SELECT `comments` FROM `preferences` WHERE `name`= 'DEFAULT_VIEW_FOR_HOME_PAGE'";
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
    $results5 = mysqli_query($db,$sql5);


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

    if(mysqli_num_rows($results5)>0){
        while($row = mysqli_fetch_assoc($results5)){
            $view[] = $row;
        }
    }



    $columns = $column[0]['value'];

    $numDresses = $numDress[0]['value'];

    $count= count($dresses);

    $defaultView = $view[0]['comments'];


    
    if( $defaultView == 'Grid'){  //if view is set to GRID

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
    }

   if( $defaultView == 'Carousal'){  // if the view is set to carousal

    //echo "it works";


    echo "<div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>
    <div class='carousel-inner'>
      <div class='carousel-item active'>
        <img src='dress_images/crop_top_girl.jpg' class='d-block w-100' alt='...'>
      </div>";

    


    for ($a=0; $a<$count; $a++){

        //loop through all the images
        $pic = $pics[$a]['image_url'];
        echo "<div class='carousel-item'>
        <img src='dress_images/$pic' class='d-block w-100' alt='$pic'>
      </div>";
    
    }
    
    echo "</div>
    <a class='carousel-control-prev' href='#carouselExampleControls' role='button' data-slide='prev'>
      <span class='carousel-control-prev-icon' aria-hidden='true'></span>
      <span class='sr-only'>Previous</span>
    </a>
    <a class='carousel-control-next' href='#carouselExampleControls' role='button' data-slide='next'>
      <span class='carousel-control-next-icon' aria-hidden='true'></span>
      <span class='sr-only'>Next</span>
    </a>
  </div>";

   } 

   else{

        if($defaultView == 'list'){
       echo "broken no list exsists yet in the code";}
       // as of now list view does not exist
   }

    ?>




</body>

</html>