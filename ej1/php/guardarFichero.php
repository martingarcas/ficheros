<?php

    $base = $_SERVER['DOCUMENT_ROOT'] . "/ficheros/ej1/";

    //var_dump($_FILES['fichero']['tmp_name']);
    //https://oregoom.com/php/files/

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
        // Verificamos si se ha subido un archivo
        if (isset($_FILES['fichero']) && $_FILES['fichero']['error'] == UPLOAD_ERR_OK) {
            
            $fileTmpPath    = $_FILES['fichero']['tmp_name'];
            $fileName       = $_FILES['fichero']['name'];

            // Verificamos si el archivo es una imagen
            $check = getimagesize($fileTmpPath);

            if ($check !== false) {
                
                // Directorio de destino
                $targetDir  = $base . "uploads/";
                $targetFile = $targetDir . basename($fileName);

                // Movemos el archivo al directorio de destino
                if (move_uploaded_file($fileTmpPath, $targetFile)) {

                    echo "El archivo " . htmlspecialchars(basename($fileName)) . " ha sido subido.";
                    
                } else {

                    echo "Lo siento, ha habido un error al subir tu archivo.";
                }

            } else {

                echo "El archivo no es una imagen.";
            }
        }

    } else {

        echo "Método de solicitud no válido.";
    }
?>
