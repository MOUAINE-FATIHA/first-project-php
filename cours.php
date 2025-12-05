<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">

    <style>
        body {
            background: #f5f6fa;
            margin: 0;
            font-family: Arial, sans-serif;
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
            transition: .25s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #32324a;
            color: white;
            padding-left: 22px;
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
        <a class="active" href="cours.php">Cours</a>
        <a href="equipements.php">Équipements</a>
        <a href="stats.php">Statistiques</a>
    </div>

    <div class="content">
        <div class="container">

            <h2 class="mb-4">Liste des cours</h2>

            <a class="btn btn-warning mb-3" href="/projet-php/create-cours.php">Ajouter</a>
            <form action="CSV-cours.php" method="post" class="mb-2">
                <input type="submit" class="btn btn-outline-info" value="Exporter csv">
            </form>

            <table class="table table-hover table-striped bg-white shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Durée</th>
                        <th>Max Participants</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    require "connect.php";
                    $sql = "SELECT * FROM cours";
                    $result = mysqli_query($con,$sql);

                    while($row = $result->fetch_assoc()){
                        echo "
                            <tr>
                                <td>{$row['id_cours']}</td>
                                <td>{$row['nom_c']}</td>
                                <td>{$row['categorie']}</td>
                                <td>{$row['date_c']}</td>
                                <td>{$row['heure_c']}</td>
                                <td>{$row['duree']}</td>
                                <td>{$row['nb_max_p']}</td>
                                <td>
                                    <a class='btn btn-sm btn-warning' href='/projet-php/edit-cours.php?id={$row['id_cours']}'>Modifier</a>
                                    <a class='btn btn-sm btn-danger' href='/projet-php/supprimer-cours.php?id={$row['id_cours']}'>Supprimer</a>
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
