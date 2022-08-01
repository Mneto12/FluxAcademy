const VerificarCurso = () => {

    // Validaciones al curso en la creación
    const inputNombre = document.getElementById("nombre_curso");
    const inputDescrip = document.getElementById("descripcion");
    const inputDuracion = document.getElementById("duracion");
    const inputImagen = document.getElementById("filechooser");
    const inputVideo = document.getElementById('filechooserVideo');

        const checkNombre = () => {

            let valid = false;
        
            if (inputNombre.value == '') {
                showError(inputNombre, 'Este campo no puede estar vacio');
            } else {
                showSuccess(inputNombre);
                valid = true;
            }
            return valid;
        }

        const checkDescrip = () => {

            let valid = false;
        
            if (inputDescrip.value == '') {
                showError(inputDescrip, 'Este campo no puede estar vacio');
            } else {
                showSuccess(inputDescrip);
                valid = true;
            }
            return valid;
        }

        const checkDuracion = () => {

            let valid = false;
        
            if (inputDuracion.value == '') {
                showError(inputDuracion, 'Este campo no puede estar vacio');
            } else {
                showSuccess(inputDuracion);
                valid = true;
            }
            return valid;
        }

        const checkImagen = () => {
  
          let valid = false;
          if(!inputImagen.value){
              showError(inputImagen, 'Debes de seleccionar una imagen');
          }else{
              showSuccess(inputImagen);
              valid = true;
          }
          return valid;
        };

        const checkVideo = () => {
  
            let valid = false;
            if(!inputVideo.value){
                showError(inputVideo, 'Debes de seleccionar un video');
            }else{
                showSuccess(inputVideo);
                valid = true;
            }
            return valid;
        };
        
        const showError = (input, message) => {
        
            const formField = input.parentElement;
        
            formField.classList.remove('success');
            formField.classList.add('error');
        
            // Muestra el mensaje de error
            const error = formField.querySelector('small');
            error.classList.remove("oculto");
            error.textContent = message;
        };
        
        const showSuccess = (input) => {
            // get the form-field element
            const formField = input.parentElement;
        
            // remove the error class
            formField.classList.remove('error');
            formField.classList.add('success');
        
            // hide the error message
            const error = formField.querySelector('small');
            error.classList.add("oculto");
            error.textContent = '';
        }
  
      const checkData = () => {
  
        const btn = document.querySelector('.btn--crear--curso');

        let isDescripValid = checkDescrip(),
              isDuracionValid = checkDuracion(),
              isNombreValid = checkNombre(),
              isImagenValid = checkImagen(),
              isVideoValid = checkVideo();
  
        let isFormValid = isDescripValid &&
              isDuracionValid &&
              isNombreValid &&
              isImagenValid &&
              isVideoValid;
  
              if (isFormValid) {
                btn.removeAttribute('disabled');
              }

              if (!isFormValid) {
                btn.setAttribute('disabled','');
              }
      }
  
      checkData();
}