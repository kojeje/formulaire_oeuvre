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
// °°°°°°°°°°°°°°°°°°°°°°° VARIABLES FORMULAIRES °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°

//                        ON AFFECTE LES VARIABLES aux inputs du formulaire

//                          nom
                        $titre = "\"" .$_POST['titre'] . "\"";
//                          description
                        $description = "\"" . $_POST['description'] . "\"";
//                          email
                        $gallerie = "\"" .$_POST['gallerie'] . "\"";
//                          password
                        $date = "\"" .$_POST['date'] . "\"";

//                          array sur $fails
                        $fails = [];

//                          Si pas de fichier uploadé par l'utilisateur'
                        if (empty($_FILES['fichier'])) {

//                                Contenu de la variable "message"
                                $contenu = "Erreur : le champ 'fichier' du formulaire est vide.";
                        }
// °°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°°

//              SI CHAMPS MANQUANTS

//                   Affection variable $fails (array_push())



//                      Si $date vide
                        if (empty($date)) {
//                          array_push
                            $fails[] = "date";
                        }

//                      SI $titre vide
                        if (empty($titre)) {
//                          array_push
                            $fails[] = "titre";
                        }
//                      SI *description vide
                        if (empty($description)) {
//                          array_push
                            $fails[] = "description";
                        }
//                      SI gallerie vide
                        if (empty($gallerie)) {
//                          array_push
                            $fails[] = "gallerie";
                        }
//                      Si il y a des item dans $fails
                        if (count($fails) > 0) {
//                                Message commun
                            echo "Vous devez remplir le(s) champ(s) ";
//                                + message particulier
                            foreach ($fails as $fail) {
                                echo $fail . " ";
                            }
                            echo ".";

//                SI CHAMPS REMPLIS

                        } else {

//                              variable $nomFichier
                                $nomFichier = $_FILES['fichier']['name'];


//                               VERIFICATION upload
        //
//                               is_uploaded_file (booléen)
//                               variable $upload_succeed (true or false)

                                $upload_succeed = is_uploaded_file($_FILES['fichier']['tmp_name']);
                                if ($upload_succeed == true) {

//                                  (1) On vérifie que l'upload du fichier s'est bien passé, c'est-à-dire que ce dernier est maintenant présent sur le serveur


                                    $copy_succeed = copy($_FILES['fichier']['tmp_name'], "medias/" . $nomFichier);
                                    if ($copy_succeed == true) { // (3) On vérifie que la copie s'est bien passée



//                                      déclaration variable de connexion à la BDD

                                        $connexionBdd = mysqli_connect('localhost', 'root', 'root', 'creation');
                                        mysqli_set_charset($connexionBdd, 'utf8'); // Formatage des caractere venant de la BDD

                                        $nomFichier = "\"" . $nomFichier . "\"";

//                                   (2) Copie du fichier dans le sous-répertoire 'medias/'

//                                      Variable $requete

                                        $requete = "INSERT INTO creation VALUES (null, $titre, $description, $nomFichier, $gallerie, $date)";

//                                        Execution requete

                                        $query = mysqli_query($connexionBdd, $requete);

//                                        vaiable Message suivant résultat de la requete

                                        $contenu = !$query ? "Impossible de créer votre compte" : "Bravo nous avons créer la fiche de $titre dans la gallerie $gallerie";




                                    } else {
//                                      Contenu du message si autre erreur

                                        $contenu = "Un problème est servenu lors de la copie du fichier dans le dossier 'medias/' : soit le dossier n'existe pas sur le serveur, soit ce dernier ne dispose pas des droits en écriture.";
                                    }
                                } else {
//                                        Si fichier trop volumineux pour PHP (>= 32 Mo)

                                    $contenu = "Aucun fichier n'a été transmis : ce dernier est certainement trop volumineux.";
                                }
                            }
                            ?>

                    <p>
<!-- Affichage du message-->
                        <?php echo $contenu; ?><br/><br/>
                        <a href="upload_form.php" title="Retour au formulaire" class="btn btn-success">Retour au formulaire</a>
                    </p>
                </div>
                </body>
                </html>
