<?php
session_start();
require ('actions/questions/showArticleContentAction.php');
require ('actions/questions/postAnswerAction.php');
require ('actions/questions/showAllAnswersOfQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php include 'includes/head.php';?>
<body>
    <?php include 'includes/navbar.php';?>
    <br><br>
    <div class="container">

    <?php
    //message d'erreur si la question nexiste pas
    if(isset($errorMsg)){
        echo $errorMsg;
    }

    //affichage de la question
    if (isset($question_publication_date)){
        ?>
        <section class="show-content">
        <h3><?= $question_title; ?></h3>
        <hr>
        <p><?= $question_contenu; ?></p>
        <hr>
        <small><?= '<a href="profile.php?id='.$question_id_author.'">'.$question_pseudo_author.' </a>'.$question_publication_date; ?></small>
        </section>
        <br><br>
        <!-- commentaire -->
        <section class="show-answers">
    <form class="form-group" method="POST" >
        <div class="mb-3">
            <label for="" class="form-label">Réponse : </label>
            <textarea name="answer" class="form-control"></textarea>
            <br>
            <button class="btn btn-primary" type="submit" name="validate">Répondre</button>
        </div>    
    </form>
</section>
        <?php
        while($answer = $getAllAnswersOfthisQuestion->fetch()){
            ?>
            <div class="card">
                <div class="card-header">
                <a href="profile.php?id=<?= $answer['id_auteur']; ?>"><?= $answer['pseudo_auteur'];?>
                </a>
                </div>
                <br>
                <div class="card-body">
                <?= $answer['contenu']; ?>
                </div>
            </div>
            <br><br>
            <?php
        }
        ?>
        </section>
        <?php
    }
        ?>
    </div>
</body>
</html>