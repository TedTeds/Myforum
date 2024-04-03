<?php
require ('actions/database.php');

$getAllAnswersOfthisQuestion = $bdd->prepare('SELECT id_auteur, pseudo_auteur, id_question, contenu FROM answers WHERE id_question = ? ORDER BY id DESC');

$getAllAnswersOfthisQuestion->execute(array($idOfTheQuestion));