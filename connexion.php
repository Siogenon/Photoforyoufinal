<?php
session_start();
ini_set("display_errors",0);
if ($_SESSION['connection'] == 1) 
{
  header('location ./index.php');
}

else
{
  ?>
<!DOCTYPE html>
<html>
 <head> <!-- Entête HTML -->
    <meta charset="utf-8" />
    <title>Saisie de plusieurs personnes</title>
    <!-- Feuille de style -->
    <link href="CSS/styles.css" rel="stylesheet" type="text/css" /> 
 </head>
 <body>
<div id="container">
    <div id="header">
        <h1><a href="/">PhotoForYou</a></h1>
        <h2>Des photos pour tous</h2>
        <div class="clear"></div>
    </div>
    
    <?php
         include 'include/entete.php'; 
    ?>          
        <form action="connexionA.php" method="post">
    <BR>
    <BR>
    Bonjour, pour vous connecter sur le site, veuillez suivre la marche à suivre suivante : <p>
    <BR>
    <BR>

    Entrez votre adresse mail: <input type="mail" name="mail" id="mail"><br/><br/>
    Entrez votre mot de passe : <input type="password" name="pass" id="pass" size="20" maxlength="20" /><br/><br/>
     <input type="submit" name="valider" value="Valider la connexion" />
     </html>
<?php
}

?>