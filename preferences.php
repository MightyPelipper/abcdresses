<?php 
require 'bin/functions.php';
require 'db_configuration.php';
$page_title = 'ABC Dresses > Preferences';
include('nav.php');
include('header.php'); 
    $page="questions_list.php";
    verifyLogin($page);

$sql1 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_DRESSES_PER_ROW'";
$sql2 = "SELECT `value` FROM `preferences` WHERE `name`= 'NO_OF_DRESSES_TO_SHOW'";
$sql3 = "SELECT `comments` FROM `preferences` WHERE `name`= 'NAME_OF_FAVORITE_DRESS'";
$sql4 = "SELECT `comments` FROM `preferences` WHERE `name`= 'DEFAULT_VIEW_FOR_HOME_PAGE'";

$results = mysqli_query($db,$sql1);
$results2 = mysqli_query($db,$sql2);
$results3 = mysqli_query($db,$sql3);
$results4 = mysqli_query($db,$sql4);

//gets number of rows
if(mysqli_num_rows($results)>0){
    while($row = mysqli_fetch_assoc($results)){
        $column[] = $row;
    }
}
$rows = $column[0]['value'];

//gets number of dresses
if(mysqli_num_rows($results2)>0){
    while($row = mysqli_fetch_assoc($results2)){
        $dresses[] = $row;
    }
}
$dresses = $dresses[0]['value'];

//gets favorite dress
if(mysqli_num_rows($results3)>0){
    while($row = mysqli_fetch_assoc($results3)){
        $favorite[] = $row;
    }
}
$favorite = $favorite[0]['comments'];

//gets default view for home page
if(mysqli_num_rows($results4)>0){
    while($row = mysqli_fetch_assoc($results4)){
        $defaultView[] = $row;
    }
}
$defaultView = $defaultView[0]['comments'];

?>
<style>#title {text-align: center;color: darkgoldenrod;}</style>
<html>
    <head>
        <title>ABC Dresses</title>
        <style>
        input {
            text-align: center;
        }
        </style>
    </head>
    <body>
    <br>
    <h3 id="title">Update Preferences</h3><br>
    </body>
    <div class="container">
        <!--Check the CeremonyCreated and if Failed, display the error message-->
        
        <form action="modify_the_preferences.php" method="POST">
        <table style="width:500px">
        <tr>
            <th style="width:200px"></th>
            <th>Current Value</th> 
            <th>Update Value</th>
        </tr>
        <tr>
            <td style="width:200px">Number of Topics Per Row:</td>
            <td><input disabled type="int" maxlength="2" size="10" value="<?php echo $rows; ?>" title="Current value"></td> 
            <td><input required type="int" name="new_rows" maxlength="2" size="10" title="Enter a number"></td>
        </tr>
        <tr>
            <td style="width200px">Number of questions to show:</td>
            <td><input disabled type="int" maxlength="2" size="10" value="<?php echo $dresses; ?>" title="Current value"></td> 
            <td><input required type="int" name="new_dresses" maxlength="2" size="10" title="Enter a number"></td>
        </tr>

        <tr>
            <td style="width200px">Name of favorite dress:</td>
            <td><input disabled type="text" maxlength="20" size="10" value="<?php echo $favorite; ?>" title="Current value"></td> 
            <td><input required type="text" name="new_favorite" maxlength="20" size="10" title="Enter a dress name"></td>
            
        </tr>
        
        



        <tr>
            <td style="width200px">Default view for home page:</td>
            <td><input disabled type="text" maxlength="20" size="10" value="<?php echo $defaultView; ?>" title="Current value"></td> 
            

            <td><select type="text" name="new_defaultView" title="Enter view type">
                <option value="Grid">Grid</option>
                <option value="List">List</option>
                <option value="Carousal">Carousal</option>
            
            </select></td>
        </tr>




        </table><br>
        <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Modify Preferences</button>
        </form>
    </div>
    </body>
</html>

