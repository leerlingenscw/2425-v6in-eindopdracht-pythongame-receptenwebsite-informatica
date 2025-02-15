document.addEventListener('DOMContentLoaded', function () {
    const loginForm = document.getElementById('loginForm');
    const errorMessage = document.getElementById('foutmelding');

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('error')) {
        errorMessage.style.display = 'block';
    }

    loginForm.addEventListener('submit', function (event) {
        const username = document.getElementById('username').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();

        if (username === '' || email === '' || password === '') {
            alert('Alle velden zijn verplicht');
            event.preventDefault();
        }
    });
});