document.addEventListener('DOMContentLoaded', function () {
  
    document.getElementById('loginForm').addEventListener('submit', function (event) {
        const username = document.getElementById('username').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

  
        if (username === '' || email === '' || password === '') {
            alert('Alle velden zijn verplicht');
            event.preventDefault(); 
        }
    });
});
