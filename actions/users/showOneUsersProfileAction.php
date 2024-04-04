<?php

require ('actions/database.php');
//récupération de l'id de l'utilisateur
if (isset($_GET['id']) && !empty($_GET['id'])){
    //l'id de l'utilisateur
    $idOfUser = $_GET['id'];

    //recuperation des informations de l'utilisateur de la table users qui possède l'id en paramètre
    $checkIfUserExist = $bdd->prepare('SELECT pseudo, nom, prenom FROM users WHERE id = ?');
    $checkIfUserExist->execute(array($idOfUser));

    if($checkIfUserExist->rowCount()> 0){
        //récupérer toutes les données de l'utilisateur
        $usersInfo = $checkIfUserExist->fetch();

        $user_pseudo = $usersInfo['pseudo'];
        $user_lastname = $usersInfo['nom'];
        $user_firstname = $usersInfo['prenom'];

        //recuperation des questions de l'utilisateur
        $getHisQuestions = $bdd->prepare('SELECT * FROM questions WHERE id_auteur = ? ORDER BY id DESC');
        $getHisQuestions->execute(array($idOfUser));
    }else{
        $errorMsg = 'Aucun utilisateur trouvé';}
    
}else{
    $errorMsg = 'Aucun utilisateur trouvé';}
