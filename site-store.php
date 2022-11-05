<?php

print_r($_POST);

require_once 'class/Crud.php';


$Crud= new Crud;

$insert= $Crud->insert('site',$_POST);


echo $insert;

?>