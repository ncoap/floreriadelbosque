<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Floreria de Bosque</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        <link rel="icon" href="../img/icon.ico">
        <script type="text/javascript" src="../js/jquery.js"></script>
        <script type="text/javascript">
		function openVentana(){
			$(".ventana").slideDown("fast");
		}
		function closeVentana(){
			$(".ventana").slideUp("fast");
		}
                function openVentana2(){
			$(".ventana2").slideDown("fast");
		}
		function closeVentana2(){
			$(".ventana2").slideUp("fast");
		}
                
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
                            <?php
                            session_start();
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
                            <a href="../vista/login.php"><img  src="../img/spanol.jpg"></a>
                        </li>
                        <li>
                            <a href="../view/login.php"><img  class="idiomanoselec" src="../img/ingles.jpg"></a>
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
            <article class="ventana2">
                <section class="form2">
                    <section  class="cerrar2"><a href="javascript:closeVentana2();"><img src="../img/cancel.png"></a></section >
                    <form action="../controlador/recupass.php" method="post">
                        <input type="hidden" name="accion" value="recupass">
                        <h2 align="center">¿OLVIDASTE TU CONTRASEÑA?</h2><hr>
                        <table class="formrecu">
                             <tr>
                                <td class="subtit">Por favor introduzca la dirección de email que utilizó para registrarse y le enviaremos su contraseña.</td>
                            </tr>
                            <tr>
                                <td class="subtit2"><em><b>Correo electrónico</b></em></td>
                            </tr>
                            <tr>
                                <td><input class="ireg2" type="email" name="txtmail" autofocus required=""></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="titreg2">
                                    <input type="submit" class="subregis" value="Recuperar">
                                </td>
                            </tr>
                        </table>
                    </form>
                </section>
            </article>
            <article class="ventana">
                <section class="form">
                    <section  class="cerrar"><a href="javascript:closeVentana();"><img src="../img/cancel.png"></a></section >
                    <form action="../controlador/validareg.php"  method="post">
                        <h2 style="border-bottom: 1px solid #d6d4d4;padding-bottom: 15px" align="center">Registro de Usuarios</h2>
                        <table class="formreg">
                          
                             
                            <tr>
                                <td class="subtit">Nombres : </td>
                                 <td><input class="ireg" type="text" name="txtnom" autofocus required=""></td>
                            </tr>
                            <tr>
                                <td class="subtit">Apellidos : </td>
                                 <td><input class="ireg" type="text" name="txtape"  required=""></td>
                            </tr>
                            <tr>
                                <td class="subtit">DNI : </td>
                                <td><input onblur="valida_dni(this)" 
                        onkeypress="return valida_num_key_press(event)" MaxLength="8" MinLength="8" type="text" name="txtdni" class="ireg" required=""></td>
                            </tr>
                            <tr>
                                <td class="subtit">Sexo :</td>
                                <td><select name="txtsexo">
                                         <option value="M">M</option>
                                         <option value="F">F</option>
                                     </select></td>
                            </tr>
                            <tr>
                                <td class="subtit">Teléfono : </td>
                                <td><input type="tel" pattern="[0-9]{9}" name="txtdtelef"  class="ireg" required=""></td>
                            </tr>
                            <tr>
                                <td class="subtit">Dirección : </td>
                                <td><input type="text" name="txtdirec" class="ireg" required=""></td>
                            </tr>
                            <tr>
                                <td class="subtit">Email : </td>
                                <td><input type="email" name="txtemail" class="ireg" required=""></td>
                            </tr>
                            <tr>
                                <td class="subtit">Contraseña : </td>
                                <td><input type="password" name="txtpass" class="ireg" required=""></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="titreg">
                                    <input type="submit" class="subregis" value="Registrarse">
                                </td>
                            </tr>
                        </table> <input type="hidden" name="accion" value="nuevousu">
                    </form>
        
        </section>
            </article>
               <br>
            <div class="login">
                <div class="detpedi" id="detpedi">
                 <div class="detcaja">
                  <table class="tablog" align="center"><form autocomplete="on" action="../controlador/controlador.php">
                   <tr>
                       <td><h1 align="center">Identificación</h1></td>
                   </tr>
                   <tr>
                  <td class="tdd"> <input type="text" placeholder="Email" class="logemail"  name="txtemail"  required="" id="username"></td>
                   </tr>
                   <tr>
                      <td class="tdd"> <input type="password" class="logpass" placeholder="Contraseña" name="txtpass" required="" id="password"></td>
                   </tr>
                   <tr>
                       <td class="submt"><input type="submit" class="ingre" value="Ingresar"><a onclick="openVentana2();" class="regist" href="#">¿Contraseña?</a>
                           <a onclick="openVentana();" class="regist" href="#">Registrarse</a></td>
                   </tr><input type="hidden" value="5" name="op">
                </form></table>
          <br>
            </div>  </div></div> <?php
                
            if(isset($_SESSION['msg'])){
               
              
              ?>
            <script>
        alert("<?php echo $_SESSION['msg'];?>");    
        </script>
                  <?php
            session_unset($_SESSION['msg']);  } 
            ?>
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
