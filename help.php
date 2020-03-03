<?php

    require 'bin/functions.php';
    require 'db_configuration.php';
    $nav_selected = "HELP";
    $left_buttons = "NO";
    $left_selected = "";

?>
<?php $page_title = 'ABC Dresses > Help'; ?>
<?php include('header.php'); ?>
<?php include('nav.php'); ?>

<html>
    <head>
        <title>ABD Dresses > Help</title>
    </head>
    <style>
        #image {
            width: 100px;
            height: 100px;
            padding: 20px 20px 20px 20px;
        }
        #table_2 {
            margin-left: auto;
            margin-right: auto;
        }
        #silc {
            width: 300;
            height: 85;
        }
        #welcome {
            text-align: center;
        }
        #table_1 {
            border-spacing: 200px 0px;
        }
        #directions {
            text-align: center;
        }
        h2{
            text-align: center; 
        }
        p{
            text-align: center; 
        }
        h4{
            text-align: center; 
        }
        
        #title {
        text-align: center;
        color: darkgoldenrod;
        }

    </style>
    <body>
   
<h2 id="title">Welcome to ABC Dresses!</strong></h2>
<h4>Summer 2020.ICS499.Version 2.0</h4>
<p>Each of the icons on the top navigation bar represents an area to explore. The list is based on your access role.</p>
<p>Each icon in the carousel represents dresses from around India.  It is displayed in a random order each time.</p>
<p>While logged in as an Admin, users will be able to add additional dresses.</p>
<p>Admin users will also be able to modify and delete existing dresses.</p>
<p>All of the dresses are being stored on MYSQL database.</p>
<p>The number of dresses and the number of icons per row on the home page can be changed by the admin.</p>
<p>This site was updated to PHP format by the students of course ICS 499 Summer 2020, Metro State University.</p>

</html>