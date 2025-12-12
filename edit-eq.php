<?php
require "connect.php";
$nom = "";
$quantite="";
$type="";
$etat="";
$errorMessage="";
$successMessage="";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!isset($_GET["id"])) {
        header("Location: /projet-php/equipements.php");
        exit;
    }
    $id = $_GET["id"];
    $sql = "SELECT * FROM equipement WHERE id_equipe = $id";
    $result = $con->query($sql);
    if (!$result || $result->num_rows == 0) {
        header("Location: /projet-php/equipements.php");
        exit;
    }
    $row = $result->fetch_assoc();
    $nom = $row["nom_eq"];
    $quantite = $row["quantite_dispo"];
    $type = $row["type"];
    $etat = $row["etat"];


} else {
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $quantite = $_POST["quantite"];
    $type = $_POST["type"];
    $etat = $_POST["etat"];

    if (empty($nom) || empty($quantite) || empty($type) || empty($etat)) {
        $errorMessage = "Tous les champs sont obligatoires";
    } else {
        $sql = "UPDATE equipement SET
                    nom_eq = '$nom',
                    quantite_dispo = '$quantite',
                    type = '$type',
                    etat= '$etat'
                    WHERE id_equipe = $id";

        if ($con->query($sql) === TRUE) {
            $successMessage = "Équipement mis à jour avec succès.";
            header("Location: /projet-php/equipements.php");
            exit;
        } else {
            $errorMessage = "Erreur lors de la mise à jour: ". $con->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Modifier Équipement</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"/>
<style>
    body { 
        background: #f5f6fa; 
        margin:0; 
    }
    .sidebar {
        width: 240px;
        height: 100vh;
        background: #1b3f65ff;
        color: white;
        padding: 20px;
        position: fixed;
        top:0; left:0;
    }
    .sidebar h2 { 
        color:#d2a812;
        margin-bottom: 30px; 
    }
    .sidebar a {
        display:block; 
        color:#ccc; 
        padding:12px; 
        margin-bottom:10px; 
        border-radius:40px;
        text-decoration:none; 
        transition:.25s;
    }
    .sidebar a:hover, 
    .sidebar a.active { 
        background:#032d5aff; 
        color:#fff; 
        padding-left:20px; 
    }
    .content { 
        margin-left:260px; 
        padding:40px; 
    }
    .card { 
        border-radius:10px; 
        box-shadow:0 4px 10px rgba(37, 38, 108, 0.07); 
        border:none; 
    }
    h4 {
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
    <a href="dashboard.php">Dashboard</a>
    <a href="cours.php">Cours</a>
    <a class="active" href="equipements.php">Équipements</a>
    <a href="stats.php">Statistiques</a>
</div>

<div class="content">
    <div class="container">
        <div class="card p-4 bg-white">
            <h4 class="mb-3">Modifier Équipement</h4>

            <?php if (!empty($errorMessage)): ?>
                <div class="alert alert-danger"><?= $errorMessage ?></div>
            <?php endif; ?>

            <form method="POST">
                <input type="hidden" name="id" value="<?= $id ?>">
                
                <div class="mb-2">
                    <label class="form-label">Nom de l'équipement</label>
                    <input type="text" class="form-control" name="nom" value="<?= $nom ?>">
                </div>

                <div class="mb-2">
                    <label class="form-label">Quantité</label>
                    <input type="number" class="form-control" name="quantite" value="<?= $quantite ?>">
                </div>

                <div class="mb-2">
                    <label class="form-label">Type</label>
                    <input type="text" class="form-control" name="type" value="<?= $type ?>">
                </div>

                <div class="mb-2">
                    <label class="form-label">État</label>
                    <input type="text" class="form-control" name="etat" value="<?= $etat ?>">
                </div>

                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-primary crud">Modifier</button>
                    <a href="equipements.php" class="btn btn-outline-secondary ann">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
