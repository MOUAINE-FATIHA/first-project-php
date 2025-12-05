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
            background: #1f1f2e;
            color: white;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar h2 {
            font-size: 22px;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .sidebar a {
            text-decoration: none;
            color: #cbd5e1;
            display: block;
            padding: 12px 14px;
            border-radius: 8px;
            margin-bottom: 10px;
            transition: 0.25s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #32324a;
            padding-left: 22px;
            color: white;
        }
        .content {
            margin-left: 260px;
            padding: 30px;
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

            <h2 class="mb-4">Liste des équipements</h2>

            <a class="btn btn-warning mb-3" href="/projet-php/create-eq.php">Ajouter</a>

            <form action="CSV-eq.php" method="post" class="mb-2">
                <input type="submit" class="btn btn-outline-info" value="Exporter csv">
            </form>

            <table class="table table-striped table-hover shadow-sm bg-white">
                <thead class="table-dark">
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
                    $result = mysqli_query($con, $sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>{$row['id_equipe']}</td>
                            <td>{$row['nom_eq']}</td>
                            <td>{$row['quantite_dispo']}</td>
                            <td>{$row['type']}</td>
                            <td>{$row['etat']}</td>

                            <td>
                                <a class='btn btn-sm btn-warning' href='/projet-php/edit-eq.php?id={$row['id_equipe']}'>Modifier</a>
                                <a class='btn btn-sm btn-danger' href='/projet-php/delete-eq.php?id={$row['id_equipe']}'>Supprimer</a>
                            </td>
                        </tr>
                        ";
                    }
                ?>

                </tbody>
            </table>

        </div>
    </div>

</body>
</html>
