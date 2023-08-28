INSERT INTO `administrateur` (`nom`, `prenom`, `username`, `mdPasse`) VALUES
    ('Alfred', 'Gilbert', 'root', 'root');

INSERT INTO `categorie` (`idCategorie`, `descCategorie`) VALUES
    (4000, 'abstraction'),
    (4001, 'arbre'),
    (4002, 'carte-de-noel'),
    (4003, 'collage-autarcique'),
    (4004, 'monstre');


INSERT INTO `client` (`nom`, `prenom`, `courriel`, `adresse`, `carteCredit`, `dateInscription`, `username`, `mdPasse`) VALUES

    ('Gibouleau', 'Jean-Gilles', 'JG@Gibouleau.qc.ca', '127, rue de l’Amaranthe,H8X1J1', '4530456165459875', '2021-02-21', 'jgg', 'password1234'),
    ('Grondin', 'Géraldin', 'GG@google.com', '666, rue de l’Entrain ,H0H0H0', '4508198887959599', '2021-07-22', 'gg', 'password1234'),
    ('Gilbert', 'Gerry', 'gerry@geee.com', '111 des Pinsons J0J0J0', '4540999988889999', '2022-10-14', 'ggg', 'ggg'),
    ('Thibodeau', 'Rogerito', 'rr@gg.com', '10 rue de la Bravoure K0K0K0', '5454000089798908', '2022-10-16', 'roger', '1234');

INSERT INTO `oeuvre` (`titre`, `description`, `prix`, `dateCreation`, `url_photo`, `url_photo_mini`, `idCommande`, `idCategorie`, `disponible`) VALUES
    ('Abstraction-II', 'Abstraction-II', 100.00, '2021-02-21', 'images/abstraction/large/Abstraction-II.JPG', 'images/abstraction/small/Abstraction-II.JPG', NULL, 4000, b'1'),
    ('Jack et Vincent', 'Jack et Vincent', 100.00, '2021-02-21', 'images/abstraction/large/Jack-et-Vincent.JPG', 'images/abstraction/small/Jack-et-Vincent.JPG', NULL, 4000, b'1'),
    ('Quatre éléments', 'Quatre éléments', 100.00, '2021-02-21', 'images/abstraction/large/quatre-elements.jpg', 'images/abstraction/small/quatre-elements.jpg', NULL, 4000, b'1'),
    ('Rade', 'Rade', 100.00, '2021-02-21', 'images/abstraction/large/Rade.JPG', 'images/abstraction/small/Rade.JPG', NULL, 4000, b'1'),
    ('L’arbre bleu', 'L’arbre bleu', 100.00, '2021-02-21', 'images/arbre/large/L-arbre-bleu.jpg', 'images/arbre/small/L-arbre-bleu.png', NULL, 4001, b'1'),
    ('L’arbre vert', 'L’arbre vert', 100.00, '2021-02-21', 'images/arbre/large/L-arbre-vert.jpg', 'images/arbre/small/L-arbre-vert.png', NULL, 4001, b'1'),
    ('Négatif', 'Négatif', 100.00, '2021-02-21', 'images/arbre/large/Negatif.jpg', 'images/arbre/small/Negatif.png', NULL, 4001, b'1'),
    ('Positif', 'Positif', 100.00, '2021-02-21', 'images/arbre/large/Positif.JPG', 'images/arbre/small/Positif.png', NULL, 4001, b'1'),
    ('Chaussures de Noël', 'Chaussures de Noël', 100.00, '2021-02-21', 'images/carte-de-noel/large/chaussures-noel.jpg', 'images/carte-de-noel/small/chaussures-noel.jpg', NULL, 4002, b'1'),
    ('L’étoile', 'L’étoile', 100.00, '2021-02-21', 'images/carte-de-noel/large/l-etoile.jpg', 'images/carte-de-noel/small/l-etoile.jpg', NULL, 4002, b'1'),
    ('Le renne', 'Le renne', 100.00, '2021-02-21', 'images/carte-de-noel/large/renne.jpg', 'images/carte-de-noel/small/renne.jpg', NULL, 4002, b'1'),
    ('Sapin épinette', 'Sapin épinette', 100.00, '2021-02-21', 'images/carte-de-noel/large/sapin-epinette.jpg', 'images/carte-de-noel/small/sapin-epinette.jpg', NULL, 4002, b'1'),
    ('Sapin de Noël', 'Sapin de Noël', 100.00, '2021-02-21', 'images/carte-de-noel/large/sapin-noel.jpg', 'images/carte-de-noel/small/sapin-noel.jpg', NULL, 4002, b'1'),
    ('Le zèbre', 'Le zèbre', 100.00, '2021-02-21', 'images/collage-autarcique/large/le-zebre.jpg', 'images/collage-autarcique/small/le-zebre.jpg', NULL, 4003, b'1'),
    ('L’odalisque-à-l’esclave', 'L’odalisque-à-l’esclave', 100.00, '2021-02-21', 'images/collage-autarcique/large/l-odalisque-a-l-esclave.jpg', 'images/collage-autarcique/small/l-odalisque-a-l-esclave.jpg', NULL, 4003, b'1'),
    ('Mercedes pour J', 'Mercedes pour J', 100.00, '2021-02-21', 'images/collage-autarcique/large/mercedes-pour-J.jpg', 'images/collage-autarcique/small/mercedes-pour-J.jpg', NULL, 4003, b'1'),
    ('Transautarcie', 'Transautarcie', 100.00, '2021-02-21', 'images/collage-autarcique/large/transautarcie.JPG', 'images/collage-autarcique/small/transautarcie.JPG', NULL, 4003, b'1'),
    ('Je ne suis pas un monstre', 'Je ne suis pas un monstre', 100.00, '2021-02-21', 'images/monstre/large/je-ne-suis-pas-un-monstre.jpg', 'images/monstre/small/je-ne-suis-pas-un-monstre.jpg', NULL, 4004, b'1'),
    ('Monstre 2018', 'Monstre 2018', 100.00, '2021-02-21', 'images/monstre/large/monstre-2018.JPG', 'images/monstre/small/monstre-2018.JPG', NULL, 4004, b'1'),
    ('Monstre barbe bleue', 'Monstre barbe bleue', 100.00, '2021-02-21', 'images/monstre/large/monstre-barbe-bleue.jpg', 'images/monstre/small/monstre-barbe-bleue.jpg', NULL, 4004, b'1'),
    ('Monstre chauves-souris', 'Monstre chauves-souris', 100.00, '2021-02-21', 'images/monstre/large/monstre-chauves-souris.jpg', 'images/monstre/small/monstre-chauves-souris.jpg', NULL, 4004, b'1'),
    ('Thesee et le minautore', 'Thesee et le minautore', 100.00, '2021-02-21', 'images/monstre/large/thesee-et-le-minautore.jpg', 'images/monstre/small/thesee-et-le-minautore.jpg', NULL, 4004, b'1'),
    ('Monstre hbl', 'Monstre hbl', 100.00, '2021-02-21', 'images/monstre/large/monstre-hbl.jpg', 'images/monstre/small/monstre-hbl.jpg', NULL, 4004, b'1');

