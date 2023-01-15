let productName = sessionStorage.getItem('product');
let product = {};

if (productName === undefined || productName === null) {
    console.log('No products selected');
}
else {
    for (const element of productsList) {
        if (element.name === productName) {
            product = element;
            break;
        }
    }

    document.getElementById('productInfo').innerHTML += `
        <div class="col-md-6">
            <div class="images p-3">
                <div class="text-center p-4"> <img src="${product.picture}" id="productImg" width="250" alt="product image"/> </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="product d-flex bg-body-secondary justify-content-between flex-column h-100 p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-arrow-left me-2"></i>
                        <a class="link-info text-decoration-none ml-1" id="back" href="category.php"> Back </a>
                    </div>
                </div>
                <div class="mt-4 mb-3">
                    <span class="text-uppercase text-muted brand">${product.category}</span>
                    <h5 class="text-uppercase">${product.name}</h5>
                    <div class="price d-flex flex-row align-items-center">
                        <span class="act-price">P${product.price}</span>
                    </div>
                </div>
                <p class="about">${product.description}</p>
                <div class="cart mt-4 d-inline-flex align-items-center"> 
                    <input type="number" name="quantity" class="quantity bg-body-secondary border border-secondary border-1" id="quantity" title="Quantity" value="1" min="1" max="50">
                    <button class="btn btn-outline-success text-uppercase mr-2 px-4" id="addCartBtn" type="button" data-bs-toggle="none" data-bs-target="#offcanvas-cart" aria-controls="offcanvas-cart">Add to cart</button>  
                </div>
            </div>
        </div>
    `;

    let userCart = null;

    if (localStorage.getItem(currUsername) !== null && localStorage.getItem(currUsername) !== undefined) {
        userCart = JSON.parse(localStorage.getItem(currUsername));

        for (const cart of userCart.carts) {
            if (cart.name.includes(product.name)) {
                addCartBtn.textContent = "View in cart";
                addCartBtn.setAttribute("data-bs-toggle", "offcanvas");
                break;
            }
        }
    }

    document.getElementById('back').addEventListener('click', function () {
        if (sessionStorage.getItem('product') !== null) {
            sessionStorage.removeItem('product');
        }
    });

    addCart();
}

function addCart() {
    let addCartBtn = document.querySelector('#addCartBtn');

    addCartBtn.addEventListener('click', function () {
        if (!addCartBtn.textContent.includes("View in cart")) {
            let quantity = document.querySelector('#quantity').value;

            setJSONData(currUsername, "carts", {name: product.name, category: product.category, price: product.price, picture: product.picture, quantity: Number.parseInt(quantity)});
            displayCart();

            addCartBtn.setAttribute("data-bs-toggle", "offcanvas");
            addCartBtn.textContent = "View in cart";
        }
    });
}

window.onbeforeunload = function () {
    if (product !== null) {
        sessionStorage.removeItem('product');
    }
};
