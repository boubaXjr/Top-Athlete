// Ajouter des produits au panier et sauvegarder dans le localStorage
function addToCart(productName, productPrice) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.push({ name: productName, price: productPrice, quantity: 1 });
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
    window.location.href = 'panier.html'; // Rediriger vers la page du panier
}

// Mettre à jour le nombre d'articles dans le panier
function updateCartCount() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    document.getElementById('cart-count').innerText = cart.length;
}

// Charger les articles du panier depuis le localStorage
function loadCartItems() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let cartItemsContainer = document.getElementById('cart-items');
    let totalPrice = 0;
    cartItemsContainer.innerHTML = ''; // Vider le conteneur avant d'ajouter des articles

    cart.forEach((item, index) => {
        totalPrice += item.price * item.quantity;

        let cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');

        cartItem.innerHTML = `
            <img src="https://via.placeholder.com/100" alt="Produit">
            <div class="cart-item-details">
                <p><strong>${item.name}</strong></p>
                <p class="item-price">${item.price}€</p>
                <a href="#" class="remove-item" onclick="removeItem(${index})">Supprimer</a>
            </div>
            <div class="cart-item-quantity">
                <label for="quantity-${index}">Quantité:</label>
                <select id="quantity-${index}" name="quantity" onchange="updateQuantity(${index}, this.value)">
                    ${[1, 2, 3, 4].map(q => <option value="${q}" ${q === item.quantity ? 'selected' : ''}>${q}</option>).join('')}
                </select>
            </div>
            <div class="cart-item-price">
                ${item.price * item.quantity}€
            </div>
        `;
        cartItemsContainer.appendChild(cartItem);
    });

    document.getElementById('total-price').innerText = Total TTC: ${totalPrice.toFixed(2)} €;
    document.getElementById('item-count').innerText = ${cart.length} article${cart.length > 1 ? 's' : ''};
}

// Mettre à jour la quantité d'un article dans le panier
function updateQuantity(index, quantity) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart[index].quantity = parseInt(quantity, 10);
    localStorage.setItem('cart', JSON.stringify(cart));
    loadCartItems();
}

// Supprimer un article du panier
function removeItem(index) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cart));
    loadCartItems();
    updateCartCount();
}

// Initialiser la page
document.addEventListener('DOMContentLoaded', () => {
    updateCartCount();

    // Si nous sommes sur la page du panier, charger les articles
    if (document.getElementById('cart-items')) {
        loadCartItems();
    }
});