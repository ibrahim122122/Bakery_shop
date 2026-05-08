<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shopping Cart - NOIR.</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Inter:wght@300;400;500&display=swap" rel="stylesheet" />
  <style>
    :root {
      --bg: #0A0A0A;
      --surface: #111;
      --gold: #C9A96E;
      --gold-soft: rgba(201,169,110,0.18);
      --cream: #F0EDE8;
      --muted: rgba(240,237,232,0.65);
      --error: #ff6b6b;
      --success: #51cf66;
    }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      min-height: 100vh;
      font-family: 'Inter', system-ui, sans-serif;
      background: radial-gradient(circle at top, rgba(201,169,110,0.12), transparent 34%),
                  linear-gradient(180deg, #0A0A0A 0%, #050505 100%);
      color: var(--cream);
      padding: 2rem;
    }
    .container {
      max-width: 1200px;
      margin: 0 auto;
    }
    .header {
      text-align: center;
      margin-bottom: 3rem;
    }
    .header h1 {
      font-family: 'Cormorant Garamond', serif;
      font-size: 3rem;
      font-weight: 400;
      margin: 0;
      color: var(--gold);
    }
    .header p {
      color: var(--muted);
      font-size: 1.1rem;
      margin: 0.5rem 0 0;
    }
    .cart-layout {
      display: grid;
      grid-template-columns: 1fr 350px;
      gap: 3rem;
    }
    .cart-items {
      background: rgba(15,15,15,0.96);
      border: 1px solid rgba(201,169,110,0.14);
      border-radius: 16px;
      padding: 2rem;
    }
    .cart-item {
      display: grid;
      grid-template-columns: 100px 1fr auto;
      gap: 1.5rem;
      padding: 1.5rem 0;
      border-bottom: 1px solid rgba(201,169,110,0.08);
      align-items: center;
    }
    .cart-item:last-child {
      border-bottom: none;
    }
    .item-image {
      width: 100px;
      height: 100px;
      background: var(--surface);
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
    }
    .item-details h3 {
      margin: 0 0 0.5rem;
      color: var(--cream);
      font-size: 1.1rem;
    }
    .item-meta {
      color: var(--muted);
      font-size: 0.9rem;
      margin: 0 0 1rem;
    }
    .item-price {
      color: var(--gold);
      font-size: 1.2rem;
      font-weight: 600;
      margin-bottom: 1rem;
    }
    .quantity-controls {
      display: flex;
      align-items: center;
      gap: 1rem;
    }
    .quantity-btn {
      width: 32px;
      height: 32px;
      border: 1px solid rgba(201,169,110,0.18);
      background: rgba(255,255,255,0.05);
      color: var(--cream);
      border-radius: 6px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
    }
    .quantity-btn:hover {
      background: rgba(255,255,255,0.1);
    }
    .quantity-input {
      width: 60px;
      padding: 0.5rem;
      text-align: center;
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(201,169,110,0.18);
      border-radius: 6px;
      color: var(--cream);
    }
    .remove-btn {
      color: var(--error);
      cursor: pointer;
      padding: 0.5rem;
      border-radius: 6px;
      transition: background 0.2s ease;
    }
    .remove-btn:hover {
      background: rgba(255,107,107,0.1);
    }
    .cart-summary {
      background: rgba(15,15,15,0.96);
      border: 1px solid rgba(201,169,110,0.14);
      border-radius: 16px;
      padding: 2rem;
      height: fit-content;
      position: sticky;
      top: 2rem;
    }
    .summary-row {
      display: flex;
      justify-content: between;
      margin-bottom: 1rem;
      color: var(--muted);
    }
    .summary-row.total {
      border-top: 1px solid rgba(201,169,110,0.18);
      padding-top: 1rem;
      margin-top: 1rem;
      color: var(--cream);
      font-weight: 600;
      font-size: 1.2rem;
    }
    .btn {
      padding: 0.875rem 2rem;
      border: none;
      border-radius: 12px;
      font-family: inherit;
      font-size: 1rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.2s ease;
      text-decoration: none;
      display: inline-block;
      text-align: center;
      width: 100%;
    }
    .btn-primary {
      background: var(--gold);
      color: #0A0A0A;
    }
    .btn-primary:hover {
      background: #B8955E;
      transform: translateY(-1px);
    }
    .btn-secondary {
      background: rgba(255,255,255,0.05);
      color: var(--cream);
      border: 1px solid rgba(201,169,110,0.18);
    }
    .btn-secondary:hover {
      background: rgba(255,255,255,0.1);
    }
    .checkout-section {
      margin-top: 2rem;
    }
    .promo-code {
      margin-bottom: 2rem;
    }
    .promo-input {
      display: flex;
      gap: 1rem;
      margin-bottom: 1rem;
    }
    .promo-input input {
      flex: 1;
      padding: 0.75rem;
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(201,169,110,0.18);
      border-radius: 8px;
      color: var(--cream);
    }
    .promo-btn {
      padding: 0.75rem 1.5rem;
      background: var(--gold);
      color: #0A0A0A;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }
    .empty-cart {
      text-align: center;
      padding: 4rem 2rem;
      color: var(--muted);
    }
    .empty-cart h2 {
      color: var(--gold);
      margin-bottom: 1rem;
    }
    .back-link {
      display: inline-block;
      margin-bottom: 2rem;
      color: var(--gold);
      text-decoration: none;
      font-weight: 500;
    }
    .back-link:hover {
      text-decoration: underline;
    }
    .continue-shopping {
      display: inline-block;
      margin-top: 2rem;
      color: var(--gold);
      text-decoration: none;
      font-weight: 500;
    }
    .continue-shopping:hover {
      text-decoration: underline;
    }
    @media (max-width: 1024px) {
      .cart-layout {
        grid-template-columns: 1fr;
      }
      .cart-summary {
        position: static;
      }
    }
    @media (max-width: 768px) {
      .cart-item {
        grid-template-columns: 80px 1fr;
        gap: 1rem;
      }
      .quantity-controls {
        margin-top: 1rem;
      }
      .remove-btn {
        grid-column: 2;
        justify-self: end;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="{{ url('/') }}" class="back-link">← Continue Shopping</a>

    <div class="header">
      <h1>Shopping Cart</h1>
      <p>Review your selected items before checkout.</p>
    </div>

    <div class="cart-layout" id="cart-layout">
      <!-- Cart items will be loaded here -->
      <div class="empty-cart" id="empty-cart">
        <div style="font-size: 4rem; margin-bottom: 1rem;">🛒</div>
        <h2>Your cart is empty</h2>
        <p>Add some Noir pieces to get started.</p>
        <a href="{{ route('shop') }}" class="btn btn-primary" style="margin-top: 2rem;">Shop Collection</a>
      </div>
    </div>
  </div>

  <script>
    // Cart functionality
    document.addEventListener('DOMContentLoaded', function() {
      const cartLayout = document.getElementById('cart-layout');
      const emptyCart = document.getElementById('empty-cart');

      // Mock cart data (replace with actual cart storage)
      let cartItems = JSON.parse(localStorage.getItem('noirCart')) || [
        {
          id: 1,
          name: 'Leather Biker Jacket',
          price: 450,
          image: '🧥',
          color: 'black',
          size: 'M',
          quantity: 1
        },
        {
          id: 2,
          name: 'White Oxford Shirt',
          price: 120,
          image: '👔',
          color: 'white',
          size: 'L',
          quantity: 2
        }
      ];

      function saveCart() {
        localStorage.setItem('noirCart', JSON.stringify(cartItems));
      }

      function renderCart() {
        if (cartItems.length === 0) {
          cartLayout.innerHTML = `
            <div class="empty-cart">
              <div style="font-size: 4rem; margin-bottom: 1rem;">🛒</div>
              <h2>Your cart is empty</h2>
              <p>Add some Noir pieces to get started.</p>
              <a href="{{ route('shop') }}" class="btn btn-primary" style="margin-top: 2rem;">Shop Collection</a>
            </div>
          `;
          return;
        }

        const subtotal = cartItems.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const shipping = subtotal > 500 ? 0 : 25;
        const tax = subtotal * 0.08;
        const total = subtotal + shipping + tax;

        const cartHTML = `
          <div class="cart-items">
            ${cartItems.map(item => `
              <div class="cart-item" data-id="${item.id}">
                <div class="item-image">${item.image}</div>
                <div class="item-details">
                  <h3>${item.name}</h3>
                  <div class="item-meta">Color: ${item.color} | Size: ${item.size}</div>
                  <div class="item-price">$${item.price}</div>
                  <div class="quantity-controls">
                    <button class="quantity-btn" onclick="updateQuantity(${item.id}, ${item.quantity - 1})">-</button>
                    <input type="number" class="quantity-input" value="${item.quantity}" min="1" onchange="updateQuantity(${item.id}, this.value)">
                    <button class="quantity-btn" onclick="updateQuantity(${item.id}, ${item.quantity + 1})">+</button>
                  </div>
                </div>
                <button class="remove-btn" onclick="removeItem(${item.id})" title="Remove item">
                  <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                  </svg>
                </button>
              </div>
            `).join('')}
          </div>

          <div class="cart-summary">
            <div class="promo-code">
              <div class="promo-input">
                <input type="text" placeholder="Promo code" id="promo-code">
                <button class="promo-btn" onclick="applyPromo()">Apply</button>
              </div>
            </div>

            <div class="summary-row">
              <span>Subtotal</span>
              <span>$${subtotal.toFixed(2)}</span>
            </div>
            <div class="summary-row">
              <span>Shipping</span>
              <span>${shipping === 0 ? 'Free' : '$' + shipping.toFixed(2)}</span>
            </div>
            <div class="summary-row">
              <span>Tax</span>
              <span>$${tax.toFixed(2)}</span>
            </div>
            <div class="summary-row total">
              <span>Total</span>
              <span>$${total.toFixed(2)}</span>
            </div>

            <div class="checkout-section">
              <button class="btn btn-primary" onclick="checkout()">Proceed to Checkout</button>
              <a href="{{ route('shop') }}" class="btn btn-secondary" style="margin-top: 1rem;">Continue Shopping</a>
            </div>
          </div>
        `;

        cartLayout.innerHTML = cartHTML;
      }

      // Global functions for cart operations
      window.updateQuantity = function(id, newQuantity) {
        newQuantity = parseInt(newQuantity);
        if (newQuantity < 1) return;

        const item = cartItems.find(item => item.id === id);
        if (item) {
          item.quantity = newQuantity;
          saveCart();
          renderCart();
        }
      };

      window.removeItem = function(id) {
        cartItems = cartItems.filter(item => item.id !== id);
        saveCart();
        renderCart();
      };

      window.applyPromo = function() {
        const promoCode = document.getElementById('promo-code').value;
        if (promoCode.toLowerCase() === 'noir10') {
          alert('Promo code applied! 10% discount added.');
        } else {
          alert('Invalid promo code.');
        }
      };

      window.checkout = function() {
        alert('Checkout functionality would be implemented here with payment processing.');
      };

      // Initial render
      renderCart();
    });
  </script>
</body>
</html>