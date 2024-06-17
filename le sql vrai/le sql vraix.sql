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
   _Mot_De_Passe VARCHAR(50) NOT NULL,
   nom VARCHAR(50) NOT NULL,
   prénom VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_client)
);

-- Insertion d'exemples de données dans la table Client
INSERT INTO client (mail, _Mot_De_Passe, nom, prénom) VALUES
('john.doe@example.com', 'password123', 'Doe', 'John'),
('jane.smith@example.com', 'password456', 'Smith', 'Jane');

-- Table Commande
CREATE TABLE Commande(
   __ID_Commande INT AUTO_INCREMENT,
   Statut_Commande BOOLEAN NOT NULL,
   _Date_Commande DATE NOT NULL,
   id_client INT NOT NULL,
   PRIMARY KEY(__ID_Commande),
   FOREIGN KEY(id_client) REFERENCES client(id_client)
);

-- Insertion d'exemples de données dans la table Commande
INSERT INTO Commande (Statut_Commande, _Date_Commande, id_client) VALUES
(TRUE, '2024-05-01', 1),
(FALSE, '2024-05-02', 2);

-- Table Administrateur
CREATE TABLE Administrateur_(
   _ID_Administrateur INT AUTO_INCREMENT,
   NomUtilisateur VARCHAR(50) NOT NULL,
   _Mot_De_Passe VARCHAR(50) NOT NULL,
   _Email VARCHAR(50) NOT NULL,
   Nom VARCHAR(50) NOT NULL,
   Prénom VARCHAR(50) NOT NULL,
   PRIMARY KEY(_ID_Administrateur)
);

-- Insertion d'exemples de données dans la table Administrateur
INSERT INTO Administrateur_ (NomUtilisateur, _Mot_De_Passe, _Email, Nom, Prénom) VALUES
('root', 'mamadou', 'papaousmaneogo@gmail.com', 'Seck', 'Ousmane'),
('root', 'Dusty126$', 'bahbouba5000@gmail.com', 'Bah', 'Boubacar'),
('root', 'toor', 'theteddd@icloud.com', 'Diatha', 'teddy');

-- Table Categorie
CREATE TABLE Categorie(
   _ID_Categorie INT AUTO_INCREMENT,
   Nom_Categorie VARCHAR(50) NOT NULL,
   PRIMARY KEY(_ID_Categorie)
);

-- Insertion d'exemples de données dans la table Categorie
INSERT INTO Categorie (Nom_Categorie) VALUES
('La Liga'),
('Premier League'),
('Ligue 1'),
('Serie A'),
('Bundesliga');

-- Table Produit
CREATE TABLE Produit_(
   ID_Produit INT AUTO_INCREMENT,
   club VARCHAR(50) NOT NULL,
   description_ VARCHAR(255),
   Prix_ DECIMAL(15,2) NOT NULL,
   _ID_Categorie INT NOT NULL,
   PRIMARY KEY(ID_Produit),
   FOREIGN KEY(_ID_Categorie) REFERENCES Categorie(_ID_Categorie)
);

-- Insertion des produits
INSERT INTO Produit_ (club, description_, Prix_, _ID_Categorie) VALUES
('Bayern Munich', 'Maillot Bayern Munich 2024/25 Domicile', 40.00, 5),
('Bayern Munich', 'Maillot Bayern Munich 2024/25 Extérieur', 40.00, 5),
('Bayern Munich', 'Maillot Bayern Munich 2024/25 Third', 40.00, 5),
('Dortmund', 'Maillot Dortmund 2024/25 Domicile', 50.00, 5),
('Dortmund', 'Maillot Dortmund 2024/25 Extérieur', 50.00, 5),
('Dortmund', 'Maillot Dortmund 2024/25 Third', 50.00, 5),
('Bayer Leverkusen', 'Maillot Bayer Leverkusen 2024/25 Domicile', 45.00, 5),
('Bayer Leverkusen', 'Maillot Bayer Leverkusen 2024/25 Extérieur', 45.00, 5),
('Bayer Leverkusen', 'Maillot Bayer Leverkusen 2024/25 Third', 45.00, 5),
('Leipzig', 'Maillot Leipzig 2024/25 Domicile', 40.00, 5),
('Leipzig', 'Maillot Leipzig 2024/25 Extérieur', 40.00, 5),
('Leipzig', 'Maillot Leipzig 2024/25 Third', 40.00, 5),
('Barcelone', 'Maillot Barcelone 2024/25 Domicile', 40.00, 1),
('Barcelone', 'Maillot Barcelone 2024/25 Extérieur', 40.00, 1),
('Barcelone', 'Maillot Barcelone 2024/25 Third', 40.00, 1),
('Real Madrid', 'Maillot Real Madrid 2024/25 Domicile', 50.00, 1),
('Real Madrid', 'Maillot Real Madrid 2024/25 Extérieur', 50.00, 1),
('Real Madrid', 'Maillot Real Madrid 2024/25 Third', 50.00, 1),
('Atletico Madrid', 'Maillot Atletico Madrid 2024/25 Domicile', 45.00, 1),
('Atletico Madrid', 'Maillot Atletico Madrid 2024/25 Extérieur', 45.00, 1),
('Atletico Madrid', 'Maillot Atletico Madrid 2024/25 Third', 45.00, 1),
('PSG', 'Maillot PSG 2024/25 Domicile', 40.00, 2),
('PSG', 'Maillot PSG 2024/25 Extérieur', 40.00, 2),
('PSG', 'Maillot PSG 2024/25 Third', 40.00, 2),
('Marseille', 'Maillot Marseille 2024/25 Domicile', 50.00, 2),
('Marseille', 'Maillot Marseille 2024/25 Extérieur', 50.00, 2),
('Marseille', 'Maillot Marseille 2024/25 Third', 50.00, 2),
('Lyon', 'Maillot Lyon 2024/25 Domicile', 45.00, 2),
('Lyon', 'Maillot Lyon 2024/25 Extérieur', 45.00, 2),
('Lyon', 'Maillot Lyon 2024/25 Third', 45.00, 2),
('Lille', 'Maillot Lille 2024/25 Domicile', 40.00, 2),
('Lille', 'Maillot Lille 2024/25 Extérieur', 40.00, 2),
('Lille', 'Maillot Lille 2024/25 Third', 40.00, 2),
('Monaco', 'Maillot Monaco 2024/25 Domicile', 40.00, 2),
('Monaco', 'Maillot Monaco 2024/25 Extérieur', 40.00, 2),
('Monaco', 'Maillot Monaco 2024/25 Third', 40.00, 2),
('Manchester City', 'Maillot Manchester City 2024/25 Domicile', 40.00, 3),
('Manchester City', 'Maillot Manchester City 2024/25 Extérieur', 40.00, 3),
('Manchester City', 'Maillot Manchester City 2024/25 Third', 40.00, 3),
('Arsenal', 'Maillot Arsenal 2024/25 Domicile', 50.00, 3),
('Arsenal', 'Maillot Arsenal 2024/25 Extérieur', 50.00, 3),
('Arsenal', 'Maillot Arsenal 2024/25 Third', 50.00, 3),
('Liverpool', 'Maillot Liverpool 2024/25 Domicile', 45.00, 3),
('Liverpool', 'Maillot Liverpool 2024/25 Extérieur', 45.00, 3),
('Liverpool', 'Maillot Liverpool 2024/25 Third', 45.00, 3),
('Tottenham', 'Maillot Tottenham 2024/25 Domicile', 45.00, 3),
('Tottenham', 'Maillot Tottenham 2024/25 Extérieur', 45.00, 3),
('Tottenham', 'Maillot Tottenham 2024/25 Third', 45.00, 3),
('Chelsea', 'Maillot Chelsea 2024/25 Domicile', 45.00, 3),
('Chelsea', 'Maillot Chelsea 2024/25 Extérieur', 45.00, 3),
('Chelsea', 'Maillot Chelsea 2024/25 Third', 45.00, 3),
('Manchester United', 'Maillot Manchester United 2024/25 Domicile', 45.00, 3),
('Manchester United', 'Maillot Manchester United 2024/25 Extérieur', 45.00, 3),
('Manchester United', 'Maillot Manchester United 2024/25 Third', 45.00, 3),
('AC Milan', 'Maillot AC Milan 2024/25 Domicile', 40.00, 4),
('AC Milan', 'Maillot AC Milan 2024/25 Extérieur', 40.00, 4),
('AC Milan', 'Maillot AC Milan 2024/25 Third', 40.00, 4),
('Juventus', 'Maillot Juventus 2024/25 Domicile', 50.00, 4),
('Juventus', 'Maillot Juventus 2024/25 Extérieur', 50.00, 4),
('Juventus', 'Maillot Juventus 2024/25 Third', 50.00, 4),
('Inter Milan', 'Maillot Inter Milan 2024/25 Domicile', 45.00, 4),
('Inter Milan', 'Maillot Inter Milan 2024/25 Extérieur', 45.00, 4),
('Inter Milan', 'Maillot Inter Milan 2024/25 Third', 45.00, 4),
('Napoli', 'Maillot Napoli 2024/25 Domicile', 40.00, 4),
('Napoli', 'Maillot Napoli 2024/25 Extérieur', 40.00, 4),
('Napoli', 'Maillot Napoli 2024/25 Third', 40.00, 4);

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

-- Table Ajouter
CREATE TABLE ajouter(
   ID_Produit INT,
   id_panier INT,
   quantite INT NOT NULL,
   PRIMARY KEY(ID_Produit, id_panier),
   FOREIGN KEY(ID_Produit) REFERENCES Produit_(ID_Produit),
   FOREIGN KEY(id_panier) REFERENCES panier(id_panier)
);

-- Insertion d'exemples de données dans la table Ajouter
INSERT INTO ajouter (ID_Produit, id_panier, quantite) VALUES
(1, 1, 2),
(2, 2, 1);

-- Table Gere (Commande et Administrateur)
CREATE TABLE gere(
   __ID_Commande INT,
   _ID_Administrateur INT,
   PRIMARY KEY(__ID_Commande, _ID_Administrateur),
   FOREIGN KEY(_ID_Commande) REFERENCES Commande(_ID_Commande),
   FOREIGN KEY(ID_Administrateur) REFERENCES Administrateur(_ID_Administrateur)
);

-- Insertion d'exemples de données dans la table Gere
INSERT INTO gere (__ID_Commande, _ID_Administrateur) VALUES
(1, 1),
(2, 2);

-- Table Ajouterr (Produit et Administrateur)
CREATE TABLE ajouterr(
   ID_Produit INT,
   _ID_Administrateur INT,
   PRIMARY KEY(ID_Produit, _ID_Administrateur),
   FOREIGN KEY(ID_Produit) REFERENCES Produit_(ID_Produit),
   FOREIGN KEY(ID_Administrateur) REFERENCES Administrateur(_ID_Administrateur)
);

-- Table Contenir (Commande et Produit)
CREATE TABLE contenir(
   ID_Produit INT,
   __ID_Commande INT,
   quantite INT NOT NULL,
   PRIMARY KEY(ID_Produit, __ID_Commande),
   FOREIGN KEY(ID_Produit) REFERENCES Produit_(ID_Produit),
   FOREIGN KEY(_ID_Commande) REFERENCES Commande(_ID_Commande)
);

-- Insertion d'exemples de données dans la table Contenir
INSERT INTO contenir (ID_Produit, __ID_Commande, quantite) VALUES
(1, 1, 2),
(2, 2, 1);

-- Table Favoris (Client et Produit)
CREATE TABLE favoris(
   id_client INT,
   ID_Produit INT,
   PRIMARY KEY(id_client, ID_Produit),
   FOREIGN KEY(id_client) REFERENCES client(id_client),
   FOREIGN KEY(ID_Produit) REFERENCES Produit_(ID_Produit)
);

-- Insertion d'exemples de données dans la table Favoris
INSERT INTO favoris (id_client, ID_Produit) VALUES
(1, 1),
(2, 2);

-- Table Gère (Client et Administrateur)
CREATE TABLE gère(
   id_client INT,
   _ID_Administrateur INT,
   PRIMARY KEY(id_client, _ID_Administrateur),
   FOREIGN KEY(id_client) REFERENCES client(id_client),
   FOREIGN KEY(ID_Administrateur) REFERENCES Administrateur(_ID_Administrateur)
);

-- Insertion d'exemples de données dans la table Gère
INSERT INTO gère (id_client, _ID_Administrateur) VALUES
(1, 1),
(2, 2);