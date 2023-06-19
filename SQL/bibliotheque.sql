CREATE DATABASE IF NOT EXISTS bibliotheque;

USE bibliotheque;

DROP TABLE IF EXISTS abonne;
CREATE TABLE IF NOT EXISTS abonne (
  id_abonne int(3) NOT NULL AUTO_INCREMENT,
  prenom varchar(200) NOT NULL,
  nom varchar(200) NOT NULL,
  email varchar(200) NOT NULL,
  adresse text NOT NULL,
  cp varchar(5) NOT NULL,
  ville varchar(200) NOT NULL,
  PRIMARY KEY (id_abonne)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;


INSERT INTO abonne (id_abonne, prenom, nom, email, adresse, cp, ville) VALUES
(7, 'Mathieu', 'Quittard', 'mathieu.qtrd@gmail.com', '1 rue de la l\'arbre', '75001', 'Paris'),
(9, 'Dupond', 'Marie', 'marie@mail.fr', '1 rue de Paris', '75000', 'Paris'),
(12, 'admin', 'Admin', 'admin@mail.fr', 'Rue de Paris', '75000', 'Paris'),
(13, 'John', 'Doe', 'jdoe@mail.fr', '1 rue de Lyon', '69000', 'Lyon'),
(14, 'François', 'Dupond', 'mail@mail.fr', '4 rue de la maison', '75000', 'Paris');


DROP TABLE IF EXISTS emprunt;
CREATE TABLE IF NOT EXISTS emprunt (
  id_emprunt int(3) NOT NULL AUTO_INCREMENT,
  id_livre int(3) DEFAULT NULL,
  id_abonne int(3) DEFAULT NULL,
  date_sortie date DEFAULT NULL,
  date_rendu date DEFAULT NULL,
  PRIMARY KEY (id_emprunt)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;


INSERT INTO emprunt (id_emprunt, id_livre, id_abonne, date_sortie, date_rendu) VALUES
(2, 102, 12, '2023-03-09', '2023-03-14'),
(3, 101, 13, '2023-03-14', NULL),
(4, 100, 9, '2023-03-17', NULL),
(6, 101, 9, '2023-03-17', NULL),
(7, 102, 7, '2023-03-11', NULL);


DROP TABLE IF EXISTS livre;
CREATE TABLE IF NOT EXISTS livre (
  id_livre int(3) NOT NULL AUTO_INCREMENT,
  auteur varchar(200) NOT NULL,
  titre varchar(200) NOT NULL,
  PRIMARY KEY (id_livre)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;


INSERT INTO livre (id_livre, auteur, titre) VALUES
(100, 'Alexandre Dumas', 'Les trois mousquetaires'),
(101, 'Alexandre Dumas', 'Vingt Ans après'),
(102, 'Alexandre Dumas', 'Le Comte de Monte-Cristo');
