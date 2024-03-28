<?php ;
session_start();
require('actions/questions/publishQuestionAction.php');
require('actions/users/securityAction.php')
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
<br><br>
    <!-- insription forum -->
    <form class="container" method="POST">


    <!-- recuperation de l'error entré dans le signupAction -->
    <?php 
        if(isset($errorMsg)){
            echo '<p>' .$errorMsg. '</p>';

        }elseif(
            isset($successMsg)){
            echo '<p>' .$successMsg. '</p>';
        }

    ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
            <input textarea type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Déscription de la question </label>
            <textarea type="text" class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contenue de la question</label>
            <textarea type="text" class="form-control" name="content"></textarea>
        </div>  
        <button type="submit" class="btn btn-primary" name="validate">Publier la question</button><br><br>
    </form>
</body>
</html>