<?php
//démarage de la session, destruction de la session et redirection vers la page de connexion
session_start();
$_SESSION = [];
session_destroy();
header('Location: ../../login.php');