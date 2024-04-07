<?php
// ce fichier permet d'identifier un utilisateur et de le rediriger vers la page d'accueil
// empeche un utilisateur de se connecter si il n'est pas inscrit

if (!isset($_SESSION['auth'])) {
    header('Location: login.php');
}