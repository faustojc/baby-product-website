let buttonChangeTheme = document.getElementById('changeTheme');

buttonChangeTheme.addEventListener('click', function () {
    // Get all HTML files in the project
    let webFiles = [
        "index.php",
        "main.php",
        "bbform.php",
        "account_created.php"
    ];

    // Loop through each HTML file
    for (const element of webFiles) {

        // Load the HTML file using AJAX
        let xmlHttpReq = new XMLHttpRequest();
        xmlHttpReq.open("GET", element, false);
        xmlHttpReq.send();

        // Get the HTML content of the file
        let htmlContent = xmlHttpReq.responseText;

        // Create a temporary div element
        let tempDiv = document.createElement("div");

        // Set the innerHTML of the div to the HTML content of the file
        tempDiv.innerHTML = htmlContent;

        // Find the <body> element in the div
        let body = tempDiv.getElementsByTagName("body")[0];

        // Add a transition to the body element
        body.style.transition = "all 0.3s";

        // Change the data-bs-theme attribute
        body.setAttribute("data-bs-theme", "dark");

        // Save the modified HTML content back to the file
        let xhr2 = new XMLHttpRequest();
        xhr2.open("POST", element, false);
        xhr2.setRequestHeader("Content-Type", "text/html");
        xhr2.send(tempDiv.innerHTML);
    }
});
