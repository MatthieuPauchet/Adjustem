DROP DATABASE devis_adjustem;

CREATE DATABASE devis_adjustem;

USE devis_adjustem;

CREATE TABLE rubrique(
   rub_id INT AUTO_INCREMENT NOT NULL,
   rub_nom VARCHAR(50),
   rub_descriptif VARCHAR(250),
   rub_rub_id INT,
   PRIMARY KEY(rub_id),
   FOREIGN KEY(rub_rub_id) REFERENCES rubrique(rub_id)
);


INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (1, 'menuiserie','contiendra les sous rubriques propres à menuiserie',NULL);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (2,'volet roulant','contiendra tous les sous-rubriques propre aux volets roulants',NULL);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (3,'ventail','contiendra les sous rubriques ouvertures, entrée d''air, aspect verre, croissillon',NULL);


INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (4, 'type de pose','plusieurs options comme pose en neuf, réhabiliation, rénovation...',1);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (5, 'type de menuiserie','choix entre fenêtres, porte-fenêtre, baie vitrée, porte d''entrée, etc...',1);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (6, 'matière','de type bois, pvc, aluminium, mixte...',1);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (7, 'couleur intérieure','plusieurs RAL au choix pour être différent de la couleur extérieure !',1);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (8, 'couleur extérieure','plusieurs RAL au choix pour être différent de la couleur intérieure !',1);

INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (9,'couleur volet roulant','contiendra les sous rubriques couleurs des lames intérieures et extérieures ainsi que le coffre',2);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (10,'type de manoeuvre de volet roulant','contiendra les sous rubriques volet roulant électriques ou manuel',2);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (11, 'matière des lames','les différents types de matières plus ou moins isolantes',2);

INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (12, 'couleur lame intérieure','plusieurs RAL au choix pour être différent de la couleur extérieure !',4);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (13, 'couleur lame extérieure','plusieurs RAL au choix pour être différent de la couleur extérieure !',4);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (14, 'couleur coffre','couleur du coffre de volet roulant à l''intérieure',4);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (15, 'manoeuvre manuelle','les différents types de manoeuvre manuelle',5);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (16, 'manoeuvre électrique','les différents types de manoeuvre électriques',5);


INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (18, 'type ouverture','les différents types d''ouvertures - coulissant, battant, oscillo, fixe, etc...',3);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (19, 'entrée d''air','au choix sans ou avec un volume défini en m3/h',3);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (20, 'aspect verre','peut-être normal, opaque, etc...',3);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (21, 'épaisseur croisillons','au choix sans ou avec une certaines épaisseurs définies',3);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (22, 'couleur des croisillons','les différentes couleures de croisillon',3);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (23, 'poignées','les différentes types de poignées',3);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (24, 'fenêtre 1 vantail', 'ouverture battant, OB, fixe, oscillant', 3);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (25, 'fenêtre 2 vantaux', 'choix d''ouverture', 3);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (26, 'porte-fenêtre 1 vantail', 'choix d''ouverture', 3);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (27, 'porte-fenêtre 2 vantaux', 'choix d''ouverture', 3);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (28, 'baie vitrée 2 vantaux', 'choix d''ouverture', 3);
INSERT INTO rubrique(rub_id, rub_nom, rub_descriptif, rub_rub_id) VALUES (29, 'baie vitrée 3 vantaux', 'choix d''ouverture', 3);


CREATE TABLE menuiserie(
   men_id INT AUTO_INCREMENT NOT NULL,
   men_hauteur INT,
   men_largeur INT,
   men_imposte INT,
   men_allege INT,
   men_epaisseur_dormant INT,
   men_nombre_vantaux INT NOT NULL DEFAULT 1 CHECK(men_nombre_vantaux>0),
   men_prix_HT DECIMAL(15,2),
   men_taux_TVA DECIMAL (15,2),
   men_montant_TVA5 DECIMAL (15,2),
   men_montant_TVA20 DECIMAL (15,2),
   men_prix_TTC DECIMAL(15,2),
   men_vit_id INT,
   PRIMARY KEY(men_id),
   FOREIGN KEY(men_vit_id) REFERENCES vitrage(vit_id)
);

CREATE TABLE detail(
   det_id INT AUTO_INCREMENT NOT NULL,
   det_nom VARCHAR(50),
   det_descriptif VARCHAR(250),
   det_prix DECIMAL(11,2) DEFAULT NULL,
   det_coefficient DECIMAL(11,2) DEFAULT NULL,
   det_photo VARCHAR(150),
   det_rub_id INT,
   PRIMARY KEY(det_id),
   FOREIGN KEY(det_rub_id) REFERENCES rubrique(rub_id)
);


insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (1,'Pose en neuf','Cas de construction neuve',0,1,'detail1.png',4);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (2,'Pose en réhabilitation totale','Dépose complète de la menuiserie existante compris bâti',0,1.2,'detail2.png',4);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (3,'Pose en réhabilitation partielle','Dépose uniquement des ouvrants, conservation du bâti',0,0.8,'detail3.png',4);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (4,'fenêtre','fenêtre (prix au m2)',500,0,'detail4.png',5);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (5,'porte-fenêtre','porte-fenêtre (prix au m2)',500,0,'detail5.png',5);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (6,'baie-vitrée','baie-vitrée (prix au m2)',800,0,'detail6.png',5);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (7,'PVC','100% PVC',0,1,'detail7.png',6);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (8,'Aluminium','100% Aluminium',0,1.5,'detail8.png',6);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (9,'Bois','100% Bois, top pour les bobos écolos !',0,1.4,'detail9.png',6);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (10,'Composite','On sait pas trop ce qui le compose mais c\'est sympa et ça fait styler',0,1.15,'detail10.png',6);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (11,'Blanc lisse','RAL 9016',0,1,'detail11.png',7);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (12,'Gris lisse','RAL 7035',0,1,'detail12.png',7);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (13,'Gris anthracite','RAL 7016',0,1,'detail13.png',7);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (14,'Chêne dorée','imitation chêne',0,1.2,'detail14.png',7);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (15,'Blanc lisse','RAL 9016',0,1,'detail15.png',8);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (16,'Gris lisse','RAL 7035',0,1,'detail16.png',8);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (17,'Gris anthracite','RAL 7016',0,1,'detail17.png',8);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (18,'Chêne dorée','imitation chêne',0,1.2,'detail18.png',8);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (19,'PVC','entrée de gamme = pas trop cher',0,1,'detail19.png',11);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (20,'Aluminium','milieu de gamme = un peu plus cher',0,1.4,'detail20.png',11);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (21,'Aluminium thermique','très bien pour les bobos écolos',0,1.5,'detail21.png',11);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (22,'Blanc lisse','RAL 9016',0,1,'detail22.png',9);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (23,'Gris lisse','RAL 7035',0,1,'detail23.png',9);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (24,'Gris anthracite','RAL 7016',0,1,'detail24.png',9);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (25,'Chêne dorée','imitation chêne',0,1.1,'detail25.png',9);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (26,'Blanc lisse','RAL 9016',0,1,'detail26.png',13);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (27,'Gris lisse','RAL 7035',0,1,'detail27.png',13);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (28,'Gris anthracite','RAL 7016',0,1,'detail28.png',13);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (29,'Chêne dorée','imitation chêne',0,1.1,'detail29.png',13);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (30,'Blanc lisse','RAL 9016',0,1,'detail30.png',14);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (31,'Gris lisse','RAL 7035',0,1,'detail31.png',14);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (32,'Gris anthracite','RAL 7016',0,1,'detail32.png',14);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (33,'Chêne dorée','imitation chêne',0,1.1,'detail33.png',14);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (34,'Manuel','maoeuvre avec un treuil',100,0,'detail34.png',10);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (35,'Electrique filaire','avec bouton de commande fixe au mur',150,0,'detail35.png',10);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (36,'Electrique wifi','avec télécommande déplacable',200,0,'detail36.png',10);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (37,'Electrique wifi programmable','avec borne centrale télécommande niveau horaire',250,0,'detail37.png',10);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (38,'Fixe',null,0,0.6,'detail38.png',18);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (39,'Battant',null,0,1,'detail39.png',18);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (40,'Oscillo-battant',null,0,1.2,'detail40.png',18);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (41,'Oscillo',null,0,1.1,'detail41.png',18);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (42,'Coulissant',null,0,1.3,'detail42.png',18);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (43,'Entrée d\'air 15m3/h','utilisé en rénovation pour les bâtiment en VMC simple flux',10,0,'detail43.png',19);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (44,'Entrée d\'air 30m3/h','utilisé en rénovation pour les bâtiment en VMC simple flux',12,0,'detail44.png',19);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (45,'Entrée d\'air 45m3/h','utilisé en rénovation pour les bâtiment en VMC simple flux',15,0,'detail45.png',19);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (46,'Entrée d\'air 15m3/h auto-régulable','utilisé en rénovation pour les bâtiment en VMC simple flux',15,0,'detail46.png',19);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (47,'Entrée d\'air 30m3/h auto-régulable','utilisé en rénovation pour les bâtiment en VMC simple flux',18,0,'detail47.png',19);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (48,'Entrée d\'air 45m3/h  auto-régulable','utilisé en rénovation pour les bâtiment en VMC simple flux',20,0,'detail48.png',19);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (49,'Clair','finition vitrage classique',0,1,'detail49.png',20);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (50,'Opaque','finition flouté utilisé pour salle de bain généralement',0,1.02,'detail50.png',20);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (51,'Dépoli','finition proche opaque mais différente !',0,1.12,'detail51.png',20);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (52,'Aucun',null,0,1,'detail52.png',21);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (53,'Incorporé 10mm',null,0,1.05,'detail53.png',21);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (54,'Incorporé 26mm',null,0,1.1,'detail54.png',21);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (55,'Collé 28mm',null,0,1.2,'detail55.png',21);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (56,'Incorporé 45mm',null,0,1.13,'detail56.png',21);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (57,'Blanc lisse','RAL 9016',0,1,'detail57.png',22);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (58,'Gris lisse','RAL 7035',0,1,'detail58.png',22);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (59,'Gris anthracite','RAL 7016',0,1,'detail59.png',22);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (60,'Poignée pvc',null,0,1,'detail60.png',23);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (61,'Poignée pvc à clé',null,0,1.02,'detail61.png',23);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (62,'Poignée alu',null,0,1.04,'detail62.png',23);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (63,'Poignée alu à clé',null,0,1.06,'detail63.png',23);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (64,'Simple fixe',null,0,0.8,'detail64.png',24);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (65,'Oscillo-battant tirant droit',null,0,1,'detail65.png',24);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (66,'Oscillo-battant tirant gauche',null,0,1,'detail66.png',24);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (67,'Fixe + oscillo-battant',null,0,1,'detail67.png',25);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (68,'Battant + oscillo-battant',null,0,1,'detail68.png',25);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (69,'Battant tirant droit',null,0,1,'detail69.png',26);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (70,'Battant tirant gauche',null,0,1,'detail70.png',26);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (71,'oscillo-battant tirant droit',null,0,1.02,'detail71.png',26);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (72,'oscillo-battant tirant gauche',null,0,1.02,'detail72.png',26);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (73,'Fixe + battant tirant droit',null,0,1,'detail73.png',27);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (74,'Fixe + battant tirant gauche',null,0,1,'detail74.png',27);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (75,'Double battant',null,0,1.02,'detail75.png',27);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (76,'Battant+OB tirant droit',null,0,1.04,'detail76.png',27);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (77,'Battant+OB tirant gauche',null,0,1.04,'detail77.png',27);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (78,'Fixe + Coulissant droite',null,0,1,'detail78.png',28);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (79,'Fixe + Coulissant gauche',null,0,1,'detail79.png',28);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (80,'Double Fixe + Coulissant droite',null,0,1,'detail80.png',29);
insert into detail (det_id,det_nom,det_descriptif,det_prix,det_coefficient,det_photo,det_rub_id) values (81,'Double Fixe + Coulissant gauche',null,0,1,'detail81.png',29);

CREATE TABLE vitrage(
   vit_id INT AUTO_INCREMENT NOT NULL,
   vit_composition VARCHAR(50),
   vit_sw VARCHAR(50),
   vit_uw VARCHAR(50),
   vit_perf_acoustique INT,
   vit_perf_thermique INT,
   vit_perf_securite VARCHAR(50),
   vit_prix DECIMAL(15,2),
   vit_coefficient DECIMAL(15,2),
   PRIMARY KEY(vit_id)
);

insert into vitrage (vit_id,vit_composition,vit_sw,vit_uw,vit_perf_acoustique,vit_perf_thermique,vit_perf_securite,vit_prix,vit_coefficient) values (1,'Double vitrage clair 4-16-4 FE Argon',0.52,1.3,1,1,1,0,1);
insert into vitrage (vit_id,vit_composition,vit_sw,vit_uw,vit_perf_acoustique,vit_perf_thermique,vit_perf_securite,vit_prix,vit_coefficient) values (2,'Double vitrage clair 10-16-4 FE Argon',0.49,1.3,2,1,1,0,1.05);
insert into vitrage (vit_id,vit_composition,vit_sw,vit_uw,vit_perf_acoustique,vit_perf_thermique,vit_perf_securite,vit_prix,vit_coefficient) values (3,'Double vitrage clair 44.2 silence-16-4 FE Argon',0.48,1.3,3,1,1,0,1.18);
insert into vitrage (vit_id,vit_composition,vit_sw,vit_uw,vit_perf_acoustique,vit_perf_thermique,vit_perf_securite,vit_prix,vit_coefficient) values (4,'Double vitrage clair 44.2-16-4 FE Argon',0.48,1.3,1,1,2,0,1.1);
insert into vitrage (vit_id,vit_composition,vit_sw,vit_uw,vit_perf_acoustique,vit_perf_thermique,vit_perf_securite,vit_prix,vit_coefficient) values (5,'Double vitrage clair 44.2 silence-16-4 FE Argon',0.48,1.3,2,1,2,0,1.18);
insert into vitrage (vit_id,vit_composition,vit_sw,vit_uw,vit_perf_acoustique,vit_perf_thermique,vit_perf_securite,vit_prix,vit_coefficient) values (6,'Double vitrage clair 44.2 silence-12-8 FE Argon',0.48,1.4,3,1,2,0,1.25);
insert into vitrage (vit_id,vit_composition,vit_sw,vit_uw,vit_perf_acoustique,vit_perf_thermique,vit_perf_securite,vit_prix,vit_coefficient) values (7,'Double vitrage clair SP510-14-4 FE Argon',0.46,1.3,1,1,3,0,1.2);
insert into vitrage (vit_id,vit_composition,vit_sw,vit_uw,vit_perf_acoustique,vit_perf_thermique,vit_perf_securite,vit_prix,vit_coefficient) values (8,'Double vitrage clair 44.2-12-44.2 FE Argon',0.47,1.5,2,1,3,0,1.22);
insert into vitrage (vit_id,vit_composition,vit_sw,vit_uw,vit_perf_acoustique,vit_perf_thermique,vit_perf_securite,vit_prix,vit_coefficient) values (9,'Double vitrage clair 44.2 silence-12-8 FE Argon',0.48,1.4,3,1,3,0,1.25);

CREATE TABLE Commande(
   com_id INT AUTO_INCREMENT NOT NULL,
   com_date DATE NOT NULL,
   com_reduction DECIMAL(3,2),
   com_total_HT DECIMAL(12,2),
   com_total_TTC DECIMAL(12,2),
   com_montant_TVA5 DECIMAL(12,2),
   com_montant_TVA20 DECIMAL(12,2),
   com_etat VARCHAR(40),
   com_livraison_rue VARCHAR(100) NOT NULL,
   com_livraison_code_postal VARCHAR(20) NOT NULL,
   com_livraison_ville VARCHAR(50) NOT NULL,
   com_livraison_pays VARCHAR(50) NOT NULL,
   com_livraison_avancement VARCHAR(50),
   com_facture_numero INT UNIQUE,
   com_facture_date DATE,
   com_paiement_date DATE,
   com_facture_rue VARCHAR(100) NOT NULL,
   com_facture_code_postal VARCHAR(12) NOT NULL,
   com_facture_ville VARCHAR(50) NOT NULL,
   com_facture_pays VARCHAR(50) NOT NULL,
   com_cli_id INT,
   PRIMARY KEY(com_id),   
   FOREIGN KEY(com_cli_id) REFERENCES Client(cli_id)
);


CREATE TABLE Employe(
   emp_id INT AUTO_INCREMENT NOT NULL,
   emp_nom VARCHAR(50) NOT NULL,
   emp_prenom VARCHAR(50) NOT NULL,
   emp_telephone VARCHAR(20),
   emp_mail VARCHAR(50) UNIQUE,
   emp_fonction VARCHAR(50) ,
   emp_password VARCHAR(255),
   PRIMARY KEY(emp_id)
);

insert into employe (emp_prenom, emp_nom, emp_password, emp_mail) values ('Nataniel', 'Liddel', 'Liddel', concat(substring(emp_prenom,1,3),'.',emp_nom,'@mail.com'));

CREATE TABLE Client(
   cli_id INT AUTO_INCREMENT NOT NULL,
   cli_nom VARCHAR(50) NOT NULL,
   cli_prenom VARCHAR(50) NOT NULL,
   cli_rue VARCHAR(50) NOT NULL,
   cli_code_postal VARCHAR(20) NOT NULL,
   cli_ville VARCHAR(50) NOT NULL,
   cli_pays VARCHAR(50) NOT NULL,
   cli_mail VARCHAR(50) UNIQUE,
   cli_password VARCHAR(255),
   cli_telephone VARCHAR(20),
   cli_statut VARCHAR(50),
   cli_coefficient DECIMAL(4,2) DEFAULT 1,
   cli_emp_id INT,
   PRIMARY KEY(cli_id),
   FOREIGN KEY(cli_emp_id) REFERENCES Employe(emp_id)
);

insert into client (cli_nom, cli_password, cli_prenom, cli_rue, cli_code_postal, cli_ville, cli_pays, cli_mail, cli_telephone) values ('Bes','Bes', 'Anaëlle', '19 Bowman Junction', '74041 CEDEX', 'Annecy', 'France', concat(substring(cli_prenom,1,3),'.',cli_nom,'@mail.com'), '280-83-8709');

CREATE TABLE compose_det_men(
	com_det_men_id INT AUTO_INCREMENT,
   com_det_men_men_id INT,
   com_det_men_det_id INT,
   PRIMARY KEY(com_det_men_id),
   FOREIGN KEY(com_det_men_men_id) REFERENCES menuiserie(men_id),
   FOREIGN KEY(com_det_men_det_id) REFERENCES detail(det_id)
);

CREATE TABLE posseder(
	pos_id INT AUTO_INCREMENT NOT NULL,   
   pos_quantite_commandee INT,
   pos_prix_unitaire_HT DECIMAL(11,2),
   pos_taux_TVA DECIMAL(12,2),
   pos_montant_TVA5 DECIMAL(12,2),
   pos_montant_TVA20 DECIMAL(12,2),
   pos_men_id INT,
   pos_com_id INT,
   PRIMARY KEY(pos_id),
   FOREIGN KEY(pos_men_id) REFERENCES menuiserie(men_id),
   FOREIGN KEY(pos_com_id) REFERENCES Commande(com_id)
);

