<?php
require "connect.php";
$cours = $con->query("SELECT COUNT(*) as total from cours");
$totalc = $cours->fetch_assoc()['total'];

$equip = $con->query("SELECT COUNT(*)as total from equipement");
$totaleq = $equip->fetch_assoc()['total'];

$typec = $con->query("SELECT categorie, COUNT(*) as total from cours GROUP BY categorie");
$typeEq = $con->query("SELECT type, COUNT(*) as total from equipement GROUP BY type");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salle de Sport</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <aside class="sidebar">
        <h2 class="logo">SalleSport</h2>
        <ul>
            <li><a href="index.php" class="active">Dashboard</a></li>
            <li><a href="cours.php">Cours</a></li>
            <li><a href="equipements.php">Equipements</a></li>
            <li><a href="stats.php">Statistiques</a></li>
        </ul>
    </aside>
    <main class="main">
        <h1 class="titre">Dashboard</h1>
        <section class="cards top-cards">
            <div class="card">
                <h3>Total Cours</h3>
                <p class="number"><?= $totalc ?></p>
            </div>

            <div class="card">
                <h3>Total des équipements</h3>
                <p class="number"><?= $totaleq ?></p>
            </div>
        </section>
        <section class="cards bottom-cards">
            <div class="card">
                <table>
                    <thead>
                        <tr>
                            <th>Type de cours</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $typec->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['categorie'] ?></td>
                            <td><?= $row['total'] ?></td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>

            <div class="card">
                <table>
                    <thead>
                        <tr>
                            <th>Type d'équipement</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $typeEq->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['type'] ?></td>
                            <td><?= $row['total'] ?></td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>