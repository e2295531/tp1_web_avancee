<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    require_once "class/Crud.php";

    $crud = new crud;

    $site = $crud->selectId('site', $id);
    $projet = $crud->select("projet", "titre");
    //print_r($site);

    extract($site);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>detail d'un site </title>
</head>

<body>
    <main>
        <h1><?php echo $nomSite; ?></h1>
        <div class="detail">
            <p><strong>Nom de site : </strong><?php echo $nomSite; ?></p>
            <p><strong>prix : </strong><?php echo $prix; ?> $</p>

            <p><strong>nom du
                    projet:
                </strong><?php foreach ($projet as $row) {  if ($siteProjetId == $row['projetId']) echo $row['titre']; } ?>
            </p>



        </div>
        <button> <a href="site-index.php">page d'accueil</a></button>
    </main>


</body>

</html>