<?php session_start(); //begin a session to have a dynamic login?>

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
    </head>

<body class="body_background">

<div id="wrap">
    <div id="nav">

        <ul>
            <a href="index.php">
              <li class="horozontal-li-logo">
              <img src ="./images/icons/abcd_logo.png">
              <br/>ABC Dresses</li>
            </a>

            <a href="index.php">
              <li <?php //if($nav_selected == "HOME"){ echo 'class="current-page"'; } ?>>
              <img src="./images/icons/home.png">
              <br/>Home</li>
            </a>

            <a href="dresses_list.php">
              <li <?php //if($nav_selected == "LIST"){ echo 'class="current-page"'; } ?>>
                <img src="./images/icons/list.png">
                <br/>List</li>
            </a>

            <a href="reports.php">
              <li <?php //if($nav_selected == "REPORTS"){ echo 'class="current-page"'; } ?>>
              <img src="./images/icons/reports.png">
              <br/>Reports</li>
            </a>

            

            <a href="admin.php">
              <li <?php //if($nav_selected == "ADMIN"){ echo 'class="current-page"'; } ?>>
                <img src="./images/icons/admin.png">
                <br/>Admin</li>
            </a>


        <a href="preferences.php">
          <li <?php //if($nav_selected == "SETUP"){ echo 'class="current-page"'; } ?>>
            <img src="./images/icons/setup.png">
            <br/>Setup</li>
        </a>

        <?php  //Check if they are logged out show correct login or logout function

        if (isset($_SESSION['logged_in'])){

         echo '<a href="logout.php">
            <li>
             <img src="./images/icons/logout.png">
            <br/>Logout</li>
            </a>';
                    
              
        }else{
          echo' <a href="loginform.php">
          <li>
            <img src="./images/icons/login.png">
            <br/>Login</li>
            </a> ';
        }
        ?>
          
        <a href="help.php">
          <li <?php //if($nav_selected == "HELP"){ echo 'class="current-page"'; } ?>>
            <img src="./images/icons/help.png">
            <br/>Help</li>
        </a>

        <a href="fav_dress_link.php">
          <li <?php //if($nav_selected == "HELP"){ echo 'class="current-page"'; } ?>>
            <img src="./images/icons/image52.png">
            <br/>Favorite Dress</li>
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
