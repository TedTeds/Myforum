<?php

require('actions/database.php');

//recupération de l'id de la question pour obtenir les donnée de la question
if(isset($_GET['id']) AND !empty($_GET['id'])){
    
    $idOfQuestion = $_GET['id'];

    // recuperer l'id d'une question, qui possède l'id de la question
    $checkIfQuestionExist = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    //execution de la requete
    
    $checkIfQuestionExist->execute(array($idOfQuestion));

    // si on récuperer une question (sup a 0) rowcount compte le nombre de données
    if($checkIfQuestionExist->rowCount() > 0){

        //on recupere les données de la question
        $questionInfos = $checkIfQuestionExist->fetch();

        //si l'identifiant auteurs est le meme que l'id de la session
        if ($questionInfos['id_auteur'] == $_SESSION['id']){

            $question_title = $questionInfos['titre'];
            $question_description = $questionInfos['description'];
            $question_content = $questionInfos['contenu'];
            //$question_date = $questionInfos['date_publication'];

            //retirer les balise br dans notre formulaire récupérer en bdd 
            //on affecte cette str a notre variable créer 
            $question_description = str_replace ( '<br />' , '', $question_description);
            $question_content = str_replace ( '<br />' , '', $question_content);



            
        }else{
            $errorMsg = "Vous n'avez pas le droit de modifier cette question";
        }
        
    }else{
            $errorMsg = "Aucune question n'a été trouvé";
        }
}else{
    $errorMsg ="Aucune question n'a été trouvé";
}