<?php require ('actions/users/loginAction.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
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
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Se connecter</button><br><br>

        <a href="signup.php"><p>Je n'est pas de compte, je m'inscris</p><a>
    </form>
</body>

</html>
</body>
</html>