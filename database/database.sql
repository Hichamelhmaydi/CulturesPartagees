USE CulturesPartagees;

CREATE TABLE user (
    id_user INT AUTO_INCREMENT PRIMARY KEY NOT NULL ,
    nom VARCHAR(20) NOT NULL UNIQUE,
    prenom VARCHAR(20) NOT NULL, 
    email VARCHAR (50) NOT NULL UNIQUE, 
    user_password VARCHAR(20),
    role ENUM ('utilisateur','auteur')
);
ALTER TABLE user MODIFY COLUMN user_password VARCHAR(255);
CREATE TABLE admin (
    email VARCHAR(50),
    admin_password VARCHAR(20) 
);
USE CulturesPartagees;
ALTER TABLE user DROP COLUMN image;
ALTER TABLE user ADD COLUMN profile LONGBLOB;

INSERT INTO admin (email, admin_password) VALUES ('admin@gmail.com', 'ABC12332100');

CREATE TABLE categories (
    id_catr  INT AUTO_INCREMENT PRIMARY KEY ,
     nom_ca VARCHAR(20) UNIQUE
);

DROP TABLE article;
CREATE TABLE article (
   id_art INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
   titre VARCHAR(20) NOT NULL UNIQUE,
   contenu VARCHAR(500) UNIQUE, 
   statut ENUM('en attente', 'accepter', 'refuser') DEFAULT 'en attente',
   auteur VARCHAR(20),
   categorie VARCHAR(20),
   FOREIGN KEY (auteur) REFERENCES user(nom),
   FOREIGN KEY (categorie) REFERENCES categories(nom_ca)
);


ALTER TABLE article
    ADD image_art  LONGBLOB   ;
USE CulturesPartagees;
ALTER TABLE article
DROP FOREIGN KEY article_ibfk_2;

ALTER TABLE article
ADD CONSTRAINT article_ibfk_2 FOREIGN KEY (categorie) REFERENCES categories(nom_ca)
ON UPDATE CASCADE;

DELETE FROM user;
DELETE FROM aime;

USE CulturesPartagees;
CREATE TABLE aime (
    id_aime INT AUTO_INCREMENT PRIMARY KEY,
    titre_aime VARCHAR(20),
    contenu_aime VARCHAR(500),
    FOREIGN KEY (titre_aime) REFERENCES article(titre),
    FOREIGN KEY (contenu_aime) REFERENCES article(contenu)
);


