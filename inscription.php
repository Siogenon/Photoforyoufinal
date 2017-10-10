<?php
session_start();
ini_set("display_errors",0);
if ($_SESSION['connection'] == 1) 
{
  header('location ./index.php');
} 
else
{?>
<!DOCTYPE html>
<html>
 <head> 
    <meta charset="utf-8" />
    <title>Saisie de plusieurs personnes</title>
    
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
   

   <?php
   define("WEB_EOL","<br/>"); //definie br en variable
   // Si l'appel provient d'un terminer, on affiche le tableau
   if (!empty($_POST['terminer'])) //verifie si la variable est vide ou si elle n'existe pas
   {?>
    <table summary="Tableau des personnes">
     <caption>Tableau des personnes</caption>
     <thead>
     <tr> <!-- entête du tableau -->
        <th>ID</th>
        <th>Nom</th>
        <th>Pr&eacute;nom</th>
        <th>Age</th>
     </tr>
     </thead>
     <?php
     //Vérification que le tableau existe:au moins une saisie
     if (isset($_SESSION['tab_personnes'])) //isset verifie si la variable est définie et est différente de null
     {
         $tab_personnes=$_SESSION['tab_personnes'];
         foreach ($tab_personnes as $ID => $une_personne)
         {
            echo "<tr>";
            echo "<td>$ID</td>";
            foreach ($une_personne as $EtiqChamp => $ValChamp)
            {
                echo "<td>$ValChamp</td>"; //echo renvoit un message
            }
            echo "</tr>";
         }
     }
    ?>
    </table>
    <?php
   } 
   // Affichage du formulaire et des informations en dessous 
   else
   { ?> <!-- --- Affichage du formulaire --- -->
   <form action="inscription.php" method="post">
      <fieldset>
      <legend>Saisissez les donn&eacute;es d'une nouvelle personne :</legend><br/>
      Entrez un nom : <input type="text" name="nom" id="nom"size="40" maxlength="40" autofocus placeholder=" Ex : Dupond" required/><br/><br/>
      Entrez un pr&eacute;nom : <input type="text" name="prenom" id="prenom" size="20" maxlength="20" placeholder=" Ex : Jean" required /><br/><br/>
      Entrez un nom d'utilisateur : <input type="text" name="pseudo" id="pseudo" size="20" maxlength="20" placeholder=" Ex : Jeandup" required/><br/><br/>
      <label for"choix">Type</label>
	  <select name="statut" id="statut" >
  	  	<option value="0"> Client</option> 
 	  	<option value="1"> Photographe</option>
	  </select></br></br>
	  Entrez un adresse mail: <input type="mail" name="adresse_mail" id="adresse_mail" placeholder=" Ex : dupondjean@gmail.com" required><br/><br/>
	  Choississez votre mot de passe : <input type="password" name="mot_de_passe" id="mot_de_passe" size="20" maxlength="20" /><br/><br/>
	  Confirmer votre mot de passe : <input type="password" name="mot_de_passe" id="mot_de_passe" size="20" maxlength="20" /><br/><br/>
      <input type="submit" name="valider" value="Valider cette personne" />
      <!-- Ajout du bouton pour terminer la saisie  -->
      <input type="reset" value="Effacer le formulaire" />
      </fieldset>
     </form>
     <?php
     // Affichage du résultat du traitement précédent
     // - soit le rangement dans le tableau tab_personnes
     // - soit un message d'erreur (sauf premier affichage)
     // --- Récupération  des valeurs saisies ---
     if (isset($_POST['nom'])) $Nom = $_POST['nom'] ;
     else $Nom     = ''  ;
     if (isset($_POST['prenom'])) $Prenom = $_POST['prenom'] ;
     else $Prenom  = ''  ;
     if (isset($_POST['pseudo'])) $pseudo = $_POST['pseudo'] ;
     else $pseudo    = ''  ;
     if (isset($_POST['statut'])) $statut = $_POST['statut'] ;
     else $statut     = ''  ;
     if (isset($_POST['adresse_mail'])) $adresse_mail = $_POST['adresse_mail'] ;
     else $adresse_mail  = ''  ;
     if (isset($_POST['mot_de_passe'])) $mot_de_passe = $_POST['mot_de_passe'] ;
     else $mot_de_passe    = ''  ;
     // --- Traitement des données saisies ---
     // Suppression des espaces : début, fin et multiples
     // Remplace espace par un moins noms et prénoms composés
     // -- Nom --
     $Nom    = trim($Nom)                          ; //retourne la chaine
     $Nom    = str_replace('-', ' ', $Nom)         ; //remplace des tirets par des espaces
     $Nom    = preg_replace('/\s{2,}/', ' ', $Nom) ; // remplace par des espaces
     $Nom    = strtolower($Nom)                    ; // met tout en minuscules
     $Nom    = ucwords($Nom)                       ; // met en majuscule la première lettre
     $Nom    = str_replace(' ', '-', $Nom)         ; //remplace des espaces par des tirets
     // -- Prenom --
     $Prenom = trim($Prenom)                         ; //retourne la chaine
     $Prenom = str_replace('-', ' ', $Prenom)        ; //remplace des tirets par des espaces
     $Prenom = preg_replace('/\s{2,}/', ' ', $Prenom); // remplace par des espaces
     $Prenom = strtolower($Prenom)                   ; // met tout en minuscules
     $Prenom = ucwords($Prenom)                      ; // met en majuscule la première lettre
     $Prenom = str_replace(' ', '-', $Prenom)        ; //remplace des espaces par des tirets
         // -- Pseudo --
     $pseudo = trim($pseudo)                         ; //retourne la chaine
     $pseudo = str_replace('-', ' ', $pseudo)        ; //remplace des tirets par des espaces
     $pseudo = preg_replace('/\s{2,}/', ' ', $pseudo); // remplace par des espaces
     $pseudo = strtolower($pseudo)                   ; // met tout en minuscules
     $pseudo = ucwords($pseudo)                      ; // met en majuscule la première lettre
     $pseudo = str_replace(' ', '-', $pseudo)        ; //remplace des espaces par des tirets
    
    // -- Mot de Passe --
    
   

     // Si ce n'est pas la première saisie
     if (isset($_SESSION['Afficher_Messages_Champs']))
     {// Vérification que la saisie n'est pas vide
      if (!empty($Nom) && !empty($Prenom) && !empty($pseudo) && !empty($statut) && !empty($adresse_mail) && !empty($mot_de_passe) )
       {?>
        <?php
        // Rangement dans $tab_personnes de la session
        $_SESSION['tab_personnes'][]=array($Nom,$Prenom,$pseudo, $statut, $adresse_mail, $mot_de_passe);
        }
      }
      // Affichage des messages d'erreur si champs vides
      else
      {

      echo "<fieldset>";
       echo "<legend>Valeurs &agrave; renseigner :</legend><br/>";
       if (empty($Nom)) echo "Le champ Nom est vide".WEB_EOL;
       if (empty($Prenom)) echo "Le champ Pr&eacute;nom est vide".WEB_EOL;
       if (empty($pseudo)) echo "Le champ pseudo est vide".WEB_EOL;
       if (empty($adresse_mail)) echo "Le champ adresse mail est vide".WEB_EOL;
       if (empty($mot_de_passe)) echo "Le champ mot de passe est vide".WEB_EOL;
       echo "</fieldset>";
  	  }
      

// Sous WAMP
$base = mysql_connect ('localhost', 'root', '');
mysql_select_db ('genonpfu', $base);

// debut de la requete
mysql_query( "INSERT INTO users(prenom, nom, pseudo, type, mail, pass, credits) VALUES('$Nom', '$Prenom', '$pseudo', '$statut', '$adresse_mail', '$mot_de_passe')");


}
echo ("Vous êtes bien inscrit ! Bienvenue !");
}
   ?>
 </body>
</html>