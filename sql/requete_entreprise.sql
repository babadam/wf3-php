-- Voir toutes les BDD :
-- pas sensible à la casse, mais la convention veut les majuscules
SHOW DATABASES; 

-- Supprimer une base de donnée
DROP DATABASE nom_bdd;

-- Se connecter à une BDD
USE jeudi;

-- Voir les tables de la BDD
SHOW TABLES;

-- Créer une nouvelle bdd
CREATE DATABASE nom_bdd;

-- Afficher toutes les infos de tous les employés
SELECT * FROM employes; 

-- Afficher les noms, prénoms et les salaires
SELECT nom, prenom, salaire FROM employes;

-- Afficher tous les services de mon entreprise
SELECT DISTINCT service FROM employes; -- DISTINCT permet d'éviter les doublons

-- Afficher tous les employés du service information 
SELECT prenom, nom, service, FROM employes WHERE service = 'informatique';

-- Afficher les employes qui ne sont pas du serive informatique 
-- 'Différent de' s'écrit aussi <>
SELECT prenom, nom, service, FROM employes WHERE service != 'informatique';

-- Afficher les employés qui gagne un salire supérieur à 200
SELECT prenom, nom, salaire FROM employes WHERE salaire > 2000;

-- Afficher combien d'employés gagnent moins ou égal de 200
SELECT COUNT(*) FROM employes WHERE salaire <= 2000;

--
-- AS permet de créer un alias 
SELECT COUNT(*) AS somme FROM employes WHERE salaire <= 2000;

-- Afficher la masse salariale annuelle de mon entreprise
SELECT SUM(salaire*12) AS 'masse salariale' FROM employes;
SELECT SUM(salaire*12) AS masse_salariale FROM employes;

-- Afficher les employés dont le prénom commencent par un A
SELECT prenom FROM employes WHERE prenom LIKE 'a%';

-- Afficher les employés dont le prénom contient un A
SELECT prenom FROM employes WHERE prenom LIKE '%a%';

-- Afficher tous les employés dans l'ordre de celui qui gagne le plus à celui qui gagne le moins
SELECT prenom, nom, salaire FROM employes ORDER BY salaire DESC;

-- Afficher les 3 employés qui gagnent le plus 
SELECT prenom, nom, salaire FROM employes ORDER BY salaire DESC LIMIT 0,3;

-- Afficher la personne qui gagne le plus petit salaire
SELECT prenom, nom, salaire FROM employes ORDER BY salaire ASC LIMIT 0,1;

-- Afficher le plus petit salaire 
SELECT MIN(salaire) FROM employes;

-- Afficher le prénom de la personne qui gagne le plus petit salaire = requète imbriquée
SELECT prenom, salaire FROM employes WHERE salaire = (SELECT MIN(salaire) FROM employes);

-- Afficher tous les employés des service infirmatique et commerciale
SELECT prenom, nom, service FROM employes WHERE service = 'informatique' || service = 'commercial';

-- Afficher tous les employés des service infirmatique et commerciale avec IN()
SELECT prenom, nom, service FROM employes WHERE service IN('informatique', 'commercial');

-- Afficher tous les employés des service infirmatique et commerciale avec IN()
SELECT prenom, nom, service FROM employes WHERE service != 'informatique' AND service != 'commercial';

-- Afficher tous les employés des service infirmatique et commerciale avec NOT IN()
SELECT prenom, nom, service FROM employes WHERE service NOT IN('informatique', 'commercial');

-- Afficher le nombre de femmes dans l'entreprise
SELECT COUNT(*) FROM employes WHERE sexe ='F';

-- Afficher le nombre d'employé par sexe 
SELECT sexe, COUNT(*) FROM employes GROUP BY sexe;

-- LE nombre de salarié par service
SELECT service, count(*) FROM employes GROUP BY service;

-- LE nombre de salarié du service informatique ou commercial
SELECT service, count(*) FROM employes GROUP BY service HAVING service IN('informatique', 'commercial');


----------------------
-- INSERTION EN BDD --
----------------------

INSERT INTO employes (prenom, nom, service, sexe, salaire, date_embauche) VALUES ('Barbara', 'Tousverts', 'informatique', 'f', 1900, CURDATE());

----------------------
---- MODIFICATION ----
----------------------

-- On modifie tous les salaires de tous les employés
UPDATE employes set salaire = 3000;

-- On modifie le salaire de 'Julien'
UPDATE employes set salaire = 3500 WHERE prenom = 'Julien';

-- On modifie le salaire de 'BArbara' par l'ID
UPDATE employes set salaire = 5000 WHERE id_employes = 992;

-- Replace utilisé pour changer toutes les informations
REPLACE INTO employes (id_employes, prenom, nom, service, salaire, date_embauche, sexe) VALUES (991, 'Yakine', 'Hamida', 'direction', 6000, CURDATE(), 'm');

-- Changer deux information concernant une personne dont l'id est 547
UPDATE employes SET service = 'marketing', salaire = 3200 WHERE id_employes = 547;

UPDATE employes SET salaire = salaire + 3100;

----------------------
---- SUPPRESSION  ----
----------------------

-- On supprime l'employé 991
DELETE FROM employes WHERE id_employes = 991;

