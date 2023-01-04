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

// JSON data
const DataType = {
    products: "products",
    users: "users"
}

const productsPath = "json/products.json";
const usersPath = "json/users.json";
const fs = require("fs");

let dataSync;
let dataList = [];

// example for product
let productsResult = [{
    products: [
        {
            id: 1,
            name: "Baby Relo",
            category: "watch",
            path: "file path"
        }
    ]
}];

// example for user
let usersResult = [{
   "users": [
       {
           "name": "Fausto JC Boko",
           "theme": "dark"
       }
   ]
}];

/**
 * Writes the data to the JSON file
 * @param {string | Buffer | URL | number} path the JSON file path
 * @param {Buffer | any[]} data the data with its contents, can be an array in JSON format, this must be JSON parse
*/
function writeData(path, data) {
    fs.writeFile(path, JSON.stringify(data), (err) => {
        if (err) console.log(err.message);
    });
}

/**
 * Adds the data to the JSON file
 * @param {DataType} typeOfData what type of data to use
 * @param {string | Buffer | URL | number} path the JSON file path
 * @param {any[] | Buffer} data the data with its contents, can be an array in JSON format
 */
function addData(typeOfData, path, data) {
    fs.readFile(path, 'utf-8',(err) =>{
        if (err) console.log(err.message);
        else {
            dataList = JSON.parse(JSON.stringify(path));
            let dataListLength = dataList.length

            for (let i = 0; i < dataListLength; i++) {
                if (Object.keys(dataList[i])[0] === DataType.products)
                    dataList[i].products.push(data);
                else
                    dataList[i].users.push(data);
            }

            writeData(path, dataList);
        }
    });
}

/**
 * Removes the data in inputted type of data in JSON file
 * @param {DataType} typeOfData what type of data to use
 * @param {string | Buffer | URL | number} path the JSON file path
 * @param {string} data the data to remove
 */
function removeData(typeOfData, path, data) {
    dataSync = fs.readFileSync(path);
    dataList = JSON.parse(JSON.stringify(dataSync));
    let length = dataList.length;

    for (let i = 0; i < length; i++) {
        if (Object.keys(dataList[i])[0] === DataType.products) {
            let end = dataList[i].products.length;

            for (let property = 0; property < end; property++) {
                if (dataList[i].products[property].name.toUpperCase() === data.toUpperCase()) {
                    dataList[i].products.splice(property, 1);
                    return;
                }
            }
        }
        else {
            let end = usersResult[i].users.length;

            for (let info = 0; info < end; info++) {
                if (dataList[i].users[info].name.toUpperCase() === data.toUpperCase()) {
                    dataList[i].users.splice(info, 1);
                    return;
                }
            }
        }
    }
}
