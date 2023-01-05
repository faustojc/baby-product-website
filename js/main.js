// Theme change
let body = document.querySelector("body");
let currTheme = body.getAttribute("data-bs-theme");
let themeIcon = document.querySelector("#themeIcon");

// Set the text info in changeTheme id to the current theme
document.querySelector("#changeTheme").textContent = currTheme.toUpperCase();

function changeTheme() {
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

    // Get the current theme of body
    currTheme = body.getAttribute("data-bs-theme");
}

const productsPath = "json/products.json";

let dataSync = [];
let dataList = [];
let productsResult = [];

// example for product
let exampleProduct = [{
    id: 1,
    name: "Baby Relo",
    category: "watch",
    path: "file path"
}];

/**
 * Adds the data to the JSON file
 * @param {any[]} data the data with its contents, can be an array in JSON format
 */
function addData(data) {
    dataSync = localStorage.getItem('product');
    dataList = JSON.parse(JSON.stringify(dataSync));
    dataList.push(data);
    localStorage.setItem('product', JSON.stringify(dataList));
}

/**
 * Removes the data in JSON file
 * @param {string} data the data to remove
 */
function removeData(data) {
    dataSync = localStorage.getItem('product');
    dataList = JSON.parse(JSON.stringify(dataSync));
    let end = dataList.length;

    for (let property = 0; property < end; property++) {
        if (dataList[property].name.toUpperCase() === data.toUpperCase()) {
            dataList.splice(property, 1);
            break;
        }
    }
}

// Cookies

/**
 * Sets the cookie data
 * @param {string} data the column in Database
 * @param {string} value the value to store
 */
function setCookie(data, value) {
    let date = new Date();
    date.setTime(date.getTime() + (30*24*60*60*1000));

    let expires = "expires="+ date.toUTCString();
    document.cookie = data + "=" + value + ";" + expires + ";path=/";
}

/**
 * Gets the data value in cookie
 * @param {string} data the value to get
 * @returns {string} The cookie data value
 */
function getCookie(data) {
    let email = data + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let decode = decodedCookie.split(';');

    for(const element of decode) {
        let c = element;

        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(email) === 0) {
            return c.substring(email.length, c.length);
        }
    }
    return "";
}
