-- ============================================================
--   Nom de la base   : maillot_nouvelle
--   Nom de SGBD      : MySQL
--   Date de création : Juin 2024
--   Auteur           : ogo
-- ============================================================

-- Création de la base de données
DROP DATABASE IF EXISTS maillot_nouvelle;
CREATE DATABASE maillot_nouvelle;
USE maillot_nouvelle;

-- Configuration du mode SQL pour MySQL
SET SESSION sql_mode = 'STRICT_TRANS_TABLES';

-- Table Client
CREATE TABLE client(
   id_client INT AUTO_INCREMENT,
   mail VARCHAR(100) NOT NULL,
   mot_de_passe VARCHAR(255) NOT NULL, -- Increased length for hashed passwords
   nom VARCHAR(50) NOT NULL,
   prenom VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_client)
);

-- Insertion d'exemples de données dans la table Client
INSERT INTO client (mail, mot_de_passe, nom, prenom) VALUES
('john.doe@example.com', 'password123', 'Doe', 'John'),
('jane.smith@example.com', 'password456', 'Smith', 'Jane');

-- Table Administrateur
CREATE TABLE administrateur (
   id_administrateur INT AUTO_INCREMENT,
   nom_utilisateur VARCHAR(50) NOT NULL,
   mot_de_passe VARCHAR(255) NOT NULL, -- Increased length for hashed passwords
   email VARCHAR(100) NOT NULL,
   nom VARCHAR(50) NOT NULL,
   prenom VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_administrateur)
);

-- Insertion d'exemples de données dans la table Administrateur
INSERT INTO administrateur (nom_utilisateur, mot_de_passe, email, nom, prenom) VALUES
('root1', 'mamadou', 'papaousmaneogo@gmail.com', 'Seck', 'Ousmane'),
('root2', 'Dusty126$', 'bahbouba5000@gmail.com', 'Bah', 'Boubacar'),
('root3', 'toor', 'theteddd@icloud.com', 'Diatha', 'Teddy');

-- Table Commande
CREATE TABLE commande(
   id_commande INT AUTO_INCREMENT,
   statut_commande BOOLEAN NOT NULL,
   date_commande DATE NOT NULL,
   id_client INT NOT NULL,
   PRIMARY KEY(id_commande),
   FOREIGN KEY(id_client) REFERENCES client(id_client)
);

-- Insertion d'exemples de données dans la table Commande
INSERT INTO commande (statut_commande, date_commande, id_client) VALUES
(TRUE, '2024-05-01', 1),
(FALSE, '2024-05-02', 2);

-- Table Categorie
CREATE TABLE categorie(
   id_categorie INT AUTO_INCREMENT,
   nom_categorie VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_categorie)
);

-- Insertion d'exemples de données dans la table Categorie
INSERT INTO categorie (nom_categorie) VALUES
('La Liga'),
('Premier League'),
('Ligue 1'),
('Serie A'),
('Bundesliga');

-- Table Produit
CREATE TABLE produit(
   id_produit INT AUTO_INCREMENT,
   club VARCHAR(50) NOT NULL,
   description_ VARCHAR(255),
   prix DECIMAL(15,2) NOT NULL,
   id_categorie INT NOT NULL,
   image VARCHAR(255),
   PRIMARY KEY(id_produit),
   FOREIGN KEY(id_categorie) REFERENCES categorie(id_categorie)
);

-- Insertion des produits
INSERT INTO produit (club, description_, prix, id_categorie, image) VALUES
('Bayern Munich', 'Maillot Bayern Munich 2024/25 Domicile', 40.00, 5, 'image/16.JPG'),
('Bayern Munich', 'Maillot Bayern Munich 2024/25 Extérieur', 40.00, 5, 'image/17.JPG'),
('Bayern Munich', 'Maillot Bayern Munich 2024/25 Third', 40.00, 5, 'image/18.JPG'),
-- more products...

-- Table Panier
CREATE TABLE panier(
   id_panier INT AUTO_INCREMENT,
   date_creation DATE NOT NULL,
   id_client INT NOT NULL,
   PRIMARY KEY(id_panier),
   UNIQUE(id_client),
   FOREIGN KEY(id_client) REFERENCES client(id_client)
);

-- Insertion d'exemples de données dans la table Panier
INSERT INTO panier (date_creation, id_client) VALUES
('2024-05-01', 1),
('2024-05-02', 2);

-- Table Contact
CREATE TABLE contact(
   id_contact INT AUTO_INCREMENT,
   sujet VARCHAR(50) NOT NULL,
   document_joint VARCHAR(255),
   descriptif TEXT,
   id_client INT NOT NULL,
   PRIMARY KEY(id_contact),
   FOREIGN KEY(id_client) REFERENCES client(id_client)
);

-- Insertion d'exemples de données dans la table Contact
INSERT INTO contact (sujet, document_joint, descriptif, id_client) VALUES
('Support', 'file.pdf', 'Description of the issue', 1),
('Feedback', 'image.png', 'Feedback description', 2);

-- Table Ajouter (Panier et Produit)
CREATE TABLE ajouter(
   id_produit INT,
   id_panier INT,
   quantite INT NOT NULL,
   PRIMARY KEY(id_produit, id_panier),
   FOREIGN KEY(id_produit) REFERENCES produit(id_produit),
   FOREIGN KEY(id_panier) REFERENCES panier(id_panier)
);

-- Insertion d'exemples de données dans la table Ajouter
INSERT INTO ajouter (id_produit, id_panier, quantite) VALUES
(1, 1, 2),
(2, 2, 1);

-- Table Gere (Commande et Administrateur)
CREATE TABLE gere(
   id_commande INT,
   id_administrateur INT,
   PRIMARY KEY(id_commande, id_administrateur),
   FOREIGN KEY(id_commande) REFERENCES commande(id_commande),
   FOREIGN KEY(id_administrateur) REFERENCES administrateur(id_administrateur)
);

-- Insertion d'exemples de données dans la table Gere
INSERT INTO gere (id_commande, id_administrateur) VALUES
(1, 1),
(2, 2);

-- Table Ajouter_Produit_Admin (Produit et Administrateur)
CREATE TABLE ajouter_produit_admin(
   id_produit INT,
   id_administrateur INT,
   PRIMARY KEY(id_produit, id_administrateur),
   FOREIGN KEY(id_produit) REFERENCES produit(id_produit),
   FOREIGN KEY(id_administrateur) REFERENCES administrateur(id_administrateur)
);

-- Insertion d'exemples de données dans la table Ajouter_Produit_Admin
INSERT INTO ajouter_produit_admin (id_produit, id_administrateur) VALUES
(1, 1),
(2, 2);

-- Table Contenir (Commande et Produit)
CREATE TABLE contenir(
   id_produit INT,
   id_commande INT,
   quantite INT NOT NULL,
   PRIMARY KEY(id_produit, id_commande),
   FOREIGN KEY(id_produit) REFERENCES produit(id_produit),
   FOREIGN KEY(id_commande) REFERENCES commande(id_commande)
);

-- Insertion d'exemples de données dans la table Contenir
INSERT INTO contenir (id_produit, id_commande, quantite) VALUES
(1, 1, 2),
(2, 2, 1);

-- Table Favoris (Client et Produit)
CREATE TABLE favoris(
   id_client INT,
   id_produit INT,
   PRIMARY KEY(id_client, id_produit),
   FOREIGN KEY(id_client) REFERENCES client(id_client),
   FOREIGN KEY(id_produit) REFERENCES produit(id_produit)
);

-- Insertion d'exemples de données dans la table Favoris
INSERT INTO favoris (id_client, id_produit) VALUES
(1, 1),
(2, 2);

-- Table Gere_Client (Client et Administrateur)
CREATE TABLE gere_client(
   id_client INT,
   id_administrateur INT,
   PRIMARY KEY(id_client, id_administrateur),
   FOREIGN KEY(id_client) REFERENCES client(id_client),
   FOREIGN KEY(id_administrateur) REFERENCES administrateur(id_administrateur)
);

-- Insertion d'exemples de données dans la table Gere_Client
INSERT INTO gere_client (id_client, id_administrateur) VALUES
(1, 1),
(2, 2);
