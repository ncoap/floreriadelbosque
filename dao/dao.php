<?php
 header('Location: ../vista/');
include '../util/util.php';
class dao {
   public function listarUlt(){
       $cnx=new util();
       $cn=$cnx->getConexion();
       $res=$cn->prepare("call listUltim");
       $res->execute();
       foreach ($res as $row){
           $lista[]=$row;
       }
       return $lista;
   }
   public function detapro(){
       $cod=$_SESSION['codpro'];
     $cnx=new util();
       $cn=$cnx->getConexion();
       $res=$cn->prepare("call detapro(:codp)");
       $res->bindParam(":codp", $cod);
       $res->execute();
       foreach ($res as $row){
           $detapro[]=$row;
       }
   return $detapro;
   }
   public function proxsub(){
       $codsub=$_SESSION['codsub'];
      $cnx=new util();
      $cn=$cnx->getConexion();
      $res=$cn->prepare("call proxsub(:codsub)");
      $res->bindParam(":codsub", $codsub);
      $res->execute();
      foreach ($res as $row){
          $proxsub[]=$row;
      }
      return $proxsub;
   }
   public function listespeci(){
       $cnx=new util();
       $cn=$cnx->getConexion();
       $res=$cn->prepare("select * from subcategoria s,categoria c
                        where s.codcat=c.codcat and c.codcat='c004';");
       $res->execute();
       foreach ($res as $row){
           $especi[]=$row;
       }
       return $especi;
   }
    public function listbbs(){
       $cnx=new util();
       $cn=$cnx->getConexion();
       $res=$cn->prepare("select * from subcategoria s,categoria c
                        where s.codcat=c.codcat and c.codcat='c003';");
       $res->execute();
       foreach ($res as $row){
           $bbs[]=$row;
       }
       return $bbs;
   }
    public function listcondole(){
       $cnx=new util();
       $cn=$cnx->getConexion();
       $res=$cn->prepare("select * from subcategoria s,categoria c
                        where s.codcat=c.codcat and c.codcat='c005';");
       $res->execute();
       foreach ($res as $row){
           $condole[]=$row;
       }
       return $condole;
   }
    public function logeUsu(){
       $cnx=new util();
       $cn=$cnx->getConexion();
       $email=$_SESSION['email'];
       $pass=$_SESSION['pass'];
       $res=$cn->prepare("call LogeUsu (:email, :pass)");
       $res->bindParam(":email", $email);
       $res->bindParam(":pass", $pass);       
       $res->execute();
       foreach ($res as $row){
           $logeusu[]=$row;
       }
       return $logeusu;
   }
    public function pedxusu(){
       $codus=$_SESSION['codus'];
      $cnx=new util();
      $cn=$cnx->getConexion();
      $res=$cn->prepare("call pedxusu(:codus)");
      $res->bindParam(":codus", $codus);
      $res->execute();
      foreach ($res as $row){
          $pedxusu[]=$row;
      }
      return $pedxusu;
   }
    public function pedxfecha(){
       $fec1=$_SESSION['fec1'];
        $fec2=$_SESSION['fec2'];
        $opp=$_SESSION['opp'];
      $cnx=new util();
      $cn=$cnx->getConexion();
      if($opp=='a'){
      $res=$cn->prepare("call pedxfecha(:fec1, :fec2)");
      }elseif($opp=='b'){
          $res=$cn->prepare("call pedxfecentr(:fec1, :fec2)");
      }
      $res->bindParam(":fec1", $fec1);
      $res->bindParam(":fec2", $fec2);
      $res->execute();
      foreach ($res as $row){
          $pedxfecha[]=$row;
      }
      return $pedxfecha;
   }
    public function pediapro(){
       $cnx=new util();
       $cn=$cnx->getConexion();
       $res=$cn->prepare("call pediapro");
       $res->execute();
       foreach ($res as $row){
           $pediapro[]=$row;
       }
       return $pediapro;
   }
    public function pedipend(){
       $cnx=new util();
       $cn=$cnx->getConexion();
       $res=$cn->prepare("call pedipend");
       $res->execute();
       foreach ($res as $row){
           $pedipend[]=$row;
       }
       return $pedipend;
   }
    public function pediall(){
       $cnx=new util();
       $cn=$cnx->getConexion();
       $res=$cn->prepare("call pediall");
       $res->execute();
       foreach ($res as $row){
           $pediall[]=$row;
       }
       return $pediall;
   }
   public function pedxcod(){
       $codpe=$_SESSION['codpe'];
      $cnx=new util();
      $cn=$cnx->getConexion();
      $res=$cn->prepare("call pedxcod(:codpe)");
      $res->bindParam(":codpe", $codpe);
      $res->execute();
      foreach ($res as $row){
          $pedxcod[]=$row;
      }
      return $pedxcod;
   }
    public function pedxusu2(){
       $codus=$_SESSION['codusu'];
      $cnx=new util();
      $cn=$cnx->getConexion();
      $res=$cn->prepare("call pedxusu2(:codus)");
      $res->bindParam(":codus", $codus);
      $res->execute();
      foreach ($res as $row){
          $pedxusu2[]=$row;
      }
      return $pedxusu2;
   }
   public function detasubc(){
       $scate=$_SESSION['scate'];
     $cnx=new util();
       $cn=$cnx->getConexion();
       $res=$cn->prepare("call detasubc(:scate)");
       $res->bindParam(":scate", $scate);
       $res->execute();
       foreach ($res as $row){
           $detasubc[]=$row;
       }
   return $detasubc;
   }
    public function detatari(){
       $codtari=$_SESSION['codtari'];
     $cnx=new util();
       $cn=$cnx->getConexion();
       $res=$cn->prepare("call detatari(:codtari)");
       $res->bindParam(":codtari", $codtari);
       $res->execute();
       foreach ($res as $row){
           $detatari[]=$row;
       }
   return $detatari;
   }
    public function buscar(){
       $letra=$_SESSION['letra'];
      $cnx=new util();
      $cn=$cnx->getConexion();
      $res=$cn->prepare("call buscar(:letra)");
      $res->bindParam(":letra", $letra);
      $res->execute();
      foreach ($res as $row){
          $buscar[]=$row;
      }
      return $buscar;
   }
}

?>
