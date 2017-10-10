<?php
   session_start();
   ini_set("display_errors",0);
   if ($_SESSION['connection']== 1)
    {
        header('Location : index.php');
    }
    else
    {


if(isset($_POST) && !empty($_POST['mail']) && !empty($_POST['pass'])) {

  extract($_POST);

$bdd = mysqli_connect('localhost', 'root', '');
mysqli_select_db($bdd, 'genonpfu');

   
     if (isset($_POST['mail'])) $mail = $_POST['mail'] ;
     else $mail  = ''  ;
     if (isset($_POST['pass'])) $pass = $_POST['pass'] ;
     else $pass    = ''  ;




  $bdd = new PDO( "mysql:host=localhost; dbname=genonpfu; charset=utf8", "root", "" );
   $laco = $bdd->query( "SELECT pass FROM users WHERE mail ='".$mail."'" );
   $user = $bdd->query("SELECT prenom,nom FROM users WHERE mail ='".$mail."'");
   $type = $bdd->query("SELECT type FROM users WHERE mail = '".$mail."'");
  
// Vérification des identifiants

while( $resultat = $laco->fetch() ) 
{
    if ($resultat['pass'] == $_POST['pass'])
    {
    $_SESSION['mail'] = $mail;
    $_SESSION['connection']= 1; 
        while ($letype = $type->fetch())
             {
                 $_SESSION['type'] = $letype['type']; // on lui donne le type
             }

         while($luser = $user->fetch())
                {
                    $_SESSION['user']= $luser['user']; // je lui donne les info sur l'utilisateur
                }
         

  
    echo 'Vous êtes connecté !';
     header('Location: ./index.php');

}

else
{
    echo ('Mauvais identifiant ou mot de passe !');
    header('Refresh: 2, ./connexion.php');
        exit();
}
}
}
 else {
     echo ('Informations non saisis !');
    header('Refresh: 2, ./connexion.php');
        exit();
 }
}
?>
