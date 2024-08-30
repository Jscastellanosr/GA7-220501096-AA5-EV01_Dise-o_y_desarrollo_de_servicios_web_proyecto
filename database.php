<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'usuariosevidencia';

try
{
    $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
    }
    catch (PDOExeption $e){
        die('connected Failed: '. $e->get_message());
    }

?>