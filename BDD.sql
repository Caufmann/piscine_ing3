
CREATE TABLE Acheteur(
Id int(11) NOT NULL AUTO_INCREMENT,
Mail varchar(255) NOT NULL,
Password varchar(255) NOT NULL,
Nom varchar(255) NOT NULL,
Prenom varchar(255) NOT NULL,
Adresse varchar(255) NOT NULL,
Ville varchar(255) NOT NULL,
Code_postal int(11) NOT NULL,
Telephone Bigint(9) NOT NULL,

PRIMARY KEY (Id) 
);

Insert into Acheteur(Id,Mail,Password,Nom,Prenom,Adresse,Ville,Code_postal,Telephone) values(1000,'alexandre.baron@edu.ece.fr','GuiLeKing','Alexande','Baron','2 rue Andre Givaux','Paris',75015,0638328756);


CREATE TABLE Vendeur(
Id int(11) NOT NULL AUTO_INCREMENT,
Mail varchar(255) NOT NULL,
Password varchar(255) NOT NULL,
Pseudo varchar(255) NOT NULL,
Nom varchar(255) NOT NULL,
Photo varchar(255) NOT NULL,   
Img_fond varchar(255) NOT NULL,



PRIMARY KEY (Id)
);

Insert into Vendeur(Id,Mail,Password,Pseudo,Nom,Photo,Img_fond) values(2,'clement.cauffet@edu.ece.fr','mdp1','LaCaufette','Clement','clement.jpg','fond1.jpg');
Insert into Vendeur(Id,Mail,Password,Pseudo,Nom,Photo,Img_fond) values(3,'quentin.mulliez@edu.ece.fr','mdp2','LaVictimeDu78','Quentin','quentin.jpg','fond2.jpg');
Insert into Vendeur(Id,Mail,Password,Pseudo,Nom,Photo,Img_fond) values(4,'aness.jeddor@edu.ece.fr','mdp3','SansPorcSVP','Aness','aness.jpg','fond3.jpg');




CREATE TABLE Carte_Bank(
Id int(11) NOT NULL,
Type_carte ENUM('Mastercard','American Express','Visa','Paypal') NOT NULL,
Num_carte Bigint(11) NOT NULL,
Date_carte DATE NOT NULL,
Nom_carte varchar(255) NOT NULL,
Code_carte Bigint(33) NOT NULL,


PRIMARY KEY (Num_carte), 
FOREIGN KEY (Id) REFERENCES Acheteur (Id)
);

Insert into Carte_Bank(Id,Type_carte,Num_carte,Date_carte,Nom_carte,Code_carte) values(1000,'Mastercard',5237456541327698,'2015-10-07','Alexandre Baron','389');



CREATE TABLE Administrateur(
Id int(11) NOT NULL,
Mail varchar(255) NOT NULL,
Password varchar(255) NOT NULL,
Pseudo varchar(255) NOT NULL,
Photo varchar(255) NOT NULL,   
Img_fond varchar(255) NOT NULL,

PRIMARY KEY (Id)
);

Insert into Administrateur(Id,Mail,Password,Pseudo,Photo,Img_fond) values(1,'guillaume.tabard@edu.ece.fr','Admin','Zeub','guillaume.jpg','fond4.jpg');



CREATE TABLE Article(
Id_article int(11) NOT NULL AUTO_INCREMENT,
Categorie varchar(255) NOT NULL,
Nom varchar(255) NOT NULL,
Photo1 varchar(255) NOT NULL,
Photo2 varchar(255), 
Photo3 varchar(255),
Description varchar(255) NOT NULL,
Prix int(11) NOT NULL,   
Reduction_prix int(11),
Cpt_vente int(11),
Id int (11) NOT NULL,


PRIMARY KEY (Id_article), 
FOREIGN KEY (Id) REFERENCES Vendeur (Id)
);

Insert into Article(Id_article,Categorie,Nom,Photo1,Photo2,Photo3,Description,Prix,Reduction_prix,Cpt_vente,Id) 
					values(1,'Vetement','NikeAir','NikeAir.jpg','NikeAirNoire.jpg','NikeAirRouge.jpg','Super nike qui tiennent bien au pied',110,1,0,1);


Insert into Article(Id_article,Categorie,Nom,Photo1,Photo2,Photo3,Description,Prix,Reduction_prix,Cpt_vente,Id) 
					values(2,'Vetement','Adidas','Addidas.jpg',NULL,NULL,'Les meilleures amies des fous de rando',160,1,0,1);
Insert into Article(Id_article,Categorie,Nom,Photo1,Photo2,Photo3,Description,Prix,Reduction_prix,Cpt_vente,Id) 
					values(3,'Vetement','Pantacourt','Pantacourt.jpg',NULL,NULL,'Pour les grands et les petits',35,1,0,1);
Insert into Article(Id_article,Categorie,Nom,Photo1,Photo2,Photo3,Description,Prix,Reduction_prix,Cpt_vente,Id) 
					values(4,'Vetement','Robe','Robe.jpg',NULL,NULL,'Pour etre la reine de la soiree',65,1,0,1);

Insert into Article(Id_article,Categorie,Nom,Photo1,Photo2,Photo3,Description,Prix,Reduction_prix,Cpt_vente,Id) 
					values(5,'Livre','Les Miserables','Miserables.jpg',NULL,NULL,'Oeuvre emblematique de la litterature francaise',17,1,0,1);
Insert into Article(Id_article,Categorie,Nom,Photo1,Photo2,Photo3,Description,Prix,Reduction_prix,Cpt_vente,Id) 
					values(6,'Livre','Le crime de l orient express','Orient.jpg',NULL,NULL,'Best seller de l univers policier',7,1,0,1);

Insert into Article(Id_article,Categorie,Nom,Photo1,Photo2,Photo3,Description,Prix,Reduction_prix,Cpt_vente,Id) 
					values(7,'Musique','Californication','Californication.jpg',NULL,NULL,'Profitez des Red Hot Chili Peppers',2,1,0,1);
Insert into Article(Id_article,Categorie,Nom,Photo1,Photo2,Photo3,Description,Prix,Reduction_prix,Cpt_vente,Id) 
					values(8,'Musique','Under the bridge','Under_the_bridge.jpg',NULL,NULL,'Profitez des Red Hot Chili Peppers',2,1,0,1);
Insert into Article(Id_article,Categorie,Nom,Photo1,Photo2,Photo3,Description,Prix,Reduction_prix,Cpt_vente,Id) 
					values(9,'Musique','Allumez le feu','Allumez_le_feu.jpg',NULL,NULL,'Pour faire revivre la flamme de Johnny',3,1,0,1);

Insert into Article(Id_article,Categorie,Nom,Photo1,Photo2,Photo3,Description,Prix,Reduction_prix,Cpt_vente,Id) 
					values(10,'Sport','Balle de golf','Balle_de_golf.jpg',NULL,NULL,'Remplissez tous les trous ',5,1,0,1);
Insert into Article(Id_article,Categorie,Nom,Photo1,Photo2,Photo3,Description,Prix,Reduction_prix,Cpt_vente,Id) 
					values(11,'Sport','Raquette de tennis','Raquette_de_tennis.jpg',NULL,NULL,'Pour un coup droit sans relache',40,1,0,1);
Insert into Article(Id_article,Categorie,Nom,Photo1,Photo2,Photo3,Description,Prix,Reduction_prix,Cpt_vente,Id) 
					values(12,'Sport','Bonnet de bain','Bonnet_de_bain.jpg',NULL,NULL,'Comme un poisson dans l eau',8,1,0,1);






CREATE TABLE Livre(
Identifiant int(11) NOT NULL,
Code_article int(11) NOT NULL  AUTO_INCREMENT,
Categorie ENUM('Livre') NOT NULL,
Genre varchar(255) NOT NULL,
Auteur varchar(255) NOT NULL,
Editeur varchar(255) NOT NULL,
Quantite int(11),

PRIMARY KEY (Code_article),
FOREIGN KEY (Identifiant) REFERENCES Article (Id_article)
);

Insert into Livre(Identifiant,Categorie,Genre,Auteur,Editeur,Quantite) values(5,'Livre','Tragedie','Victor Hugo','Flammarion',21);
Insert into Livre(Identifiant,Categorie,Genre,Auteur,Editeur,Quantite) values(6,'Livre','Policier','Agatha Christie','Livre de poche',12);

CREATE TABLE Vetement(
Identifiant int(11) NOT NULL,
Code_article int(11)  NOT NULL AUTO_INCREMENT,
Categorie ENUM('Vetement') NOT NULL,
Type varchar(255) NOT NULL,
Taille varchar(255) NOT NULL,
Couleur varchar(255) NOT NULL,
Genre ENUM('M','F') NOT NULL,
Quantite int(11),

PRIMARY KEY (Code_article),
FOREIGN KEY (Identifiant) REFERENCES Article (Id_article)
)ENGINE=MyISAM AUTO_INCREMENT=150;

Insert into Vetement(Identifiant,Categorie,Type,Taille,Couleur,Genre,Quantite) values(1,'Vetement','Chaussures','S','Blanc','M',34);
Insert into Vetement(Identifiant,Categorie,Type,Taille,Couleur,Genre,Quantite) values(1,'Vetement','Chaussures','M','Blanc','F',23);
Insert into Vetement(Identifiant,Categorie,Type,Taille,Couleur,Genre,Quantite) values(1,'Vetement','Chaussures','M','Noir','M',8);
Insert into Vetement(Identifiant,Categorie,Type,Taille,Couleur,Genre,Quantite) values(2,'Vetement','Chaussures','L','Rouge','F',19);
Insert into Vetement(Identifiant,Categorie,Type,Taille,Couleur,Genre,Quantite) values(3,'Vetement','Pantacourt','M','Blanc','M',21);
Insert into Vetement(Identifiant,Categorie,Type,Taille,Couleur,Genre,Quantite) values(4,'Vetement','Bas','M','Bleu','M',17);
Insert into Vetement(Identifiant,Categorie,Type,Taille,Couleur,Genre,Quantite) values(5,'Vetement','Haut','S','Rose','F',12);

CREATE TABLE Musique(
Identifiant int(11) NOT NULL,
Code_article int(11)  NOT NULL AUTO_INCREMENT,
Categorie ENUM('Musique') NOT NULL,
Genre varchar(255) NOT NULL,
Artiste varchar(255) NOT NULL,
Album varchar(255) NOT NULL,
Quantite int(11),


PRIMARY KEY (Code_article),
FOREIGN KEY (Identifiant) REFERENCES Article (Id_article)
)ENGINE=MyISAM AUTO_INCREMENT=100;


Insert into Musique(Identifiant,Categorie,Genre,Artiste,Album,Quantite) values(7,'Musique','Rock','Red Hot Chili Peppers','The Getaway',18);
Insert into Musique(Identifiant,Categorie,Genre,Artiste,Album,Quantite) values(8,'Musique','Rock','Red Hot Chili Peppers','The Getaway',11);
Insert into Musique(Identifiant,Categorie,Genre,Artiste,Album,Quantite) values(9,'Musique','Rock','Johnny Hallyday','Rester vivant',22);

CREATE TABLE Sport(
Identifiant int(11) NOT NULL,
Code_article int(11) NOT NULL AUTO_INCREMENT,
Categorie ENUM('Sport') NOT NULL,
Nom_activite varchar(255) NOT NULL,
Marque varchar(255) NOT NULL,
Quantite int(11),
PRIMARY KEY (Code_article),
FOREIGN KEY (Identifiant) REFERENCES Article (Id_article)
)ENGINE=MyISAM AUTO_INCREMENT=50;

Insert into Sport(Identifiant,Categorie,Nom_activite,Marque,Quantite) values(10,'Sport','Golf','Go Sport',12);
Insert into Sport(Identifiant,Categorie,Nom_activite,Marque,Quantite) values(11,'Sport','Tennis','Decathlon',18);
Insert into Sport(Identifiant,Categorie,Nom_activite,Marque,Quantite) values(12,'Sport','Natation','Adidas',13);

CREATE TABLE Panier(
Id_panier int(11) NOT NULL ,
Code_article int(11),
Nom_article varchar(255),
Prix_article int(11),
Reduction_prix int(11)
);

/*
;
ALTER TABLE "Musique" AUTO_INCREMENT=100;
ALTER TABLE "Vetement" AUTO_INCREMENT=150;*/

