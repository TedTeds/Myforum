<?php 
session_start();
// inclusion de la page securityAction.php pour la sécurité
require ('actions/users/securityAction.php');
// inclusion de la page myQuestionsAction.php
require('actions/questions/myQuestionsAction.php');

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php' ?>

    <br> <br>
    <div class="container">
        
    <?php 
    //on recupere toutes les questions de l'utilisateur avec une boucle while
        while($question = $getAllMyQuestions-> fetch()){
            //on ferme notre balise php pour pouvoir ecrire du html
            ?>
            <!-- ajout de card pour le rendu des question utlisateur  -->
        <div class="card">
            <h5 class="card-header">
                <!-- recupération de nos variables php pour les afficher -->
                <a href="article.php?id=<?php echo $question['id'];?>"?>
                    <?php echo $question['titre']; ?>
                </a>
            </h5>

            <div class="card-body">
            <p class="card-text"><?= $question['description'];
            ?>
            </p>
            <a href="article.php?id=<?php echo $question['id'];?>" class="btn btn-primary">Voir la question</a>
            <!-- afficher toute les quetions récupérer en parametre dans l'url de part l'id -->
            <a href="edit-questions.php?id=<?= $question['id'];?>" class="btn btn-warning">Modifier la question</a>
            <!-- suppression de la queston en fonction de l'id -->
            <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id'];?>" class="btn btn-danger">Supprimer la question</a>


        </div>
    </div> <br>

        
            <!-- on r'ouvre notre balise php  -->
            <?php
        }
    ?>
</div>
</body>
</html>