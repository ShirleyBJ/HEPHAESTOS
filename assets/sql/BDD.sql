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
    Nom VARCHAR(60) NOT NULL,
    Prenom VARCHAR(60) NOT NULL,
    Adresse VARCHAR(60) NOT NULL,
    CP VARCHAR(5) NOT NULL,
    Ville VARCHAR(80) NOT NULL,
    Telephone VARCHAR(10) NOT NULL,
    Email VARCHAR(150) NOT NULL UNIQUE
) ENGINE = INNODB DEFAULT CHARSET=UTF8;

/*Fournisseurs : */
CREATE TABLE fournisseur(
    numero_fournisseur INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    societe VARCHAR(60) NOT NULL,
    adresse VARCHAR(60) NOT NULL,
    CP VARCHAR(5) NOT NULL,
    ville VARCHAR(80) NOT NULL,
    telephone VARCHAR(10) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE
)ENGINE = INNODB DEFAULT CHARSET=UTF8;

/*Produits : */
CREATE TABLE produit(
    reference_produit INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom_produit VARCHAR(60) NOT NULL,
    fk_nom_fournisseur VARCHAR(60) NOT NULL,
    quantite INTEGER NOT NULL DEFAULT 0,
    prix_unitaire FLOAT NOT NULL DEFAULT 0,
    fk_code_categorie INT NOT NULL,
    unites_stock INTEGER NOT NULL DEFAULT 0,
    FOREIGN KEY (fk_nom_fournisseur) REFERENCES fournisseur(Societe),
    FOREIGN KEY (fk_code_categorie) REFERENCES categorie_produit(code_categorie)
)ENGINE = INNODB DEFAULT CHARSET=UTF8;


/*Categorie Produit : */
CREATE TABLE categorie_produit(
    code_categorie INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom_categorie VARCHAR(50) NOT NULL,
    description_produit VARCHAR(350) NOT NULL
)ENGINE = INNODB DEFAULT CHARSET=UTF8;

/*Commandes : */
CREATE TABLE commande(
    numero_commande INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    date_commande DATE DEFAULT GETDATE(),
    date_retrait DATE DEFAULT GETDATE(),
    fk_numero_client INT NOT NULL
    numero_employe INT NOT NULL,
    fk_reference_produit INT NOT NULL,
    quantite INT NOT NULL,
    prix_unitaire FLOAT NOT NULL DEFAULT 0,
    prix_total_produit,
    prix_total_commande,
    FOREIGN KEY (fk_reference_produit) REFERENCES produit(reference_produit),
    FOREIGN KEY (fk_numero_client) REFERENCES client(numero_client),
    FOREIGN KEY (fk_numero_employe) REFERENCES employe(numero_employe),
)ENGINE = INNODB DEFAULT CHARSET=UTF8;

/*Employes : */
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