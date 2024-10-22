window.addEventListener("load", function () {

    const btnSubmit     = document.getElementById("guardar");
    const formulario    = btnSubmit.form;
    const inputFile     = formulario["fichero"];

    inputFile.addEventListener("change", function (e) {

        e.preventDefault();        

        if (inputFile.files.length > 0) {

            const imgFile = inputFile.files[0];
            const reader = new FileReader();

            reader.onload = function (e) {
                
                // Creamos dinamicamente el contenedor para la previsualización
                const previewContainer = document.createElement("div");
                previewContainer.style.marginTop = "20px";

                // Creamos imagen para previsualización
                const imgPreview = document.createElement("img");
                imgPreview.src = e.target.result;
                imgPreview.style.maxWidth = "300px";
                imgPreview.style.display = "block";

                // Añadimos imagen al contenedor
                previewContainer.appendChild(imgPreview);

                // Añadimos contenedor al cuerpo del documento
                document.body.appendChild(previewContainer);
            }

            reader.readAsDataURL(imgFile);

        } else {

            alert("Debes seleccionar una imagen");
        }
        
    });

});