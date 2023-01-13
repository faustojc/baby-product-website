let productName = sessionStorage.getItem('product');

if (productName === undefined || productName === null) {
    console.log('No products selected');
}
else {
    let product = {};

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
                <div class="cart mt-4 align-items-center"> 
                    <button class="btn btn-outline-success text-uppercase mr-2 px-4">Add to cart</button>  
                </div>
            </div>
        </div>
    `;

    backToCategory();
    addCart();
}

function backToCategory() {
    document.getElementById('back').addEventListener('click', function () {
        if (sessionStorage.getItem('product') !== null) {
            sessionStorage.removeItem('product');
        }
    });
}

function addCart() {
    // TODO: add 'add to cart' functionality with remove specific product, add quantity, and calculate price
}

window.onbeforeunload = function () {
    if (product !== null) {
        sessionStorage.removeItem('product');
    }
};
