<?php
require('actions/database.php');
//requete pour recuperer toutes les questions de l'utilisateur
//Order By id DESC pour afficher les questions du plus récentes au plus anciennes
$getAllMyQuestions = $bdd->prepare('SELECT id, titre, description FROM questions WHERE id_auteur = ? ORDER BY id DESC');
//execution de la requete
$getAllMyQuestions->execute(array($_SESSION['id']));