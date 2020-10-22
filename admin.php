<?php
session_start();
require_once "bdd_connect.php";

$password = "azerty";
$erreurs = [];
$res=[];
if (isset($_SESSION['isLogin'])) {
    $req = "SELECT ticket.id, categorie.nom, ticket.random_id, ticket.date, ticket.message FROM ticket, categorie WHERE ticket.id_categorie = categorie.id";
    $res= mysqli_query($lien_bdd, $req);
    mysqli_close($lien_bdd);
}

if (isset($_POST ["login"])) {
    if ($password == $_POST['password']) {
        $_SESSION['isLogin'] = true;
    }
    else {
        $erreurs[] = "mot de passe incorrect";
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
<?php
    //compte les erreurs
    if (count($erreurs)) {
        echo "<ul>";
        for ($i=0; $i < count($erreurs) ; $i++) { 
            echo "<li>" . $erreurs[$i] . "</li>";
        }
        echo "</ul>";
    }
?>
<form action="admin.php" method="post">
    <input type="password" name = "password" placeholder ="password">
    <button type="submit" name = "login">se connecter</button>
</form>
<div>
<?php

if (isset($_SESSION['isLogin'])) {
// affiche que si connecter
    ?>
    <a href="deconnexion.php">deconnexion</a>
    <table>
    <thead>
        <tr>
           <th>id</th>
           <th>categorie</th>
           <th>date</th>
           <th>random_id</th>
           <th>message</th>
        </tr>
    </thead>
    <body>
        <?php
        if ($res) {
            while ($row=mysqli_fetch_assoc($res)) {
                //créer les variables du tableau

            $id = $row['id'];
            $id_categorie =$row['nom'];
            $date = $row['date'];
            $message =$row['message'];
            $random_id = $row['random_id'];
//echo tr o
//echo td o
// echo nom variable (id)
//echo td f
//echo tr f
            }
        }
        
        ?>
    </body>
    </table>
    <?php


}

?>

</div>
    
</body>
</html>