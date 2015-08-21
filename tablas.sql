create database fdelbosque CHARACTER SET utf8 COLLATE utf8_general_ci;

use fdelbosque;

create table categoria(
codcat char(5) primary key not null,
nomcate varchar(30) not null,
nomcati varchar(30) not null
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

create table subcategoria(
codsubcat char(5) primary key not null,
nomsubcate varchar(30) not null,
nomsubcati varchar(30) not null,
codcat char(5) not null,
estado char(1) not null default 'A',
foreign key(codcat) references categoria(codcat)
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

create table datosbanco(
propietario varchar(50) not null,
banco varchar(30) not null,
cuenta varchar(80),
cuentainter varchar(80) not null
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

insert into datosbanco values('HARRY MEZA CARBAJAL','BCP','193 31834194 049','002 193131834194049 17');


create table tipocambio(
cambio double not null
);

create table producto(
codpro char(6) primary key not null,
nomproe varchar(20) not null,
desproe varchar(500) not null,
nomproi varchar(20) not null,
desproi varchar(500) not null,
fechIngre timestamp DEFAULT CURRENT_TIMESTAMP not null,
estado char(1) DEFAULT 'A',
stock int not null,
precio double not null,
codsubcat char(5) not null,
imagen1 varchar(30) not null,
imagen2 varchar(30) not null,
imagen3 varchar(30) not null,
codvent char(6) not null,
foreign key(codsubcat) references subcategoria(codsubcat)
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

create procedure sp_insertarpro(
cod char(6),
nome varchar(20),
dese varchar(500),
nomi varchar(20),
desi varchar(500),
fingre timestamp,
estad char(1),
stok int,
prec double,
codscat char(5),
img1 varchar(30),
img2 varchar(30),
img3 varchar(30),
codven char(6)
)
insert into producto values(cod,nome,dese,nomi,desi,fingre,estad,stok,prec,codscat,img1,img2,img3,codven);

create procedure insertar_subcate(
codc char(5),
nomscate varchar(30),
nomscati varchar(30),
codct char(5)
)
insert into subcategoria (codsubcat,nomsubcate,nomsubcati,codcat)values(codc,nomscate,nomscati,codct);

create procedure edita_subcate(
codc char(5),
nomscate varchar(30),
nomscati varchar(30),
esta char(1)
)
update subcategoria set nomsubcate=nomscate,nomsubcati=nomscati,estado=esta
where codsubcat=codc;

 


create procedure sp_editar(
cod char(6),
nome varchar(20),
dese varchar(500),
nomi varchar(20),
desi varchar(500),
estad char(1),
stok int,
prec double,
img1 varchar(30),
img2 varchar(30),
img3 varchar(30),
codven char(6)
)
update producto set nomproe=nome,desproe=dese,nomproi=nomi,desproi=desi ,estado=estad , stock=stok ,precio=prec,imagen1=img1,imagen2=img2,imagen3=img3,codvent=codven
where cod=codpro;





create procedure listUltim()
select codpro,nomproe,precio,round((precio*t.cambio),1) as soles,imagen1 ,p.codvent,nomproi from producto p , tipocambio t
where estado='A'
order by fechIngre desc limit 5;

 



create procedure detapro(codp char(6))
select codpro,nomproe,desproe,nomproi,desproi,fechingre,estado,stock,precio,codsubcat,imagen1,imagen2,imagen3, round((precio*t.cambio),1) as soles,p.codvent 
from producto p , tipocambio t where codpro=codp;

 


create procedure proxsub(codsub char(5))
select codpro,nomproe,desproe,nomproi,desproi,fechingre,p.estado,stock,precio,s.codsubcat,imagen1,round((precio*t.cambio),1) as soles,p.codvent,s.nomsubcate,s.nomsubcati  
from producto p, subcategoria s,tipocambio t
where p.codsubcat=s.codsubcat and  s.codsubcat=codsub
and p.estado='A';

 
 



create procedure subxcate(cod char(5))
select codsubcat,nomsubcate,nomsubcati from subcategoria s,categoria c
where s.codcat=c.codcat and c.codcat=cod;


 










create table usuario(
codusu char(9) not null primary key,
nomusu varchar(40) not null,
apeusu varchar(40) not null,
dni char(9) unique  not null,
rol char(3)  default 'U' not null,
sexo char(1) not null,
telefono char(10) not null,
direccion varchar(50) not null,
email varchar(50) unique not null,
pass varchar(20) not null
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

insert into usuario (codusu,nomusu,apeusu,dni,sexo,telefono,direccion,email,pass)
values ('US00001','Cristians','Bregante','75546257','M','981604223','Jr. Las micas 468 SJL','cristival_2008_@hotmail.com','libido');
insert into usuario (codusu,nomusu,apeusu,dni,sexo,telefono,direccion,email,pass)
values ('US00002','Laura','Castillo Naranjo','54587489','f','999999999','Jr. nose nose xd','laura@delbosque.com','admin123');

select * from usuario;

create procedure actdados1(
codu char(9),
telef char(10),
direcc varchar(50),
corre varchar(50),
pas varchar(20)
)
update usuario set telefono=telef, direccion=direcc, email=corre,pass=pas
where codusu=codu;

create procedure buscarmail(mail varchar(50))
select email,pass,nomusu from usuario where email=mail;

create procedure buscardni(dn char(9))
select dni from usuario where dni=dn;



create procedure nuevousu(
codus char(9),
nomus varchar(40),
apeus varchar(40),
dn char(9),
sex char(1),
telef char(10),
direcc varchar(50),
mail varchar(50),
pas varchar(20)
)insert into usuario (codusu,nomusu,apeusu,dni,sexo,telefono,direccion,email,pass)
values(codus,nomus,apeus,dn,sex,telef,direcc,mail,pas);


create procedure lisusuxcod(cod char(9))
select * from usuario where codusu=cod;
 

create procedure LogeUsu(mail varchar(50), pas varchar(20))
select * from usuario where email=mail and pass=pas;
 

create procedure acttipo(camb double)
update tipocambio set cambio=camb;


create table pedido(
codpedido char(9) not null  primary key ,
codusu char(9) not null,
cantot int not null,
fechaPed  timestamp DEFAULT CURRENT_TIMESTAMP not null,
montoTotal double not null,
datosdestin varchar(50) not null,
telefentre char(10) not null,
tarifa double not null,
direcentre varchar(150) not null,
referencia varchar(50) not null,
fechaentreg  date not null,
horarioentre varchar(20) not null,
mensaje varchar(150) not null,
estado char(1) default 'N' not null,
montoTotalsoles double not null,
tarifasoles double not null,
ver char(1) default 'P',
foreign key(codusu) references usuario(codusu)
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


create table detpedido(
codpedido char(9) not null,
codpro char(6) not null,
precuni double not null,
cantidad int not null,
foreign key(codpedido) references pedido(codpedido),
foreign key(codpro) references producto(codpro)
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


create table tarifas(
codta int not null AUTO_INCREMENT,
zona varchar(100) not null,
tarifa double,
estado char(1) default 'A',
primary key(codta)
)DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

create procedure detaxcod(codped char(9))
select p.codpro,p.nomproe,d.precuni,d.cantidad,p.imagen1,p.codvent,p.nomproi from producto p, detpedido d
where p.codpro=d.codpro and codpedido=codped;

create procedure pedxcod(codped char(9))
select codpedido,codusu,cantot,fechaped,montototal,datosdestin,telefentre,tarifa,direcentre,referencia,fechaentreg,horarioentre,mensaje,estado,montototalsoles,tarifasoles
from pedido where codpedido=codped; 

 

create procedure pedxusu(codus char(9))
select * from pedido where codusu=codus order by fechaped desc;
 


create procedure pedxfecha(
fec1 date,
fec2 date
)
select * from pedido where fechaped >=  CONVERT(fec1,DATETIME) AND  fechaped <=  CONCAT(fec2,' 23:59:59') order by fechaped desc;


create procedure pedxfecentr(
fec1 date,
fec2 date
)
select * from pedido where fechaentreg between fec1 and fec2 order by fechaped desc;


create procedure pediapro()
select * from pedido where estado ='A' order by fechaped desc;

create procedure pedipend()
select * from pedido where estado ='N' order by fechaped desc;


create procedure pediall()
select * from pedido order by fechaped desc;


create procedure allusuarios()
select * from usuario;

create procedure allproduct()
select codpro,nomproe,desproe,nomproi,desproi,fechingre,p.estado,stock,precio,s.nomsubcate,p.codvent from producto p ,subcategoria s
where p.codsubcat=s.codsubcat;


create procedure pedxusu2(codus char(9))
select * from pedido where codusu=codus and estado='A' and ver='P' order by fechaped desc;


create procedure borrahist(codus char(9))
update pedido set ver='D' where codusu=codus; 

create procedure aprueped(codped char(9))
update pedido set estado='A' where codpedido=codped; 

create procedure detasubc(codsubc char (5))
select * from subcategoria where  codsubcat=codsubc;

create procedure detatari(codtari int)
select * from tarifas where codta=codtari; 

create procedure edita_tari(
codt int,
zon varchar(100),
tari double,
est char(1))
update tarifas set  zona=zon,tarifa=tari,estado=est
where codta=codt;
 
create procedure nueva_tari(
zon varchar(100),
tari double
)
insert into tarifas (zona,tarifa) values(zon,tari);



create procedure buscar(letra varchar(50))
select codpro,nomproe,desproe,nomproi,desproi,fechingre,estado,stock,precio,codsubcat,imagen1,imagen2,imagen3, round((precio*t.cambio),1) as soles,p.codvent,p.nomproi  
from producto p, tipocambio t where nomproe like concat('%',letra,'%') or nomproi like concat('%',letra,'%');




create procedure datbanco(pro varchar(50), ban varchar(30),cue1 varchar(80),cue2 varchar(80))
update datosbanco set propietario=pro, banco=ban, cuenta=cue1, cuentainter=cue2;


