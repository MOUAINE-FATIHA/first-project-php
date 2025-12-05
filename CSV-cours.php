<?php
require "connect.php";
$output = fopen('php://output','w');
fputcsv($output, array('ID', 'Nom', 'Catégorie', 'Date', 'Heure', 'Durée', 'Nombre participants'));
$sql = "SELECT * FROM cours";
$query = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($query)) {
    fputcsv($output, $row);
}
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=cours.csv');
fclose($output);
exit;
?>