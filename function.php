<pre <?php
        include_once "requete.php";


        function GestionUpload($text)
        {
            var_dump($_FILES);
            $uniquename = "";

            $idpost = InsertPost($text);
            echo "L'id du dernier".$idpost;

            //compte le nom de fichier envoyer
            $nbimage = count($_FILES['image']['name']);

            $dossier = 'media/img/';
            for ($i = 0; $i <= $nbimage; $i++) {

                $fichier = basename($_FILES['image']['name'][$i]);

                    $idunique=uniqid();
                $temp = $idunique . $fichier;

                $taille_maxi = 3000000;
$checkcontent=mime_content_type($_FILES['image']['tmp_name'][$i]);
            
echo $checkcontent;

                $fichier = $temp;
                echo "Le nom du fichier".$fichier;
                $taille = $_FILES['image']['size'][$i];

                $extensions = array('.png', '.gif', '.jpg', '.jpeg');
                $extension = strrchr($_FILES['image']['name'][$i], '.');
                $ContentCheck = array('image/png', 'image/gif', 'image/jpg', 'image/jpeg');


                //Début des vérifications de sécurité...
                if (!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
                {
                    $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
                }
                if (!in_array($checkcontent,$ContentCheck)){
                    $erreur = 'Le contenue de votre image est suspect';
                }
                if ($taille > $taille_maxi) {
                    $erreur = 'Le fichier est trop gros...';
                }
                if (!isset($erreur)) //S'il n'y a pas d'erreur, on upload
                {
                    //On formate le nom du fichier ici...
                    $fichier = strtr(
                        $fichier,
                        'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
                    );
                    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                    if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                    {
                        echo '   Upload effectué avec succès !';
                        // si l'upload a marcher on ajoute l'les données de l'image a la base de données
                        InsertImage($idpost,$fichier,$extension);
                        
                    } else //Sinon (la fonction renvoie FALSE).
                    {
                        echo 'Echec de l\'upload !';
                    }
                } else {

                    is_null($erreur);
                }
            }
        }

        function DestroySession()
        {

            // Détruit toutes les variables de session
            $_SESSION = array();

            // Si vous voulez détruire complètement la session, effacez également
            // le cookie de session.
            // Note : cela détruira la session et pas seulement les données de session !
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(
                    session_name(),
                    '',
                    time() - 42000,
                    $params["path"],
                    $params["domain"],
                    $params["secure"],
                    $params["httponly"]
                );
            }

            // Finalement, on détruit la session.
            session_destroy();

            session_start();
        }

       

        ?>