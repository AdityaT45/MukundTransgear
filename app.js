window.onload = function() {
    const productListDiv = document.getElementById('product-list');
    products.forEach(product => {
        const button = document.createElement('button');
        button.innerText = product.name;
        // Set the button to redirect to product.html with a product ID
        button.onclick = function() {
            window.location.href = `product.html?id=${product.id}`;
        };
        productListDiv.appendChild(button);
    });
};

// Function to display product details on product.html
if (window.location.pathname === '/product.html') {
    const params = new URLSearchParams(window.location.search);
    const productId = params.get('id');

    const product = products.find(p => p.id == productId);

    if (product) {
        document.getElementById('product-name').innerText = product.name;
        document.getElementById('product-description').innerText = product.description;
        document.getElementById('product-price').innerText = product.price;
    } else {
        // Handle case where product is not found
        document.getElementById('product-name').innerText = 'Product not found';
    }
}
