<?php
require "connect.php";
$id = $_GET["id"];
$sql= "DELETE FROM equipement WHERE id_equipe ='$id'";
$query=mysqli_query($con , $sql);
if (isset($query)) {
    header("Location: /projet-php/equipements.php");
}
?>