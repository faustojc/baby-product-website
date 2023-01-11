const productsPath = "json/products.json";

let dataSync = [];
let dataList = [];
let productsResult = [];

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

// User info

let userInfo = {
    username: [],
    fistname: [],
    email: []
};

let usernameValue = '';
let firstnameValue = '';
let emailValue = '';

/**
 * Adds the user's data to the specified user's info
 * @param {string} info The user's info (username, firstname, email)
 * @param {string} data The data to add
 */
function addUserInfo(info, data) {
    for (let property of Object.keys(userInfo)) {
        if (property.toUpperCase() === info.toUpperCase()) {
            userInfo[property].push(data);
        }
    }
}

/**
 * Removes the user's data to the specified user's info
 * @param {string} info The user's info (username, firstname, email)
 * @param {string} data The data to remove
 */
function removeUserInfo(info, data) {
    for (let property of Object.keys(userInfo)) {
        if (property.toUpperCase() === info.toUpperCase()) {
            let length = userInfo[property].length;

            for (let i = 0; i < length; i++) {
                if (userInfo[property][i].toUpperCase() === data.toUpperCase()) {
                    userInfo[property][i].splice(i, 1);
                    return;
                }
            }
        }
    }
}

document.querySelector('#username').addEventListener('keypress', function (event) {
    usernameValue = document.getElementById('username').value;
});

document.querySelector('#firstname ').addEventListener('keypress', function (event) {
    firstnameValue = document.getElementById('firstname ').value;
});

document.querySelector('#email').addEventListener('keypress', function (event) {
    emailValue = document.getElementById('email').value;
});

// XMLHttpRequest for getting request from client to server

let xmlHttpRequest = new XMLHttpRequest;
let data;

xmlHttpRequest.onload = function () {
    if (xmlHttpRequest.status === 200) {
        data = JSON.parse(this.responseText);

        console.log("Successfully stored the data");
    } else {
        console.log("Failed to store in data");
    }
};

// Open request and send
xmlHttpRequest.open("POST", src, true);
xmlHttpRequest.setRequestHeader("Content-Type", "application/json");
xmlHttpRequest.send("userData=" + userInfo);
