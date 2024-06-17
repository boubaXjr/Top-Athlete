-- ============================================================
--   Nom de la base   : maillot_nouvelle
--   Nom de SGBD      : MySQL
--   Date de création : Juin 2024
--   Auteur           : ogo
-- ============================================================

-- Supprimer la base de données si elle existe déjà
DROP DATABASE IF EXISTS maillot_nouvelle;
CREATE DATABASE maillot_nouvelle;

-- Utiliser la nouvelle base de données
USE maillot_nouvelle;

-- Configuration du mode SQL pour MySQL
SET SESSION sql_mode = 'STRICT_TRANS_TABLES';

-- Table Client
CREATE TABLE client (
   id_client INT AUTO_INCREMENT,
   email VARCHAR(100) NOT NULL,
   mot_de_passe VARCHAR(50) NOT NULL,
   nom VARCHAR(50) NOT NULL,
   prenom VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_client)
);

-- Insertion d'exemples de données dans la table Client
INSERT INTO client (email, mot_de_passe, nom, prenom) VALUES
('john.doe@example.com', 'password123', 'Doe', 'John'),
('jane.smith@example.com', 'password456', 'Smith', 'Jane');

-- Table Commande
CREATE TABLE commande (
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

-- Table Administrateur
CREATE TABLE administrateur (
   id_administrateur INT AUTO_INCREMENT,
   nom_utilisateur VARCHAR(50) NOT NULL,
   mot_de_passe VARCHAR(50) NOT NULL,
   email VARCHAR(50) NOT NULL,
   nom VARCHAR(50) NOT NULL,
   prenom VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_administrateur)
);

-- Insertion d'exemples de données dans la table Administrateur
INSERT INTO administrateur (nom_utilisateur, mot_de_passe, email, nom, prenom) VALUES
('root', 'mamadou', 'papaousmaneogo@gmail.com', 'Seck', 'Ousmane'),
('root', 'Dusty126$', 'bahbouba5000@gmail.com', 'Bah', 'Boubacar'),
('root', 'toor', 'theteddd@icloud.com', 'Diatha', 'teddy');


-- Table Categorie
CREATE TABLE categorie (
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
CREATE TABLE produit (
   id_produit INT AUTO_INCREMENT,
   club VARCHAR(50) NOT NULL,
   description VARCHAR(255),
   prix DECIMAL(15,2) NOT NULL,
   id_categorie INT NOT NULL,
   PRIMARY KEY(id_produit),
   FOREIGN KEY(id_categorie) REFERENCES categorie(id_categorie)
);

-- Insertion des produits
INSERT INTO produit (club, description, prix, id_categorie) VALUES
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
CREATE TABLE panier (
   id_panier INT AUTO_INCREMENT,
   date_creation DATE NOT NULL,
   id_client INT NOT NULL,
   PRIMARY KEY(id_panier),
   FOREIGN KEY(id_client) REFERENCES client(id_client)
);

-- Insertion d'exemples de données dans la table Panier
INSERT INTO panier (date_creation, id_client) VALUES
('2024-05-01', 1),
('2024-05-02', 2);

-- Table Contact
CREATE TABLE contact (
   id_contact INT AUTO_INCREMENT,
   sujet VARCHAR(100) NOT NULL,
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
CREATE TABLE ajouter (
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

-- Table Gere
CREATE TABLE gere (
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

-- Table Contenir
CREATE TABLE contenir (
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

-- Table Favoris
CREATE TABLE favoris (
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

