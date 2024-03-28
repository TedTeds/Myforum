<?php
require('actions/users/securityAction.php');
require('actions/questions/getInfosOfEditedQuestionAction.php');
require('actions/questions/editQuestionAction.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php' ?>
    <br><br>
<!-- formulaire de question   -->
<div class = "container">
<?php 
    if(isset($errorMsg)){
        echo '<p>' .$errorMsg. '</p>';
        }
?>
<?php 
//si les données de la question sont recupérées alors on indique notre tableau html
    if(isset($question_content)){
        ?>
        <form method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
        <!-- dans la value on appel notre variable déclarer en php pour récupérer les infos de la bdd -->
        <input textarea type="text" class="form-control" name="title" value ="<?= $question_title;?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Déscription de la question </label>
        <textarea type="text" class="form-control" name="description"><?= $question_description;?></textarea>
           <!--recuperation de notre variable description. Directement dans la balise textarea attention au espace a ne pas faire-->
        
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Contenue de la question</label>
        <textarea type="text" class="form-control" name="content"><?= $question_content;?></textarea>
    </div>  
    <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button><br><br>
</form>
    <?php
    }
?>
    
</body>
</html>