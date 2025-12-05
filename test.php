<!-- http://localhost/projet-php/index.html -->
<!-- https://www.tailawesome.com/resources/dashboard-template -->
<?php
$nom= 'nassik';
$prenom= 'assia';
$note= 20;
$note2 = 19;
$test = null;
echo "$test\n";
echo $nom . ' ' . ($note + $note2)/2 ;
echo "\n$nom\n$prenom";
$moyenne = ($note + $note2)/2;
echo "\nBonjour $prenom $nom vous avez eu $moyenne de moyenne\n";
// echo 'Bonjour' . $prenom .' '. $nom 'vous avez eu' . $moyenne . 'de moyenne';
?>