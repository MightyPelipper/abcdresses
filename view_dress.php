<?php $page_title = 'View Dress'; ?>
<?php $page_title = 'ABC Dresses > View Dress'; ?>
<?php 
    require 'bin/functions.php';
    require 'db_configuration.php';
    $left_buttons = "NO";
    include('nav.php');
    $page="dresses_list.php";

    verifyLogin($page);
?>

<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>

</head>

<?php
include_once 'db_configuration.php';

if (isset($_GET['id'])){

    $id = $_GET['id'];
    
    $sql = "SELECT * FROM dresses
            WHERE id = '$id'";

    if (!$result = $db->query($sql)) {
        die ('There was an error running query[' . $connection->error . ']');
    }//end if
    
}//end if
?>

<body>

<div class="tab">
	<button class="tablinks" onclick="openTab(event, 'Form')" id="defaultOpen">Form</button>
  <button class="tablinks" onclick="openTab(event, 'Image')">Image</button>
</div>

<div id="Form" class="tabcontent">
  <?php
  if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<form action="view_the_dress.php" method="POST">
        
    <div>
      <label for="id">Id</label>
      <input type="text" class="form-control" name="id" value="'.$row["id"].'"  maxlength="5" readonly>
    </div>
    
    <div>
      <label for="name">name</label>
      <input type="text" class="form-control" name="name" value="'.$row["name"].'"  maxlength="255" readonly>
    </div>
    
    <div>
      <label for="category">description</label>
      <input type="text" class="form-control" name="description" value="'.$row["description"].'"  maxlength="255" readonly>
    </div>
        
    <div>
      <label for="level">did_you_know</label>
      <input type="text" class="form-control" name="did_you_know" value="'.$row["did_you_know"].'"  maxlength="255" readonly>
    </div>
        
    <div>
      <label for="facilitator">category</label>
      <input type="text" class="form-control" name="category" value="'.$row["category"].'"  maxlength="255" readonly>
    </div>
    
    <div>
      <label for="description">type</label>
      <input type="text" class="form-control" name="type" value="'.$row["type"].'"  maxlength="255" readonly>
    </div>
    
    <div>
      <label for="required">state_name</label>
      <input type="text" class="form-control" name="state_name" value="'.$row["state_name"].'"  maxlength="255" readonly>
    </div>
    
    <div>
      <label for="optional">key_words</label>
      <input type="text" class="form-control" name="key_words" value="'.$row["key_words"].'"  maxlength="255" readonly>
    </div>
    
    </div>

    <div id="Image" class="tabcontent">
      <label for="cadence"></label>
      <img width = "400"  src="' . "dress_images/" .$row["image_url"]. '" alt="'.$row["image_url"]. '"></td>
    </div>
    
    
    </form>'
    ;
    
    }//end while
    }//end if
    ?>


<script>
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   
</body>
</html> 
