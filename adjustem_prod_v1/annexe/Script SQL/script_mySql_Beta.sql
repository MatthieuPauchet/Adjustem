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

CREATE TABLE ventail(
   ven_id INT AUTO_INCREMENT NOT NULL,
   ven_hauteur INT,
   ven_largeur INT,
   ven_prix DECIMAL(15,2),
   ven_men_id INT,
   PRIMARY KEY(ven_id),
   FOREIGN KEY(ven_men_id) REFERENCES menuiserie(men_id)
);

CREATE TABLE volet_roulant(
   vol_id INT  AUTO_INCREMENT NOT NULL,
   vol_prix VARCHAR(50),
   vol_men_id INT,
   PRIMARY KEY(vol_id),
   FOREIGN KEY(vol_men_id) REFERENCES menuiserie(men_id)
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


CREATE TABLE compose_ven_men(
	com_ven_men_id INT AUTO_INCREMENT,
   com_ven_men_men_id INT,
   com_ven_men_ven_id INT,
   com_ven_men_quantite INT,
   PRIMARY KEY(com_ven_men_id),
   FOREIGN KEY(com_ven_men_men_id) REFERENCES menuiserie(men_id),
   FOREIGN KEY(com_ven_men_ven_id) REFERENCES ventail(ven_id)
);

CREATE TABLE compose_det_men(
	com_det_men_id INT AUTO_INCREMENT,
   com_det_men_men_id INT,
   com_det_men_det_id INT,
   PRIMARY KEY(com_det_men_id),
   FOREIGN KEY(com_det_men_men_id) REFERENCES menuiserie(men_id),
   FOREIGN KEY(com_det_men_det_id) REFERENCES detail(det_id)
);

CREATE TABLE compose_det_ven(
	com_det_ven_id INT AUTO_INCREMENT,
   com_det_ven_ven_id INT,
   com_det_ven_det_id INT,
   PRIMARY KEY(com_det_ven_id),
   FOREIGN KEY(com_det_ven_ven_id) REFERENCES ventail(ven_id),
   FOREIGN KEY(com_det_ven_det_id) REFERENCES detail(det_id)
);

CREATE TABLE compose_det_vr(
	com_det_vr_id INT AUTO_INCREMENT,
   com_det_vr_vol_id INT,
   com_det_vr_det_id INT,
   PRIMARY KEY(com_det_vr_id),
   FOREIGN KEY(com_det_vr_vol_id) REFERENCES volet_roulant(vol_id),
   FOREIGN KEY(com_det_vr_det_id) REFERENCES detail(det_id)
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

