<?php
session_start();
if(isset($_SESSION['detapro'])){
$detapro=$_SESSION['detapro'];
}else{
    header('Location: ../index.php');
}
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
		$(document).ready(function(){
			
		})
	</script>
    </head> 
    <body>
        <?php
         foreach ($detapro as $row){
        ?>
        <script>
$(document).ready(function() {
	var time = 300;
    $('#img1').fadeIn(time);
	$('#img2').fadeIn(time);
	$('#img3').fadeIn(time);
	
	$('#principal').fadeIn(time);
	$('#img2').fadeTo('slow', 0.50);
	$('#img3').fadeTo('slow', 0.50);
	

	
	$('#img1').click(function(){
		$( this ).fadeTo('slow', 1);
		$('#img2').fadeTo('slow', 0.50);
		$('#img3').fadeTo('slow', 0.50);
		$('#principal').fadeOut(time);
		setTimeout(function(){
			var principal = document.getElementById("principal");
			principal.src = "../produc/<?php echo $row[10];?>";
                        
		},time);
		$('#principal').fadeIn(time);
                  
	});
	
	$('#img2').click(function(){
		$( this ).fadeTo('slow', 1);
		$('#img1').fadeTo('slow', 0.50);
		$('#img3').fadeTo('slow', 0.50);
		
		$('#principal').fadeOut(time);
		setTimeout(function(){
			var principal = document.getElementById("principal");
			principal.src = "../produc/<?php echo $row[11];?>";
		},time);
		$('#principal').fadeIn(time);
          
	});
	
	
	$('#img3').click(function(){
		$( this ).fadeTo('slow', 1);
		$('#img1').fadeTo('slow', 0.50);
		$('#img2').fadeTo('slow', 0.50);
		
		$('#principal').fadeOut(time);
		setTimeout(function(){
			var principal = document.getElementById("principal");
			principal.src = "../produc/<?php echo $row[12];?>";
		},time);
		$('#principal').fadeIn(time);
               
	});
     
		
});

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
        if (c > 0) texto.value = "1";
    }
    $(document).keyup(function(event){
        if(event.which==27)
        {
            $(".modal").slideUp("fast");
        }
    });
    function openVentana(){
			$(".modal").slideDown("fast");
		}
		function closeVentana(){
			$(".modal").slideUp("fast");
		}
         
    /*$(document).keyup(function(event){
                alert(event.which);
        if(event.which==32)
        {
            alert('Que haces oe ctrm');
        }
    }); */
</script>
 <?php
         }
        ?>
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
                            <a href="../vista/detallepro.php"><img class="idiomanoselec"  src="../img/spanol.jpg"></a>
                        </li>
                        <li>
                            <a href="../view/detallepro.php"><img   src="../img/ingles.jpg"></a>
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
             
                <?php
                if(count($detapro)!=0){
                    foreach ($detapro as $row){
                        ?>
            <article class="modal">
                <section class="dentmod">
                     <section  class="cerrarmod"><a href="javascript:closeVentana();"><img src="../img/cancel.png"></a></section >
                      <p class="nomdetapro" style="margin: 0"><?php echo $row[3].' (Cod. '.$row[14].')';?>
                     <div class="supe">
                         
                                    <img id="principal" class="imgsup2" src="../produc/<?php echo $row[10]?>">
                                    
                                </div><?php if ($row[11]<>' ') {
                               
                        ?>
                                <div class="inf">
                                        <img id="img1" class="imginf" src="../produc/<?php echo $row[10];?>" alt="">
                                        <img id="img2" class="imginf" src="../produc/<?php echo $row[11];?>" alt="">
                                        <img id="img3" class="imginf" src="../produc/<?php echo $row[12];?>" alt="">
                                </div><?php 
                            
                        }?>
                </section>
            </article>
                <form action="carrito.php" method="post">
                    <table class="detapro">
                        <tr >
                            <td class="izqui">
                                <div class="sup">
                                    <img id="principal" class="imgsup" src="../produc/<?php echo $row[10];?>">
                                    <span class="lupa" onclick="openVentana();">View larger
                                        <img class="imglupa" src="../img/lupa.png"></span>
                                </div>
                              <!-- <img id="img_01" class="imgdetapro"  src="../produc/<?php /*echo $row[10];*/?>">-->
                            </td>
                            <td class="dere">
                                 <p class="nomdetapro"><?php echo $row[3];?>
                                  <p class="stock"><?php echo $row[7].' Items Available';?></p><br>
                                  <p class="codven"><?php echo 'Cod. '.$row[14];?></p><br>
                                  <span class="predetpro"><?php echo 'S/.'.$row[13].' -- '.'$/.'.$row[8];?></span><br>
                                  
                            <input type="hidden" name="codpro" value="<?php echo $row[0];?>">
                            
                            <p class="despro"> <?php echo $row[4];?></p>
                            <p class="despro" style="width:80px; margin:0; float:left;padding-top: 7px;" >Cantidad :</p> <input style="height: 25px;margin-right: 15px;" class="cantpro" type="number" name="txtcan" onblur="valida_dni(this)" 
                        onkeypress="return valida_num_key_press(event)" min="1" value="1"><input type="submit" class="btnver" value="Add to Cart" title="Ver">
                           </div><input type="hidden" name="accion" value="pedir">
                            </td>
                        </tr>
                        
                    </table></form>
                    <?php
                }   
                }
                $cnx=null;
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
