<?php

require_once "class/Crud.php";

$Crud = new Crud;

$site = $Crud->select("site", "nomSite");
$projet = $Crud->select("projet", "titre");


//print_r($projet);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <title>list de sites</title>
</head>

<body>
    <main>
        <h1>List de sites </h1>
        <h2 class="ajouter"><a href="site-create.php"><i class="fi fi-rr-add">

                </i> </a>
            Nouveau </h2>
        <table id="affichage">
            <thead>
                <tr>
                    <th>Nom de site</th>
                    <th>prix($)</th>
                    <th>nom du projet</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                <?php


                foreach ($site as $row) {

                ?>
                <tr>
                    <td> <?php echo $row['nomSite'] ?></td>
                    <td><?php echo $row['prix'] ?></td>




                    <td><?php foreach ($projet as $pro) { ?>

                        <?php if ($row['siteProjetId'] == $pro['projetId']) {
                                    echo  $pro['titre'];
                                }  ?>
                        <?php
                            }
                            ?></td>
                    <td><a href="site-show.php?id=<?php echo  $row['siteId'] ?>"><i class="fi fi-ss-eye"></i>
                        </a>
                        <a href="site-edit.php?id=<?php echo  $row['siteId'] ?>"><i class="fi fi-rr-edit"></i></a>


                    </td>


                </tr>
                <?php
                }
                ?>


            </tbody>
        </table>
    </main>
</body>

</html>