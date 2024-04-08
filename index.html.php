<?php
session_start();
require('actions/questions/showAllQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <!-- inclusion navbar -->
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <!-- afficher la barre de recherche qui permettra de rechercher une question -->
        <div class="container" >
        <form method="GET">
            <div class="form-group row">
            <div class="col-12"> 
                <input type="search" name="search" class="form-control">
                <br>
                <button class="btn btn-success" type="submit">Rechercher les questions</button>

            </div>

                <div class="col-4">
                
            </div>
        </div>
        </form>
        <br>

        <?php
        //on affiche les questions sous forme de card
        //on récupérer toute les information de nos questions
        while($question = $getAllQuestions->fetch()){
            ?>
            <div class="card">
                <div class="card-header">
                <a href="article.php?id=<?php echo $question['id'];?>"?>
                    <?php echo $question['titre']; ?>
                </a>
                </div>
                <div class="card-body">
                    <?php echo $question['description']; ?>
                </div>
                <div class="card-footer">

                    Publié par <a href="profile.php?id=<?= $question['id_auteur'];?>"><?= $question['pseudo_auteur']; ?></a> le <?php  echo $question['date_publication']; ?> 
                </div>
            </div>
            <br>
            <?php
        } 
        ?>
    </div>
</body>
</html>