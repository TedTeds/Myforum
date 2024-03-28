<?php require ('actions/users/signupAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php' ?>

<body>
    <br><br>
    <!-- insription forum -->
    <form class="container" method="POST">


    <!-- recuperation de l'error entré dans le signupAction -->
    <?php 
        if(isset($errorMsg)){
            echo '<p>' .$errorMsg. '</p>';
        }
    ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom </label>
            <input type="text" class="form-control" name="lastname">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prénom</label>
            <input type="text" class="form-control" name="firstname">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button><br><br>

        <a href="login.php"><p>J'ai déja un compte, je me connecte</p><a>
    </form>
</body>

</html>