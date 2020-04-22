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
    
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="./mainStyleSheet.css">
        
    </head>

<?php
        require 'bin/functions.php';
        require 'db_configuration.php';
        $nav_selected = "LIST";
        $left_buttons = "NO";
        $left_selected = "";
        
        $page_title = 'ABC Dresses> Import';            
            include('nav.php');
            //@include('header.php'); 
        
            $page="admin_import.php";
           // verifyLogin($page);
        ?>

<body class="body_background">

<form action="admin_the_import.php" method="POST" enctype="multipart/form-data">
    <div id="wrap">
    <table>
        <th>Search for file to import</th>
        <tr>
            <td><input type="file" name="file_name" id="file_name" maxlength="255"></td>
        </tr>
        <tr>
            <td><div class="text-left">
                    <button type="submit" name="submit" class="btn btn-primary btn-md align-items-center">Upload file</button>
                </div>
            </td>
        </tr>
    </table>
</div>
</form>
</body>
</html>
