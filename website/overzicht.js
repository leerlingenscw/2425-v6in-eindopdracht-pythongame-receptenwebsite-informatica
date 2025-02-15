window.onload = function() {
    fetch('recepten.php')  
        .then(response => response.text())  
        .then(data => {
            document.getElementById('recepten-container').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
};
