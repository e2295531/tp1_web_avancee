<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    require_once "class/Crud.php";

    $crud = new crud;

    $site = $crud->selectId('site', $id);

    $projet = $crud->select("projet", "titre");


    extract($site);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <main>

        <h1>modifier </h1>
        <form action="site-update.php" method="post">
            <input type="hidden" name="siteId" value="<?php echo $siteId; ?>">
            <label>Nom de site
                <input type="text" name="nomSite" value="<?php echo $nomSite; ?>">
            </label>
            <label>prix
                <input type="numbre" name="prix" value="<?php echo $prix; ?>">
            </label>
            <label>Nom du projet
                <select name="siteProjetId">
                    <?php foreach ($projet as $row) { ?>
                    <option value="<?= $row['projetId'] ?>"
                        <?php if ($siteProjetId == $row['projetId']) echo "selected"   ?>><?= $row['titre'] ?></option>
                    <?php } ?>
                </select>
            </label>

            <input type="submit" value="modifier">
        </form>
        <form class="delete" action="site-delete.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <input type="submit" value="suprimer">
        </form>
    </main>
</body>

</html>