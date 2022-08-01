const VerificarEditCurso = () => {

    // Validaciones al curso en la creación
    const inputNombreEdit = document.getElementById("nombre_cursoEdit");
    const inputDescripEdit = document.getElementById("descripcionEdit");
    const inputDuracionEdit = document.getElementById("duracionEdit");
    const inputImagenEdit = document.getElementById("filechooserEdit");
    const inputVideoEdit = document.getElementById('filechooserVideoEdit');

        const checkNombre = () => {

            let valid = false;
        
            if (inputNombreEdit.value == '') {
                showError(inputNombreEdit, 'Este campo no puede estar vacio');
            } else {
                showSuccess(inputNombreEdit);
                valid = true;
            }
            return valid;
        }

        const checkDescrip = () => {

            let valid = false;
        
            if (inputDescripEdit.value == '') {
                showError(inputDescripEdit, 'Este campo no puede estar vacio');
            } else {
                showSuccess(inputDescripEdit);
                valid = true;
            }
            return valid;
        }

        const checkDuracion = () => {

            let valid = false;
        
            if (inputDuracionEdit.value == '') {
                showError(inputDuracionEdit, 'Este campo no puede estar vacio');
            } else {
                showSuccess(inputDuracionEdit);
                valid = true;
            }
            return valid;
        }

        const checkImagen = () => {
  
          let valid = false;
          if(!inputImagenEdit.value){
              showError(inputImagenEdit, 'Debes de seleccionar una imagen');
          }else{
              showSuccess(inputImagenEdit);
              valid = true;
          }
          return valid;
        };

        const checkVideo = () => {
  
            let valid = false;
            if(!inputVideoEdit.value){
                showError(inputVideoEdit, 'Debes de seleccionar un video');
            }else{
                showSuccess(inputVideoEdit);
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
  
        const btn = document.querySelector('.btn--editar--curso');

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