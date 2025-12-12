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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $categorie = $_POST["categorie"];
    $date = $_POST["date"];
    $heure = $_POST["heure"];
    $duree = $_POST["duree"];
    $nb_max_p = $_POST["nb_max_p"];
    do {
        if (empty($nom) || empty($categorie) || empty($date) || empty($heure) || empty($duree) || empty($nb_max_p)) {
            $errorMessage = "Tous les champs sont obligatoires.";
            break;
        }
        $sql = "INSERT INTO cours (nom_c, categorie, date_c, heure_c, duree, nb_max_p)
                VALUES ('$nom', '$categorie', '$date', '$heure', '$duree', '$nb_max_p')";
        if (!$con->query($sql)) {
            $errorMessage = "Erreur : " . $con->error;
            break;
        }
        header("Location: cours.php");
        exit;
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau cours</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

    <style>
        body {
            background: #f5f6fa;
            margin: 0;
        }
        .sidebar {
            width: 240px;
            height: 100vh;
            background: #1b3f65ff;
            color: white;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar h2 {
            color:#d2a812;
            font-size: 22px;
            margin-bottom: 30px;

        }

        .sidebar a {
            color: #ccc;
            display: block;
            text-decoration: none;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 40px;
            transition: .25s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #032d5aff;
            color: #fff;
            padding-left: 20px;
        }
        .content {
            margin-left: 260px;
            padding: 40px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,.1);
        }

        .card h4 {
            margin-bottom: 20px;
            color:#d2a812;
        }
        .crud{
            background: #032d5aff;
            color: white;
            border-radius: 40px;
            border:none;
            
        }
        .ann{
            background: #5b5e73ff;
            color: white;
            border-radius: 40px;
            border:none;
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
                
                <h4>Créer un nouveau cours</h4>

                <?php if (!empty($errorMessage)): ?>
                    <div class="alert alert-danger"><?= $errorMessage ?></div>
                <?php endif; ?>

                <form method="POST">

                    <div class="mb-2">
                        <label class="form-label">Nom du cours</label>
                        <input type="text" class="form-control" name="nom" value="<?= $nom ?>">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Catégorie</label>
                        <input type="text" class="form-control" name="categorie" value="<?= $categorie ?>">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" value="<?= $date ?>">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Heure</label>
                        <input type="time" class="form-control" name="heure" value="<?= $heure ?>">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Durée</label>
                        <input type="number" class="form-control" name="duree" value="<?= $duree ?>">
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Nb max participants</label>
                        <input type="number" class="form-control" name="nb_max_p" value="<?= $nb_max_p ?>">
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-primary crud">Ajouter</button>
                        <a href="cours.php" class="btn btn-outline-secondary ann">Annuler</a>
                    </div>

                </form>
            </div>

        </div>
    </div>

</body>
</html>
