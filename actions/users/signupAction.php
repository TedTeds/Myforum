<?php
session_start();
// recupération de ma base de données il sera inclus dans les autre fichier (signup)
require ('actions/database.php');

//verification du formulaire soumis 
if (isset($_POST['validate'])){

    //verification si les champs sont remplis
    if(!empty($_POST['pseudo']) AND !empty($_POST['lastname']) and !empty($_POST['firstname']) and !empty($_POST['password'])){

        //stocker les donnée saisie de l'utilisateur 
        //htmlspecialchars pour eviter les failles xss il ne poura pas rentrer de code dans le formulaire
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        //hashage du mot de passe avec password_hash dans la BDD
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //vefication si l'utilisateur est déja inscrit ou pas 
        //recupération en SQL: on récupère le pseudo de la table users ou le pseudo est égale à celui rentré par l'utilisateur
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        //execution de la requete. Création d'un tableau avec le pseudo de l'utilisateur
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        //verification si le pseudo existe déja dans la base de donnée
        if ($checkIfUserAlreadyExists->rowCount() == 0){
            //si le pseudo n'existe pas on l'inscrit dans la base de donnée
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo, nom, prenom, mdp) VALUES(?, ?, ?, ?)');
            //execution de la requete
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));


            //recupération des informations de l'utilisateur 
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo = ?');
            //execution de la requete
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));
            //recupération des informations précédente de l'utilisateur en utilisant la méthode fetch
            $usersInfos = $getInfosOfThisUserReq->fetch();

            //authentifier l'utilisateur et récupérer ces donnée dans des variable session
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['nom'];
            $_SESSION['firstname'] = $usersInfos['prenom'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];

            //redirection l'utilisateur vers la page d'accueil
            header('Location: index.php');

            //message de confirmation
    }else{
        $errorMsg = "L'utilisateur existe déja...";   
    }
}else{
    $errorMsg="Veuillez remplir tous les champs...";
}
}