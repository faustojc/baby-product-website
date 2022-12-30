let buttonChangeTheme = document.querySelector("#changeTheme");

// Change the theme when clicked
buttonChangeTheme.addEventListener('click', function () {
    // Add a transition to the body element
    body.style.transition = "all 0.3s";

    // Change the data-bs-theme attribute
    changeTheme();
    buttonChangeTheme.textContent = (currTheme === "light") ? "LIGHT" : "DARK";
});