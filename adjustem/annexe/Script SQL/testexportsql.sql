-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           10.4.10-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win32
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour devis_adjustem
DROP DATABASE IF EXISTS `devis_adjustem`;
CREATE DATABASE IF NOT EXISTS `devis_adjustem` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `devis_adjustem`;

-- Listage de la structure de la table devis_adjustem. client
DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `cli_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nom` varchar(50) NOT NULL,
  `cli_prenom` varchar(50) NOT NULL,
  `cli_rue` varchar(50) NOT NULL,
  `cli_code_postal` varchar(20) NOT NULL,
  `cli_ville` varchar(50) NOT NULL,
  `cli_pays` varchar(50) NOT NULL,
  `cli_mail` varchar(50) DEFAULT NULL,
  `cli_password` varchar(255) DEFAULT NULL,
  `cli_telephone` varchar(20) DEFAULT NULL,
  `cli_statut` varchar(50) DEFAULT NULL,
  `cli_coefficient` decimal(4,2) DEFAULT 1.00,
  `cli_emp_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cli_id`),
  UNIQUE KEY `cli_mail` (`cli_mail`),
  KEY `cli_emp_id` (`cli_emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table devis_adjustem.client : 1 rows
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`cli_id`, `cli_nom`, `cli_prenom`, `cli_rue`, `cli_code_postal`, `cli_ville`, `cli_pays`, `cli_mail`, `cli_password`, `cli_telephone`, `cli_statut`, `cli_coefficient`, `cli_emp_id`) VALUES
	(1, 'Farah', 'Mo', '8 rue de Londres', '80000', 'Amiens', 'Maroc', 'mo@mail.ma', '$2y$10$QyJv9645rggg48Bdv.qB6OPE2v/0gcuN5wZJIQ82mn.G74lvo89uO', '0123456789', NULL, 1.00, NULL);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;

-- Listage de la structure de la table devis_adjustem. commande
DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_date` date NOT NULL,
  `com_reduction` decimal(3,2) DEFAULT NULL,
  `com_total_HT` decimal(12,2) DEFAULT NULL,
  `com_total_TTC` decimal(12,2) DEFAULT NULL,
  `com_montant_TVA5` decimal(12,2) DEFAULT NULL,
  `com_montant_TVA20` decimal(12,2) DEFAULT NULL,
  `com_etat` varchar(40) DEFAULT NULL,
  `com_livraison_rue` varchar(100) NOT NULL,
  `com_livraison_code_postal` varchar(20) NOT NULL,
  `com_livraison_ville` varchar(50) NOT NULL,
  `com_livraison_pays` varchar(50) NOT NULL,
  `com_livraison_avancement` varchar(50) DEFAULT NULL,
  `com_facture_numero` int(11) DEFAULT NULL,
  `com_facture_date` date DEFAULT NULL,
  `com_paiement_date` date DEFAULT NULL,
  `com_facture_rue` varchar(100) NOT NULL,
  `com_facture_code_postal` varchar(12) NOT NULL,
  `com_facture_ville` varchar(50) NOT NULL,
  `com_facture_pays` varchar(50) NOT NULL,
  `com_cli_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`com_id`),
  UNIQUE KEY `com_facture_numero` (`com_facture_numero`),
  KEY `com_cli_id` (`com_cli_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table devis_adjustem.commande : 1 rows
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
INSERT INTO `commande` (`com_id`, `com_date`, `com_reduction`, `com_total_HT`, `com_total_TTC`, `com_montant_TVA5`, `com_montant_TVA20`, `com_etat`, `com_livraison_rue`, `com_livraison_code_postal`, `com_livraison_ville`, `com_livraison_pays`, `com_livraison_avancement`, `com_facture_numero`, `com_facture_date`, `com_paiement_date`, `com_facture_rue`, `com_facture_code_postal`, `com_facture_ville`, `com_facture_pays`, `com_cli_id`) VALUES
	(1, '2020-06-24', NULL, 1166.00, 1399.20, 0.00, 233.20, 'devis', '8 rue de Londres', '80000', 'Amiens', 'Maroc', 'en attente', NULL, '2020-06-24', '2020-06-24', '8 rue de Londres', '80000', 'Amiens', 'Maroc', 1);
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;

-- Listage de la structure de la table devis_adjustem. compose_det_men
DROP TABLE IF EXISTS `compose_det_men`;
CREATE TABLE IF NOT EXISTS `compose_det_men` (
  `com_det_men_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_det_men_men_id` int(11) DEFAULT NULL,
  `com_det_men_det_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`com_det_men_id`),
  KEY `com_det_men_men_id` (`com_det_men_men_id`),
  KEY `com_det_men_det_id` (`com_det_men_det_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Listage des données de la table devis_adjustem.compose_det_men : 22 rows
/*!40000 ALTER TABLE `compose_det_men` DISABLE KEYS */;
INSERT INTO `compose_det_men` (`com_det_men_id`, `com_det_men_men_id`, `com_det_men_det_id`) VALUES
	(1, NULL, 1),
	(2, 1, 1),
	(3, 1, 6),
	(4, 1, 7),
	(5, 1, 15),
	(6, 1, 11),
	(7, 1, 79),
	(8, 1, 49),
	(9, 2, 1),
	(10, 2, 4),
	(11, 2, 7),
	(12, 2, 15),
	(13, 2, 11),
	(14, 2, 64),
	(15, 2, 49),
	(16, 6, 1),
	(17, 6, 5),
	(18, 6, 8),
	(19, 6, 15),
	(20, 6, 11),
	(21, 6, 73),
	(22, 6, 49);
/*!40000 ALTER TABLE `compose_det_men` ENABLE KEYS */;

-- Listage de la structure de la table devis_adjustem. config
DROP TABLE IF EXISTS `config`;
CREATE TABLE IF NOT EXISTS `config` (
  `con_id` int(11) NOT NULL,
  `con_police` varchar(50) DEFAULT NULL,
  `con_logo` varchar(250) DEFAULT NULL,
  `con_bouton_continuer` varchar(50) DEFAULT NULL,
  `con_bouton_retour` varchar(50) DEFAULT NULL,
  `con_bouton_valider` varchar(50) DEFAULT NULL,
  `con_bouton_annuler` varchar(50) DEFAULT NULL,
  `con_emp_id` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`con_id`),
  KEY `con_emp_id` (`con_emp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Listage des données de la table devis_adjustem.config : 1 rows
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` (`con_id`, `con_police`, `con_logo`, `con_bouton_continuer`, `con_bouton_retour`, `con_bouton_valider`, `con_bouton_annuler`, `con_emp_id`) VALUES
	(1, 'Arial', 'http://www.adjustem.com/images/logo_adjustem.png', 'btn-primary', 'btn-secondary', 'btn-success', 'btn-danger', '1');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;

-- Listage de la structure de la table devis_adjustem. detail
DROP TABLE IF EXISTS `detail`;
CREATE TABLE IF NOT EXISTS `detail` (
  `det_id` int(11) NOT NULL AUTO_INCREMENT,
  `det_nom` varchar(50) DEFAULT NULL,
  `det_descriptif` varchar(250) DEFAULT NULL,
  `det_prix` decimal(11,2) DEFAULT NULL,
  `det_coefficient` decimal(11,2) DEFAULT NULL,
  `det_photo` varchar(150) DEFAULT NULL,
  `det_rub_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`det_id`),
  KEY `det_rub_id` (`det_rub_id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

-- Listage des données de la table devis_adjustem.detail : 81 rows
/*!40000 ALTER TABLE `detail` DISABLE KEYS */;
INSERT INTO `detail` (`det_id`, `det_nom`, `det_descriptif`, `det_prix`, `det_coefficient`, `det_photo`, `det_rub_id`) VALUES
	(1, 'Pose en neuf', 'Cas de construction neuve', 0.00, 1.00, 'detail1.svg', 4),
	(2, 'Pose en réhabilitation totale', 'Dépose complète de la menuiserie existante compris bâti', 0.00, 1.20, 'detail2.svg', 4),
	(3, 'Pose en réhabilitation partielle', 'Dépose uniquement des ouvrants, conservation du bâti', 0.00, 0.80, 'detail3.svg', 4),
	(4, 'fenêtre', 'fenêtre (prix au m2)', 500.00, 0.00, 'detail4.png', 5),
	(5, 'porte-fenêtre', 'porte-fenêtre (prix au m2)', 500.00, 0.00, 'detail5.png', 5),
	(6, 'baie-vitrée', 'baie-vitrée (prix au m2)', 800.00, 0.00, 'detail6.png', 5),
	(7, 'PVC', '100% PVC', 0.00, 1.00, 'detail7.png', 6),
	(8, 'Aluminium', '100% Aluminium', 0.00, 1.50, 'detail8.png', 6),
	(9, 'Bois', '100% Bois, top pour les bobos écolos !', 0.00, 1.40, 'detail9.png', 6),
	(10, 'Composite', 'On sait pas trop ce qui le compose mais c\'est sympa et ça fait styler', 0.00, 1.15, 'detail10.png', 6),
	(11, 'Blanc lisse', 'RAL 9016', 0.00, 1.00, 'detail11.png', 7),
	(12, 'Gris lisse', 'RAL 7035', 0.00, 1.00, 'detail12.png', 7),
	(13, 'Gris anthracite', 'RAL 7016', 0.00, 1.00, 'detail13.png', 7),
	(14, 'Chêne dorée', 'imitation chêne', 0.00, 1.20, 'detail14.png', 7),
	(15, 'Blanc lisse', 'RAL 9016', 0.00, 1.00, 'detail15.png', 8),
	(16, 'Gris lisse', 'RAL 7035', 0.00, 1.00, 'detail16.png', 8),
	(17, 'Gris anthracite', 'RAL 7016', 0.00, 1.00, 'detail17.png', 8),
	(18, 'Chêne dorée', 'imitation chêne', 0.00, 1.20, 'detail18.png', 8),
	(19, 'PVC', 'entrée de gamme = pas trop cher', 0.00, 1.00, 'detail19.png', 11),
	(20, 'Aluminium', 'milieu de gamme = un peu plus cher', 0.00, 1.40, 'detail20.png', 11),
	(21, 'Aluminium thermique', 'très bien pour les bobos écolos', 0.00, 1.50, 'detail21.png', 11),
	(22, 'Blanc lisse', 'RAL 9016', 0.00, 1.00, 'detail22.png', 9),
	(23, 'Gris lisse', 'RAL 7035', 0.00, 1.00, 'detail23.png', 9),
	(24, 'Gris anthracite', 'RAL 7016', 0.00, 1.00, 'detail24.png', 9),
	(25, 'Chêne dorée', 'imitation chêne', 0.00, 1.10, 'detail25.png', 9),
	(26, 'Blanc lisse', 'RAL 9016', 0.00, 1.00, 'detail26.png', 13),
	(27, 'Gris lisse', 'RAL 7035', 0.00, 1.00, 'detail27.png', 13),
	(28, 'Gris anthracite', 'RAL 7016', 0.00, 1.00, 'detail28.png', 13),
	(29, 'Chêne dorée', 'imitation chêne', 0.00, 1.10, 'detail29.png', 13),
	(30, 'Blanc lisse', 'RAL 9016', 0.00, 1.00, 'detail30.png', 14),
	(31, 'Gris lisse', 'RAL 7035', 0.00, 1.00, 'detail31.png', 14),
	(32, 'Gris anthracite', 'RAL 7016', 0.00, 1.00, 'detail32.png', 14),
	(33, 'Chêne dorée', 'imitation chêne', 0.00, 1.10, 'detail33.png', 14),
	(34, 'Manuel', 'maoeuvre avec un treuil', 100.00, 0.00, 'detail34.png', 10),
	(35, 'Electrique filaire', 'avec bouton de commande fixe au mur', 150.00, 0.00, 'detail35.png', 10),
	(36, 'Electrique wifi', 'avec télécommande déplacable', 200.00, 0.00, 'detail36.png', 10),
	(37, 'Electrique wifi programmable', 'avec borne centrale télécommande niveau horaire', 250.00, 0.00, 'detail37.png', 10),
	(38, 'Fixe', NULL, 0.00, 0.60, 'detail38.png', 18),
	(39, 'Battant', NULL, 0.00, 1.00, 'detail39.png', 18),
	(40, 'Oscillo-battant', NULL, 0.00, 1.20, 'detail40.png', 18),
	(41, 'Oscillo', NULL, 0.00, 1.10, 'detail41.png', 18),
	(42, 'Coulissant', NULL, 0.00, 1.30, 'detail42.png', 18),
	(43, 'Entrée d\'air 15m3/h', 'utilisé en rénovation pour les bâtiment en VMC simple flux', 10.00, 0.00, 'detail43.png', 19),
	(44, 'Entrée d\'air 30m3/h', 'utilisé en rénovation pour les bâtiment en VMC simple flux', 12.00, 0.00, 'detail44.png', 19),
	(45, 'Entrée d\'air 45m3/h', 'utilisé en rénovation pour les bâtiment en VMC simple flux', 15.00, 0.00, 'detail45.png', 19),
	(46, 'Entrée d\'air 15m3/h auto-régulable', 'utilisé en rénovation pour les bâtiment en VMC simple flux', 15.00, 0.00, 'detail46.png', 19),
	(47, 'Entrée d\'air 30m3/h auto-régulable', 'utilisé en rénovation pour les bâtiment en VMC simple flux', 18.00, 0.00, 'detail47.png', 19),
	(48, 'Entrée d\'air 45m3/h  auto-régulable', 'utilisé en rénovation pour les bâtiment en VMC simple flux', 20.00, 0.00, 'detail48.png', 19),
	(49, 'Clair', 'finition vitrage classique', 0.00, 1.00, 'detail49.png', 20),
	(50, 'Opaque', 'finition flouté utilisé pour salle de bain généralement', 0.00, 1.02, 'detail50.png', 20),
	(51, 'Dépoli', 'finition proche opaque mais différente !', 0.00, 1.12, 'detail51.png', 20),
	(52, 'Aucun', NULL, 0.00, 1.00, 'detail52.png', 21),
	(53, 'Incorporé 10mm', NULL, 0.00, 1.05, 'detail53.png', 21),
	(54, 'Incorporé 26mm', NULL, 0.00, 1.10, 'detail54.png', 21),
	(55, 'Collé 28mm', NULL, 0.00, 1.20, 'detail55.png', 21),
	(56, 'Incorporé 45mm', NULL, 0.00, 1.13, 'detail56.png', 21),
	(57, 'Blanc lisse', 'RAL 9016', 0.00, 1.00, 'detail57.png', 22),
	(58, 'Gris lisse', 'RAL 7035', 0.00, 1.00, 'detail58.png', 22),
	(59, 'Gris anthracite', 'RAL 7016', 0.00, 1.00, 'detail59.png', 22),
	(60, 'Poignée pvc', NULL, 0.00, 1.00, 'detail60.png', 23),
	(61, 'Poignée pvc à clé', NULL, 0.00, 1.02, 'detail61.png', 23),
	(62, 'Poignée alu', NULL, 0.00, 1.04, 'detail62.png', 23),
	(63, 'Poignée alu à clé', NULL, 0.00, 1.06, 'detail63.png', 23),
	(64, 'Simple fixe', NULL, 0.00, 0.80, 'detail64.png', 24),
	(65, 'Oscillo-battant tirant droit', NULL, 0.00, 1.00, 'detail65.png', 24),
	(66, 'Oscillo-battant tirant gauche', NULL, 0.00, 1.00, 'detail66.png', 24),
	(67, 'Fixe + oscillo-battant', NULL, 0.00, 1.00, 'detail67.png', 25),
	(68, 'Battant + oscillo-battant', NULL, 0.00, 1.00, 'detail68.png', 25),
	(69, 'Battant tirant droit', NULL, 0.00, 1.00, 'detail69.png', 26),
	(70, 'Battant tirant gauche', NULL, 0.00, 1.00, 'detail70.png', 26),
	(71, 'oscillo-battant tirant droit', NULL, 0.00, 1.02, 'detail71.png', 26),
	(72, 'oscillo-battant tirant gauche', NULL, 0.00, 1.02, 'detail72.png', 26),
	(73, 'Fixe + battant tirant droit', NULL, 0.00, 1.00, 'detail73.png', 27),
	(74, 'Fixe + battant tirant gauche', NULL, 0.00, 1.00, 'detail74.png', 27),
	(75, 'Double battant', NULL, 0.00, 1.02, 'detail75.png', 27),
	(76, 'Battant+OB tirant droit', NULL, 0.00, 1.04, 'detail76.png', 27),
	(77, 'Battant+OB tirant gauche', NULL, 0.00, 1.04, 'detail77.png', 27),
	(78, 'Fixe + Coulissant droite', NULL, 0.00, 1.00, 'detail78.png', 28),
	(79, 'Fixe + Coulissant gauche', NULL, 0.00, 1.00, 'detail79.png', 28),
	(80, 'Double Fixe + Coulissant droite', NULL, 0.00, 1.00, 'detail80.png', 29),
	(81, 'Double Fixe + Coulissant gauche', NULL, 0.00, 1.00, 'detail81.png', 29);
/*!40000 ALTER TABLE `detail` ENABLE KEYS */;

-- Listage de la structure de la table devis_adjustem. employe
DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_nom` varchar(50) NOT NULL,
  `emp_prenom` varchar(50) NOT NULL,
  `emp_telephone` varchar(20) DEFAULT NULL,
  `emp_mail` varchar(50) DEFAULT NULL,
  `emp_fonction` varchar(50) DEFAULT NULL,
  `emp_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `emp_mail` (`emp_mail`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table devis_adjustem.employe : 2 rows
/*!40000 ALTER TABLE `employe` DISABLE KEYS */;
INSERT INTO `employe` (`emp_id`, `emp_nom`, `emp_prenom`, `emp_telephone`, `emp_mail`, `emp_fonction`, `emp_password`) VALUES
	(1, 'Liddel', 'Nataniel', NULL, 'Nat.Liddel@mail.com', NULL, 'Liddel'),
	(2, 'toto', 'toto', NULL, 'toto@mail.fr', NULL, 'toto');
/*!40000 ALTER TABLE `employe` ENABLE KEYS */;

-- Listage de la structure de la table devis_adjustem. menuiserie
DROP TABLE IF EXISTS `menuiserie`;
CREATE TABLE IF NOT EXISTS `menuiserie` (
  `men_id` int(11) NOT NULL AUTO_INCREMENT,
  `men_hauteur` int(11) DEFAULT NULL,
  `men_largeur` int(11) DEFAULT NULL,
  `men_imposte` int(11) DEFAULT NULL,
  `men_allege` int(11) DEFAULT NULL,
  `men_epaisseur_dormant` int(11) DEFAULT NULL,
  `men_nombre_vantaux` int(11) NOT NULL DEFAULT 1,
  `men_prix_HT` decimal(15,2) DEFAULT NULL,
  `men_taux_TVA` decimal(15,2) DEFAULT NULL,
  `men_montant_TVA5` decimal(15,2) DEFAULT NULL,
  `men_montant_TVA20` decimal(15,2) DEFAULT NULL,
  `men_prix_TTC` decimal(15,2) DEFAULT NULL,
  `men_vit_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`men_id`),
  KEY `men_vit_id` (`men_vit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table devis_adjustem.menuiserie : 4 rows
/*!40000 ALTER TABLE `menuiserie` DISABLE KEYS */;
INSERT INTO `menuiserie` (`men_id`, `men_hauteur`, `men_largeur`, `men_imposte`, `men_allege`, `men_epaisseur_dormant`, `men_nombre_vantaux`, `men_prix_HT`, `men_taux_TVA`, `men_montant_TVA5`, `men_montant_TVA20`, `men_prix_TTC`, `men_vit_id`) VALUES
	(1, 1250, 1200, NULL, NULL, NULL, 2, NULL, 20.00, NULL, NULL, NULL, 1),
	(2, 3000, 1234, NULL, NULL, NULL, 1, 321.00, 20.00, 0.00, 64.20, 385.20, 1),
	(5, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, 1560, 2000, NULL, NULL, NULL, 2, 583.00, 20.00, 0.00, 116.60, 699.60, 1);
/*!40000 ALTER TABLE `menuiserie` ENABLE KEYS */;

-- Listage de la structure de la table devis_adjustem. posseder
DROP TABLE IF EXISTS `posseder`;
CREATE TABLE IF NOT EXISTS `posseder` (
  `pos_id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_quantite_commandee` int(11) DEFAULT NULL,
  `pos_prix_unitaire_HT` decimal(11,2) DEFAULT NULL,
  `pos_taux_TVA` decimal(12,2) DEFAULT NULL,
  `pos_montant_TVA5` decimal(12,2) DEFAULT NULL,
  `pos_montant_TVA20` decimal(12,2) DEFAULT NULL,
  `pos_men_id` int(11) DEFAULT NULL,
  `pos_com_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pos_id`),
  KEY `pos_men_id` (`pos_men_id`),
  KEY `pos_com_id` (`pos_com_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table devis_adjustem.posseder : 1 rows
/*!40000 ALTER TABLE `posseder` DISABLE KEYS */;
INSERT INTO `posseder` (`pos_id`, `pos_quantite_commandee`, `pos_prix_unitaire_HT`, `pos_taux_TVA`, `pos_montant_TVA5`, `pos_montant_TVA20`, `pos_men_id`, `pos_com_id`) VALUES
	(1, 2, 583.00, 20.00, 0.00, 116.60, 6, 1);
/*!40000 ALTER TABLE `posseder` ENABLE KEYS */;

-- Listage de la structure de la table devis_adjustem. rubrique
DROP TABLE IF EXISTS `rubrique`;
CREATE TABLE IF NOT EXISTS `rubrique` (
  `rub_id` int(11) NOT NULL AUTO_INCREMENT,
  `rub_nom` varchar(50) DEFAULT NULL,
  `rub_descriptif` varchar(250) DEFAULT NULL,
  `rub_rub_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`rub_id`),
  KEY `rub_rub_id` (`rub_rub_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Listage des données de la table devis_adjustem.rubrique : 28 rows
/*!40000 ALTER TABLE `rubrique` DISABLE KEYS */;
INSERT INTO `rubrique` (`rub_id`, `rub_nom`, `rub_descriptif`, `rub_rub_id`) VALUES
	(1, 'menuiserie', 'contiendra les sous rubriques propres à menuiserie', NULL),
	(2, 'volet roulant', 'contiendra tous les sous-rubriques propre aux volets roulants', NULL),
	(3, 'ventail', 'contiendra les sous rubriques ouvertures, entrée d\'air, aspect verre, croissillon', NULL),
	(4, 'type de pose', 'plusieurs options comme pose en neuf, réhabiliation, rénovation...', 1),
	(5, 'type de menuiserie', 'choix entre fenêtres, porte-fenêtre, baie vitrée, porte d\'entrée, etc...', 1),
	(6, 'matière', 'de type bois, pvc, aluminium, mixte...', 1),
	(7, 'couleur intérieure', 'plusieurs RAL au choix pour être différent de la couleur extérieure !', 1),
	(8, 'couleur extérieure', 'plusieurs RAL au choix pour être différent de la couleur intérieure !', 1),
	(9, 'couleur volet roulant', 'contiendra les sous rubriques couleurs des lames intérieures et extérieures ainsi que le coffre', 2),
	(10, 'type de manoeuvre de volet roulant', 'contiendra les sous rubriques volet roulant électriques ou manuel', 2),
	(11, 'matière des lames', 'les différents types de matières plus ou moins isolantes', 2),
	(12, 'couleur lame intérieure', 'plusieurs RAL au choix pour être différent de la couleur extérieure !', 4),
	(13, 'couleur lame extérieure', 'plusieurs RAL au choix pour être différent de la couleur extérieure !', 4),
	(14, 'couleur coffre', 'couleur du coffre de volet roulant à l\'intérieure', 4),
	(15, 'manoeuvre manuelle', 'les différents types de manoeuvre manuelle', 5),
	(16, 'manoeuvre électrique', 'les différents types de manoeuvre électriques', 5),
	(18, 'type ouverture', 'les différents types d\'ouvertures - coulissant, battant, oscillo, fixe, etc...', 3),
	(19, 'entrée d\'air', 'au choix sans ou avec un volume défini en m3/h', 3),
	(20, 'aspect verre', 'peut-être normal, opaque, etc...', 3),
	(21, 'épaisseur croisillons', 'au choix sans ou avec une certaines épaisseurs définies', 3),
	(22, 'couleur des croisillons', 'les différentes couleures de croisillon', 3),
	(23, 'poignées', 'les différentes types de poignées', 3),
	(24, 'fenêtre 1 vantail', 'ouverture battant, OB, fixe, oscillant', 3),
	(25, 'fenêtre 2 vantaux', 'choix d\'ouverture', 3),
	(26, 'porte-fenêtre 1 vantail', 'choix d\'ouverture', 3),
	(27, 'porte-fenêtre 2 vantaux', 'choix d\'ouverture', 3),
	(28, 'baie vitrée 2 vantaux', 'choix d\'ouverture', 3),
	(29, 'baie vitrée 3 vantaux', 'choix d\'ouverture', 3);
/*!40000 ALTER TABLE `rubrique` ENABLE KEYS */;

-- Listage de la structure de la table devis_adjustem. vitrage
DROP TABLE IF EXISTS `vitrage`;
CREATE TABLE IF NOT EXISTS `vitrage` (
  `vit_id` int(11) NOT NULL AUTO_INCREMENT,
  `vit_composition` varchar(50) DEFAULT NULL,
  `vit_sw` varchar(50) DEFAULT NULL,
  `vit_uw` varchar(50) DEFAULT NULL,
  `vit_perf_acoustique` int(11) DEFAULT NULL,
  `vit_perf_thermique` int(11) DEFAULT NULL,
  `vit_perf_securite` varchar(50) DEFAULT NULL,
  `vit_prix` decimal(15,2) DEFAULT NULL,
  `vit_coefficient` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`vit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Listage des données de la table devis_adjustem.vitrage : 9 rows
/*!40000 ALTER TABLE `vitrage` DISABLE KEYS */;
INSERT INTO `vitrage` (`vit_id`, `vit_composition`, `vit_sw`, `vit_uw`, `vit_perf_acoustique`, `vit_perf_thermique`, `vit_perf_securite`, `vit_prix`, `vit_coefficient`) VALUES
	(1, 'Double vitrage clair 4-16-4 FE Argon', '0.52', '1.3', 1, 1, '1', 0.00, 1.00),
	(2, 'Double vitrage clair 10-16-4 FE Argon', '0.49', '1.3', 2, 1, '1', 0.00, 1.05),
	(3, 'Double vitrage clair 44.2 silence-16-4 FE Argon', '0.48', '1.3', 3, 1, '1', 0.00, 1.18),
	(4, 'Double vitrage clair 44.2-16-4 FE Argon', '0.48', '1.3', 1, 1, '2', 0.00, 1.10),
	(5, 'Double vitrage clair 44.2 silence-16-4 FE Argon', '0.48', '1.3', 2, 1, '2', 0.00, 1.18),
	(6, 'Double vitrage clair 44.2 silence-12-8 FE Argon', '0.48', '1.4', 3, 1, '2', 0.00, 1.25),
	(7, 'Double vitrage clair SP510-14-4 FE Argon', '0.46', '1.3', 1, 1, '3', 0.00, 1.20),
	(8, 'Double vitrage clair 44.2-12-44.2 FE Argon', '0.47', '1.5', 2, 1, '3', 0.00, 1.22),
	(9, 'Double vitrage clair 44.2 silence-12-8 FE Argon', '0.48', '1.4', 3, 1, '3', 0.00, 1.25);
/*!40000 ALTER TABLE `vitrage` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
