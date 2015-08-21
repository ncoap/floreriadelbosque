use fdelbosque;
--categorias

insert into categoria(codcat,nomcate,nomcati) values('c001','Cajas y Ramos','Boxes and Ramos');
insert into categoria(codcat,nomcate,nomcati) values('c002','Arreglos','Arrangements');
insert into categoria(codcat,nomcate,nomcati) values('c003','Bébes y Niños','Babies and Children');
insert into categoria(codcat,nomcate,nomcati) values('c004','Especiales','Special');
insert into categoria(codcat,nomcate,nomcati) values('c005','Condolencias','Condolences');
insert into categoria(codcat,nomcate,nomcati) values('c006','Institucional','Institutional');
insert into categoria(codcat,nomcate,nomcati) values('c007','Ofertas de Temporada','Season Offers');
insert into categoria(codcat,nomcate,nomcati) values('c008','Regalos y Complementos','Gifts and Accessories');

select * from categoria;

--subcategorias

insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc01','Rosas','Roses','c001');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc02','Tulipanes','Tulips','c001');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc03','Girasoles','Sunflowers','c001');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc04','Gerberas','Gerberas','c001');

insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc05','Rosas','Roses','c002');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc06','Tulipanes','Tulips','c002');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc07','Girasoles','Sunflowers','c002');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc08','Gerberas','Gerberas','c002');

insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc09','Bebita','Baby Girl','c003');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc10','Bebito','Bebito','c003');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc11','Niña','Girl','c003');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc12','Niño','Child','c003');

insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc13','Linea Masculina','Men Line','c004');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc14','Linea Zen','Zen Line','c004');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc15','Linea Hogar','Home Line','c004');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc16','Compras con Causa','Puerchases Cause','c004');

insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc17','Lágrimas','Tears','c005');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc18','Coronas','Crowns','c005');

insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc19','Pequeños','Little Ones','c006');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc20','Grandes','Large','c006');

insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc21','Peluches','Stuffed Animals','c008');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc22','Chocolates','Chocolates','c008');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc23','Globos','Ballons','c008');
insert into subcategoria(codsubcat,nomsubcate,nomsubcati,codcat) values('sc24','Vinos','Wines','c008');

select * from subcategoria;
 
 

select * from producto;

select * from producto p, subcategoria s
where p.codsubcat=s.codsubcat and  s.codsubcat='sc04';

insert into tipocambio(cambio) values(3.1);

select * from tipocambio;

select * from tarifas;
insert into tarifas(zona,tarifa) values('LA MOLINA C.C. Camacho','10');
insert into tarifas(zona,tarifa) values('LA MOLINA Camacho','10');
insert into tarifas(zona,tarifa) values('LA MOLINA Sta. Patricia hasta Melgarejo','12');
insert into tarifas(zona,tarifa) values('LA MOLINA Sta. Patricia Bco. de Credito','15');
insert into tarifas(zona,tarifa) values('LA MOLINA VIÑAS','14');
insert into tarifas(zona,tarifa) values('LA MOLINA La Capilla','16');
insert into tarifas(zona,tarifa) values('LA MOLINA Rinconada-Las Praderas','19');
insert into tarifas(zona,tarifa) values('LA MOLINA La Planicie-Sol de la Molina','20');
insert into tarifas(zona,tarifa) values('SURCO C.C. EL POLO','11');
insert into tarifas(zona,tarifa) values('SURCO Monterrico','11');
insert into tarifas(zona,tarifa) values('SURCO Valle Hermoso','13');
insert into tarifas(zona,tarifa) values('SURCO Alamos','15');
insert into tarifas(zona,tarifa) values('SURCO Chacarilla-Gardenias','14');
insert into tarifas(zona,tarifa) values('SURCO Higuereta','18');
insert into tarifas(zona,tarifa) values('SURCO Casuarinas Baja, Alta y Sur','16');
insert into tarifas(zona,tarifa) values('SURCO Pueblo','22');
insert into tarifas(zona,tarifa) values('SURCO Bolichera','20');
insert into tarifas(zona,tarifa) values('ATE Salamanca','10');
insert into tarifas(zona,tarifa) values('ATE Vulcano','15');
insert into tarifas(zona,tarifa) values('ATE Mayorazgo 1era y 2da Etapa','16');
insert into tarifas(zona,tarifa) values('ATE Mayorazgo 3era y 4ta Etapa','16');
insert into tarifas(zona,tarifa) values('ATE Vitarte','18');
insert into tarifas(zona,tarifa) values('SAN BORJA Castilla-Boulevard hasta Av.San Luis','20');
insert into tarifas(zona,tarifa) values('SAN BORJA Pentagonito','10');
insert into tarifas(zona,tarifa) values('SAN BORJA Torres de Limatambo','12');
insert into tarifas(zona,tarifa) values('SAN LUIS Cahuache-Villa Jardin','15');
insert into tarifas(zona,tarifa) values('SAN LUIS Resto','13');
insert into tarifas(zona,tarifa) values('SAN ISIDRO Corpac','15');
insert into tarifas(zona,tarifa) values('SAN ISIDRO Arona hasta Av. Arequipa','17');
insert into tarifas(zona,tarifa) values('LINCE','18');
insert into tarifas(zona,tarifa) values('SANTA ANITA Ficus','16');
insert into tarifas(zona,tarifa) values('SANTA ANITA Productores','19');
insert into tarifas(zona,tarifa) values('LA VICTORIA Sta. Catalina-Balconcillos','16');
insert into tarifas(zona,tarifa) values('LA VICTORIA Resto','20');
insert into tarifas(zona,tarifa) values('SURQUILLO','17');
insert into tarifas(zona,tarifa) values('MIRAFLORES La Aurora','18');
insert into tarifas(zona,tarifa) values('MIRAFLORES Larco-Santa Cruz','20');
insert into tarifas(zona,tarifa) values('LIMA Santa Beatriz','20');
insert into tarifas(zona,tarifa) values('JESUS MARIA','22');
insert into tarifas(zona,tarifa) values('AEROPUERTO','50');
insert into tarifas(zona,tarifa) values('ANCON','80');
insert into tarifas(zona,tarifa) values('ATE Santa Clara','45');
insert into tarifas(zona,tarifa) values('BARRANCO','25');
insert into tarifas(zona,tarifa) values('BREÑA','24');
insert into tarifas(zona,tarifa) values('CALLAO Centro-La Perla-CD Legua-Bellavista','35');
insert into tarifas(zona,tarifa) values('CALLAO Gambeta','55');
insert into tarifas(zona,tarifa) values('CALLAO La Punta','45');
insert into tarifas(zona,tarifa) values('CALLAO Santa Rosa','45');
insert into tarifas(zona,tarifa) values('CARABAYLLO','60');
insert into tarifas(zona,tarifa) values('CHACLACAYO Ñaña-Carapongo','45');
insert into tarifas(zona,tarifa) values('CHACLACAYO El Cuadro','55');
insert into tarifas(zona,tarifa) values('CHORRILLOS Cedros','26');
insert into tarifas(zona,tarifa) values('CHORRILLOS Matellini-Campiña','25');
insert into tarifas(zona,tarifa) values('CHORRILLOS Pantanos','30');
insert into tarifas(zona,tarifa) values('CIENEGUILLA','50');
insert into tarifas(zona,tarifa) values('COMAS Collique','55');
insert into tarifas(zona,tarifa) values('COMAS Santa Luzmila','55');
insert into tarifas(zona,tarifa) values('EL AGUSTINO','21');
insert into tarifas(zona,tarifa) values('HUAROCHIRI Santa Eulalia','70');
insert into tarifas(zona,tarifa) values('INDEPENDENCIA','40');
insert into tarifas(zona,tarifa) values('LIMA Centro','25');
insert into tarifas(zona,tarifa) values('LIMA Palomino-Cipreses-Industrial','30');
insert into tarifas(zona,tarifa) values('LOS OLIVOS Palmeras','40');
insert into tarifas(zona,tarifa) values('LOS OLIVOS Pro','50');
insert into tarifas(zona,tarifa) values('Lurigancho Cajamarquilla','40');
insert into tarifas(zona,tarifa) values('Lurigancho Chosica','55');
insert into tarifas(zona,tarifa) values('Lurigancho Huachipa','45');
insert into tarifas(zona,tarifa) values('LURIN Pachacamac','50');
insert into tarifas(zona,tarifa) values('MAGDALENA','25');
insert into tarifas(zona,tarifa) values('PUEBLO LIBRE','24');
insert into tarifas(zona,tarifa) values('RIMAC','35');
insert into tarifas(zona,tarifa) values('S.J.L. Canto Grande-Bayovar','40');
insert into tarifas(zona,tarifa) values('S.J.L. Jicamarca','55');
insert into tarifas(zona,tarifa) values('S.J.L. Las Flores-Mangomarca','32');
insert into tarifas(zona,tarifa) values('S.J.L. Campoy-Zarate','29');
insert into tarifas(zona,tarifa) values('S.J.M. Pamplona Baja Ciudad de Dios-CT-Valle Sharon','25');
insert into tarifas(zona,tarifa) values('S.J.M. Pamplona Alta','30');
insert into tarifas(zona,tarifa) values('S.J.M. Umamarca-Cementerio Santa Rosa-Alemana','30');
insert into tarifas(zona,tarifa) values('S.M.P Ingenieria-Pacifico','36');
insert into tarifas(zona,tarifa) values('S.M.P. San Diego','42');
insert into tarifas(zona,tarifa) values('SAN ISIDRO Pezet-Orrantia','21');
insert into tarifas(zona,tarifa) values('SAN MIGUEL Maranga','28');
insert into tarifas(zona,tarifa) values('SAN MIGUELL Pando','25');
insert into tarifas(zona,tarifa) values('V.E.S. 1ero Mayo-Villa Rica','40');
insert into tarifas(zona,tarifa) values('V.E.S. Velasco Alvarado hasta Av. Vallejo','45');
insert into tarifas(zona,tarifa) values('V.E.S. Oasis-Ovalo Las Palomas-Urb. Pachacamac','50');
insert into tarifas(zona,tarifa) values('V.M.T. Cementos Lima-Jose Galvez','45');
insert into tarifas(zona,tarifa) values('V.M.T. J.C. Mariategui-San Gabriel','32');
insert into tarifas(zona,tarifa) values('V.M.T. Tablada-Nueva Esperanza','35');
insert into tarifas(zona,tarifa) values('VENTANILLA','70');








