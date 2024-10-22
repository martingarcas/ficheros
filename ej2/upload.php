<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Directorio donde se guardará el PDF
        $targetDir = "uploads/";
        
        // Asegúrate de que el directorio exista
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $targetFile = $targetDir . basename($_FILES["pdf_file"]["name"]);
        $uploadOk = 1;

        // Verifica si el archivo es un PDF
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($fileType != "pdf") {
            echo "Lo siento, solo se permiten archivos PDF.";
            $uploadOk = 0;
        }

        // Verifica si $uploadOk es 0 por un error
        if ($uploadOk == 0) {
            echo "Lo siento, tu archivo no fue subido.";
        } else {
            // Intenta subir el archivo
            if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $targetFile)) {
                echo "El archivo " . htmlspecialchars(basename($_FILES["pdf_file"]["name"])) . " ha sido subido exitosamente.";
            } else {
                echo "Lo siento, hubo un error al subir tu archivo.";
            }
        }
    } else {
        echo "Método de solicitud no válido.";
    }
?>