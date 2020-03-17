<!DOCTYPE html>
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

<h1>Temporary Preferences</h1>
<p>Login for perminent preferences</p>

<?php




?>



<div class="container">
        <!--Check the CeremonyCreated and if Failed, display the error message-->
        
        <form action="modify_the_cookie.php" method="POST">
        <table style="width:500px">
        <tr>
            <th style="width:200px"></th>
            <th>Current Value</th> 
            <th>Update Value</th>
        </tr>
        <tr>
            <td style="width:200px">Number of Topics Per Row:</td>
            <td><input disabled type="int" maxlength="2" size="10" value="<?php echo $_COOKIE['numberOfRows']; ?>" title="Current value"></td> 
            <td><input required type="int" name="new_rows" value= "<?php echo $_COOKIE['numberOfRows']; ?>" maxlength="2" size="10" title="Enter a number"></td>
        </tr>
        <tr>
            <td style="width200px">Number of questions to show:</td>
            <td><input disabled type="int" maxlength="2" size="10" value="<?php echo $_COOKIE['numberOfDresses']; ?>" title="Current value"></td> 
            <td><input required type="int" name="new_dresses" value="<?php echo $_COOKIE['numberOfDresses']; ?>" maxlength="2" size="10" title="Enter a number"></td>
        </tr>

        <tr>
            <td style="width200px">Name of favorite dress:</td>
            <td><input disabled type="text" maxlength="20" size="10" value="<?php echo $_COOKIE['favoriteDress']; ?>" title="Current value"></td> 
            <!--
            <td><input required type="text" name="new_favorite" value="<?php //echo $_COOKIE['favoriteDress']; ?>"  maxlength="20" size="10" title="Enter a dress name"></td>
            -->
            
            <td><select type="text" name="new_favorite" title="Enter fav dress">

            <?php
                //loop to get all choices into the drop down
                for($c=0;$c<$count_dresses;$c++){

                    $dress = $dress_names[$c]['name'];
                    echo "
                        <option value='$dress'>$dress</option>
                    ";
                }
            ?>
            
            </select></td>


        </tr>
        
        



        <tr>
            <td style="width200px">Default view for home page:</td>
            <td><input disabled type="text" maxlength="20" size="10" value="<?php echo $_COOKIE['defaultView']; ?>" title="Current value"></td> 
            

            <td><select type="text" name="new_defaultView" title="Enter view type">
                <option value="Grid">Grid</option>
                <option value="List">List</option>
                <option value="Carousal">Carousal</option>
            
            </select></td>
        </tr>

        <tr>
            <td style="width200px">Image Height In Grid:</td>
            <td><input disabled type="int" maxlength="2" size="10" value="<?php echo $_COOKIE['heightGrid']; ?>" title="Current value"></td> 
            <td><input required type="int" name="new_HeightGrid" value="<?php echo $_COOKIE['heightGrid']; ?>" maxlength="2" size="10" title="Enter a number"></td>
        </tr>


        <tr>
            <td style="width200px">Image Width In Grid:</td>
            <td><input disabled type="int" maxlength="2" size="10" value="<?php echo $_COOKIE['widthGrid']; ?>" title="Current value"></td> 
            <td><input required type="int" name="new_WidthGrid" value="<?php echo $_COOKIE['widthGrid']; ?>" maxlength="2" size="10" title="Enter a number"></td>
        </tr>



        <tr>
            <td style="width200px">Image Hieght in Carousal:</td>
            <td><input disabled type="int" maxlength="2" size="10" value="<?php echo $_COOKIE['widthGrid']; ?>" title="Current value"></td> 
            <td><input required type="int" name="new_HeightCar" value="<?php echo $_COOKIE['widthGrid']; ?>" maxlength="2" size="10" title="Enter a number"></td>
        </tr>

        <tr>
            <td style="width200px">Image Width in Carousal:</td>
            <td><input disabled type="int" maxlength="2" size="10" value="<?php echo $_COOKIE['widthCar']; ?>" title="Current value"></td> 
            <td><input required type="int" name="new_WidthCar"  value="<?php echo $_COOKIE['widthCar']; ?>" maxlength="2" size="10" title="Enter a number"></td>
        </tr>
    




        </table><br>
        <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Modify Preferences</button>
        </form>
    </div>


</body>
</html> 