<?php

function traite_post($variable) {
    //On vérifie que la variable existe dans le post et qu'elle n'est pas vide
    if (isset($_POST[$variable]) && !empty($_POST[$variable]))
    {
        //on retourne la variable assainie si elle existe
        return htmlspecialchars(trim(stripslashes(strip_tags($_POST[$variable]))));
    }
}

session_start();
require_once "bdd_connect.php";
//recuperation categorie
$requete = "SELECT * FROM  categorie ";
$resultat = mysqli_query($lien_bdd, $requete);

if (isset($_POST)) {

    if (isset($_POST['messages'])) {
        $email = htmlspecialchars($_POST['email']);
        $id= htmlspecialchars($_POST['tags']);
        $message = htmlspecialchars($_POST['message']);
        
       
        
        $req = "INSERT INTO `reponse` (`id`, `message`, `date`, `id_ticket`) VALUES (NULL, '$message', CURRENT_DATE(), '');";
        $res = mysqli_query($lien_bdd, $requete);
        mysqli_close($lien_bdd);
        
    }
}   
// Si nouveau message (réponse), actualiser le statut du message

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Réponse aux demandes</h1>
<form method = "POST" action="messages.php">
    <input type="email" name="email" placeholder = "email" id="email">
    <select name="tags" id="tags">
    <?php
    if ($resultat) {
        while ($row = mysqli_fetch_assoc($resultat)) {
            $name = $row ["nom"];
            $id = $row ["id"];
            echo "<option value = $id > $name</option>";
        }
    }
    ?>
    
    </select>
    <input type="text" name="message" placeholder ="message">
    <button type="submit"name ="messages">envoyer</button>
</body>
</html>
