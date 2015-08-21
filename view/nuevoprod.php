<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Floreria de Bosque</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/login.css">
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
                            <a href="#"><img  src="../img/spanol.jpg"></a>
                        </li>
                        <li>
                            <a href="#"><img  class="idiomanoselec" src="../img/ingles.jpg"></a>
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
                         <?php }?>                    
                    </ul></li>
    </ul>
		</div>
            </header><br><br>
            <div class="detpedi" id="detpedi">
                 <div class="detcaja">
               
                     <h2 align="center" style="border-bottom: 1px solid #d6d4d4;padding-bottom: 15px">Nuevos  Productos </h2><br>
            <form action="" method="post"><table align="center">
             <tr>
                <td>Categoria: </td>
                <td>
                    <select name="select_cat" class="textbox"  onchange="submit()">
                        <option>--Seleccione--</option>
                           <?php             
            $res=$cn->prepare("select * from categoria;");
            $res->execute();
            foreach ($res as $row){?>
                        <option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
                         <?php }?>
                    </select>
                     
                </td>
                </tr></table></form><br>
            <form enctype="multipart/form-data" method="post" action="../controlador/valida.php">
            <table border="0" width="200" align="center">
                 <?php            
           
            ?>
                <tr><?php             
            $res=$cn->prepare("select concat('P',count(codpro)+1) as cod from producto;");
            $res->execute();
            foreach ($res as $row){?>
                    <td>Código:</td>
                    <td><input type="text" class="textbox" name="codpro" readonly="readonly" value="<?php echo $row[0] ;?>"></td><?php }?>  
                </tr>
                <tr>
                    <td>Código de Venta:</td>
                    <td><input type="text" class="textbox" name="codvent" ></td>
                </tr>
                <tr>
                    <td>Nombre en Español:</td>
                    <td><input type="text" class="textbox" name="nomproe" value="" required></td>
                </tr>
                <tr>
                    <td>Descripción en Español:</td>
                    <td><textarea name="desproe" cols="60" rows="8" class="textbox"  ></textarea></td>
                </tr>
                <tr>
                    <td>Nombre en Ingles:</td>
                    <td><input type="text" class="textbox" name="nomproi" value=""></td>
                </tr>
                <tr>
                    <td>Descripción en Ingles:</td>
                    <td><textarea name="desproi" cols="60" rows="8" class="cajatext"  ></textarea></td>
                </tr>
                <tr>
                <td>Estado: </td>
                <td><select name="estado" class="textbox">
                        <option value="A">Activado</option>
                        <option value="D">Desactivado</option></select>
                </td>
                </tr>
                <tr>
                    <td>Stock:</td>
                    <td><input type="number" min="0" class="textbox" name="stock" value="" required></td>
                </tr>
                <tr>
                    <td>Precio:</td>
                    <td><input type="number" class="textbox" name="precio" value="" required></td>
                </tr>
                <tr>
                <td>Sub Categoria: </td>
                <td>
                    <select name="codsubcat" class="textbox">
                        <option>--Seleccione--</option>
                           <?php   
                           if(isset($_REQUEST['select_cat'])){ 
                     $cat=$_REQUEST['select_cat'];
            $res=$cn->prepare("call subxcate(:cod)");
            $res->bindParam(":cod", $cat);
            $res->execute();
            foreach ($res as $row){?>
                        <option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
                         <?php }}?>
                    </select>
                     
                </td>
                </tr>
                <tr>
                    <td>Imagen 1:</td>
                    <td><input type="file" required class="textbox" name="imagen1"></td>
                </tr>
                <tr>
                    <td>Imagen 2:</td>
                    <td><input type="file"  class="textbox" name="imagen2"></td>
                </tr>
                <tr>
                    <td>Imagen 3:</td>
                    <td><input type="file"  class="textbox" name="imagen3"></td>
                </tr>
                <tr>
                <th colspan="2">
                    <input type="submit" name="btn1" value="Insertar" id="boton1">
                    </th>
                </tr>
                <tr>
                <input type="hidden" name="accion" value="insertar"/>
                </tr>
                <?php
           
             
            ?>
        
            </table>
        </form>
             
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
