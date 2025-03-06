document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('searchForm');
    const recipeList = document.getElementById('recipeList');

    
    form.addEventListener('submit', function(event) {
        event.preventDefault();  

        const query = document.getElementById('searchInput').value;
        

        if (query.trim() === '') {
            recipeList.innerHTML = "<li>Voer een zoekterm in...</li>";
            return;
        }

     
        fetchResults(query);
    });

    function fetchResults(query) {
        fetch('zoeken2.php?query=' + encodeURIComponent(query))
            .then(response => response.text())
            .then(data => {
              
                recipeList.innerHTML = data;
            })
            .catch(error => {
                recipeList.innerHTML = "<li>Er is een fout opgetreden bij het ophalen van de resultaten.</li>";
                console.error("Fout bij ophalen:", error);
            });
    }
});
