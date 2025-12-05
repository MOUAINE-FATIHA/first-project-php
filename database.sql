create table cours (
    id_cours int AUTO_INCREMENT primary key,
    nom_c varchar(50) not null,
    categorie varchar(50) not null,
    date_c date not null,
    heure_c time not null,
    duree int not null CHECK (duree > 0),
    nb_max_p int not null check (nb_max_p > 0)
);
create table equipements (
    id_equipe INT AUTO_INCREMENT primary key,
    nom_eq varchar(50) not null,
    quantite_dispo INT not null check (quantite_dispo >= 0),
    type varchar(50) not null,
    etat ENUM('bon', 'moyen', 'a remplacer') not null default 'bon'
);
create table cours_equipements (
    id int AUTO_INCREMENT primary key,
    id_cours int not null,
    id_equipe int not null,
    FOREIGN KEY (id_cours) references cours(id_cours),
    FOREIGN KEY (id_equipe) references equipement(id_equipe),
    unique (id_cours, id_equipe)
    
);

insert into cours(
    nom_c, categorie, date_c, heure_c, duree, nb_max_p) 
    values('Yoga Matinal', 'Bien-être', '2025-12-10', '08:00:00', 60, 15),
    ('Cardio Training', 'Fitness', '2025-12-13', '10:00:00', 45, 20),
    ('Musculation Avancée', 'Force', '2025-12-08', '15:00:00', 90, 10),
    ('Zumba Dance', 'Danse', '2025-12-15', '18:00:00', 50, 25);

insert into equipement (
    nom_eq, quantite_dispo, type, etat) 
    values('Tapis de yoga', 30, 'Accessoire', 'bon'),
	('Haltères 10kg', 20, 'Poids', 'bon'),
	('Step', 15, 'Accessoire', 'moyen'),
	('Tapis de sol', 25, 'Accessoire', 'bon'),
	('Corde à sauter', 10, 'Cardio', 'a remplacer');

SELECT categorie, COUNT(*) as total from cours GROUP BY categorie
