// Template for getting the data -> dataSync[username][data].value
let dataSync = {};
let carts = [];
let totalAmount = 0;
let currUsername = document.querySelector('#username').textContent.trim();

/**
 * Set or add the user's data to the JSON file by value
 * @param {string} username The user's info
 * @param {string} data The user's data to add or set
 * @param {any[] | string | number} value The value to set or add to user's data, can be an array in JSON format
 */
function setJSONData(username, data, value) {
    // Initialize new user's name if it doesn't exist
    if(!dataSync[username]){
        dataSync[username] = {};
    }
    // Initialize new data of user if it doesn't exit
    if(!dataSync[username][data]){
        dataSync[username][data] = []
    }
    // Add the value to the user's data if the value is JSON array
    if (typeof value === typeof []) {
        let length = dataSync[username][data].length;

        if (length !== 0) {
            for (const element of dataSync[username][data]) {
                if (element.name === value.name) {
                    element.quantity += value.quantity;
                }
                else {
                    dataSync[username][data].push(value);
                }
            }
        }
        else dataSync[username][data].push(value);
    }
    // Add the value if the JSON array is in string and add to user's data
    else if (typeof JSON.parse(value) === typeof []) {
        let valueJSON = JSON.parse(value);
        let length = dataSync[username][data].length;

        if (length !== 0) {
            for (const element of dataSync[username][data]) {
                if (element.name === valueJSON.name) {
                    element.quantity += valueJSON.quantity;
                }
                else {
                    dataSync[username][data].push(valueJSON);
                }
            }
        }
        else dataSync[username][data].push(valueJSON);
    }
    // Set the data value of user
    else {
        dataSync[username][data] = value;
    }
}


/**
 * Removes the data in JSON file
 * @param {string} username The user's info
 * @param {string} data the data to remove
 * @param {any[] | string | number} value The value to remove from user's data, can be an array in JSON format
 */
function removeJSONData(username, data, value) {
    if(dataSync[username] && dataSync[username][data]) {
        dataSync[username][data] = dataSync[username][data].filter(el => el.name !== value.name);
    }
}

/**
 * Data template for cart
 * dataSync = {
 *     "username": {
 *         "data": [
 *             {
 *                 "name": "product name",
 *                 "category": "product category",
 *                 "price": 123,
 *                 "picture": "product/file/path",
 *                 "quantity": 2
 *             }
 *         ]
 *     }
 * }
 */
function displayCart() {
    let usernames = Object.keys(dataSync);

    for (const name of usernames) {
        if (currUsername === name) {
            if (carts.length === 0) {
                carts.push(dataSync[name]["carts"]);
                displayProduct(dataSync[name]["carts"][0]);
            }
            else {
                for (const prod of carts) {
                    // If the product is not in cart, add to cartList and display
                    let notInCart = dataSync[name]["carts"].find(value => value.name !== prod.name);

                    if (notInCart) {
                        carts.push(prod);
                        displayProduct(prod);
                        break;
                    }
                }
            }
        }
    }

    document.querySelector('#cart-count').textContent = carts.length;
    removeCartBtn();
}

function removeCartBtn() {
    let removeCart = document.querySelectorAll('.removeCart');

    for (const removeBtn of removeCart) {
        removeBtn.addEventListener('click', function (event) {
            let productName = event.target.closest(".productCart").querySelector('.prodName').textContent.trim();
            let addCartBtn = document.querySelector('#addCartBtn');

            for (let i = 0; i < carts.length; i++) {
                let x = typeof carts[i][i].name;

                if (carts[i][i].name === productName) {
                    carts.splice(i, 1);
                    break;
                }
            }

            addCartBtn.setAttribute("data-bs-toggle", "none");
            addCartBtn.textContent = "Add to cart";
            event.target.closest('.productCart').remove();

            document.querySelector('#cart-count').textContent = carts.length;
        })
    }
}

function displayProduct(product) {
    let cartList = document.querySelector('#cart-list');

    cartList.innerHTML += `
        <div class="row mb-4 flex-column productCart">
            <div class="row mb-4 mb-lg-0">
                <img src="${product.picture}" class="col-3 img-fluid rounded-bottom-2" alt="${product.name}">
                <div class="col">
                    <h6 class="text-muted">${product.category}</h6>
                    <p class="mb-0 prodName">${product.name}</p>
                </div>
                <i class="col-1 bi bi-trash2-fill removeCart" style="cursor: pointer"></i>
            </div>
            <div class="row mb-4 mb-lg-0 pt-2">
                <div class="col" style="max-width: 250px">
                    <button class="btn btn-primary p-2 me-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <input type="number" value="${product.quantity}" min="1" max="50" id="quantity">
                    <button class="btn btn-primary p-2 ms-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                        <i class="bi bi-chevron-up"></i>
                    </button>
                </div>
                <p class="col-4 text-md-center">
                    <strong>P ${product.price}.00</strong>
                </p>
            </div>
            <hr class="my-4">
        </div>
    `;
}

window.onload = function () {
    displayCart();
}
