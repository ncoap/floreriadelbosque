<?php
session_start();
if($_SESSION['acceso']<>true){
        header('Location: index.php');
    }
 
         $codusu=$_SESSION['codusu'];
    
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
                <a href="../controlador/controlador.php?op=1"><img class="logo" src="../img/logo.png"></a>
                 <div class="user">
                    <ul>
                        <li>
                            <?php
                         
                            if(isset($_SESSION['acceso'])){
                            @$nomusu=$_SESSION['nomusu'];?>
                            <a href="micuenta.php"><?php echo $nomusu;?></a>
                            <a class="login" href="../controlador/controlador.php?op=6">( Salir )</a>
                            <?php }else{?> <a class="login" href="login.php">Bienvenido,(  Entrar  )</a><?php }?>
                        </li>
                       
                    </ul>
                </div>
                <div class="idiomas">
                    <ul>
                       <li class="carr">
                            <img src="../img/carrito.png"> <a href="carrito.php"> Carrito:</a><?php
                            if(isset($_SESSION['ca'])){
                            echo '<span>'.@$_SESSION['ca'].'</span>'; }else{ echo 'Vacio';} ?>
                        </li>
                         <li>
                            <a href="#"><form action="../controlador/controlador.php" method="post" name="form1">
                                    <input class="caja" type="text" name="letra">
                                    <input type="hidden" name="op" value="19">
                                <input class="bntenvi" type="submit" name="btnenvi"></form></a>
                        </li>
                        <li>
                            <a href="../vista/datospersonales.php"><img  src="../img/spanol.jpg"></a>
                        </li>
                        <li>
                            <a href="../view/datospersonales.php"><img  class="idiomanoselec" src="../img/ingles.jpg"></a>
                        </li>
                    </ul>
                </div>
                <ul class="menudos">
                    <li><a href="../controlador/controlador.php?op=1" class="noselec">
                        INICIO</a>
                    </li>
                    <li><a href="quienessomos.php" class="noselec">
                        QUIENES SOMOS</a>
                    </li>
                    <li><a href="../controlador/controlador.php?op=4" class="noselec">
                        ESPECIALES</a>
                    </li>
                    <li><a href="contacto.php" class="noselec">
                        CONTACTO</a>
                    </li>
                </ul>
              
       <div id="header">
    <ul class="nav">
            <li><a href="">Cajas y Ramos</a> <ul><?php
            include '../util/util.php';
             $cnx=new util();
             $cn=$cnx->getConexion();
            $res=$cn->prepare("select codsubcat,nomsubcate from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c001' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controlador/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[1] ;?></a></li>
                         <?php }?>   
                    </ul>
 </li>
             <li><a href="">Arreglos</a> <ul>
                          <?php
            $res=$cn->prepare("select codsubcat,nomsubcate from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c002' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controlador/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[1] ;?></a></li>
                         <?php }?>   
                    </ul></li>
            <li><a href="">Bebés y niños</a>
                    <ul>
                          <?php
            $res=$cn->prepare("select codsubcat,nomsubcate from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c003' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controlador/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[1] ;?></a></li>
                         <?php }?>   
                    </ul>
            </li>
            <li><a href="">Especiales</a>
                    <ul>
                          <?php
            $res=$cn->prepare("select codsubcat,nomsubcate from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c004' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controlador/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[1] ;?></a></li>
                         <?php }?>   
                    </ul>
            </li>
            <li><a href="">Condolencias</a>
            <ul> <?php
            $res=$cn->prepare("select codsubcat,nomsubcate from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c005' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controlador/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[1] ;?></a></li>
                         <?php }?>  
                    </ul></li>
            <li><a href="">Institucional</a><ul>
                           <?php
            $res=$cn->prepare("select codsubcat,nomsubcate from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c006' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controlador/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[1] ;?></a></li>
                         <?php }?>              
                    </ul></li>
            <li><a href="">Ofertas de  Temporada</a><ul>
                            <li><a href="">Catálogo</a></li>
                            <li><a href="">Clientes Premium</a></li>  
                            <li><a href="">Regulares</a></li>                   
                    </ul></li>
            <li><a href="">Regalos y  Complementos</a><ul>
                          <?php
            $res=$cn->prepare("select codsubcat,nomsubcate from subcategoria s,categoria c
                                where s.codcat=c.codcat and c.codcat='c008' and estado='A';");
            $res->execute();
            foreach ($res as $row){      ?>
            <li><a href="../controlador/controlador.php?codsub=<?php echo $row[0] ;?>&op=3">
                                <?php echo $row[1] ;?></a></li>
                         <?php }
            $res=$cn->prepare("call lisusuxcod(:cod)");
            $res->bindParam(":cod", $codusu);
            $res->execute();
            foreach ($res as $row){  
                         
                         ?>                    
                    </ul></li>
    </ul>
		</div>
         
            </header><br>    
              <div class="detpedi" id="detpedi">
                 <div class="detcaja">
            <h2 style="border-bottom: 1px solid #d6d4d4;padding-bottom: 15px">SUS DATOS PERSONALES</h2><br>
            <form action="../controlador/valida.php" method="post">
            <table align="center">
                 <input type="hidden" value="<?php echo $row[0] ;?>" name="codusuario">
                <tr>
                    <td>Telefono:</td>
                    <td><input type="tel" pattern="[0-9]{9}" name="txttele" required value="<?php echo $row[6] ;?>"><font color="red" style="font-size: 23px"> *</font></td>
                </tr>
                <tr>
                    <td>Dirección :</td>
                    <td><input type="text" name="txtdirec" required value="<?php echo $row[7] ;?>"><font color="red" style="font-size: 23px"> *</font></td>
                </tr>
               <tr>
                    <td>Correo:</td>
                    <td><input type="text" name="txtcorreo" required value="<?php echo $row[8] ;?>"><font color="red" style="font-size: 23px"> *</font></td>
                </tr>
                <tr>
                    <td>Contraseña:</td>
                    <td><input type="password" name="txtpass" readonly="readonly"  required value="<?php echo $row[9] ;?>"><font color="red" style="font-size: 23px"> *</font></td>
                </tr>
                <tr>
                    <td>Contraseña Nueva:</td>
                    <td><input type="password" name="txtnpass"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btn1" value="Actualizar" ></td>
                </tr>
            </table> 
                <input type="hidden" name="accion" value="actdatos1">
            </form><br>
             <?php }?>
             </div></div> 
            <div class="redsoc">
                 <ul class="redes">
                    <li> <p class="sigue">Síguenos en:</p>  </li>
                    <li><a target="_blanck" href="https://www.facebook.com/floreriadelbosquesrl?ref=hl"><img class="face" src="../img/facebook1.png"></a></li>
                     <li><a target="_blanck"  href="http://instagram.com/"><img class="ins" src="../img/instagram.png"></a></li>
                      <li><a  target="_blanck" href="http://youtube.com/"><img class="yout" src="../img/youtube.png"></a></li>
                       <li><a target="_blanck"  href="http://floreriadelbosque.blogspot.com/"><img class="blog" src="../img/blog.png"></a></li>
                </ul>
                  
               
            </div>
            <div class="datos">
                <table class="ddatos">
                    <tr> <td>Central Telefónica </td>
                        <td class="spa">Certificados:</td></tr>
                    <tr> <td>982 938 465</td></tr>
                    <tr> <td>Informes: ventas@floreriadelbosque.com</td>
                        <td class="spa"><img class="paypal" src="../img/paypal.svg"><img src=""></td></tr>
                     
                </table>
            </div>
            <div class="derechos">
                <p>Desarrollado Por <a href="http://www.innovatechperusac.com/">Innovatech Perú</a>™.  Copyright © 2015, Todos Los Derechos Reservados
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
