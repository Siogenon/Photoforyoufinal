<?php
session_start(); // ON RECUPERE LA SESSION
 
$_SESSION = array();
if (isset($_COOKIE[session_name()]))
{setcookie(session_name(),'',time()-4200,'/');}
 
session_destroy(); // ON DETRUIT LA SESSION

    header('Location: ./index.php'); // HOP ON LE RENVOIE A L'ACCEUIL
    ?>