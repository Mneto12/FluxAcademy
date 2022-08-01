  const usernameEl = document.querySelector('#nombre_usuario');
  const emailEl = document.querySelector('#correo');
  const passwordEl = document.querySelector('#contrasena');
  const cedulaEl = document.querySelector('#cedula');
  const nombreEl = document.querySelector('#nombre');
  const apellidoEl = document.querySelector('#apellido');
  const sexoM = document.getElementById('hombre');
  const sexoF = document.getElementById('mujer');
  const sexo = document.querySelector('.form-field--genero');
  const fecha = document.querySelector('#fecha_nacimiento');
  const smallSexo = document.querySelector('.error');
  const confirmPasswordEl = document.querySelector('#confirm-password');
  const imagen = document.getElementById("filechooser");
  const form = document.querySelector('#formUsuario');
  const formImagen = document.querySelector('.form--imagen');
  
  const submitFormCrearEditar = (validador) => { 

      const checkCedula = () => {
          
          let valid = false;
  
          const min = 7, max = 8;
      
          const cedula = cedulaEl.value.trim();
      
          if (!isRequired(cedula)) {
              showError(cedulaEl, 'Este campo no puede estar vacio');
          } else if (isCedulaValid(cedula) || !isBetween(cedula.length, min, max)) {
              showError(cedulaEl, `Cedula no valida. La cedula debe de tener entre ${min} y ${max} numeros y no puede contener letras.`)
          } else {
              showSuccess(cedulaEl);
              valid = true;
          }
          return valid;
          
      }
  
      const checkNombre = () => {
  
          let valid = false;
      
          const min = 3,
              max = 12;
      
          const nombre = nombreEl.value.trim();
      
          if (!isRequired(nombre)) {
              showError(nombreEl, 'Este campo no puede estar vacio');
          } else if (!isBetween(nombre.length, min, max)) {
              showError(nombreEl, `El nombre debe estar entre ${min} y ${max} caracteres.`)
          } else {
              showSuccess(nombreEl);
              valid = true;
          }
          return valid;
      }
  
      const checkApellido = () => {
  
          let valid = false;
      
          const min = 3,
              max = 12;
      
          const apellido = apellidoEl.value.trim();
      
          if (!isRequired(apellido)) {
              showError(apellidoEl, 'Este campo no puede estar vacio');
          } else if (!isBetween(apellido.length, min, max)) {
              showError(apellidoEl, `El Apellido debe estar entre ${min} y ${max} caracteres.`)
          } else {
              showSuccess(apellidoEl);
              valid = true;
          }
          return valid;
      }
  
      const checkSexo = () => {
        
          let valid = false;
      
          if (sexoM.checked == false && sexoF.checked == false) {
              smallSexo.classList.remove("oculto");
              showError(sexo, `Seleccione un genero`)
          } else {
              smallSexo.classList.add("oculto");
              valid = true;
          }
          return valid;
      }

      const checkSexo2 = () => {
        
        let valid = false;
    
        if (sexoM.checked == false && sexoF.checked == false) {
            showError(sexo, `Seleccione un genero`)
        } else {
            showSuccess(sexo);
            valid = true;
        }
        return valid;
    }
  
      const checkFecha = () => {
  
          let valid = false;
  
          if (!fecha.value) {
              showError(fecha, 'Seleccione una fecha');
          } else if (!calcularEdad(fecha)) {
              showError(fecha, 'Debe de tener una edad minima de 15 años o Introducir una fecha valida')
          } else {
              showSuccess(fecha);
              valid = true;
          }
          return valid;
          
      }
      
      const checkUsername = () => {
  
          let valid = false;
      
          const min = 3,
              max = 25;
      
          const username = usernameEl.value.trim();
      
          if (!isRequired(username)) {
              showError(usernameEl, 'Este campo no puede estar vacio');
          } else if (!isBetween(username.length, min, max)) {
              showError(usernameEl, `El nombre de usuario debe tener entre ${min} y ${max} caracteres`)
          } else {
              showSuccess(usernameEl);
              valid = true;
          }
          return valid;
      };
      
      const checkEmail = () => {
          let valid = false;
          const email = emailEl.value.trim();
          if (!isRequired(email)) {
              showError(emailEl, 'Este campo no puede estar vacio');
          } else if (!isEmailValid(email)) {
              showError(emailEl, 'Correo invalido')
          } else {
              showSuccess(emailEl);
              valid = true;
          }
          return valid;
      };
      
      const checkPassword = () => {
      
          let valid = false;
      
          const password = passwordEl.value.trim();
      
          if (!isRequired(password)) {
              showError(passwordEl, 'Este campo no puede estar vacio');
          } else if (!isPasswordSecure(password)) {
              showError(passwordEl, 'La contrasena debe tener al menos 8 caracteres e incluir al menos 1 minuscula, 1 mayuscula, 1 numero y 1 caracter especial (!@#$%^&*)');
          } else {
              showSuccess(passwordEl);
              valid = true;
          }
      
          return valid;
      };
      
      const checkConfirmPassword = () => {

          let valid = false;
          // check confirm password
          const confirmPassword = confirmPasswordEl.value.trim();
          const password = passwordEl.value.trim();
      
          if (!isRequired(confirmPassword)) {
              showError(confirmPasswordEl, 'Este campo no puede estar vacio');
          } else if (password !== confirmPassword) {
              showError(confirmPasswordEl, 'Las contraseñas no coinciden');
          } else {
              showSuccess(confirmPasswordEl);
              valid = true;
          }
      
          return valid;
      };

      const checkImagen = () => {

        let valid = false;
        if(!imagen.value){
            console.log("llegue hasta aqui")
            showError(imagen, 'Debes de seleccionar una imagen');
        }else{
            showSuccess(imagen);
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

          if(validador == 'modal' && input == sexo){
            const errorSexo = document.querySelector('.errorSexo')
            errorSexo.classList.remove("oculto");
            errorSexo.textContent = message;
          }

          if(validador == 'modal' && input == confirmPasswordEl){
            console.log("validacion")
          }else{
            const formField = input.parentElement;
      
            formField.classList.remove('success');
            formField.classList.add('error');
        
            // Muestra el mensaje de error
            const error = formField.querySelector('small');
            error.classList.remove("oculto");
            error.textContent = message;
          }
      };
      
      const showSuccess = (input) => {

        if(validador == 'modal' && input == sexo){
            const errorSexo = document.querySelector('.errorSexo')
            errorSexo.classList.add("oculto");
            errorSexo.textContent = '';
          }else{
            // get the form-field element
            const formField = input.parentElement;
      
            // remove the error class
            formField.classList.remove('error');
            formField.classList.add('success');

            if(!input.querySelector('.fileC') && validador != 'modal' && imagen.value != ""){
                formImagen.classList.add('form--imagen--success')
                const error22 = document.getElementById('smallImagen');
                error22.classList.add("oculto");
                error22.textContent = '';
            }
            // hide the error message
            const error = formField.querySelector('small');
            error.classList.add("oculto");
            error.textContent = '';
          }
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
            isConfirmPasswordValid = checkConfirmPassword(),
            isConfirmImagenValid = checkImagen();

      let isFormValid = isCedulaValid &&
            isNombreValid &&
            isApellidoValid &&
            isSexoValid &&
            isFechaValid &&
            isUsernameValid &&
            isEmailValid &&
            isPasswordValid &&
            isConfirmPasswordValid &&
            isConfirmImagenValid;

            if (isFormValid) {
              // Send data 
              var blobFile = document.getElementById("filechooser").files[0];
              $("#imagen").val(blobFile.name);
            
                $.ajax({
                  type: "POST",
                  url: "../../modelo/usuarios/add.php",
                  data: $("#formUsuario").serialize(),
                  success: function (response) {
                    var jsonData = JSON.parse(response);

                    if (jsonData.success == "2") {
                      alert("La cédula, el correo o el nombre de usuario ya existen");
                      return;
                    }
                    
                    if (jsonData.success == "1") {
                    alert("Se realizo el registro correctamente");
                      document.getElementById("formUsuario").reset();
                      location.href = "./login.php"
                    }
                    
                    if (!jsonData.success == "1") {
                        alert("ERROR interno. Verificar con el administrador");
                    }

                  },
                });
                uploadFile();
              // Upload Image
                async function uploadFile() {
                let formData = new FormData(); 
                formData.append("file", filechooser.files[0]);
                await fetch('../../modelo/usuarios/upload.php', {
                    method: "POST", 
                    body: formData
                }); 
              }
            }
    }

    const checkDataModal = () => {
        const btn = document.querySelector('.btn--crear--usuario');
        let isUsernameValid = checkUsername(),
              isCedulaValid = checkCedula(),
              isNombreValid = checkNombre(),
              isApellidoValid = checkApellido(),
              isSexoValid = checkSexo2(),
              isFechaValid = checkFecha(),
              isEmailValid = checkEmail(),
              isPasswordValid = checkPassword(),
              isConfirmImagenValid = checkImagen();
  
        let isFormValid = isCedulaValid &&
              isNombreValid &&
              isApellidoValid &&
              isSexoValid &&
              isFechaValid &&
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

    if(validador == 'true'){
        checkData();
    }
    if(validador == 'modal'){
        checkDataModal();
    }
    if(validador == 'validado'){
        // Send data 
        var blobFile = document.getElementById("filechooser").files[0];
        $("#imagen").val(blobFile.name);
      
          $.ajax({
            type: "POST",
            url: "../../modelo/usuarios/add.php",
            data: $("#formUsuario").serialize(),
            success: function (response) {
              var jsonData = JSON.parse(response);
              if (jsonData.success == "2") {
                alert("La cédula, el correo o el nombre de usuario ya existen");
                return;
              }
              
              if (jsonData.success == "1") {
              alert("Se realizo el registro correctamente");
                document.getElementById("formUsuario").reset();
                $("#modalForm").modal("hide");
                $("#contenido_principal").load('admin/listar_usuarios.php');
              }
              
              if (!jsonData.success == "1") {
                  alert("ERROR interno. Verificar con el administrador");
              }
            },
          });
          uploadFile();
        // Upload Image
          async function uploadFile() {
          let formData = new FormData(); 
          formData.append("file", filechooser.files[0]);
          await fetch('../../modelo/usuarios/upload.php', {
              method: "POST", 
              body: formData
          }); 
        }
    }
}
