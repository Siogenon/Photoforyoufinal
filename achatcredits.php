<?php
session_start();
ini_set("display_errors",0);
if ($_SESSION['connection'] == 1) 
{

 $nbcredit = $_POST['nbcredit'];


$base = mysql_connect ('localhost', 'root', '');
mysql_select_db ('genonpfu', $base);

// debut de la requete
mysql_query( "UPDATE users SET credits = credits + '".$nbcredit."' WHERE mail = '".$_SESSION['mail']."' ");



 $bdd = new PDO( "mysql:host=localhost; dbname=genonpfu; charset=utf8", "root", "" );
 $credit =$bdd->query("SELECT credits FROM users WHERE mail = '".$_SESSION['mail']."'");
while($lecredit = $credit->fetch())
         {
            $_SESSION['credits'] = $lecredit['credits'];
         }
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sworm - Free CSS Template by ZyPOP</title>
<link rel="stylesheet" href="CSS/styles.css" type="text/css" />

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
   
    <div id="body">


		<div id="content">
			

            


        </div>
        <div class="sidebar">
            <ul>	
                           <?php
                
                include 'include/cotedroit.php'
                
                ?>
                
                
            </ul> 
        </div>
    	<div class="clear"></div>
    </div>
    <div id="footer">
        <div class="footer-content">
        
                 <?php echo $_SESSION['mail']; ?>
                      
                     <strong> vous possédez actuellement <?php echo $_SESSION['credits'];  ?> crédits </strong>
</br>
</br>
</br>
</br>
</br>
            <form action="achatcredits.php" method="post">
      <fieldset>
      <legend></legend><br/>
      <strong>Combien voulez vous en ajoutez ? </strong> <input type="number" name="nbcredit" id="nbcredit"size="500" maxlength="40" autofocus placeholder=" Ex : 50" required/><br/><br/>
          <center>     <input type="submit" name="achatcredits" value="achatcredits" />  </center> </fieldset> </form>



            
            <div class="clear"></div>
        </div>
        <div class="footer-bottom">
            <p>&copy; YourSite 2010. Design by <a href="http://zypopwebtemplates.com/">Free CSS Templates</a> by ZyPOP</p>
         </div>
    </div>
</div>
</body>
</html>

<?php
}
else
{

  header('location ./index.php');
}
?>