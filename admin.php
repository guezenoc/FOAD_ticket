<?php
session_start();
require_once "bdd_connect.php";

$password = "azerty";
$erreurs = [];
$req ="SELECT ticket.*, categorie.nom  FROM ticket, categorie WHERE ticket.id_categorie = categorie.id";
    $res = mysqli_query ($lien_bdd, $req);
if (isset($_SESSION['isLogin'])) {

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
    <!-- bouton de deconnexion -->
    <a href="deconnexion.php">deconnexion</a>
    <table>
    <thead>
    <!-- création d'un tableau qui montre les categories de la base de données -->
        <tr>
           
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

            
            $id_categorie =$row['nom'];
            $date = $row['date'];
            $random_id = $row['random_id'];
            $message =$row['message'];

            ?>
            <tr>
               <th><?=$id_categorie?></th>
               <th><?=$date?></th>
               <th><?=$random_id?></th>
               <th><?=$message?></th>
            </tr>
    <?php
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