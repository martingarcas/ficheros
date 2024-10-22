const fileInput = document.getElementById('file-input');
const pdfContainer = document.getElementById('pdf-container');

fileInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    
    if (file && file.type === 'application/pdf') {
        const fileReader = new FileReader();

        fileReader.onload = function() {
            const pdfData = this.result;

            // Limpiar el contenedor de PDF
            pdfContainer.innerHTML = '';

            // Crear un objeto para previsualizar el PDF
            const objectElement = document.createElement('object');
            objectElement.setAttribute('data', pdfData);
            objectElement.setAttribute('type', 'application/pdf');

            // Agregar el objeto al contenedor
            pdfContainer.appendChild(objectElement);
        };

        fileReader.readAsDataURL(file);
    } else {
        alert("Por favor, selecciona un archivo PDF válido.");
    }
});