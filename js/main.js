let currUsername = document.querySelector('#username').textContent.trim();
let cartList = document.querySelector('#cart-list');
let totalAmount = 0;

/**
 * Set or add the user's data to the JSON file by value
 * @param {string} username The user's info
 * @param {string} data The user's data to add or set
 * @param {any[] | string | number} value The value to set or add to user's data, can be an array in JSON format
 */
function setJSONData(username, data, value) {
    let dataSync = {};

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
            dataSync[data].some((d) => {
                if (d.name.includes(value.name)) d.quantity += value.quantity;
                else {
                    dataSync[data].push(value);
                    return true;
                }
            });
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

    cartList.innerHTML = '';

    if (userCarts !== null) {
        for (const product of userCarts.carts) {
            displayProduct(product);
        }

        document.querySelector('#cart-count').textContent = userCarts.carts.length;
    }

    removeCartBtn();
}

function removeCartBtn() {
    let removeCart = document.querySelectorAll('.productCart');

    removeCart.forEach((remove) => {
        remove.querySelector('.removeCart').addEventListener('click', event => {
            let productName = event.target.closest(".productCart").querySelector('.prodName').textContent.trim();
            let userCart = JSON.parse(localStorage.getItem(currUsername));

            // remove the deleted cart from the user's cart list
            for (let i = 0; i < userCart.carts.length; i++) {
                if (userCart.carts[i].name.includes(productName)) {
                    userCart.carts.splice(i, 1);
                }
            }

            event.target.closest('.productCart').remove();

            localStorage.setItem(currUsername, JSON.stringify(userCart));
            document.querySelector('#cart-count').textContent = userCart.carts.length;
        });
    });
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
                    <button class="btn btn-primary p-2 me-2 w-25" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <input class="h-100 bg-body-secondary text-center" type="number" value="${product.quantity}" min="1" max="50" id="quantity">
                    <button class="btn btn-primary p-2 ms-2 w-25" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
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
