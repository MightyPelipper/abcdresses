<?php

try{
    $db = new pdo ('mysql:host=localhost;dbname=abcdresses_db;charset=utf8','root','');


}

catch(PDOException $e){
    die($e->getMessage());
}

?>