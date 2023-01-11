let buttonChangeTheme = document.querySelector("#changeTheme");
let body = document.querySelector("body");
let currTheme = body.getAttribute("data-bs-theme");
let themeIcon = document.querySelector("#themeIcon");

// Set the text info in changeTheme id to the current theme
document.querySelector("#changeTheme").textContent = currTheme.toUpperCase();

// Change the theme when clicked
buttonChangeTheme.addEventListener('click', function () {
    // Add a transition to the body element
    body.style.transition = "all 0.3s";

    // Change the data-bs-theme attribute
    if (currTheme === "light") {
        // Change to dark theme
        body.setAttribute("data-bs-theme", "dark");
        themeIcon.classList.replace("bi-sun-fill", "bi-moon-fill");
    }
    else {
        // Change to light theme
        body.setAttribute("data-bs-theme", "light");
        themeIcon.classList.replace("bi-moon-fill", "bi-sun-fill");
    }

    currTheme = body.getAttribute("data-bs-theme");
    buttonChangeTheme.textContent = (currTheme === "light") ? "LIGHT" : "DARK";
});