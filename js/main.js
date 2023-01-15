let currUsername = document.querySelector('#username').textContent.trim();
let cartList = document.querySelector('#cart-list');
let dataSync = {};
let totalAmount = 0;

/**
 * Set or add the user's data to the JSON file by value
 * @param {string} username The user's info
 * @param {string} data The user's data to add or set
 * @param {any[] | string | number} value The value to set or add to user's data, can be an array in JSON format
 */
function setJSONData(username, data, value) {
    if (localStorage.getItem(username) !== null && localStorage.getItem(username) !== undefined) {
        dataSync = JSON.parse(localStorage.getItem(username));
    }

    // Initialize new data if it doesn't exist
    if(!dataSync[data]){
        dataSync[data] = [];
    }
    // Add the value to the user's data if the value is JSON array
    if (typeof value === typeof []) {
        let length = dataSync[data].length;

        if (length !== 0) {
            for (const element of dataSync[data]) {
                if (element.name.includes(value.name)) {
                    element.quantity += value.quantity;
                }
                else dataSync[data].push(value);
            }
        }
        else dataSync[data].push(value);
    }
    // Set the data value of user
    else {
        dataSync[data] = value;
    }

    localStorage.setItem(username, JSON.stringify(dataSync));
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
 *      "data": [
 *          {
 *              "name": "product name",
 *              "category": "product category",
 *              "price": 123,
 *              "picture": "product/file/path",
 *              "quantity": 2
 *          }
 *      ]
 * }
 */
function displayCart() {
    let userCarts = JSON.parse(localStorage.getItem(currUsername));

    if (userCarts !== null) {
        for (const product of userCarts.carts) {
            displayProduct(product);
        }

        document.querySelector('#cart-count').textContent = userCarts.carts.length;
    }

    removeCartBtn();
}

function removeCartBtn() {
    let removeCart = document.querySelectorAll('.removeCart');

    for (const removeBtn of removeCart) {
        removeBtn.addEventListener('click', function (event) {
            let productName = event.target.closest(".productCart").querySelector('.prodName').textContent.trim();
            let addCartBtn = document.querySelector('#addCartBtn');
            let userCart = JSON.parse(localStorage.getItem(currUsername));

            // remove the deleted cart from the user's cart list
            for (let i = 0; i < userCart.carts.length; i++) {
                if (userCart.carts[i].name === productName) {
                    userCart.carts.splice(i, 1);
                }
            }

            addCartBtn.setAttribute("data-bs-toggle", "none");
            addCartBtn.textContent = "Add to cart";
            event.target.closest('.productCart').remove();

            localStorage.setItem(currUsername, JSON.stringify(userCart));
            document.querySelector('#cart-count').textContent = userCart.carts.length;
        })
    }
}

function displayProduct(product) {
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
    cartList.innerHTML = '';
    displayCart();
}
