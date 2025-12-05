<?php
require "connect.php";

$nom = "";
$categorie = "";
$date = "";
$heure = "";
$duree = "";
$nb_max_p = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (!isset($_GET["id"])) {
        header("Location: cours.php");
        exit;
    }

    $id = $_GET["id"];
    $sql = "SELECT * FROM cours WHERE id_cours = $id";
    $result = $con->query($sql);

    if (!$result || $result->num_rows == 0) {
        header("Location: cours.php");
        exit;
    }

    $row = $result->fetch_assoc();
    $nom = $row["nom_c"];
    $categorie = $row["categorie"];
    $date = $row["date_c"];
    $heure = $row["heure_c"];
    $duree = $row["duree"];
    $nb_max_p = $row["nb_max_p"];

} else {

    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $categorie = $_POST["categorie"];
    $date = $_POST["date"];
    $heure = $_POST["heure"];
    $duree = $_POST["duree"];
    $nb_max_p = $_POST["nb_max_p"];

    if (empty($nom) || empty($categorie) || empty($date) || empty($heure) || empty($duree) || empty($nb_max_p)) {
        $errorMessage = "Tous les champs sont obligatoires.";
    } else {

        $sql = "UPDATE cours SET 
                nom_c='$nom',
                categorie='$categorie',
                date_c='$date',
                heure_c='$heure',
                duree='$duree',
                nb_max_p='$nb_max_p'
                WHERE id_cours=$id";

        if ($con->query($sql)) {
            header("Location: cours.php");
            exit;
        } 
        else {
            $errorMessage = "Erreur lors de la mise à jour : " . $con->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Modifier un cours</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

<style>
    body {
        background: #f5f6fa;
        margin: 0;
    }
    .sidebar {
        width: 240px;
        height: 100vh;
        background: #1f1f2e;
        color: white;
        padding: 20px;
        position: fixed;
        top: 0;
        left: 0;
    }

    .sidebar h2 {
        margin-bottom: 30px;
    }

    .sidebar a {
        text-decoration: none;
        color: #ccc;
        display: block;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 10px;
        transition: .25s;
    }

    .sidebar a:hover,
    .sidebar a.active {
        background: #32324a;
        color: #fff;
        padding-left: 20px;
    }
    .content {
        margin-left: 260px;
        padding: 40px;
    }

    .card {
        border-radius: 10px;
        border: none;
        box-shadow: 0 4px 10px rgba(0,0,0,.07);
    }
</style>

</head>
<body>
<div class="sidebar">
    <h2>SalleSport</h2>
    <a href="index.php">Dashboard</a>
    <a class="active" href="cours.php">Cours</a>
    <a href="equipements.php">Équipements</a>
    <a href="stats.php">Statistiques</a>
</div>
<div class="content">
    <div class="container">

        <div class="card p-4 bg-white">

            <h4 class="mb-3">Modifier un cours</h4>

            <?php if (!empty($errorMessage)): ?>
                <div class="alert alert-danger"><?= $errorMessage ?></div>
            <?php endif; ?>

            <form method="POST">
                <input type="hidden" name="id" value="<?= $id ?>">

                <div class="mb-3">
                    <label class="form-label">Nom du cours</label>
                    <input type="text" class="form-control" name="nom" value="<?= $nom ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Catégorie</label>
                    <input type="text" class="form-control" name="categorie" value="<?= $categorie ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control" name="date" value="<?= $date ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Heure</label>
                    <input type="time" class="form-control" name="heure" value="<?= $heure ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Durée</label>
                    <input type="number" class="form-control" name="duree" value="<?= $duree ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nb max participants</label>
                    <input type="number" class="form-control" name="nb_max_p" value="<?= $nb_max_p ?>">
                </div>

                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <a href="cours.php" class="btn btn-outline-secondary">Annuler</a>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>
