<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <title>Upload - Traitement</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap-theme.css"/>
    <link rel="stylesheet" href="assets/css/custom.css"/>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</head>

<body>
<div class="container-fluid">
    <h1>Upload de fichier (exemple minimal)</h1>
    <?php
        // ON AFFECTE LES VARIABLES aux inputs du formulaire
        //nom
        $titre = $_POST['titre'];
        //description
        $ = $_POST['description'];
        //email
        $gallerie = $_POST['email'];
        //password
        $password = $_POST['password'];
        //array sur $fails
        $fails = [];

    if (empty($_FILES['fichier'])) {
        $contenu = "Erreur : le champ 'fichier' du formulaire est vide.";
    } else {
        $nomFichier = $_FILES['fichier']['name'];

        $upload_succeed = is_uploaded_file($_FILES['fichier']['tmp_name']);
        if ($upload_succeed == true) { // (1) On vérifie que l'upload du fichier s'est bien passé, c'est-à-dire que ce dernier est maintenant présent sur le serveur

            // (2) Copie du fichier dans le sous-répertoire 'medias/'
            $copy_succeed = copy($_FILES['fichier']['tmp_name'], "medias/" . $nomFichier);
            if ($copy_succeed == true) { // (3) On vérifie que la copie s'est bien passée
                $contenu = "Le fichier <b>$nomFichier</b> a bien été copié dans le dossier de destination.";




                $connexionBdd = mysqli_connect('localhost', 'root', 'root', 'creation');
                mysqli_set_charset($connexionBdd, 'utf8');


                $requete = "INSERT INTO user_list VALUES (null, '$prenom', '$nom', null, '$email', '$password')";

                $query = mysqli_query($connexionBdd, $requete);

                echo !$query ? "Impossible de créer votre compte" : "Bravo";




            } else {
                $contenu = "Un problème est servenu lors de la copie du fichier dans le dossier 'medias/' : soit le dossier n'existe pas sur le serveur, soit ce dernier ne dispose pas des droits en écriture.";
            }
        } else {
            $contenu = "Aucun fichier n'a été transmis : ce dernier est certainement trop volumineux.";
        }
    }
    ?>
    <p>
        <?php echo $contenu; ?><br/><br/>
        <a href="upload_form.php" title="Retour au formulaire" class="btn btn-success">Retour au formulaire</a>
    </p>
</div>
</body>
</html>
