const Verificar = (validador) => {

    // Validaciones al usuario en la edicion
    const inputCedula = document.getElementById("cedulaEdit");
    const inputNombre = document.getElementById("nombreEdit");
    const inputApellido = document.getElementById("apellidoEdit");
    const inputSexo = document.getElementById("generoEdit2");
    const inputSexoM = document.getElementById('hombreedit');
    const inputSexoF = document.getElementById('mujeredit');
    const inputDate = document.getElementById("fecha_nacimientoEdit");
    const inputUsuario = document.getElementById("nombre_usuarioEdit");
    const inputCorreo = document.getElementById("correoEdit");
    const inputContrasena = document.getElementById("contrasenaEdit");
    const inputFile = document.getElementById("filechooserEdit");
    const btn = document.querySelector('.btn--editar--usuario');

        const checkCedula = () => {
            
            let valid = false;

            const min = 7, max = 8;
        
            const cedula = inputCedula.value.trim();
        
            if (!isRequired(cedula)) {
                showError(inputCedula, 'Este campo no puede estar vacio');
            } else if (isCedulaValid(cedula) || !isBetween(cedula.length, min, max)) {
                showError(inputCedula, `Cedula no valida. La cedula debe de tener entre ${min} y ${max} numeros y no puede contener letras.`)
            } else {
                showSuccess(inputCedula);
                valid = true;
            }
            return valid;
            
        }

        const checkNombre = () => {

            let valid = false;
        
            const min = 3,
                max = 12;
        
            const nombre = inputNombre.value.trim();
        
            if (!isRequired(nombre)) {
                showError(inputNombre, 'Este campo no puede estar vacio');
            } else if (!isBetween(nombre.length, min, max)) {
                showError(inputNombre, `El nombre debe estar entre ${min} y ${max} caracteres.`)
            } else {
                showSuccess(inputNombre);
                valid = true;
            }
            return valid;
        }

        const checkApellido = () => {

            let valid = false;
        
            const min = 3,
                max = 12;
        
            const apellido = inputApellido.value.trim();
        
            if (!isRequired(apellido)) {
                showError(inputApellido, 'Este campo no puede estar vacio');
            } else if (!isBetween(apellido.length, min, max)) {
                showError(inputApellido, `El Apelldio debe estar entre ${min} y ${max} caracteres.`)
            } else {
                showSuccess(inputApellido);
                valid = true;
            }
            return valid;
        }

        const checkSexo = () => {

            let valid = false;
        
            if (inputSexoM.checked == false && inputSexoF.checked == false) {
                showError(inputSexo, `Seleccione un genero`)
            } else{
                showSuccess(inputSexo);
                valid = true;
            }
            return valid;
        }
    
        const checkFecha = () => {
    
            let valid = false;
    
            if (!inputDate.value) {
                showError(inputDate, 'Seleccione una fecha');
            } else if (!calcularEdad(inputDate)) {
                showError(inputDate, 'Debe de tener una edad minima de 15 años')
            } else {
                showSuccess(inputDate);
                valid = true;
            }
            return valid;
            
        }
        
        const checkUsername = () => {
    
            let valid = false;
        
            const min = 3,
                max = 25;
        
            const username = inputUsuario.value.trim();
        
            if (!isRequired(inputUsuario)) {
                showError(inputUsuario, 'Este campo no puede estar vacio');
            } else if (!isBetween(username.length, min, max)) {
                showError(inputUsuario, `El nombre de usuario debe tener entre ${min} y ${max} caracteres`)
            } else {
                showSuccess(inputUsuario);
                valid = true;
            }
            return valid;
        };
        
        const checkEmail = () => {
            let valid = false;
            const email = inputCorreo.value.trim();
            if (!isRequired(inputCorreo)) {
                showError(inputCorreo, 'Este campo no puede estar vacio');
            } else if (!isEmailValid(email)) {
                showError(inputCorreo, 'Correo invalido');
            } else {
                showSuccess(inputCorreo);
                valid = true;
            }
            return valid;
        };
        
        const checkPassword = () => {
        
            let valid = false;
        
            const password = inputContrasena.value.trim();
        
            if (!isRequired(inputContrasena)) {
                showError(inputContrasena, 'Este campo no puede estar vacio');
            } else if (!isPasswordSecure(password)) {
                showError(inputContrasena, 'La contrasena debe tener al menos 8 caracteres e incluir al menos 1 minuscula, 1 mayuscula, 1 numero y 1 caracter especial (!@#$%^&*)');
            } else {
                showSuccess(inputContrasena);
                valid = true;
            }
        
            return valid;
        };

        const checkImagen = () => {
  
          let valid = false;
          if(!inputFile.value){
              showError(inputFile, 'Debes de seleccionar una imagen');
          }else{
              showSuccess(inputFile);
              valid = true;
          }
          return valid;
        };
        
        const isEmailValid = (email) => {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        };
        
        const isPasswordSecure = (password) => {
            const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
            return re.test(password);
        };

        const isCedulaValid = (cedula2) => {
            const re2 = new RegExp("/[0-9]{7,8}/");
            return re2.test(cedula2);
        };
    
        const calcularEdad = (edadF) => {
            const fechaActual = new Date();
            const anoActual = parseInt(fechaActual.getFullYear());
            const mesActual = parseInt(fechaActual.getMonth()) + 1;
            const diaActual = parseInt(fechaActual.getDate());
        
            const anoNacimiento = parseInt(String(edadF.value).substring(0, 4));
            const mesNacimiento = parseInt(String(edadF.value).substring(5, 7));
            const diaNacimiento = parseInt(String(edadF.value).substring(8, 10));
    
            let edad = anoActual - anoNacimiento;
            if (mesActual < mesNacimiento) {
                edad--;
            } else if (mesActual === mesNacimiento) {
                if (diaActual < diaNacimiento) {
                    edad--;
                }
            }
            if(anoNacimiento < 1930){
                return false;
              }
    
              if(edad < 15) {
                return false;
            }
            
            if(edad >= 15){
                return edad;
            }
        };
        
        const isRequired = value => value === '' ? false : true;
        const isBetween = (length, min, max) => length < min || length > max ? false : true;
        
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
  
        let isUsernameValid = checkUsername(),
              isCedulaValid = checkCedula(),
              isNombreValid = checkNombre(),
              isApellidoValid = checkApellido(),
              isSexoValid = checkSexo(),
              isFechaValid = checkFecha(),
              isEmailValid = checkEmail(),
              isPasswordValid = checkPassword(),
              isConfirmImagenValid = checkImagen();
  
        let isFormValid = isFechaValid &&
              isCedulaValid &&
              isNombreValid &&
              isApellidoValid &&
              isSexoValid &&
              isUsernameValid &&
              isEmailValid &&
              isPasswordValid &&
              isConfirmImagenValid;
  
              if (isFormValid) {
                btn.removeAttribute('disabled');
              }

              if (!isFormValid) {
                btn.setAttribute('disabled','');
              }
      }
  
      if(validador){
        checkData();
      }
}