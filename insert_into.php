<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <title>Exemple d'ajout d'un auteur</title>
</head>
<body>
<h1>Exemple d'ajout d'un auteur</h1>
<?php

/* (1) Connexion au serveur MySQL (les "???" sont à compléter)
 * Paramètre(s) de la fonction : nom/adresse du serveur,
 * identifiant, mot de passe
 */
$connexionBdd = mysqli_connect("localhost", "???", "???");

/* Optionnel : permet d'éviter les problèmes d'affichage de
 * certains caractères accentués
 */
mysqli_set_charset($connexionBdd, "utf8");

/* (2) Sélection de la base (le "???" est à compléter)
 * Paramètre(s) de la fonction : connexion, nom de la base
 */
$selectionBdd = mysqli_select_db($connexionBdd, "???");

/* Création d'une requête MySQL sous la forme d'une chaîne de
 * caractères PHP
 */
$requete = "INSERT INTO auteur VALUES (NULL, 'Dard', 'Frédéric', '1921-06-29', 78)";

/* (3) Envoi de la requête de puis le script actuel vers la base
 * de données, et récupération du résultat de la requête
 */
$resultat = mysqli_query($connexionBdd, $requete);

/* (4) Vérification du bon déroulement de le requête */
if ($resultat == true) {
    $message = "Le nouvel auteur a bien été ajouté à la base de données.";
} else {
    $message = "Erreur : un problème est survenu lors de l'enregistrement de l'auteur en base de données.";
}

echo $message;

/* (5) Fermeture de la connexion au serveur MySQL */
mysqli_close($connexionBdd);

?>
</body>
</html>