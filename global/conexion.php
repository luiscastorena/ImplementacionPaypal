<?php

$servidor = "mysql:dbname=".bd.";host=".servidor;

try{

    $pdo= new PDO($servidor,usuario,password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));

}catch(PDOException $e){
    echo "<script> alert('Error')</script>";
}
?>