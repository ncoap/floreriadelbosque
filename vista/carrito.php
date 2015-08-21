<?php
session_start();
 
    

    @$accion=$_REQUEST['accion'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Floreria de Bosque</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="icon" href="../img/icon.ico">
       <!-- <script type="text/javascript"  src="../js/scripts.js"></script>-->
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
        <script type="text/javascript">
     function valida_num_key_press(event) {

        var charCode = event.keyCode;

        if (charCode < 48 || charCode > 57) {
            return false;
        } else {
            return true;
        }
    }

    function valida_dni(texto) {
        var numeros = "0123456789";
        var c = 0;
        for (i = 0; i < texto.value.length; i++) {
            if (numeros.indexOf(texto.value.charAt(i)) == -1) {
                c++;
            }
        }
        if (c > 0) texto.value = "";
    }
    /*function valida_fecha(text){
        var fecha_hoy="<?php /*echo date("d-m-Y");*/ ?>";
        dat=document.getElementById("fechaentre").value;
        if(text!=fecha_hoy){
            text='dd/mm/aaaa';
        }
    }*/
	</script>
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
                            <?php if(isset($_SESSION['acceso'])){
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
                            <a href="../vista/carrito.php"><img  src="../img/spanol.jpg"></a>
                        </li>
                        <li>
                            <a href="../view/carrito.php"><img  class="idiomanoselec" src="../img/ingles.jpg"></a>
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
         
            </header>
        
             
            <div class="proxsub">
               <div class="detpedi" id="detpedi">  
                   <div class="detcaja" style="background:white;">
               <h1 align="center" class="titdetp">Carrito de Compras</h1>
            <h2 class="titcar">Datos de Entrega</h2>
               <form action="">
                   <table class="titcar" aling="center">
                       <tr> 
                          <td>Distrito</td>
                          <td> 
                              <select name="distri" onchange="submit()">
                                  <option value="20">------Seleccione su Distrito------</option>
                                  <?php 
                                  $res2=$cn->prepare("select * from tarifas where estado='A';");
                                 $res2->execute();
                                 foreach ($res2 as $row2){   
                                  ?>
                                  <option value="<?php echo $row2[2];?>"><?php echo 'S/.'.$row2[2].' ------ ';?><?php echo $row2[1];?></option>
                                  <?php }?>
                              </select>
                          </td>
                      </tr>
                   </table>
               </form><br>
                
           
            <form action="../controlador/grabapedido.php" method="post" id="formulario" class="form2"> 
          <!-- <form action="https://www.paypal.com/cgi-bin/websrc" method="get" id="formulario" class="form2">-->
         
                <h2 ></h2>
                  <table class="titcar">
                      
                      <tr> 
                          <td>Nombre y Apellidos del Destinatario</td>
                          <td><input type="text" name="nomdest" required ></td>
                      </tr>
                      <tr> 
                          <td>Teléfono de Entrega</td>
                          <td><input onblur="valida_dni(this)" 
                        onkeypress="return valida_num_key_press(event)" MaxLength="9" MinLength="7" type="tel" pattern="[0-9]{9}"  name="fonoentre" required></td>
                      </tr>
                      <tr>
                          <td>Monto por Envío</td>
                          <td><input readonly type="text" name="distri2" value="<?php 
                                if(isset($_REQUEST['distri'])){
                                    echo $_REQUEST['distri'];
                                }else{
                                   $default=50; echo $default ;
                                }
                        ?>"></td>
                      </tr>
                      <tr> 
                          <td>Dirección de Entrega</td>
                          <td><input type="text" name="direc" required></td>
                      </tr>
                      <tr> 
                          <td>Referencia</td>
                          <td><input type="text" name="refere" required></td>
                      </tr>
                      <tr> 
                          <td>Fecha de Entrega</td>
                          <td><input type="date"   name="fechaentre" id="fechaentre" required></td>
                      </tr>
                      <tr> 
                          <td>Mensaje para la tarjeta</td>
                          <td><textarea name="mensaje" style="resize: none;" required></textarea></td>
                      </tr>
                       <tr> 
                          <td>Horario de Entrega</td>
                          <td>
                              <select name="hora">
                                  <option value="Mañana">Mañana</option>
                                  <option value="Tarde">Tarde</option>
                              </select>
                          </td>
                      </tr>
                  </table><br>
                     <?php
        //realizando la conexion para toda la pagina
        $cnx=new util();
             $cn=$cnx->getConexion();
      
        ?>
            
            <br>
              
                    
        <table  width="900" align="center" class="carritabla">
        
            <tr class="cabecar">
                <th>Código </th><th>Nombre</th><th>Foto</th>
                <th>Cantidad</th><th>Precio</th>
                <th>SubTotal</th><th></th>
            </tr>
             
        <?php
            
       @$cod=$_REQUEST['codpro'];
       if(isset($_REQUEST['txtcan'])){
          $can=$_REQUEST['txtcan']; 
       }
      
      
    
       //preguntamos por la accion y creando variables de session
       switch($accion){
           case "pedir":
               if(isset($_SESSION['pedido'][$cod])){
                   $_SESSION['pedido'][$cod]+=$can;
               }else{
                   $_SESSION['pedido'][$cod]=$can;
               }break;
         case "disminuir":
            if(isset($_SESSION['pedido'][$cod])){
                $_SESSION['pedido'][$cod]--;
            if($_SESSION['pedido'][$cod]==0){
                unset($_SESSION['pedido'][$cod]);
                unset($_SESSION['ca']);
                }
            }break;
        case 'quitar':
                unset($_SESSION['pedido'][$cod]);
            
                unset($_SESSION['ca']);
            
                break;
        case 'aumentar':
                if(isset($_SESSION['pedido'][$cod])){
                $_SESSION['pedido'][$cod]++;
            }break;
            case 'cancelar':
             unset($_SESSION['pedido']);
             unset($_SESSION['ca']);
                 
              break;
                    
       }$can=0;
       $total=0;
       //imprimiendo los valores de la variable de session
        
        
                 
             
             if(@$_SESSION['pedido']==null){
                 echo '<h2 align="center">Carrito Vacio</h2>';
             }else{
                 $i=1;
                foreach (@$_SESSION['pedido'] as $cod=>$x){
           
           
           $res=$cn->prepare("select * from producto where codpro=:c");
           $res->bindParam(":c", $cod);
           $res->execute();
           
           foreach ($res as $row){
               $cod1=$row[0];
               $des=$row[1];
               $stock=$row[7];
               $pre=$row[8];
               $monto=$x*$pre;
               $codven=$row[13];
           }
            
            $can=$can+$x;
               @$total=$total+$monto;
               $i=0;
               $i=$i+1;
              $_SESSION['ca']=$can;
               
           ?>    <?php  
        if($x>$stock){
        $indi=true;
        ?>
            <article class="alerta"><?php echo 'Usted se ha exedido el stock de un producto'?></article> 
                <?php 
            }
            ?>
        <tr class="detacuer">
            <th><?php echo @$codven;?></th><th><?php echo @$des;?></th><th><img  class="disc" src="../produc/<?php echo $row[10];?>"></th>
            <th text-align="center"><a href="carrito.php?accion=aumentar&codpro=<?php echo @$cod1;?>"><img class="subebaja" src="../img/aumentar.png"></a>
                <?php  
        if($x>$stock){
         echo "<font color='red'>".$x."</font>";
        }else{
                echo @$x;}?>
                <a href="carrito.php?accion=disminuir&codpro=<?php echo @$cod1;?>"><img class="subebaja" src="../img/disminuir.png"></a></th>
            <th><?php echo '$/.'?><input name="txtpre" class="indetacar" readonly value="<?php echo @$pre;?>"><?php echo '.00'?></th>
            <th><?php echo '$/.'.@$monto.'.00';?></th>
            <th><a href="carrito.php?accion=quitar&codpro=<?php echo @$cod1;?>"><img class="quitar" src="../img/quitarcarrito.png"></a></th>
            
        </tr>
          <?php
           
			
			
        ?>
       
           <?php
                 
       }}
        ?>
        <tr class="detacuer">
             <th colspan="2" align="right">Cantidad Total :</th>
        <th><input type="text"  class="indetacar" readonly name="txtcan" value="<?php echo $can;?>"></th>
        <th>Total a pagar :</th>
        <th colspan="2"><?php echo '$/.'?><input type="text" class="indetacar" name="txttotal" readonly value="<?php 
            if(isset($_REQUEST['distri'])){ 
                     $distri=$_REQUEST['distri'];
                     $total=$total+$distri;  
                     }
        echo $total;?>"><?php echo '.00'?></th><th></th>
        </tr>
        </table>
            <h2 align="center">
                <a href="carrito.php?accion=cancelar" class="btnver2">Limpiar Carrito</a>
                <a href="index.php" class="btnver2">Seguir Comprando</a>
                
                 <?php  
               
        if(@$indi==false){
        
        ?>
            <!---->
                
      
           
	
	  <?php 
          if(@$_SESSION['acceso']<>true){}else{
           if($can<>0){
              ?>
	  <input type="submit" class="btnver2" value="Aceptar Compra" title="Ver">
	   <?php 
          }}
            ?>
                <?php 
            }
            ?>
              
            </h2>
        
            <input type="hidden"  name="codpro" value="<?php echo @$cod1;?>">
        <!--</form>--><br>
        </form><br>
               <?php   ?>
                
            </div>  
                           </div>
               </div>
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
