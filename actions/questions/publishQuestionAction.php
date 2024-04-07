<?php
//inclusion de la bdd 
require ('actions/database.php');

//vérifie si l'utilisateur a cliquer sur le bouton publier
if (isset($_POST['validate'])){

    //vérification que les champs sont remplis
    if(!empty($_POST['title']) AND !empty($_POST['description'])){
    //
        //recuperation des données dans des variables
        $question_title = htmlspecialchars($_POST['title']);
        //LA fonction nl2br permet de conserver les sauts de ligne de l'utilisateur dans le form. 
        $question_description = nl2br(htmlspecialchars($_POST['description']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        // permet de recuperer la date de publication de la question
        $question_date = date('d/m/Y');
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];
        
        //inserer la question sur le site
        $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO questions (titre, description, contenu, id_auteur, pseudo_auteur, date_publication) VALUES (?, ?, ?, ?, ?, ?)');
        //execution de la requete
        $insertQuestionOnWebsite->execute(
            array(
                $question_title, 
                $question_description, 
                $question_content, 
                $question_id_author, 
                $question_pseudo_author, 
                $question_date));


            $successMsg = "Votre question a bien été publiée sur le site !";
    }else{
        $errorMsg = "Veuillez remplir tous les champs...";
    }
}