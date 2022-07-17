const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
}

function onlyTextKey(e) {
    if(!expresiones.nombre.test(e.key)){
            return false;
        } else {
            return true;
        }
}