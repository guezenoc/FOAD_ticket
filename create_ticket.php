<?php

require_once "bdd_connect.php";
//recuperation categorie
$req = "SELECT * FROM  categorie ";
$res = mysqli_query($lien_bdd, $req);

//nombre aleatoire pr ticket
$random_number = mt_rand ( 10000000 , 99999999 );

if (isset($_POST)) {

    if (isset($_POST['create_ticket'])) {
        $email = htmlspecialchars($_POST['email']);
        $id= htmlspecialchars($_POST['tags']);
        
        $message= htmlspecialchars($_POST['message']);
        
        $requete=" INSERT INTO `ticket`(`email`, `random_id`, `message`, `date`,`id_categorie`)VALUES ('$email','$random_number','$message', NOW(),'$id')";
        $resultat= mysqli_query($lien_bdd, $requete);
        mysqli_close($lien_bdd);

    }
}   

//Affichage de son ticket grace a son email:

?>

<form method = "POST" action="create_ticket.php">
    <input type="email" name="email" placeholder = "email" id="email">
    <select name="tags" id="tags">
    <?php
    if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
            $name = $row ["nom"];
            $id = $row ["id"];
            echo "<option value = $id > $name</option>";
        }
    }
    ?>
    </select>
    <input type="text" name="message" placeholder ="message">
    <button type="submit"name ="create_ticket">create ticket</button>

