async function laadRecepten() {
    try {
        let response = await fetch("get_recepten.php");
        let recepten = await response.json();

        let container = document.getElementById("recepten-container");
        container.innerHTML = ""; 

        recepten.forEach(recept => {
            let div = document.createElement("div");
            div.classList.add("recipe");
            div.innerHTML = `
                <h2>${recept.naam}</h2>
                <p><strong>Ingrediënten:</strong><br> ${recept.ingrediënten.replace(/\n/g, "<br>")}</p>
                <p><strong>Bereiding:</strong><br> ${recept.recept.replace(/\n/g, "<br>")}</p>
            `;
            container.appendChild(div);
        });
    } catch (error) {
        document.getElementById("recepten-container").innerHTML = "<p>Fout bij het laden van recepten.</p>";
    }
}


window.onload = laadRecepten;
