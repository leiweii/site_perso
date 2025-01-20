CREATE TABLE Romans(
   IdR INT,
   nomR VARCHAR(50),
   descriptionR VARCHAR(50),
   imageR VARCHAR(50),
   PRIMARY KEY(IdR)
);

CREATE TABLE Favories(
   IdF INT,
   nomF VARCHAR(50),
   Commentaires VARCHAR(50),
   imageF VARCHAR(50),
   PRIMARY KEY(IdF)
);

CREATE TABLE Jeux(
   IdJ INT,
   nomJ VARCHAR(50),
   descriptionJ VARCHAR(50),
   logoJ VARCHAR(50),
   PRIMARY KEY(IdJ)
);

CREATE TABLE Ajouter(
   IdR INT,
   IdF INT,
   PRIMARY KEY(IdR, IdF),
   FOREIGN KEY(IdR) REFERENCES Romans(IdR),
   FOREIGN KEY(IdF) REFERENCES Favories(IdF)
);

CREATE TABLE Ajouter2(
   IdF INT,
   IdJ INT,
   PRIMARY KEY(IdF, IdJ),
   FOREIGN KEY(IdF) REFERENCES Favories(IdF),
   FOREIGN KEY(IdJ) REFERENCES Jeux(IdJ)
);




INSERT INTO Favories (IdF, nomF, Commentaires, imageF)
VALUES 
(1,'我有一个修仙世界', '还不错', 'livre1.jpg'),
(2,'赤心巡天', '还不错', 'livre2.jpg'),
(3,'圣墟', '还不错', 'livre3.jpg');
