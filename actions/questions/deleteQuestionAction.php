<?php
session_start();
//si la session n'est pas déclaré (utilisateur deconnecté) on redirige l'utilisateur vers la page index.php
if(!isset($_SESSION['auth'])){
    header('Location: ../../login.php');
}

require('../database.php');

// suppression de la question 
//isset permet de voir si la variable est bien déclaré
if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfTheQuestion = $_GET['id'];
    //requete de suppression de la question
    //selectionné les donnée de la table questions qui possede l'id de la question
    $checkIfQuestionExist = $bdd->prepare('SELECT id, id_auteur FROM questions WHERE id = ?');
    //execution de la requete
    $checkIfQuestionExist->execute(array($idOfTheQuestion));

    if($checkIfQuestionExist->rowCount()> 0){
        //recuperation des informations de l'utilisateur
        $questionsInfos = $checkIfQuestionExist->fetch();
        if($questionsInfos['id_auteur'] == $_SESSION['id']){
            
            //supprime une question de la table quetions en fonction de l'id
            $deleteThisQuestion = $bdd->prepare('DELETE FROM questions WHERE id = ?');
            $deleteThisQuestion->execute(array($idOfTheQuestion));

            header('Location: ../../my-questions.php');

        }else{
            echo "Vous n'avez pas le droit de supprimer cette question !";
        }

}else{
    echo "Aucune question n'a été trouvée";
}

}else{
    echo "Aucune question n'a été trouvée";
}
