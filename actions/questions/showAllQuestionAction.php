<!-- fichier qui nous permet de stocker no recherche, il sera inclu dans l'index -->
<?php
require('actions/database.php');

//on affiche des question par défault 
//la méthode query permet d'efectuer uen requete SQL pour récup toutes les données
//Order by id DESC permet de trier les questions par ordre décroissant 
//limit 0,5 permet de récupérer les 5 premières questions
$getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC');
//vérifie si une recherche à été rentrée par l'utilisateur 
if(isset($_GET['search']) AND !empty($_GET['search'])){

//la recherche
    $usersSearch= $_GET['search'];

    //recupère les questions qui contiennent le mot clé recherché
    //like sert à rechercher une chaine de caractère qui contient le mot clé recherché
    //les % sert a indiquer peut importe avant et apres la recherche
    $getAllQuestions = $bdd->query("SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE '%" . $usersSearch . "%' ORDER BY id DESC");


}