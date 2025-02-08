
document.getElementById('loginForm').addEventListener('submit', function (event) {
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    
    if (username === '' || email === '' || password === '') {
        alert('Alle velden zijn verplicht');
        event.preventDefault();
    }
    
});


document.getElementById('registerForm').addEventListener('submit', function (event) {
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    
    if (username === '' || email === '' || password === '') {
        alert('Alle velden zijn verplicht');
        event.preventDefault();
    }
    
});
