let body = document.querySelector("body");
let currTheme = body.getAttribute("data-bs-theme");

// Set the text info in changeTheme id to the current theme
document.querySelector("#changeTheme").textContent = currTheme.toUpperCase();

function changeTheme() {
    // Change the data-bs-theme attribute
    if (currTheme === "light") {
        body.setAttribute("data-bs-theme", "dark");
    }
    else {
        body.setAttribute("data-bs-theme", "light");
    }

    // Get the current theme of body
    currTheme = body.getAttribute("data-bs-theme");
}

