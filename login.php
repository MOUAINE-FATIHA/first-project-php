<?php
session_start();
require "connect.php";
$error = "";
$success = "";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        header("Location: index.php");
        exit;
        
    } else {
        echo "Login incorrect!";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #1b3f65ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 35px;
            width: 350px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #1b3f65ff;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 6px;
            border: 1px solid #aaa;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 12px;
            border: none;
            background: #1b3f65ff;
            color: white;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #032d5aff;
        }

        .error {
            color: red;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .link {
            margin-top: 12px;
            font-size: 14px;
        }

        a {
            text-decoration: none;
            color: #d2a812;
        }
    </style>
</head>

<body>
<div class="container">
    <h2>Connexion</h2>
    <?php if($error != ""): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Nom d'utilisateur" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit" name="submit">Se connecter</button>
    </form>
    <p class="link">Vous n'avez pas de compte ?  
        <a href="inscription.php">Créer un compte</a>
    </p>
</div>
</body>
</html>