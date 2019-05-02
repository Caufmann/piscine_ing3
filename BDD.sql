/*CREATE TABLE Utilisateur(
Id_utilisateur int(11) NOT NULL PRIMARY KEY,
Mail varchar(255) NOT NULL,
Password varchar(255) NOT NULL,
);

Insert into Utilisateur(Id_utilisateur,Mail,Password) values(1,'clement.cauffet@gmail.com','TabLeBoss');
Insert into Utilisateur(Id_utilisateur,Mail,Password) values(2,'alexandre.baron@gmail.com','GuiLeKing');*/

CREATE TABLE Acheteur(
Id int(11) NOT NULL,
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
Id int(11) NOT NULL,
Mail varchar(255) NOT NULL,
Password varchar(255) NOT NULL,
Pseudo varchar(255) NOT NULL,
Nom varchar(255) NOT NULL,
Photo varchar(255) NOT NULL,   
Img_fond varchar(255) NOT NULL,



PRIMARY KEY (Id)
);

Insert into Vendeur(Id,Mail,Password,Pseudo,Nom,Photo,Img_fond) values(1,'clement.cauffet@edu.ece.fr','TabLeBoss','LaCaufette','Pierrick','berlin.jpeg','Paris.jpeg');




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

Insert into Administrateur(Id,Mail,Password,Pseudo,Photo,Img_fond) values(0,'guillaume.tabard@edu.ece.fr','Admin','Zeub','berlin.jpeg','Paris.jpeg');



CREATE TABLE Article(
Id_article int(11) NOT NULL,
Categorie varchar(255) NOT NULL,
Nom varchar(255) NOT NULL,
Photo1 varchar(255) NOT NULL,
Photo2 varchar(255), 
Photo3 varchar(255),
Description varchar(255) NOT NULL,
Prix int(11) NOT NULL,   
Reduction_prix int(11),
Quantite int(11),
Cpt_vente int(11),
Id int (11) NOT NULL,


PRIMARY KEY (Id_article), 
FOREIGN KEY (Id) REFERENCES Vendeur (Id)
);

Insert into Article(Id_article,Categorie,Nom,Photo1,Photo2,Photo3,Description,Prix,Reduction_prix,Quantite,Cpt_vente,Id) 
					values(1,'Chaussures','NikeAir','NikeAir.jpeg',NULL,NULL,'Super nike qui tiennent bien au pied',110,1,23,0,1);



CREATE TABLE Panier(
Id int(11) NOT NULL,
Id_article1 int(11) NOT NULL,
Id_article2 int(11) ,
Id_article3 int(11) ,
Id_article4 int(11) ,
Id_article5 int(11) ,
Id_article6 int(11) ,
Id_article7 int(11) ,
Id_article8 int(11) ,

PRIMARY KEY (Id_article1), 
FOREIGN KEY (Id) REFERENCES Acheteur (Id)
);
