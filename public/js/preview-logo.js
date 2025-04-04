function archivo(evt) {
    var files = evt.target.files; // Lista de archivos
    // Obtenemos la imagen del campo "file"
    for (var i = 0, f; f = files[i]; i++) {
        // Solo admite imágenes
        if (!f.type.match('image.*')) {
            continue;
        }
        var reader = new FileReader();
        reader.onload = (function(theFile) {
            return function(e) {
                // Muestra la imagen dentro del elemento <output>
                document.getElementById("list").innerHTML = `<img class="thumb thumbnail" src="${e.target.result}" width="70%" title="${escape(theFile.name)}"/>`;

            };
        })(f);

        reader.readAsDataURL(f);
    }
}

document.getElementById('file').addEventListener('change', archivo, false);
