<?php?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/main_style.css" type="text/css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="styles/custom_nav.css" type="text/css">
        <title>ABC Dresses</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="./mainStyleSheet.css">
        
        
    <!-- Custom styles for this template -->
    

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    </head>

<body class="body_background">

<div id="wrap">
    <div id="nav">

        <ul>
            <li>Admin Functions:
            </li>
            <a href="fix_image_names.php">
              <li <?php //if($nav_selected == "FIX_IMAGE_NAMES"){ echo 'class="current-page"'; } ?>>
                <img src="./images/icons/image33.png">
                <br/>Fix Image Names</li>
            </a>

            <a href="importSQL.php">
              <li <?php //if($nav_selected == "IMPORT"){ echo 'class="current-page"'; } ?>>
                <img src="./images/icons/admin_import.png">
                <br/>Import (CSV format)</li>
            </a>

            <a href="user_list.php">
              <li <?php //if($nav_selected == "USER_LIST"){ echo 'class="current-page"'; } ?>>
              <img src="./images/icons/admin_users.png">
              <br/>User Management</li>
            </a>          

            <a href="">
              <li <?php //if($nav_selected == "EXPORT"){ echo 'class="current-page"'; } ?>>
              <a href="admin_export.php">
                <img src="./images/icons/admin_export.png">
                <br/>Export (CSV format)</li>
            </a>
      </ul>


      <br />
    </div>


    <table style="width:1250px">
      <tr>
        <?php
            if ($left_buttons == "YES") {
        ?>

        <td style="width: 120px;" valign="top">
        <?php 
            if ($nav_selected == "HOME") {
                include("./index.php");
            } elseif ($nav_selected == "LIST") {
                include("./left_menu_list.php");
            } elseif ($nav_selected == "TIMELINE") {
                include("./left_menu_timeline.php");
            } elseif ($nav_selected == "REPORTS") {
                include("./left_menu_reports.php");
            } elseif ($nav_selected == "SCANNER") {
                include("./left_menu_scanner.php");
            } elseif ($nav_selected == "HISTORY") {
                include("./left_menu_history.php");
            } elseif ($nav_selected == "TREND") {
              include("./left_menu_trend.php");
           } elseif ($nav_selected == "SETUP") {
            include("./left_menu_setup.php");
          } elseif ($nav_selected == "ABOUT") {
          include("./left_menu_about.php");
          }elseif ($nav_selected == "HELP") {
                include("./left_menu_help.php");
            } else {
                include("./left_menu.php");
            }
        ?>
        </td>
        <td style="width: 1100px;" valign="top">
        <?php
          } else {
        ?>
        <td style="width: 100%;" valign="top">
        <?php
          }
        ?>
