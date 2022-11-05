<?php

require_once "class/Crud.php";

$Crud = new Crud;

//recuperer le table de projet 
$projet = $Crud->select("projet", "titre");

//print_r($projet);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau site</title>
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <main>


        <!--creation nouveau site -->
        <h1>Nouveau Site</h1>
        <form action=" site-store.php" method="post">
            <label>Nom de site
                <input type="text" name="nomSite">
            </label>
            <label>prix($)
                <input type="numbre" name="prix">
            </label>
            <label> projet


                <select name="siteProjetId">
                    <?php foreach ($projet as $row) {?>
                    <option value="<?= $row['projetId'] ?>"><?= $row['titre'] ?></option>
                    <?php } ?>
                </select>

            </label>
            <input type="submit" value="ajouter">
        </form>
    </main>
</body>

</html>