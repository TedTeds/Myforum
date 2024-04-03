<?php 
require ('actions/database.php');

//es que la variable validate est définie
if(isset($_POST['validate'])){

    if(!empty($_POST['answer'])){
        $user_answer = nl2br(htmlspecialchars($_POST['answer']));
       
        //insertion de la réponse dans la base de données
        $insertAnswer = $bdd->prepare('INSERT INTO answers (id_auteur, pseudo_auteur, id_question, contenu) VALUES (?, ?, ?, ?)');
        //execution de la requête
        
        $insertAnswer->execute(array($_SESSION['id'], $_SESSION['pseudo'], $idOfTheQuestion, $user_answer));

        if ($insertAnswer->errorCode() != 0) {
            print_r($insertAnswer->errorInfo());
        }
    }
}
?>