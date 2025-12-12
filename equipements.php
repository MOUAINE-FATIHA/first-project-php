<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}



if ($_SESSION['role'] != 'admin') {
    header("Location: acceeR.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SalleSport – Équipements</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6fa;
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
            font-weight: bold;
        }

        .sidebar a {
            text-decoration: none;
            color: #cbd5e1;
            display: block;
            padding: 12px 14px;
            border-radius: 40px;
            margin-bottom: 10px;
            transition: 0.25s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #032d5aff;
            color: white;
            padding-left: 20px;
        }
        .content {
            margin-left: 260px;
            padding: 30px;
        }
        .crud{
            background: #032d5aff;
            color: white;
            border-radius: 40px;
            border:none;
        }
        .sup{
            background: #f00000ff;
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
        <a href="cours.php">Cours</a>
        <a class="active" href="equipements.php">Équipements</a>
        <a href="stats.php">Statistiques</a>
    </div>
    <div class="content">
        <div class="container">
            <h2 class="mb-4" style="color: #1b3f65ff;">Liste des équipements</h2>
            <a class="btn btn-warning mb-3 crud" href="/projet-php/create-eq.php">Ajouter</a>
            <form action="CSV-eq.php" method="post" class="mb-2">
                <input type="submit" class="btn btn-outline-warning crud" value="Exporter csv">
            </form>

            <table class="table table-striped shadow-sm bg-white">
                <thead class="table-warning">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Quantité</th>
                        <th>Type</th>
                        <th>Etat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require "connect.php";
                    $sql = "SELECT * FROM equipement";
                    if (!empty($_GET['etat'])) {
                    $etat = mysqli_real_escape_string($con, $_GET['etat']);
                    $sql .= " WHERE etat = '$etat'";
                }
                $sql .= " ORDER BY quantite_dispo ASC";
                $result = mysqli_query($con, $sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id_equipe']}</td>
                            <td>{$row['nom_eq']}</td>
                            <td>{$row['quantite_dispo']}</td>
                            <td>{$row['type']}</td>
                            <td>{$row['etat']}</td>
                            <td>
                                <a class='btn btn-sm btn-warning crud' href='/projet-php/edit-eq.php?id={$row['id_equipe']}'>Modifier</a>
                                <a class='btn btn-sm btn-danger sup' href='/projet-php/delete-eq.php?id={$row['id_equipe']}'>Supprimer</a>
                            </td>
                        </tr>";
                    }?>
                </tbody>
            </table>
            <form method="GET" class="mb-3 d-flex gap-2 align-items-center">
                <select name="etat" class="form-select" style="width: 250px;">
                    <option value="">Tous les états</option>
                    <option value="bon" <?php if(!empty($_GET['etat']) && $_GET['etat']=='bon') echo 'selected'; ?>>Bon</option>
                    <option value="moyen" <?php if(!empty($_GET['etat']) && $_GET['etat']=='moyen') echo 'selected'; ?>>Moyen</option>
                    <option value="a remplacer" <?php if(!empty($_GET['etat']) && $_GET['etat']=='a remplacer') echo 'selected'; ?>>À remplacer</option>
                </select>
                <button type="submit" class="btn btn-primary crud">Filtrer</button>
            </form>
        </div>
    </div>

</body>
</html>
