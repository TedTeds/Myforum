<?php 
try{
//connexion à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', 'root');
}catch(Exception $e){
    die('une erreur à été trouvé: '.$e->getMessage());
}
