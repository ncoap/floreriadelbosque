<?php
session_start();
?>
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
    $(document).keyup(function(event){
        if(event.which==27)
        {
            $(".ventana").slideUp("fast");
        }
    });
      $(document).keyup(function(event){
        if(event.which==27)
        {
            $(".ventana2").slideUp("fast");
        }
    });
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
                            <a href="../vista/login.php"><img class="idiomanoselec"  src="../img/spanol.jpg"></a>
                        </li>
                        <li>
                            <a href="../view/login.php"><img   src="../img/ingles.jpg"></a>
                        </li>
                    </ul>
                </div>
                <ul class="menudos2">
                    <li><a href="../controller/controlador.php?op=1" class="selec">
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
            
            <article class="ventana2">
                <section class="form2">
                    <section  class="cerrar2"><a href="javascript:closeVentana2();"><img src="../img/cancel.png"></a></section >
                    <form action="../controller/recupass.php" method="post">
                        <input type="hidden" name="accion" value="recupass">
                        <h2 align="center">FORGOT YOUR PASSWORD?</h2><hr>
                        <table class="formrecu">
                             <tr>
                                <td class="subtit">Please enter the email address you used to register and we will send you your password.</td>
                            </tr>
                            <tr>
                                <td class="subtit2"><em><b>E-mail</b></em></td>
                            </tr>
                            <tr>
                                <td><input class="ireg2" type="email" name="txtmail" autofocus required=""></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="titreg2">
                                    <input type="submit" class="subregis" value="Recover">
                                </td>
                            </tr>
                        </table>
                    </form>
                </section>
            </article>
            <article class="ventana">
                <section class="form">
                    <section  class="cerrar"><a href="javascript:closeVentana();"><img src="../img/cancel.png"></a></section >
                    <form action="../controller/validareg.php"  method="post">
                        <h2 style="border-bottom: 1px solid #d6d4d4;padding-bottom: 15px" align="center">User Registration</h2>
                        <table class="formreg">
                              
                             
                            <tr>
                                <td class="subtit">Names : </td>
                                 <td><input class="ireg" type="text" name="txtnom" autofocus required=""></td>
                            </tr>
                            <tr>
                                <td class="subtit">Surnames : </td>
                                 <td><input class="ireg" type="text" name="txtape"  required=""></td>
                            </tr>
                            <tr>
                                <td class="subtit">DNI : </td>
                                <td><input onblur="valida_dni(this)" 
                        onkeypress="return valida_num_key_press(event)" MaxLength="8" MinLength="8" type="text" name="txtdni" class="ireg" required=""></td>
                            </tr>
                            <tr>
                                <td class="subtit">Gender :</td>
                                <td><select name="txtsexo">
                                         <option value="M">M</option>
                                         <option value="F">F</option>
                                     </select></td>
                            </tr>
                            <tr>
                                <td class="subtit">Phone : </td>
                                <td><input  onblur="valida_dni(this)" 
                        onkeypress="return valida_num_key_press(event)" type="tel" MaxLength="9" MinLength="7"  pattern="[0-9]{9}" name="txtdtelef"  class="ireg" required=""></td>
                            </tr>
                            <tr>
                                <td class="subtit">Address : </td>
                                <td><input type="text" name="txtdirec" class="ireg" required=""></td>
                            </tr>
                            <tr>
                                <td class="subtit">Email : </td>
                                <td><input type="email" name="txtemail" class="ireg" required=""></td>
                            </tr>
                            <tr>
                                <td class="subtit">Password : </td>
                                <td><input type="password" name="txtpass" class="ireg" required=""></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="titreg">
                                    <input type="submit" class="subregis" value="Registering">
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
                  <table class="tablog" align="center"><form autocomplete="on" action="../controller/controlador.php">
                   <tr>
                       <td><h1 align="center">Identification</h1></td>
                   </tr>
                   <tr>
                  <td class="tdd"> <input type="text" placeholder="Email" class="logemail"  name="txtemail"  required="" id="username"></td>
                   </tr>
                   <tr>
                      <td class="tdd"> <input type="password" class="logpass" placeholder="Password" name="txtpass" required="" id="password"></td>
                   </tr>
                   <tr>
                       <td class="submt"><input type="submit" class="ingre" value="Log in"><a onclick="openVentana2();" class="regist" href="#">Password?</a>
                           <a onclick="openVentana();" class="regist" href="#">Registering</a></td>
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
