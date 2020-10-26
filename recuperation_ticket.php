<?php
session_start();
require_once "bdd_connect.php";

//déclaration des variables:

$req ="SELECT ticket.email, categorie.nom, ticket.id_reponse, ticket.date, ticket.message, ticket.random_id  FROM ticket, categorie WHERE ticket.id_categorie = categorie.id AND ticket.email =  ";
$res = mysqli_query ($lien_bdd, $req);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?phpif (isset($_SESSION['isLogin'])) {
// affiche que si connecter
    ?>
    <!-- bouton de deconnexion -->
    <a href="deconnexion_utilisateur.php">deconnexion</a> 
    <table>
    <thead>
    <!-- création d'un tableau qui montre les categories de la base de données ! -->
        <tr>
           <th>categorie</th>
           <th>date</th>
           <th>random_id</th>
           <th>message</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($res) {
            while ($row=mysqli_fetch_assoc($res)) {
                
                //créer les variables du tableau
            
            $categorie =$row['nom'];
            $date = $row['date'];
            $message =$row['message'];
            $random_id = $row['random_id'];
  
?>
        <tr>
            
           <th><?=$categorie?></th>
           <th><?=$date?></th>
           <th><?=$random_id?></th>
           <th><?=$message?></th>
        </tr>
<?php
            }
        }
        
        ?>
    </tbody>
</body>
</table>
</html>