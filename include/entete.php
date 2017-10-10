
<?php include ("mysql.inc.php"); ?>


<?php
    if($_SESSION['connection']==1)  
    {
?>
        <?php

 

    if ($_SESSION['type'] == 0 ) // Si c'est un client :
    {

        ?>
      <div id="nav">
        <ul>
            <?php 
    
                $q='SELECT * FROM menu WHERE nomMenu is not null AND idMenu = 1 OR idMenu = 2 OR idMenu = 3 OR idMenu=6;';
                $r=mysqli_query($dbc,$q);
                $pageactive=basename($_SERVER['PHP_SELF']);
                
                while(list($id,$nom,$url)=mysqli_fetch_array($r,MYSQLI_NUM))
                {
                    echo '<li';
                    if ($pageactive == $url) echo ' class="selected"';
                    echo '><a href='.$url.'>'.$nom.'</a></li>';
                }
                ?>
            </div> 
        </ul>
 <?php     
 }  
 else// sinon c'est un photographe alors on affiche le menu sans achat crédit
  {
    ?>
     <div id="nav">
        <ul>
            <?php 
    
                $q='SELECT * FROM menu WHERE nomMenu is not null AND  idMenu = 2 OR idMenu = 3 OR idMenu =6;';
                $r=mysqli_query($dbc,$q);
                $pageactive=basename($_SERVER['PHP_SELF']);
                
                while(list($id,$nom,$url)=mysqli_fetch_array($r,MYSQLI_NUM))
                {
                    echo '<li';
                    if ($pageactive == $url) echo ' class="selected"';
                    echo '><a href='.$url.'>'.$nom.'</a></li>';
                }
                ?>
            </div> 
        </ul>
        <?php
} 
}

else {?>
  <div id="nav">
        <ul>
            <?php 
 $q='SELECT * FROM menu WHERE nomMenu is not null;';

                $r=mysqli_query($dbc,$q);
                $pageactive=basename($_SERVER['PHP_SELF']);
                
                while(list($id,$nom,$url)=mysqli_fetch_array($r,MYSQLI_NUM))
                {
                    echo '<li';
                    if ($pageactive == $url) echo ' class="selected"';
                    echo '><a href='.$url.'>'.$nom.'</a></li>';
                }
                ?>
                  </div>
              </ul>
<?php
}?>