<?php
session_start();
ini_set("display_errors",0);
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
           
            
            
            
            
            
            <div class="clear"></div>
        </div>
        <div class="footer-bottom">
            <p>&copy; YourSite 2010. Design by <a href="http://zypopwebtemplates.com/">Free CSS Templates</a> by ZyPOP</p>  <?php echo $_SESSION['type']; ?>
         </div>
    </div>
</div>
</body>
</html>


