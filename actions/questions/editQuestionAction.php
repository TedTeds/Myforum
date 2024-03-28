<?php
require ('actions/database.php');
//validation du form
if(isset($_POST['validate'])){
    
    //vérification que les champs sont remplis
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
        //les données a faire passer dans la requête
        $new_question_title = htmlspecialchars($_POST['title']);
        $new_question_description = nl2br(htmlspecialchars($_POST['description']));
        $new_question_content = nl2br(htmlspecialchars($_POST['content']));

        //requete mettre a jour la table question, mettre a jour le titre,description,contenue qui possède l'id de la question
        $editQuestionOnWebsite = $bdd->prepare('UPDATE questions SET titre = ?, description = ?, contenu = ? WHERE id = ?');
        $editQuestionOnWebsite->execute(array($new_question_title, $new_question_description, $new_question_content, $idOfQuestion));
        //redirection vers la page my-questions.php
        header('Location: my-questions.php');
    }else{
        $erroMsg="Veuillez remplir tous les champs...";
    }
}