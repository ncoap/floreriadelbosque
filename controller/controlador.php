<?php
session_start();
    include '../dao/dao.php';
    if(isset($_REQUEST['op'])){
        $op=$_REQUEST['op'];
    }else{
        header('Location: ../view/index.php');
    }

switch ($op){
    case 1:
         unset($_SESSION['lista']); 
            $objDAO=new dao();
            $lista=$objDAO->listarUlt();
             $_SESSION['lista']=$lista;
    header('Location: ../view/index.php');
        break;
    case 2: 
        unset($_SESSION['detapro']); 
            $objDAO=new dao();
            $codpro=$_REQUEST['codpro'];
            $ex=$_REQUEST['ex'];
            $_SESSION['codpro']=$codpro;
            $detapro=$objDAO->detapro($codpro);
             $_SESSION['detapro']=$detapro;
             if($ex==1){
                 header("Location: ../view/editarprod.php");
             }else{
             header("Location: ../view/detallepro.php");
             }
             break;
    case 3:
        unset($_SESSION['proxsub']);
        $objDAO=new dao();
        $codsub=$_REQUEST['codsub'];
        $_SESSION['codsub']=$codsub;
        $proxsub=$objDAO->proxsub($codsub);
        $_SESSION['proxsub']=$proxsub;
        header('Location: ../view/prodxsub.php');
        break;
    case 4:
         unset($_SESSION['especi']); 
            $objDAO=new dao();
            $especi=$objDAO->listespeci();
             $_SESSION['especi']=$especi;
    header('Location: ../view/especiales.php');
        break;
      case 5 :
               unset($_SESSION['logeusu']); 
            $objDAO=new dao();
            $email=$_REQUEST['txtemail'];
            $pass=$_REQUEST['txtpass'];
            $_SESSION['email']=$email;
            $_SESSION['pass']=$pass;
            $logeusu=$objDAO->logeUsu($email, $pass);
            foreach ($logeusu as $raw){
                $nomusu=$raw[1];
                $codusu=$raw[0];
                $rol=$raw[4];
            }
            if($logeusu != null){
                $_SESSION['nomusu']=$nomusu;
                $_SESSION['codusu']=$codusu;
                $_SESSION['rol']=$rol;
                $_SESSION['acceso']=true;
                
                header("Location: ../view/index.php");
            }else{
                $_SESSION['msg']='User Error';
                 header("Location: ../view/login.php");
                }
             break;
             
             case 6:
                 session_unset($_SESSION['acceso']);
                   session_unset($_SESSION['codusu']);
                   session_unset($_SESSION['rol']);
                   session_unset($_SESSION['nomusu']);
                   session_unset($_SESSION['msg']);
                header('Location: ../view/login.php');
                 break;
                    case 7:
         unset($_SESSION['bbs']); 
            $objDAO=new dao();
            $bbs=$objDAO->listbbs();
             $_SESSION['bbs']=$bbs;
    header('Location: ../view/bbsni.php');
        break;
     case 8:
         unset($_SESSION['condole']); 
            $objDAO=new dao();
            $condole=$objDAO->listcondole();
             $_SESSION['condole']=$condole;
    header('Location: ../view/condolencias.php');
        break;
         case 9:
              unset($_SESSION['pedxusu']);
        $objDAO=new dao();
        $codus=$_REQUEST['codus'];
        $_SESSION['codus']=$codus;
        $pedxusu=$objDAO->pedxusu($codus);
        $_SESSION['pedxusu']=$pedxusu;
        header('Location: ../view/pedxusu.php');
             break;
         case 10:
             $codpedido=$_REQUEST['codpedido'];
             $_SESSION['codpedido']=$codpedido;
             header('Location: ../view/detallepedido.php');
             break;
         case 11:
              unset($_SESSION['pedxfecha']);
        $objDAO=new dao();
        $fec1=$_REQUEST['fec1'];
        $fec2=$_REQUEST['fec2'];
        $opp=$_REQUEST['opp'];
        $_SESSION['fec1']=$fec1;
        $_SESSION['fec2']=$fec2;
        $_SESSION['opp']=$opp;
        $pedxfecha=$objDAO->pedxfecha($fec1,$fec2);
        $_SESSION['pedxfecha']=$pedxfecha;
        header('Location: ../view/pedidosxfecha.php');
             break;
          case 12:
               unset($_SESSION['pediapro']);
        $objDAO=new dao();
        $pediapro=$objDAO->pediapro();
        $_SESSION['pediapro']=$pediapro;
        header('Location: ../view/pediapro.php');
              break;
          case 13:
               unset($_SESSION['pedipend']);
        $objDAO=new dao();
        $pedipend=$objDAO->pedipend();
        $_SESSION['pedipend']=$pedipend;
        header('Location: ../view/pedipend.php');
              break;
            case 14:
               unset($_SESSION['pediall']);
        $objDAO=new dao();
        $pediall=$objDAO->pediall();
        $_SESSION['pediall']=$pediall;
        header('Location: ../view/pediall.php');
              break;
           case 15:
              unset($_SESSION['pedxcod']);
        $objDAO=new dao();
        $codpe=$_REQUEST['codpe'];
        $_SESSION['codpe']=$codpe;
        $pedxcod=$objDAO->pedxcod($codpe);
        $_SESSION['pedxcod']=$pedxcod;
        header('Location: ../view/pedxcod.php');
             break;
           case 16:
              unset($_SESSION['pedxusu2']);
        $objDAO=new dao();
        $codus=$_SESSION['codusu'];     
        $pedxusu2=$objDAO->pedxusu2($codus);
        $_SESSION['pedxusu2']=$pedxusu2;
        header('Location: ../view/mispedidos.php');
             break;
         case 17:             
             unset($_SESSION['detasubc']);
             $scate=$_REQUEST['scate'];
            $objDAO=new dao();
            $_SESSION['scate']=$scate;
            $detasubc=$objDAO->detasubc($scate);
             $_SESSION['detasubc']=$detasubc;
            header('Location: ../view/editarsubcate.php');
             break;
         case 18:
              unset($_SESSION['detatari']);
             $codtari=$_REQUEST['codtari'];
            $objDAO=new dao();
            $_SESSION['codtari']=$codtari;
            $detatari=$objDAO->detatari($codtari);
             $_SESSION['detatari']=$detatari;
            header('Location: ../view/editatarifa.php');
             break;
         case 19:
             unset($_SESSION['buscar']);
        $objDAO=new dao();
        $letra=$_REQUEST['letra'];
        $_SESSION['letra']=$letra;
        $buscar=$objDAO->buscar($letra);
        $_SESSION['buscar']=$buscar;
        header('Location: ../view/busqueda.php');
        break;
            
         default:
               header('Location: ../view/index.php');
             break;
}
?>
