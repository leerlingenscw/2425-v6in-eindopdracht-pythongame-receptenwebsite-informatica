document.addEventListener('DOMContentLoaded', function () {
    const registerForm = document.getElementById('registerForm');
    const emailErrorMessage = document.getElementById('emailFoutmelding');
    const usernameErrorMessage = document.getElementById('usernameFoutmelding');

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('error') === 'email') {
        emailErrorMessage.style.display = 'block';
    }

    if (urlParams.get('error') === 'username') {
        usernameErrorMessage.style.display = 'block';
    }
  
    registerForm.addEventListener('submit', function (event) {
        const username = document.getElementById('username').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        
  
        if (username === '' || email === '' || password === '') {
            alert('Alle velden zijn verplicht');
            event.preventDefault(); 
        }
    });
});
