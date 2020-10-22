<?php

/*Vous devez réaliser un système de gestion de tickets d'assistance aux utilisateurs.
 
Specs fonctionnelles:
Un utilisateur peut créer et répondre à un ticket.
Un utilisateur peut attribuer une catégorie à un ticket à la création.
Un utilisateur peut retrouver son ticket car il lui sera attribué un numéro aléatoire sur 8 chiffres, ou en utilisant son email.
Un assistant technique peut répondre à un ticket.
Un assistant technique peut attribuer une catégorie à un ticket à tout moment.
 
Votre projet doit être sur un repository GIT (github, bitbucket, gitlabs...)
Vous devez modéliser la base de données, qui comportera au moins 3 entités: ticket, réponse, catégorie.
L'interface graphique utilisateur lui permet soit de créer un nouveau ticket, soit de retrouver un ticket existant à partir du numéro aléatoire ou de son e-mail saisi.
L'assistant technique doit se connecter à l'aide d'un mot de passe générique (commun à tout le monde).
L'assistant technique voit un tableau des tickets et peut les filtrer par statut "nouveau / en cours / terminé".*/


session_start();

require_once "bdd_connect.php";

//déclaration de variable
$email="";
$number_ticket="";
$random_number = mt_rand ( 10000000 , 99999999 );




//assainir les variable

if (isset($_POST)) {
    if (isset($_POST['search_ticket'])) {
        $input_ticket = htmlspecialchars($_POST['ticket_number']);
        $requete= "SELECT * FROM ticket where ticket.email = '$input_ticket' OR ticket.random_id = '$input_ticket";  
        $resultat = mysqli_query($lien_bdd, $requete);
        
        
        mysqli_close($lien_bdd);
            if ($resultat) {
            echo "gg";
            die;
        }
    }


    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method= "POST" action="index.php">
    <input type = "text" name = "ticket_number" placeholder ="ticket_number_ou email">
    <button type="submit" name ="search_ticket">rechercher </button>
    </form>
    <a href="create_ticket.php">create_ticket</a>
    
</body>
</html>