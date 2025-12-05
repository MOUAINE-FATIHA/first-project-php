<?php
require "connect.php";
$id = $_GET["id"];
$sql= "DELETE FROM cours WHERE id_cours ='$id'";
$query=mysqli_query($con , $sql);
if (isset($query)) {
    header("Location: /projet-php/cours.php");
}
?>