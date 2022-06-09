const usernameEl = document.querySelector('#username');
const emailEl = document.querySelector('#email');
const passwordEl = document.querySelector('#password');
const cedulaEl = document.querySelector('#cedula');
const nombreEl = document.querySelector('#nombre');
const apellidoEl = document.querySelector('#apellido');
const sexoM = document.getElementById('hombre');
const sexoF = document.getElementById('mujer');
const sexo = document.querySelector('.form-field--genero');
const fecha = document.querySelector('#date');
const smallSexo = document.querySelector('.error');
const confirmPasswordEl = document.querySelector('#confirm-password');
const form = document.querySelector('#signup');

sexoF.checked = false;
sexoM.checked = false;


const check = (prop) => {
    switch (prop) {
        case 1:
            login();
        break;
        case 2:
            registro();
        break;
        // case 3:
        //     olvido();
        // break;
    }
}


const login = () => {
    const checkUsername = () => {

        let valid = false;
        const username = usernameEl.value.trim();
    
        if (!isRequired(username)) {
            showError(usernameEl, 'Este campo no puede estar vacio.');
        } else {
            showSuccess(usernameEl);
            valid = true;
        }
        return valid;
    };
    
    const checkPassword = () => {
    
        let valid = false;
        const password = passwordEl.value.trim();
    
        if (!isRequired(password)) {
            showError(passwordEl, 'Este campo no puede estar vacio.');
        } else {
            showSuccess(passwordEl);
            valid = true;
        }
        return valid;
    };
    
    const isRequired = value => value === '' ? false : true;
    
    const showError = (input, message) => {
    
        const formField = input.parentElement;
    
        formField.classList.remove('success');
        formField.classList.add('error');
    
        // Muestra el mensaje de error
        const error = formField.querySelector('small');
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
        error.textContent = '';
    }
    
    
    form.addEventListener('submit', function (e) {
        // Previene las multiples interacciones al enviar el formulario
        e.preventDefault();
    
    
        // validar los formularios
        let isUsernameValid = checkUsername(),
            isPasswordValid = checkPassword();
    
        let isFormValid = isUsernameValid &&
            isPasswordValid;
    
        // Envia la petición si el form es valido
        if (isFormValid) {
    
        }
    });
    
    
    form.addEventListener('input', debounce(function (e) {
        switch (e.target.id) {
            case 'username':
                checkUsername();
                break;
            case 'password':
                checkPassword();
                break;
        }
    }));
}

const registro = () => {

    const checkCedula = () => {
        
        let valid = false;

        const min = 7, max = 8;
    
        const cedula = cedulaEl.value.trim();
    
        if (!isRequired(cedula)) {
            showError(cedulaEl, 'Este campo no puede estar vacio.');
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
            showError(nombreEl, 'Este campo no puede estar vacio.');
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
            showError(apellidoEl, 'Este campo no puede estar vacio.');
        } else if (!isBetween(apellido.length, min, max)) {
            showError(apellidoEl, `El Apelldio debe estar entre ${min} y ${max} caracteres.`)
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
            showError(sexo, `Debe de seleccionar uno.`)
            console.log("works")
        } else {
            smallSexo.classList.add("oculto");
            valid = true;
        }
        return valid;
    }

    const checkFecha = () => {

        let valid = false;

        if (!fecha.value) {
            showError(fecha, 'Seleccione una fecha');
        } else if (calcularEdad(fecha)) {
            showError(fecha, 'Menor de 18 años')
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
            showError(usernameEl, 'Username cannot be blank.');
        } else if (!isBetween(username.length, min, max)) {
            showError(usernameEl, `Username must be between ${min} and ${max} characters.`)
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
            showError(emailEl, 'Email cannot be blank.');
        } else if (!isEmailValid(email)) {
            showError(emailEl, 'Email is not valid.')
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
            showError(passwordEl, 'Password cannot be blank.');
        } else if (!isPasswordSecure(password)) {
            showError(passwordEl, 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)');
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
            showError(confirmPasswordEl, 'Please enter the password again');
        } else if (password !== confirmPassword) {
            showError(confirmPasswordEl, 'The password does not match');
        } else {
            showSuccess(confirmPasswordEl);
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
    
        // 2016-07-11
        const anoNacimiento = parseInt(String(edadF).substring(0, 4));
        const mesNacimiento = parseInt(String(edadF).substring(5, 7));
        const diaNacimiento = parseInt(String(edadF).substring(8, 10));
    
        let edad = anoActual - anoNacimiento;
        if (mesActual < mesNacimiento) {
            edad--;
        } else if (mesActual === mesNacimiento) {
            if (diaActual < diaNacimiento) {
                edad--;
            }
        }

        return edad;
        
    };
    
    const isRequired = value => value === '' ? false : true;
    const isBetween = (length, min, max) => length < min || length > max ? false : true;
    
    const showError = (input, message) => {
        // get the form-field element
        const formField = input.parentElement;
        // add the error class
        formField.classList.remove('success');
        formField.classList.add('error');
    
        // show the error message
        const error = formField.querySelector('small');
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
        error.textContent = '';
    }
    
    
    form.addEventListener('submit', function (e) {
        // prevent the form from submitting
        e.preventDefault();
    
    
        // validate forms
        let isUsernameValid = checkUsername(),
            isCedulaValid = checkCedula(),
            isNombreValid = checkNombre(),
            isApellidoValid = checkApellido(),
            isSexoValid = checkSexo(),
            isFechaValid = checkFecha(),
            isEmailValid = checkEmail(),
            isPasswordValid = checkPassword(),
            isConfirmPasswordValid = checkConfirmPassword();
    
        let isFormValid = isCedulaValid &&
            isNombreValid &&
            isApellidoValid &&
            isSexoValid &&
            isFechaValid &&
            isUsernameValid &&
            isEmailValid &&
            isPasswordValid &&
            isConfirmPasswordValid;
    
        // submit to the server if the form is valid
        if (isFormValid) {
            alert("enviado")
        }
    });
    
    
    // const debounce = (fn, delay = 500) => {
    //     let timeoutId;
    //     return (...args) => {
            
    //         if (timeoutId) {
    //             clearTimeout(timeoutId);
    //         }
            
    //         timeoutId = setTimeout(() => {
    //             fn.apply(null, args)
    //         }, delay);
    //     };
    // };
    // 
    // form.addEventListener('input', debounce(function (e) {
    //     switch (e.target.id) {
    //         case 'cedula':
    //             checkCedula();
    //             break;
    //         case 'nombre':
    //             checkNombre();
    //             break;
    //         case 'apellido':
    //             checkApellido();
    //             break;
    //         case 'username':
    //             checkUsername();
    //             break;
    //         case 'email':
    //             checkEmail();
    //             break;
    //         case 'password':
    //             checkPassword();
    //             break;
    //         case 'confirm-password':
    //             checkConfirmPassword();
    //             break;
    //     }
    // }));
}