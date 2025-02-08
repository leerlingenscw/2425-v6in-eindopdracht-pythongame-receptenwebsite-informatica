var loginForm = document.getElementById('loginForm');
if (loginForm) {
    loginForm.addEventListener('submit', function (event) {
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        
        if (username === '' || email === '' || password === '') {
            alert('Alle velden zijn verplicht!');
            event.preventDefault(); 
        }
    });
}


var registerForm = document.getElementById('registerForm');
if (registerForm) {
    registerForm.addEventListener('submit', function (event) {
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        
        if (username === '' || email === '' || password === '') {
            alert('Alle velden zijn verplicht!');
            event.preventDefault(); 
        }
    });
}
