<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8"/>
        <title>Upload - Formulaire</title>
        <link rel="stylesheet" href="assets/css/bootstrap.css"/>
        <link rel="stylesheet" href="assets/css/bootstrap-theme.css"/>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.js"></script>
        <link rel="stylesheet" href="assets/css/custom.css"/>
</head>

<body>

<!--container bootstrap-->

<div class="container">
<!--    Titre-->
        <h1>Formulaire avec upload de fichier </h1>

<!-- *********************************************  FORMULAIRE  *************************************************   -->


<!--    -->
        <form action="upload.php" method="post" enctype="multipart/form-data" class="form-horizontal">

<!--   *******************************  -->

<!--             TITRE -->
                <div class="row">
                        <div class="form-group">
                                <label for="titre" class="control-label col-sm-4"><h3>TITRE</h3></label>
                                <input type="text" name="titre"  class="input col-sm-8">
                        </div>
                </div>

<!--   *******************************  -->

<!--            DESCRIPTION -->
                <div class="row">
                        <div class="description">
                                <label for="description" class="control-label col-sm-4"><h4>Description</h4></label>
                                <div class="col-sm-offset-2"></div>
                                <textarea rows="4" cols="8" class="description col-sm-8" name="description"></textarea>
                        </div>
                </div>

<!--   *******************************  -->

<!--             FILE -->
                <div class="row">
                        <div id="file">
                                <div class="form-group file col-sm-12">
                                        <label id="lbl_fichier" for="fichier" class="control-label "><h4 id="file_title">Fichier</h4></label>

                                        <div >
                                                <input id="fichier" name="fichier" type="file"/>
                                        </div>
                                </div>
                        </div>

                </div>

<!--   *******************************  -->

<!--             GALLERIE-->

                <div class="form-group">

                        <label for="gallerie" class="control-label col-sm-6">
                                <h4>Gallerie</h4>
                        </label>

                        <input type="text" class="input col-sm-6" name="gallerie">

                </div>

<!--   *******************************  -->

<!--              DATE-->
                <div class="form-group">
                        <label for="date" class="control-label col-sm-6"><h4>Date de création</h4></label>
                        <input type="date" class="input col-sm-6" name="date">
                </div>


<!--   *******************************  -->

<!--              Submit-->
                <div class="form-group">
                        <div class="col-sm-3 ">
                                <input id="uploader" name="uploader" type="submit" value="envoyer" class="btn btn-primary"/>
                        </div>
                </div>

        </form>

</div>
</body>
</html>
