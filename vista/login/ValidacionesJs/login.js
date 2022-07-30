const usernameEl = document.querySelector('#username');
const passwordEl = document.querySelector('#password');

    const checkUsername = () => {

        let valid = false;
        const username = usernameEl.value.trim();
    
        if (!isRequired(username)) {
            showError(usernameEl, 'Este campo no puede estar vacio');
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
            showError(passwordEl, 'Este campo no puede estar vacio');
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
        // validar los formularios
        let isUsernameValid = checkUsername(),
            isPasswordValid = checkPassword();
    
        let isFormValid = isUsernameValid &&
            isPasswordValid;
    
        // Envia la petición si el form es valido
        if (isFormValid) {
            console.log("login user");
            
        }
    }

    checkData();