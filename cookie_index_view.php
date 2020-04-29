
<?php
//include database information
//require 'db_configuration.php';


//this does the layout for index if the user happens to not be logged in. 
//this method will use cookies to complete the infromation for index.php

//check if cookies exist if not set temporary cookie settings






//assign cookie values to variable

$cookie_rows =  $_COOKIE["numberOfRows"];
$cookie_dresses = $_COOKIE["numberOfDresses"];
$cookie_favorite = $_COOKIE["favoriteDress"];
$cookie_defaultView = $_COOKIE["defaultView"];
$cookie_gridHeight = $_COOKIE["heightGrid"];
$cookie_gridWidth = $_COOKIE["widthGrid"];
$cookie_carHeight = $_COOKIE["heightCar"];
$cookie_carWidth = $_COOKIE["widthCar"];


//prepare SQL Statements

$sqlcookie1 = "SELECT `name`, `id` , `dress_image`, `description`  FROM `dresses` ORDER BY RAND() LIMIT $cookie_dresses"; //THis is the correct one
$sqlcookie2 = "SELECT `dress_image` FROM `dresses` ORDER BY RAND() LIMIT $cookie_dresses";

$resultscookie1 = mysqli_query($db,$sqlcookie1);
$resultscookie2 = mysqli_query($db,$sqlcookie2);

if(mysqli_num_rows($resultscookie1)>0){
    while($row = mysqli_fetch_assoc($resultscookie1)){
        $dressescookie[] = $row;
    }
}

if(mysqli_num_rows($resultscookie2)>0){
    while($row = mysqli_fetch_assoc($resultscookie2)){
        $picscookie[] = $row;
    }
}


//dress counter

$cookie_count = $cookie_dresses;

$cookie_columns = $cookie_rows;

echo "<h3>Hello Visitor</h3>";






//Grid view

if( $cookie_defaultView == 'Grid'){  //if view is set to GRID

    echo "<table id = 'table_2'>
    <!--Links to dresses can be put inside the href = -->";
    echo "<tr>";
    for($a=0;$a<$cookie_count;$a){
        for($b=0;$b<$cookie_columns;$b++){
            
            if($a>=$cookie_count){
                break;
            }else{
                
        $dresscookie = $dressescookie[$a]['name'];
        $dresscookieid = $dressescookie[$a]['id'];
        $pic_cookie = $dressescookie[$a]['dress_image'];
        $desc_cookie = $dressescookie[$a]['description'];
        echo "
        <td>
            <a href = 'view_dress.php?id=$dresscookieid' title = '$desc_cookie'>
            <img class = 'image' src='./images/dress_images/$pic_cookie'  alt= '$pic_cookie' height = '$cookie_gridHeight'  width = '$cookie_gridWidth'>
            <h3 style='text-align:center;'>$dresscookie</h3>    
            </a>
        </td>";
        $a++;
            }
        }
    echo "</tr>";
    }   
    echo"</table>";
    }





//Carousal view

if( $cookie_defaultView == 'Carousal'){  // if the view is set to carousal

    //echo "it works";

    //Setting initial carousel image
    $c = 1;

    $c_pic = $dressescookie[$c]['dress_image'];
    $c_id = $dressescookie[$c]['id'];
    $c_dress = $dressescookie[$c]['name'];
    $c_desc = $dressescookie[$c]['description']; 

    echo "<div id='carouselExampleControls' class='carousel slide' data-ride='carousel'>
    <div class='carousel-inner'>
      <div class='carousel-item active'>
        <a href = 'view_dress.php?id=$c_id' title = '$c_desc'>
            <img class='img-responsive center-block' src='./images/dress_images/$c_pic'  alt='$c_pic' height=$cookie_carHeight  width=$cookie_carWidth>
            <h3 style='text-align:center;'>$c_dress</h3> 
        </a>
      </div>";


    for ($a=0; $a<$cookie_count; $a++){
        if($a == $c){
            continue;
        }
        else{
        //loop through all the images
        $dresscookie = $dressescookie[$a]['name'];
        $dresscookieid = $dressescookie[$a]['id'];
        $pic_cookie = $dressescookie[$a]['dress_image'];
        $desc_cookie = $dressescookie[$a]['description'];

        echo "
        <div class='carousel-item'>
            <a href = 'view_dress.php?id=$dresscookieid' title = '$desc_cookie'>
                <img class='img-responsive center-block' src='./images/dress_images/$pic_cookie'  alt='$pic_cookie' height=$cookie_carHeight  width=$cookie_carWidth>
                <h3 style='text-align:center;'>$dresscookie</h3> 
            </a>
        </div>";
        }
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

        if($cookie_defaultView == 'list'){
       //echo "broken no list exsists yet in the code";}
       // as of now list view does not exist
       //redirect to dresses_list for this view
       echo '<script>window.location.href = "dresses_list.php";</script>';
   }}