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
   mot_de_passe VARCHAR(50) NOT NULL,
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
   mot_de_passe VARCHAR(50) NOT NULL,
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
CREATE TABLE Commande(
   ID_Commande INT AUTO_INCREMENT,
   Statut_Commande BOOLEAN NOT NULL,
   Date_Commande DATE NOT NULL,
   id_client INT NOT NULL,
   PRIMARY KEY(ID_Commande),
   FOREIGN KEY(id_client) REFERENCES client(id_client)
);

-- Insertion d'exemples de données dans la table Commande
INSERT INTO Commande (Statut_Commande, Date_Commande, id_client) VALUES
(TRUE, '2024-05-01', 1),
(FALSE, '2024-05-02', 2);

-- Table Categorie
CREATE TABLE Categorie(
   ID_Categorie INT AUTO_INCREMENT,
   Nom_Categorie VARCHAR(50) NOT NULL,
   PRIMARY KEY(ID_Categorie)
);

-- Insertion d'exemples de données dans la table Categorie
INSERT INTO Categorie (Nom_Categorie) VALUES
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
('Dortmund', 'Maillot Dortmund 2024/25 Domicile', 50.00, 5, 'image/19.JPG'),
('Dortmund', 'Maillot Dortmund 2024/25 Extérieur', 50.00, 5, 'image/20.JPG'),
('Dortmund', 'Maillot Dortmund 2024/25 Third', 50.00, 5, 'image/21.JPG'),
('Bayer Leverkusen', 'Maillot Bayer Leverkusen 2024/25 Domicile', 45.00, 5, 'image/22.JPG'),
('Bayer Leverkusen', 'Maillot Bayer Leverkusen 2024/25 Extérieur', 45.00, 5, 'image/23.JPG'),
('Bayer Leverkusen', 'Maillot Bayer Leverkusen 2024/25 Third', 45.00, 5, 'image/24.JPG'),
('Leipzig', 'Maillot Leipzig 2024/25 Domicile', 40.00, 5, 'image/25.JPG'),
('Leipzig', 'Maillot Leipzig 2024/25 Extérieur', 40.00, 5, 'image/26.JPG'),
('Leipzig', 'Maillot Leipzig 2024/25 Third', 40.00, 5, 'image/27.JPG'),
('Barcelone', 'Maillot Barcelone 2024/25 Domicile', 40.00, 1, 'image/28.JPG'),
('Barcelone', 'Maillot Barcelone 2024/25 Extérieur', 40.00, 1, 'image/29.JPG'),
('Barcelone', 'Maillot Barcelone 2024/25 Third', 40.00, 1, 'image/30.JPG'),
('Real Madrid', 'Maillot Real Madrid 2024/25 Domicile', 50.00, 1, 'image/31.JPG'),
('Real Madrid', 'Maillot Real Madrid 2024/25 Extérieur', 50.00, 1, 'image/32.JPG'),
('Real Madrid', 'Maillot Real Madrid 2024/25 Third', 50.00, 1, 'image/33.JPG'),
('Atletico Madrid', 'Maillot Atletico Madrid 2024/25 Domicile', 45.00, 1, 'image/34.JPG'),
('Atletico Madrid', 'Maillot Atletico Madrid 2024/25 Extérieur', 45.00, 1, 'image/35.JPG'),
('Atletico Madrid', 'Maillot Atletico Madrid 2024/25 Third', 45.00, 1, 'image/36.JPG'),
('PSG', 'Maillot PSG 2024/25 Domicile', 40.00, 2, 'image/maillot_psg-bege.JPEG'),
('PSG', 'Maillot PSG 2024/25 Extérieur', 40.00, 2, 'image/maillot_psg-blanc.JPEG'),
('PSG', 'Maillot PSG 2024/25 Third', 40.00, 2, 'image/maillot_psg-bleu.JPEG'),
('Marseille', 'Maillot Marseille 2024/25 Domicile', 50.00, 2, 'image/maillot_marseille_tigre.JPEG'),
('Marseille', 'Maillot Marseille 2024/25 Extérieur', 50.00, 2, 'image/maillot_marseille_blanc1.JPEG'),
('Marseille', 'Maillot Marseille 2024/25 Third', 50.00, 2, 'image/maillot_marseille_blanc2.JPEG'),
('Lyon', 'Maillot Lyon 2024/25 Domicile', 45.00, 2, 'image/maillot_lyon_bleu.JPEG'),
('Lyon', 'Maillot Lyon 2024/25 Extérieur', 45.00, 2, 'image/maillot_lyon-multicou.JPEG'),
('Lyon', 'Maillot Lyon 2024/25 Third', 45.00, 2, 'image/maillot_lyon_blanc.JPEG'),
('Lille', 'Maillot Lille 2024/25 Domicile', 40.00, 2, 'image/maillot-lile_rouge.JPEG'),
('Lille', 'Maillot Lille 2024/25 Extérieur', 40.00, 2, 'image/maillot-lile_bleu.JPEG'),
('Lille', 'Maillot Lille 2024/25 Third', 40.00, 2, 'image/maillot-lile_blanc.JPEG'),
('Monaco', 'Maillot Monaco 2024/25 Domicile', 40.00, 2, 'image/maillot_monaco_rouge.JPEG'),
('Monaco', 'Maillot Monaco 2024/25 Extérieur', 40.00, 2, 'image/maillot_monaco_noire.JPEG'),
('Monaco', 'Maillot Monaco 2024/25 Third', 40.00, 2, 'image/maillot_monaco_noire&jaune.JPEG'),
('Manchester City', 'Maillot Manchester City 2024/25 Domicile', 40.00, 3, 'image/1.JPG'),
('Manchester City', 'Maillot Manchester City 2024/25 Extérieur', 40.00, 3, 'image/2.JPG'),
('Manchester City', 'Maillot Manchester City 2024/25 Third', 40.00, 3, 'image/3.JPG'),
('Arsenal', 'Maillot Arsenal 2024/25 Domicile', 50.00, 3, 'image/arsenal 1.JPG'),
('Arsenal', 'Maillot Arsenal 2024/25 Extérieur', 50.00, 3, 'image/arsenal 2.JPG'),
('Arsenal', 'Maillot Arsenal 2024/25 Third', 50.00, 3, 'image/arsenal 3.JPG'),
('Liverpool', 'Maillot Liverpool 2024/25 Domicile', 45.00, 3, 'image/4.JPG'),
('Liverpool', 'Maillot Liverpool 2024/25 Extérieur', 45.00, 3, 'image/5.JPG'),
('Liverpool', 'Maillot Liverpool 2024/25 Third', 45.00, 3, 'image/6.JPG'),
('Tottenham', 'Maillot Tottenham 2024/25 Domicile', 45.00, 3, 'image/7.JPG'),
('Tottenham', 'Maillot Tottenham 2024/25 Extérieur', 45.00, 3, 'image/8.JPG'),
('Tottenham', 'Maillot Tottenham 2024/25 Third', 45.00, 3, 'image/9.JPG'),
('Chelsea', 'Maillot Chelsea 2024/25 Domicile', 45.00, 3, 'image/10.JPG'),
('Chelsea', 'Maillot Chelsea 2024/25 Extérieur', 45.00, 3, 'image/11.JPG'),
('Chelsea', 'Maillot Chelsea 2024/25 Third', 45.00, 3, 'image/12.JPG'),
('Manchester United', 'Maillot Manchester United 2024/25 Domicile', 45.00, 3, 'image/13.JPG'),
('Manchester United', 'Maillot Manchester United 2024/25 Extérieur', 45.00, 3, 'image/14.JPG'),
('Manchester United', 'Maillot Manchester United 2024/25 Third', 45.00, 3, 'image/15.JPG'),
('AC Milan', 'Maillot AC Milan 2024/25 Domicile', 40.00, 4, 'image/milan 1.JPG'),
('AC Milan', 'Maillot AC Milan 2024/25 Extérieur', 40.00, 4, 'image/milan 2.JPG'),
('AC Milan', 'Maillot AC Milan 2024/25 Third', 40.00, 4, 'image/milan 3.JPG'),
('Juventus', 'Maillot Juventus 2024/25 Domicile', 50.00, 4, 'image/Juventus_1.JPEG'),
('Juventus', 'Maillot Juventus 2024/25 Extérieur', 50.00, 4, 'image/Juventus_rose.JPEG'),
('Juventus', 'Maillot Juventus 2024/25 Third', 50.00, 4, 'image/Juventus_noire.JPEG'),
('Inter Milan', 'Maillot Inter Milan 2024/25 Domicile', 45.00, 4, 'image/internoireblanc.JPEG'),
('Inter Milan', 'Maillot Inter Milan 2024/25 Extérieur', 45.00, 4, 'image/interblanc.JPEG'),
('Inter Milan', 'Maillot Inter Milan 2024/25 Third', 45.00, 4, 'image/interbleu.JPEG'),
('Napoli', 'Maillot Napoli 2024/25 Domicile', 40.00, 4, 'image/napoli_blanc.JPEG'),
('Napoli', 'Maillot Napoli 2024/25 Extérieur', 40.00, 4, 'image/napoli_bleu.JPEG'),
('Napoli', 'Maillot Napoli 2024/25 Third', 40.00, 4, 'image/napoli_noire.JPEG');

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
   ID_Produit INT,
   id_panier INT,
   quantite INT NOT NULL,
   PRIMARY KEY(ID_Produit, id_panier),
   FOREIGN KEY(ID_Produit) REFERENCES Produit(ID_Produit),
   FOREIGN KEY(id_panier) REFERENCES panier(id_panier)
);

-- Insertion d'exemples de données dans la table Ajouter
INSERT INTO ajouter (ID_Produit, id_panier, quantite) VALUES
(1, 1, 2),
(2, 2, 1);

-- Table Gere (Commande et Administrateur)
CREATE TABLE gere(
   ID_Commande INT,
   ID_Administrateur INT,
   PRIMARY KEY(ID_Commande, ID_Administrateur),
   FOREIGN KEY(ID_Commande) REFERENCES Commande(ID_Commande),
   FOREIGN KEY(ID_Administrateur) REFERENCES Administrateur(ID_Administrateur)
);

-- Insertion d'exemples de données dans la table Gere
INSERT INTO gere (ID_Commande, ID_Administrateur) VALUES
(1, 1),
(2, 2);

-- Table Ajouterr (Produit et Administrateur)
CREATE TABLE ajouterr(
   ID_Produit INT,
   ID_Administrateur INT,
   PRIMARY KEY(ID_Produit, ID_Administrateur),
   FOREIGN KEY(ID_Produit) REFERENCES Produit(ID_Produit),
   FOREIGN KEY(ID_Administrateur) REFERENCES Administrateur(ID_Administrateur)
);

-- Insertion d'exemples de données dans la table Ajouterr
INSERT INTO ajouterr (ID_Produit, ID_Administrateur) VALUES
(1, 1),
(2, 2);

-- Table Contenir (Commande et Produit)
CREATE TABLE contenir(
   ID_Produit INT,
   ID_Commande INT,
   quantite INT NOT NULL,
   PRIMARY KEY(ID_Produit, ID_Commande),
   FOREIGN KEY(ID_Produit) REFERENCES Produit(ID_Produit),
   FOREIGN KEY(ID_Commande) REFERENCES Commande(ID_Commande)
);

-- Insertion d'exemples de données dans la table Contenir
INSERT INTO contenir (ID_Produit, ID_Commande, quantite) VALUES
(1, 1, 2),
(2, 2, 1);

-- Table Favoris (Client et Produit)
CREATE TABLE favoris(
   id_client INT,
   ID_Produit INT,
   PRIMARY KEY(id_client, ID_Produit),
   FOREIGN KEY(id_client) REFERENCES client(id_client),
   FOREIGN KEY(ID_Produit) REFERENCES Produit(ID_Produit)
);

-- Insertion d'exemples de données dans la table Favoris
INSERT INTO favoris (id_client, ID_Produit) VALUES
(1, 1),
(2, 2);

-- Table Gere_Client (Client et Administrateur)
CREATE TABLE gere_client(
   id_client INT,
   ID_Administrateur INT,
   PRIMARY KEY(id_client, ID_Administrateur),
   FOREIGN KEY(id_client) REFERENCES client(id_client),
   FOREIGN KEY(ID_Administrateur) REFERENCES Administrateur(ID_Administrateur)
);

-- Insertion d'exemples de données dans la table Gere_Client
INSERT INTO gere_client (id_client, ID_Administrateur) VALUES
(1, 1),
(2, 2);
