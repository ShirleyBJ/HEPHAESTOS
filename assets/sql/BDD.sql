/**BDD HEPHAESTOS*/
-- Script création de la BDD
--Suppresion de BDD si existe déja
DROP DATABASE IF EXISTS hephaestos;

--Creation de la BDD
CREATE DATABASE IF NOT EXISTS hephaestos;

--Utiliser la BDD d'HEPHAESTOS
USE hephaestos;

--CREATION TABLE 
/*Client : */

CREATE TABLE client(
    Numero_client INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Civilite VARCHAR(5) NOT NULL,
    Nom VARCHAR(60) NOT NULL,
    Prenom VARCHAR(60) NOT NULL,
    Adresse VARCHAR(60) NOT NULL,
    CP VARCHAR(5) NOT NULL,
    Ville VARCHAR(80) NOT NULL,
    Telephone VARCHAR(10) NOT NULL,
    Email VARCHAR(150) NOT NULL UNIQUE
) ENGINE = INNODB DEFAULT CHARSET=UTF8;

/*Fournisseurs: */

CREATE TABLE fournisseur(
    no_fournisseur INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    societe VARCHAR(60) NOT NULL,
    adresse VARCHAR(60) NOT NULL,
    CP VARCHAR(5) NOT NULL,
    ville VARCHAR(80) NOT NULL,
    telephone VARCHAR(10) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE
)ENGINE = INNODB DEFAULT CHARSET=UTF8;

/*Catégorie produit: */

CREATE TABLE categorie_produit(
    code_categorie INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom_categorie VARCHAR(50) NOT NULL,
    description_produit VARCHAR(350) NOT NULL
)ENGINE = INNODB DEFAULT CHARSET=UTF8;

/*Employe : */

CREATE TABLE employe(
    numero_employe INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(60) NOT NULL,
    prenom VARCHAR(60) NOT NULL,
    adresse VARCHAR(60) NOT NULL,
    CP VARCHAR(5) NOT NULL,
    ville VARCHAR(80) NOT NULL,
    telephone VARCHAR(10) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    date_naissance DATE DEFAULT now(),
    fonction VARCHAR(30) NOT NULL,
    rend_compte VARCHAR(60) NOT NULL,
    date_embauche DATE DEFAULT now(),
    date_fin_contrat DATE DEFAULT now()
) ENGINE = INNODB DEFAULT CHARSET=UTF8;

/*Produit : */

CREATE TABLE produit(
    reference_produit INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom_produit VARCHAR(60) NOT NULL,
    no_fournisseur INT NOT NULL,
    quantite INTEGER NOT NULL DEFAULT 0,
    prix_unitaire FLOAT NOT NULL DEFAULT 0,
    code_categorie INT NOT NULL,
    unites_stock INTEGER AS (quantite - unites),
    unites_commandes INTEGER NOT NULL DEFAULT 0,
    CONSTRAINT fk_no_fournisseur 
    FOREIGN KEY(no_fournisseur) REFERENCES fournisseur(no_fournisseur),
    CONSTRAINT fk_code_categorie
    FOREIGN KEY (code_categorie) REFERENCES categorie_produit(code_categorie)
)ENGINE = INNODB DEFAULT CHARSET=UTF8;

/*Commande : */

CREATE TABLE commande(
    numero_commande INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    date_commande DATE DEFAULT now(),
    date_retrait DATE DEFAULT now(),
    numero_client INT NOT NULL,
    numero_employe INT NOT NULL,
    reference_produit INT NOT NULL,
    quantite INT NOT NULL,
    prix_unitaire FLOAT NOT NULL DEFAULT 0,
    prix_total_produit FLOAT AS (prix_unitaire * quantite),
    -- prix_total_commande AS sum(prix_total_produit),
    CONSTRAINT fk_reference_produit
    FOREIGN KEY (reference_produit) REFERENCES produit (reference_produit),
    CONSTRAINT fk_numero_client
    FOREIGN KEY (numero_client) REFERENCES client (numero_client),
    CONSTRAINT fk_numero_employe
    FOREIGN KEY (numero_employe) REFERENCES employe (numero_employe)
)ENGINE = INNODB DEFAULT CHARSET=UTF8;


/*SQL : Insert into employe table*/
INSERT INTO employe (numero_employe,nom,prenom,adresse,CP,ville,telephone,email,date_naissance,fonction,rend_compte,date_embauche, date_fin_contrat)
	VALUES('','Berchel','Shirley','5 rue du moulin','60310','Beaulieu-les-fontaines','0627931041','berchel.shirley@gmail.com','1996-09-19','gérant','','2021/01/04',' '),
    ('','Smith','Maze','11 rue DownWorld','00000','HellCity','0685954565','maze.smith@gmail.com','1994-06-09','Garagiste','Gérant','2021/01/04','-'),
    ('','Stones','Damon','Place de la grande ceinture','12563','Midgard','0789652622','damon.stones@gmail.com','1990-01-25','Garagiste','Gérant','2021/01/04','-'),
    ('','Creed','Elijah','41 rue de la libération','69566','Haven','0645178293','elijah.creed@gmail.com','1988-05-13','Garagiste','Gérant','2021/01/04','-'),
    ('','Seen','Minerva','5 envolée de la lance argentée','12125','Olympia','0745698245','minerva.seen@gmail.com','1991-08-20','Secrétaire','Gérant','2021/01/04','-');


/*SQL : Insert into employe table*/
INSERT INTO client(Numero_client,Civilite,Nom,Prenom,Adresse,CP,Ville,Telephone,Email)
	VALUES ('1','Mme','Igaî','Mnévis','Avenue des Pharaons',56892,'Siwa','0632589475','mnevis.igai@yahoo.com'),
    ('2','Mr','Velch','Hélios','Place de la grandeur',11111,'Olympia','0689526341','helios.velch@hotmail.fr'),
    ('3','Mr','Laran','Phénix','3 boulevard des cendres',45624,'Enflammée-sur-fin','0745632185','phenix.laran@outlook.com'),
    ('4','Mme','Rind','Erda','5 cote de Mjolnir',25364,'Bifrost','0632589471','erda.rind@gmail.com'),
    ('5','Mme','Od','Saegming','Place du grand Asgard',61455,'Valhalla','0635896547','saegming.od@hotmail.com');


/*SQL : Insert into categorie produit table*/
INSERT INTO categorie_produit (code_categorie,nom_categorie,description_produit)
VALUES (1,'Freinage','Piéces mécaniques'),
(2,'Démarrage batterie','piéces mécaniques'),
(3,'Amortisseurs et coupelles','Piéces mécaniques'),
(4,'Échappement','Piéces mécaniques'),
(5,'Direction,Suspension','Piéces mécaniques'),
(6,'Motorisation et courroies','Piéces mécaniques'),
(7,'Bougies et piéces d-allumage','Piéces mécaniques'),
(8,'Embrayage','Piéces mécaniques'),
(9,'Climatisation','Piéces mécaniques'),
(10,'Refroidissemnt et chauffage','Piéces mécaniques'),
(11,'Carroserie','Piéces mécaniques'),
(12,'Alternateur,Démarreur','Piéces mécaniques'),
(13,'Filtre','Piéces entretien courant'),
(14,'Ampoule','Piéces entretien courant'),
(15,'Essuie-glaces','Piéces entretien courant'),
(16,'Rétrovisseurs','Piéces entretien courant'),
(17,'Malette outils','Outillage'),
(18,'Outillage à main','Outillage'),
(19,'Outillage de levage','Outillage'),
(20,'Rivets,visseur','Outillage'),
(21,'Outillage bougie','Outillage'),
(22,'Outillage vidange','Outillage'),
(23,'Outillage freinage','Outillage'),
(24,'Outillage direction,suspension, train','Outillage'),
(25,'Outillage transmission,distribution','Outillage'),
(26,'Outillage Moteur','Outillage'),
(27,'Revue technique','Outillage'),
(28,'Remorquage, Treuils','Outillage');

/*SQL : Insert into fournisseur table*/
INSERT INTO fournisseur(no_fournisseur,societe ,adresse ,CP ,ville ,telephone,email)
VALUES(1,'BigStar Car','0284 Neha Dale','25180','Lawrence','(44) 64044-8876','bigstar_car@gmail.com'),
(2,'Wheels stocks','41946 Koepp Plain','91604','Warwick','(56) 02954-1653','wheels.stock@yahoo.com'),
(3,'Rolls Bros','1994 Terrence Garden','37346','Renton','(54) 68677-3609','rolls_bros@outlook.com'),
(4,'Dr Rides','8303 Jacobi Unions','51979','Boise City','(28) 62505-6753','dr-rides@hotmail.com'),
(5,'Phenom Rolling','9148 Purdy Island','55144','Wichita Falls','(82) 06438-6047','phenom_rolling@free.fr');

/*SQL : Insert into produit table*/
INSERT INTO produit (reference_produit,nom_produit,no_fournisseur,quantite,prix_unitaire,code_categorie,unites_commandes)
VALUES 
(2,'Plaquette de frein arriére',2,100,39.95,1,0),
(3,'Disque de frein avant',3,100,50.95,1,0),
(4,'Disque de frein arriére',1,100,50.95,1,0),
(5,'Tambour de frein',2,100,69.95,1,0),
(6,'Câble de frein',2,100,29.95,1,0),
(7,'Flexibles de frein',4,100,49.95,1,0),
(8,'Liquides de frein',2,100,9.95,1,0),
(9,'Capteurs',3,100,70.50,1,0),
(10,'Etriers de frin',2,100,39.95,1,0),
(11,'Kits de frein arrière',1,100,39.95,1,0),
(12,'Mâchoires de frein',2,100,39.95,1,0),
(13,'Batterie voiture',1,100,179.95,2,0),
(14,'Alternateur',2,100,39.95,2,0),
(15,'Bougies',4,100,39.95,2,0),
(16,'Chargeur batterie',2,100,29.95,2,0),
(17,'Booster',4,100,229.95,2,0),
(18,'Câbles de démarrage',2,100,34.95,2,0),
(19,'Câble de recharge de voiture électrique',1,100,39.95,2,0),
(20,'Démarreur',2,100,179.95,1,0),
(21,'Nettoyants freins',4,100,7.99,1,0),
(22,'Amortisseurs',1,100,40.95,1,0),
(23,'Coupelle de suspension',2,100,9.99,3,0),
(24,'Kit de protection',1,100,35.95,3,0),
(25,'Sphéres de suspension avant',5,100,49.95,3,0),
(26,'Sphéres de suspension arriére',3,100,49.95,3,0),
(27,'Silent-bloc echappement',2,100,4.49,4,0),
(28,'Catalyseurs',3,100,211.95,4,0),
(29,'Tube d\'échappement',2,100,52.95,4,0),
(30,'Filtres à particules',1,100,4.49,4,0),
(31,'Sonde Lambda',5,100,100.95,4,0),
(32,'Collier',4,100,4.49,4,0),
(33,'Mastic',2,100,10.95,4,0),
(34,'Croisillon de transmission',1,100,37.49,5,0),
(35,'Filtre hydraulique pour boite de vitesse',1,100,13.40,5,0),
(36,'Kit de roulement',2,100,73.95,5,0),
(37,'Ressorts de suspension',5,100,79.95,5,0),
(38,'Croisillon de transmission',4,100,37.49,5,0),
(39,'Rotule de direction inéterieure',3,100,34.95,5,0),
(40,'Rotule de direction inéterieure',3,100,22.95,5,0),
(92,'Rotule de direction inéterieure',3,100,22.95,5,0),
(41,'Rotule de suspension',3,100,19.95,5,0),
(42,'Triangle de suspension',2,100,56.95,5,0),
(43,'Biellette barre stabilisatrice',1,100,19.95,5,0),
(44,'Kit soufflet de cardan',1,100,19.95,5,0),
(45,'Joint d\'etancheité',2,100,7.69,5,0),
(46,'Transmission - gauche(côté conducteur)',3,100,64.95,5,0),
(47,'Transmission - droite(côté passager)',3,100,22.95,5,0),
(48,'Kit soufflet de direction',4,100,19.95,5,0),
(49,'Oeil de levier pour barre de connexion',3,100,44.50,5,0),
(50,'Douille pour arbre de levier de direction',3,100,12.50,5,0),
(51,'Levier intermédiaire de direction',3,100,22.95,5,0),
(52,'Entretoise de suspension pour barre stabilisatrice',2,100,11.95,5,0),
(53,'Vannes EGR',1,100,94.95,6,0),
(54,'Courroies d\'accesoires',2,100,6.95,6,0),
(55,'Support moteur',3,100,28.50,6,0),
(56,'Kit joint de culasse',4,100,87.95,6,0),
(57,'Joint de carter d\'huile',5,100,11.95,6,0),
(58,'Joint Couvre culbuteurs',5,100,11.95,6,0),
(59,'Bague d\'étancheité',5,100,1.95,6,0),
(60,'Joint d\'étancheité collecteur d\'admission',5,100,1.95,6,0),
(61,'Joint de culasse',4,100,43.95,6,0),
(62,'Turbocompresseur',3,100,836.95,6,0),
(91,'Kit de distribution & pompe à eau',2,100,119.95,6,0),
(63,'Capteur de pression d\'huile',1,100,9.95,6,0),
(64,'Debitmetre',2,100,94.95,6,0),
(65,'Electrovanne',3,100,103.95,6,0),
(66,'Galet enrouleur de courroie',4,100,16.95,6,0),
(67,'Galet tendeur de courroie',4,100,20.95,6,0),
(68,'Pompe à injection',3,100,1237.95,6,0),
(69,'Capteur température',2,100,18.95,6,0),
(70,'Poulie Damper',1,100,39.95,6,0),
(71,'Capteur de pression d\'huile',1,100,39.95,6,0),
(72,'Jauge de niveau d\'huile',1,100,39.95,6,0),
(73,'Contrôleur de ralenti',2,100,86.95,6,0),
(74,'2 bougies de préchauffage',3,100,19.95,7,0),
(75,'2 bougies de préchauffage',1,100,19.95,7,0),
(76,'1 bougies d\'allumage',1,100,8.99,7,0),
(77,'4 bougies d\'allumage',1,100,24.95,7,0),
(78,'Kit tête + rotor',2,100,35.90,7,0),
(79,'Contacteur + condensateur',2,100,12.90,7,0),
(80,'Faisceau d\'allumage',3,100,42.00,7,0),
(81,'Douille de guidage',1,100,9.95,7,0),
(82,'Kit d\'embrayage 2 piéces',2,100,114.95,7,0),
(83,'Kit d\'embrayage 3 piéces',2,100,399.95,7,0),
(84,'Câbles d\'embrayage',2,100,24.00,7,0),
(85,'Cylindre émetteur d\'embrayage',3,100,39.00,7,0),
(86,'Cylindre récepteur d\'embrayage',3,100,41.00,7,0),
(87,'Butée dembrayage hydraulique',4,100,148.00,7,0),
(88,'Douille de guidage',5,100,16.95,7,0),
(89,'Volant moteur',4,100,388.00,7,0),
(90,'Volant moteur flexible',4,100,416.95,7,0)
;

/*SQL : Insert into commande table*/
INSERT INTO commande (numero_commande,date_commande,date_retrait,numero_client,numero_employe,reference_produit,quantite,prix_unitaire)
VALUES(1,'2021-06-10','2021-06-15',1,2,5,1,69.95);
