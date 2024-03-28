<?php
session_start();
require 'actions/database.php';

//verification du formulaire soumis 

if (isset($_POST['validate'])){

    //verification si les champs sont remplis
    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){

        //stocker les donnée saisie de l'utilisateur 
        //htmlspecialchars pour eviter les failles xss il ne poura pas rentrer de code dans le formulaire
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        //hashage du mot de passe avec password_hash dans la BDD
        $user_password = htmlspecialchars($_POST['password']);

        $checkIfuserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        //execution de la requete. Création d'un tableau avec le pseudo de l'utilisateur
        $checkIfuserExists->execute(array($user_pseudo));


        //la méthode rowCount() permet de compter le nombre de ligne dans le tableau si les donnée sont supérieur a 0 c bon 
        if($checkIfuserExists->rowCount() > 0){
            //recupérer les donnée mdp sous forme de tableau
            $usersInfos= $checkIfuserExists->fetch();
            //vérification des mdp 
            if(password_verify($user_password, $usersInfos['mdp'])){
                //authentifier l'utilisateur et récupérer ces donnée dans des variable session
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['lastname'] = $usersInfos['nom'];
                $_SESSION['firstname'] = $usersInfos['prenom'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];    
                // redirection de l'utilisateur vers la page d'accueil
                header ('Location: index.php');
            }else{
                $errorMsg = " Votre mot de passe est incorrect...";
            }
}
    }}