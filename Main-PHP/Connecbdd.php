<?php
try{


$pdo = new PDO('mysql:host=localhost;dbname=grp-369_s1_prjtut;charset=utf8', 'grp-369', 'DFYmU1F9');
}
catch(Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
 ?>
