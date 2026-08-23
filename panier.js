let cartKey = 'cart_guest';

document.addEventListener('DOMContentLoaded', function() {
    fetch('get_user.php')
        .then(response => response.json())
        .then(data => {
            if (data.logged_in) {
                cartKey = 'cart_' + data.email;
            }
            initCart();
        })
        .catch(err => {
            console.error("Error fetching user session:", err);
            initCart();
        });
});

function initCart() {
    updateCartCount();

    // Attach event listeners to all 'Ajouter au panier' buttons
    const ajouterButtons = document.querySelectorAll('.ajouter, .ajoutpanier');
    
    ajouterButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation(); // Prevent favoris logic if needed

            let productId, name, priceStr, image;

            // Determine if we are on a listing page or product detail page
            const card = this.closest('.product') || this.closest('.card');
            
            if (card) {
                // Listing page (index.php, league pages)
                const wrapper = card.closest('[data-id]');
                productId = wrapper ? wrapper.getAttribute('data-id') : this.getAttribute('data-id');
                const titleEl = card.querySelector('.card-title');
                name = (titleEl.textContent || titleEl.innerText).trim();
                const priceElements = card.querySelectorAll('.card-text');
                
                // Try to find price by looking for '€', otherwise take the last card-text element
                priceElements.forEach(el => {
                    const text = el.textContent || el.innerText;
                    if (text.includes('€')) {
                        priceStr = text;
                    }
                });
                if (!priceStr && priceElements.length >= 2) {
                    priceStr = priceElements[priceElements.length - 1].textContent || priceElements[priceElements.length - 1].innerText;
                }
                
                const imgEl = card.querySelector('.card-img-top');
                image = imgEl ? imgEl.getAttribute('src') : '';
            } else {
                // Product detail page
                productId = this.getAttribute('data-id');
                const detailContainer = this.closest('.container');
                if (detailContainer) {
                    const titleEl = detailContainer.querySelector('h2');
                    name = (titleEl.textContent || titleEl.innerText).trim();
                    const priceEl = detailContainer.querySelector('.price');
                    priceStr = priceEl.textContent || priceEl.innerText;
                    const imgEl = detailContainer.querySelector('img.img-fluid');
                    image = imgEl ? imgEl.getAttribute('src') : '';
                }
            }

            if (!productId || !name || !priceStr) {
                console.error("Could not extract product details for cart");
                return;
            }

            // Parse price
            const price = parseFloat(priceStr.replace('€', '').trim());

            addToCart({
                id: productId,
                name: name,
                price: price,
                image: image,
                quantity: 1
            });
            
            alert('Produit ajouté au panier avec succès!');
        });
    });

    // If we are on the panier page, render the cart
    if (document.getElementById('cart-items')) {
        renderCart();
    }
}

function getCart() {
    const cart = localStorage.getItem(cartKey);
    return cart ? JSON.parse(cart) : [];
}

function saveCart(cart) {
    localStorage.setItem(cartKey, JSON.stringify(cart));
}

function addToCart(product) {
    const cart = getCart();
    const existingProductIndex = cart.findIndex(p => p.id === product.id);

    if (existingProductIndex >= 0) {
        cart[existingProductIndex].quantity += 1;
    } else {
        cart.push(product);
    }

    saveCart(cart);
    updateCartCount();
}

function updateCartCount() {
    const cart = getCart();
    const totalCount = cart.reduce((total, item) => total + item.quantity, 0);
    const countElements = document.querySelectorAll('#cart-count');
    countElements.forEach(el => {
        el.innerText = totalCount;
    });
}

function renderCart() {
    const cart = getCart();
    const cartItemsContainer = document.getElementById('cart-items');
    const itemCountElement = document.getElementById('item-count');
    const totalPriceElement = document.getElementById('total-price');

    if (!cartItemsContainer) return;

    cartItemsContainer.innerHTML = '';
    let totalPrice = 0;
    let totalItems = 0;

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = '<p>Votre panier est vide.</p>';
    } else {
        cart.forEach((item, index) => {
            totalPrice += item.price * item.quantity;
            totalItems += item.quantity;

            const itemHTML = `
                <div class="cart-item d-flex align-items-center mb-3 p-3 border rounded">
                    <img src="${item.image}" alt="${item.name}" style="width: 80px; height: 80px; object-fit: contain; margin-right: 15px;">
                    <div class="flex-grow-1">
                        <h5 class="mb-1">${item.name}</h5>
                        <p class="mb-1">${item.price.toFixed(2)} €</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <input type="number" class="form-control quantity-input mx-2" style="width: 60px;" value="${item.quantity}" min="1" data-index="${index}">
                        <button class="btn btn-danger btn-sm remove-item" data-index="${index}">Supprimer</button>
                    </div>
                </div>
            `;
            cartItemsContainer.insertAdjacentHTML('beforeend', itemHTML);
        });
    }

    if (itemCountElement) itemCountElement.innerText = `${totalItems} article${totalItems > 1 ? 's' : ''}`;
    if (totalPriceElement) totalPriceElement.innerText = `Total TTC: ${totalPrice.toFixed(2)} €`;

    // Attach listeners for remove buttons and quantity changes
    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', function() {
            const index = this.getAttribute('data-index');
            removeFromCart(index);
        });
    });

    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', function() {
            const index = this.getAttribute('data-index');
            const newQuantity = parseInt(this.value);
            updateQuantity(index, newQuantity);
        });
    });
}

function removeFromCart(index) {
    const cart = getCart();
    cart.splice(index, 1);
    saveCart(cart);
    updateCartCount();
    renderCart();
}

function updateQuantity(index, quantity) {
    const cart = getCart();
    if (quantity < 1) return;
    cart[index].quantity = quantity;
    saveCart(cart);
    updateCartCount();
    renderCart();
}