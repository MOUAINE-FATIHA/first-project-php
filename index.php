<?php
require "connect.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Salle de Sport</title>
    <link rel="stylesheet" href="index.css" />
</head>
<body>

    <aside class="sidebar">
        <h2 class="logo"> SalleSport</h2>
        <ul>
            <li class="active"><a href="index.php">Dashboard</a></li>
            <li><a href="cours.php">Cours</a></li>
            <li><a href="equipements.php">Équipements</a></li>
            <li><a href="stats.php">Statistiques</a></li>
        </ul>
    </aside>

    <main class="main">
        <header class="header">
            <h1>Dashboard</h1>
            <div class="user-box">
                <span>Admin</span>
                <img src="https://via.placeholder.com/40" alt="">
            </div>
        </header>

        <section class="cards">
            <div class="card">
                <h3>Total Cours</h3>
                <p class="number">12</p>
            </div>
            <div class="card">
                <h3>Total Équipements</h3>
                <p class="number">37</p>
            </div>
            <div class="card">
                <h3>Cours Populaire</h3>
                <p>Yoga</p>
            </div>
            <div class="card">
                <h3>Équipement Critique</h3>
                <p>Tapis de Course</p>
            </div>
        </section>

        <section class="table-section">
            <h2>Liste des Cours</h2>

            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Durée</th>
                        <th>Max Participants</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Yoga Matinal</td>
                        <td>Yoga</td>
                        <td>2025-01-10</td>
                        <td>08:00</td>
                        <td>45 min</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>Cardio Max</td>
                        <td>Cardio</td>
                        <td>2025-01-10</td>
                        <td>18:00</td>
                        <td>60 min</td>
                        <td>30</td>
                    </tr>
                </tbody>
            </table>
        </section>

    </main>

</body>
</html>
