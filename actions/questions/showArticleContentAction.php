<?php
require('actions/database.php');

// vérifie si l'id de la question est entré dans l'url
if(isset($_GET['id'])AND !empty($_GET['id'])) {

    //récupère l'id de la question
    $idOfTheQuestion = $_GET['id'];

    //vérifie si la question existe
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    if($checkIfQuestionExists->rowCount()>0){

        //récupère les data de la question
        $questionInfos = $checkIfQuestionExists->fetch();
        //stock les data dans des variables
        $question_title = $questionInfos['titre'];
        $question_contenu = $questionInfos['contenu'];
        $question_id_author = $questionInfos['id_auteur'];
        $question_pseudo_author = $questionInfos['pseudo_auteur'];
        $question_publication_date = $questionInfos['date_publication'];
        
}else{
    $errorMsg = "Aucune question n'a été trouvée";}

}else{
    $errorMsg = "Aucune question n'a été trouvée";}
