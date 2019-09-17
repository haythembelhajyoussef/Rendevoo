<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
    <head>
        <title>Upload d'une image sur le serveur !</title>
    </head>
    <body>
        <?php
        if (!empty($message)) {
            echo '<p>', "\n";
            echo "\t\t<strong>", htmlspecialchars($message), "</strong>\n";
            echo "\t</p>\n\n";
        }
        ?>
        <!-- Debut du formulaire -->
        <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <fieldset>
                <legend>Formulaire</legend>
                <p>
                    <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer le fichier :</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
                    <input name="fichier" type="file" id="fichier_a_uploader" />
                    <input type="submit" name="submit" value="Uploader" />
                </p>
            </fieldset>
        </form>
        <!-- Fin du formulaire -->
    </body>
</html>
<?php
if (isset($_POST['submit'])) { // si formulaire soumis
    $content_dir = 'assets/userImage/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['fichier']['tmp_name'];

    if (!is_uploaded_file($tmp_file)) {
        exit("Le fichier est introuvable");
    }

    // on vérifie maintenant l'extension
    $type_file = $_FILES['fichier']['type'];

    if (!strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'png') && !strstr($type_file, 'gif')) {
        exit("Le fichier n'est pas une image");
    }

    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['fichier']['name'];

    if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
        exit("Impossible de copier le fichier dans $content_dir");
    }

    echo "Le fichier a bien été uploadé";
    // et tu insères en base de données quelque chose du genre :
    // $URL = $content_dir . $name_file;
}