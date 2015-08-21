<?php
session_start();

@$buscar=$_SESSION['buscar'];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Floreria de Bosque</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="icon" href="../img/icon.ico">
    </head> 
    <body>
       <!-- <div class="carrito">
            <p class="micar">Mi Carrito</p>
            <img src="../img/carrito.png">
            <p class="total">$/. 0.00 </p>
        </div>-->
        <div class="cuerpo">
            <header class="top">
                <a href="../controller/controlador.php?op=1"><img class="logo" src="../img/logo.png"></a>
                 <div class="user">
                    <ul>
                        <li>
                            <?php if(isset($_SESSION['acceso'])){
                            @$nomusu=$_SESSION['nomusu'];?>
                            <a href="micuenta.php"><?php echo $nomusu;?></a>
                            <a class="login" href="../controller/controlador.php?op=6">( log out )</a>
                            <?php }else{?> <a class="login" href="login.php">Welcome,(  log in  )</a><?php }?>
                        </li>
                       
                    </ul>
                </div>
                <div class="idiomas">
                    <ul>
                       <li class="carr">
                            <img src="../img/carrito.png"> <a href="carrito.php"> Cart:</a><?php
                            if(isset($_SESSION['ca'])){
                            echo '<span>'.@$_SESSION['ca'].'</span>'; }else{ echo ' Empty';} ?>
                        </li>
                        <li>
                            <a href="#"><form action="../controller/controlador.php" method="post" name="form1">
                                    <input class="caja" type="text" name="letra">
                                    <input type="hidden" name="op" value="19">
                                <input class="bntenvi" type="submit" name="btnenvi"></form></a>
                        </li>
                        <li>
                            <a href="../vista/busqueda.php"><img class="idiomanoselec"  src="../img/spanol.jpg"></a>
                        </li>
                        <li>
                            <a href="../view/busqueda.php"><img   src="../img/ingles.jpg"></a>
                        </li>
                    </ul>
                </div>
                <ul class="menudos2">
                    <li><a href="../controller/controlador.php?op=1" class="noselec">
                        HOME</a>
                    </li>
                    <li><a href="quienessomos.php" class="noselec">
                       WHO WE ARE</a>
                    </li>
                    <li><a href="../controller/controlador.php?op=4" class="noselec">
                        SPECIAL</a>
                    </li>
                    <li><a href="contacto.php" class="noselec">
                        CONTACT</a>
                    </li>
                </ul>
              
       <div id="header">
    <ul class="nav">
            <li><a href="">Boxes and Ramos</a> <ul><?php
            include '../util/util.php';
             $cnx=new util();
             $cn=$cnx->getConexion();
            $res=$cn->prepare("select codsubcat,nomsubcate,nomsubcati from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c001' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controller/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[2] ;?></a></li>
                         <?php }?>   
                    </ul>
 </li>
             <li><a href="">Arrangements</a> <ul>
                          <?php
            $res=$cn->prepare("select codsubcat,nomsubcate,nomsubcati from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c002' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controller/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[2] ;?></a></li>
                         <?php }?>   
                    </ul></li>
            <li><a href="">Babies and Children</a>
                    <ul>
                          <?php
            $res=$cn->prepare("select codsubcat,nomsubcate,nomsubcati from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c003' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controller/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[2] ;?></a></li>
                         <?php }?>   
                    </ul>
            </li>
            <li><a href="">Special</a>
                    <ul>
                          <?php
            $res=$cn->prepare("select codsubcat,nomsubcate,nomsubcati from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c004' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controller/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[2] ;?></a></li>
                         <?php }?>   
                    </ul>
            </li>
            <li><a href="">Condolences</a>
            <ul> <?php
            $res=$cn->prepare("select codsubcat,nomsubcate,nomsubcati from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c005' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controller/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[2] ;?></a></li>
                         <?php }?>  
                    </ul></li>
            <li><a href="">Institutional</a><ul>
                           <?php
            $res=$cn->prepare("select codsubcat,nomsubcate,nomsubcati from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c006' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controller/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[2] ;?></a></li>
                         <?php }?>              
                    </ul></li>
            <li><a href="">Season Offers</a><ul>
                            <li><a href="">Catalog</a></li>
                            <li><a href="">Premium Customers</a></li>  
                            <li><a href="">Regulars</a></li>                   
                    </ul></li>
            <li><a href="">Gifts and Accessories</a><ul>
                          <?php
            $res=$cn->prepare("select codsubcat,nomsubcate,nomsubcati from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c008' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controller/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[2] ;?></a></li>
                         <?php }?>                    
                    </ul></li>
    </ul>
		</div>
         
            </header>
        
             
            <div class="proxsub">
                <?php  
                  $numbus=count($buscar);
                  echo '<p style="
                      border-bottom: 1px solid #d6d4d4;
                      padding-bottom: 15px;
                      font-size:16px;
                      margin-left:25px;
                      width:95%;
                        font-family: monospace;
                        color: #004a80;
                        ">Your search yielded  '.$numbus.' result(s)</p>';
                  ?> 
                <?php
                if(count($buscar)!=0){
                    foreach ($buscar as $row){
                        ?>
                <form action="../controller/controlador.php" method="post">
                    <div class="proxs">
                      
                            <img class="imgpro"  src="../produc/<?php echo $row[10];?>">
                          <p class="nomdest"><?php echo $row[15];?></p>
                            <input type="hidden" name="codpro" value="<?php echo $row[0];?>">
                            <input type="hidden" name="op" value="2">
                            <input type="submit" class="btnver" value="Ver" title="Ver">
                            <span class="predest"><?php echo 'S/.'.$row[13].' -- '.'$/.'.$row[8];?></span>
                       
                    </div></form>
                    <?php
                }   
                }else{
                  ?>
                <h2 align="center" class="titdes">No products were found</h2>
                      <?php
                }
            ?>
               
                
            </div> 
            <div class="redsoc">
                 <ul class="redes">
                    <li> <p class="sigue">Follow us:</p>  </li>
                    <li><a target="_blanck" href="https://www.facebook.com/floreriadelbosquesrl?ref=hl"><img class="face" src="../img/facebook1.png"></a></li>
                     <li><a target="_blanck"  href="http://instagram.com/"><img class="ins" src="../img/instagram.png"></a></li>
                      <li><a  target="_blanck" href="http://youtube.com/"><img class="yout" src="../img/youtube.png"></a></li>
                       <li><a target="_blanck"  href="http://floreriadelbosque.blogspot.com/"><img class="blog" src="../img/blog.png"></a></li>
                </ul>
                  
               
            </div>
            <div class="datos">
                <table class="ddatos">
                    <tr> <td>Telephone Exchange </td>
                        <td class="spa">Certificates:</td></tr>
                    <tr> <td>982 938 465</td></tr>
                    <tr> <td>Information: ventas@floreriadelbosque.com</td>
                        <td class="spa"><img class="paypal" src="../img/paypal.svg"></td></tr>
                     
                </table>
            </div>
            <div class="derechos">
                <p>Developed By <a href="http://www.innovatechperusac.com/">Innovatech Perú</a>™.  Copyright © 2015, All rights reserved
</p>
            </div>
        </div>
       <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
 <script type="text/javascript" src="http://jappix.com/php/get.php?l=en&t=js&g=mini.xml"></script>

<script type="text/javascript">
       jQuery(document).ready(function() {
          MINI_CHATS = ['floreriadelbosque@jappix.com'];
          MINI_ANIMATE = true;
          launchMini(false, true, "anonymous.jappix.com");
       });
</script>
    </body>
</html>
