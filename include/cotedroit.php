
    <div class="sidebar">
            <ul>	
               <li>
                    <h3>Navigate</h3>
                    <ul class="blocklist">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="examples.html">Examples</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Solutions</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </li>

<?php



if(empty($_SESSION['connection']))  // SI LA VARIABLE SESSION CONTIENT AUCUNE  VALEUR 
{ // ALORS ON AFFICHE LE PETIT FORMULAIRE DE CONNECTION
 echo('
 <form action = "connexionA.php" method = "post">
   Email : </br><input type = "text" name = "mail" /></br>
  mot de passe   </br><input type = "password" name = "pass" /></br>
    <input type = "submit" value = "Envoyer" />
</form> '); 
 
} 
else
{
	
	echo('Bonjour <a href="deco.php">cliquez ici pour vous deconnecter</a>');
}
?>