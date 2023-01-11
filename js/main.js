let dataSync = [];
let dataList = [];

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

// User info
let userInfo = {
    username: [],
    fistname: [],
    email: []
};

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

// XMLHttpRequest for getting request from client to server

/**
 * Sends request to the server with defined URL in src
 * @param {string|URL} src The URL or source path
 */
function sendRequest(src) {
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
}
