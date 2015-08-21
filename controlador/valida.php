<?php 
if(isset($_REQUEST['accion'])){
        $accion=$_REQUEST['accion'];
    }else{
        header('Location: ../vista/index.php');
    }
  include '../util/util.php';
  session_start();

 $cnx=new util();
             $cn=$cnx->getConexion();

$tildes = $cn->query("SET NAMES 'utf8'");

switch ($accion) {    
     case 'editar':               
         $ruta="../produc/";
         $codpro=$_REQUEST['codpro'];
        $archivo1=@$_FILES['imagen1']['tmp_name'];
        $archivo2=@$_FILES['imagen2']['tmp_name'];
        $archivo3=@$_FILES['imagen3']['tmp_name'];
        $nom_archivo1=@$_FILES['imagen1']['name'];
        $nom_archivo2=@$_FILES['imagen2']['name'];
        $nom_archivo3=@$_FILES['imagen3']['name'];
        $ext1=  pathinfo($nom_archivo1);
        $ext2=  pathinfo($nom_archivo2);
        $ext3=  pathinfo($nom_archivo3);
        move_uploaded_file($archivo1, $ruta . "/" . $codpro . "a." . @$ext1['extension']);
        move_uploaded_file($archivo2, $ruta . "/" . $codpro . "b." . @$ext2['extension']);
        move_uploaded_file($archivo3, $ruta . "/" . $codpro . "c." . @$ext3['extension']);
        $foto1 = $codpro.'a.jpg';
        $foto2 = $codpro.'b.jpg';
        $foto3 = $codpro.'c.jpg';
        if($_FILES['imagen2']['name']=='' and $_FILES['imagen3']['name']==''){
            $foto2=' ';
            $foto3=' ';
        }
        $codvent=$_REQUEST['codvent'];
        $nomproe=$_REQUEST['nomproe'];
        $desproe=$_REQUEST['desproe'];
        $nomproi=$_REQUEST['nomproi'];       
        $desproi=$_REQUEST['desproi'];
        $estado=$_REQUEST['estado'];
        $stock=$_REQUEST['stock'];       
        $precio=$_REQUEST['precio'];
        $res=$cn->prepare("call sp_editar(:cod,:nome,:dese,:nomi,:desi,:estad,:stok,:prec,:img1,:img2,:img3,:codven)");
        $res->bindParam(':cod', $codpro); 
        $res->bindParam(':nome', $nomproe); 
        $res->bindParam(':dese', $desproe);
        $res->bindParam(':nomi', $nomproi);
        $res->bindParam(':desi', $desproi);
        $res->bindParam(':estad', $estado);   
        $res->bindParam(':stok', $stock);
        $res->bindParam(':prec', $precio);
        $res->bindParam(':img1', $foto1);
        $res->bindParam(':img2', $foto2); 
        $res->bindParam(':img3', $foto3); 
        $res->bindParam(':codven', $codvent); 
        $res->execute();
        header('refresh:0; url=../vista/productos.php');
        break;
    case 'insertar':
        $ruta="../produc/";
        $codpro=$_REQUEST['codpro'];
        $archivo1=@$_FILES['imagen1']['tmp_name'];
        $archivo2=@$_FILES['imagen2']['tmp_name'];
        $archivo3=@$_FILES['imagen3']['tmp_name'];
        $nom_archivo1=@$_FILES['imagen1']['name'];
        $nom_archivo2=@$_FILES['imagen2']['name'];
        $nom_archivo3=@$_FILES['imagen3']['name'];
        $ext1=  pathinfo($nom_archivo1);
        $ext2=  pathinfo($nom_archivo2);
        $ext3=  pathinfo($nom_archivo3);
        move_uploaded_file($archivo1, $ruta . "/" . $codpro . "a." . @$ext1['extension']);
        move_uploaded_file($archivo2, $ruta . "/" . $codpro . "b." . @$ext2['extension']);
        move_uploaded_file($archivo3, $ruta . "/" . $codpro . "c." . @$ext3['extension']);
        $foto1 = $codpro.'a.jpg';
        $foto2 = $codpro.'b.jpg';
        $foto3 = $codpro.'c.jpg';
        if($_FILES['imagen2']['name']=='' and $_FILES['imagen3']['name']==''){
            $foto2=' ';
            $foto3=' ';
        }
        $time = time();
        $codvent=$_REQUEST['codvent'];
        $nomproe=$_REQUEST['nomproe'];
        $desproe=$_REQUEST['desproe'];
        $nomproi=$_REQUEST['nomproi'];       
        $desproi=$_REQUEST['desproi'];
        $estado=$_REQUEST['estado'];
        $stock=$_REQUEST['stock'];       
        $precio=$_REQUEST['precio'];
        $codsubcat=$_REQUEST['codsubcat'];
        $res=$cn->prepare("call sp_insertarpro(:cod,:nome,:dese,:nomi,:desi,:fingre,:estad,:stok,:prec,:codscat,:img1,:img2,:img3,:codven)");
        $res->bindParam(':cod', $codpro); 
        $res->bindParam(':nome', $nomproe); 
        $res->bindParam(':dese', $desproe);
        $res->bindParam(':nomi', $nomproi);
        $res->bindParam(':desi', $desproi);
        $res->bindParam(':fingre', date("Y-m-d (H:i:s)", $time));
        $res->bindParam(':estad', $estado);   
        $res->bindParam(':stok', $stock);
        $res->bindParam(':prec', $precio);
        $res->bindParam(':codscat', $codsubcat);
         $res->bindParam(':img1', $foto1);
        $res->bindParam(':img2', $foto2); 
        $res->bindParam(':img3', $foto3);     
        $res->bindParam(':codven', $codvent); 
        $res->execute();
        header("Location: ../vista/productos.php");
         
        break;
    case 'nuevacate':
        $catego=$_REQUEST['select_cat'];
        $codsubcat=$_REQUEST['codscat'];
        $nomscate=$_REQUEST['nomscate'];
        $nomscati=$_REQUEST['nomscati'];
        $res=$cn->prepare("call insertar_subcate(:codc,:nomscate,:nomscati,:codct)");
        $res->bindParam(":codc", $codsubcat);
        $res->bindParam(":nomscate", $nomscate);
        $res->bindParam(":nomscati", $nomscati);
        $res->bindParam(":codct", $catego);
        $res->execute();
        header('refresh:0; url=../vista/subcategoria.php');
        break;
    
    case 'editacate':
        
        $estado=$_REQUEST['select_est'];
        $codsubcat=$_REQUEST['codscat'];
        $nomscate=$_REQUEST['nomscate'];
        $nomscati=$_REQUEST['nomscati'];
        $res=$cn->prepare("call edita_subcate(:codc,:nomscate,:nomscati,:esta)");
        $res->bindParam(":codc", $codsubcat);
        $res->bindParam(":nomscate", $nomscate);
        $res->bindParam(":nomscati", $nomscati);
        $res->bindParam(":esta", $estado);
        $res->execute();
        header('refresh:0; url=../vista/micuenta.php');
        break;
    
    case 'acttipo':
        $tipo=$_REQUEST['tipoc'];
        $res=$cn->prepare("call acttipo(:camb);");
        $res->bindParam(":camb", $tipo);
        $res->execute();
        header('Location: ../vista/index.php');
        break;
    case 'actdatos1':
        $codu=$_SESSION['codusu'];
        $tele=$_REQUEST['txttele'];
        $direc=$_REQUEST['txtdirec'];
        $correo=$_REQUEST['txtcorreo'];
        $pass=$_REQUEST['txtpass'];
        $npass=$_REQUEST['txtnpass'];
        $res=$cn->prepare("call actdados1(:codu,:telef,:direcc,:corre,:pas);");
        if($_REQUEST['txtnpass']==''){
            $res->bindParam(":codu", $codu);
        $res->bindParam(":telef", $tele);
        $res->bindParam(":direcc", $direc);
        $res->bindParam(":corre", $correo);
        $res->bindParam(":pas", $pass);
        }else{
        $res->bindParam(":codu", $codu);
        $res->bindParam(":telef", $tele);
        $res->bindParam(":direcc", $direc);
        $res->bindParam(":corre", $correo);
        $res->bindParam(":pas", $npass);
        
        }$res->execute();
        header('Location: ../vista/micuenta.php');
        break;
        case 'borrahist';
            $codusu=$_SESSION['codusu'];
            $res=$cn->prepare("call borrahist(:codus)");
            $res->bindParam(":codus",$codusu);
            $res->execute();
            header("Location: ../vista/micuenta.php");
            break;
        case 'aprueped':
            $codpedido=$_REQUEST['codpedido'];
           $res=$cn->prepare("call aprueped(:codped)");
            $res->bindParam(":codped",$codpedido);
            $res->execute();
            header("Location: ../vista/pedidos.php");
            break;
        case 'editatarifa':
            $codtari=$_REQUEST['codtari'];
            $zona=$_REQUEST['zona'];
            $tarifa=$_REQUEST['tarifa'];
            $select_est=$_REQUEST['select_est'];
            $res=$cn->prepare("call edita_tari(:codt ,:zon,:tari,:est)");
            $res->bindParam(":codt", $codtari);
            $res->bindParam(":zon", $zona);
            $res->bindParam(":tari", $tarifa);
            $res->bindParam(":est", $select_est);
            $res->execute();
            header('refresh:0; url=../vista/tarifas.php');
            break;
         case 'nuevatarifa':
            $zona=$_REQUEST['zona'];
            $tarifa=$_REQUEST['tarifa'];
            $res=$cn->prepare("call nueva_tari(:zon,:tari)");
            $res->bindParam(":zon", $zona);
            $res->bindParam(":tari", $tarifa);
            $res->execute();
            header('refresh:0; url=../vista/tarifas.php');
            break;
        case 'datbanco':
            $propi=$_REQUEST['pro'];
            $banco=$_REQUEST['ban'];
            $cuent=$_REQUEST['cuen'];
            $inter=$_REQUEST['inter'];
            $res=$cn->prepare("call datbanco(:pro,:ban, :cue1, :cue2)");
            $res->bindParam(":pro", $propi);
            $res->bindParam(":ban", $banco);
            $res->bindParam(":cue1", $cuent);
            $res->bindParam(":cue2", $inter);
            $res->execute();
            header('refresh:0; url=../vista/tipocambio.php');
            break;
    default :
         header('Location: ../vista/index.php');
        break;
}

?>
