<?php
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DB_HOST', '127.0.0.1');
DEFINE('DB_NAME', 'genonpfu');
$dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

if (mysqli_connect_errno())
{
    printf("echec de la connexion : %s\n", mysqli_connect_error());
    exit();
}
mysqli_set_charset ($dbc,'utf8');
?>

