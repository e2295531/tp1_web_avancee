<?php

//print_r($_POST);

require_once 'class/Crud.php';


$Crud= new Crud;

$update= $Crud->update('site',$_POST);

echo $update;


?>