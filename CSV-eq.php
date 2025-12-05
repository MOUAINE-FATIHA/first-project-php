<?php
require "connect.php";
$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Nom', 'Quantité', 'Type', 'Etat'));
$sql = "SELECT * FROM equipement";
$query = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($query)) {
    fputcsv($output, $row);
}
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=equipements.csv');
fclose($output);
exit;
?>
