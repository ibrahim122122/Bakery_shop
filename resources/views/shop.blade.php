<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shop Collection - NOIR.</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Inter:wght@300;400;500&display=swap" rel="stylesheet" />
  <style>
    :root{
      --bg:#0A0A0A;
      --card:#0F0F0F;
      --surface:#141414;
      --gold:#C9A96E;
      --gold-20:rgba(201,169,110,0.20);
      --gold-10:rgba(201,169,110,0.10);
      --gold-dim:rgba(201,169,110,0.40);
      --cream:#F0EDE8;
      --muted:rgba(240,237,232,0.50);
    }

    *{box-sizing:border-box}
    body{
      margin:0;
      min-height:100vh;
      font-family:'Inter',system-ui,sans-serif;
      background:radial-gradient(circle at top, rgba(201,169,110,0.12), transparent 34%),
                 linear-gradient(180deg, #0A0A0A 0%, #050505 100%);
      color:var(--cream);
      overflow-x:hidden;
      -webkit-font-smoothing:antialiased;
    }

    .container{max-width:1280px;margin:0 auto;padding:0 3rem;}

    .back-row{
      padding-top:26px;
      padding-bottom:14px;
      display:flex;
      align-items:center;
      justify-content:flex-start;
      gap:14px;
    }

    .back-link{
      font-size:.65rem;
      letter-spacing:.18em;
      text-transform:uppercase;
      color:var(--muted);
      text-decoration:none;
      border-bottom:1px solid var(--gold-20);
      padding-bottom:.25rem;
      transition:color .25s,border-color .25s;
      display:inline-flex;
      align-items:center;
      gap:.5rem;
    }
    .back-link:hover{color:var(--gold);border-color:var(--gold)}

    .serif{font-family:'Cormorant Garamond',serif;}
    .section-border{border-top:1px solid var(--gold-10);}

    /* Shop header */
    #shop{padding:86px 0 110px;}

    .shop-header{
      display:flex;
      justify-content:space-between;
      align-items:flex-end;
      margin-bottom:48px;
      gap:18px;
      flex-wrap:wrap;
    }

    .label{
      font-size:.65rem;
      font-weight:500;
      letter-spacing:.22em;
      text-transform:uppercase;
      color:var(--gold);
      display:block;
      margin-bottom:12px;
    }

    .shop-title{
      font-family:'Cormorant Garamond',serif;
      font-size:clamp(2rem,4.5vw,3rem);
      font-weight:400;
      letter-spacing:-.01em;
      margin:0;
    }

    .view-all{
      font-size:.65rem;
      letter-spacing:.18em;
      text-transform:uppercase;
      color:var(--muted);
      text-decoration:none;
      border-bottom:1px solid var(--gold-20);
      padding-bottom:.25rem;
      display:inline-flex;
      align-items:center;
      gap:.5rem;
      transition:color .25s,border-color .25s;
      white-space:nowrap;
    }
    .view-all:hover{color:var(--gold);border-color:var(--gold)}

    .product-grid{
      display:grid;
      grid-template-columns:repeat(3,1fr);
      gap:1.25rem 1.25rem;
      row-gap:3.5rem;
    }

    .product-img-wrap{
      aspect-ratio:3/3.75;
    }

    .product-name{font-size:1.05rem;}
    .product-price{font-size:1.05rem;}

    .product-card{position:relative;}

    .product-img-wrap{
      position:relative;
      aspect-ratio:3/4;
      background:var(--card);
      overflow:hidden;
      margin-bottom:1.5rem;
      border:1px solid rgba(201,169,110,0.12);
      border-radius:12px;
    }

    .product-img-wrap img{
      width:100%;height:100%;object-fit:cover;
      transition:transform .6s cubic-bezier(.21,.47,.32,.98);
    }

    .product-card:hover .product-img-wrap img{transform:scale(1.08)}

    .product-overlay{
      position:absolute;inset:0;
      background:rgba(10,10,10,.2);
      opacity:0;
      transition:opacity .5s;
      pointer-events:none;
    }
    .product-card:hover .product-overlay{opacity:1}

    .product-action{
      position:absolute;inset-x:0;bottom:0;
      padding:1.5rem;
      opacity:0;
      transform:translateY(12px);
      transition:opacity .35s ease,transform .35s ease;
    }
    .product-card:hover .product-action{opacity:1;transform:translateY(0)}

    .acquire-btn{
      width:100%;
      padding:.875rem;
      background:var(--bg);
      color:var(--cream);
      border:1px solid var(--gold-20);
      font-family:'Inter',sans-serif;
      font-size:.65rem;
      font-weight:400;
      letter-spacing:.22em;
      text-transform:uppercase;
      cursor:pointer;
      backdrop-filter:blur(8px);
      transition:background .25s,color .25s,border-color .25s;
    }
    .acquire-btn:hover{background:var(--gold);color:var(--bg);border-color:var(--gold)}

    .product-meta{display:flex;justify-content:space-between;align-items:flex-start;gap:1rem;}
    .product-cat{
      font-size:.6rem;
      letter-spacing:.22em;
      text-transform:uppercase;
      color:var(--gold);
      margin-bottom:.5rem;
    }
    .product-name{
      font-family:'Cormorant Garamond',serif;
      font-size:1.2rem;
      letter-spacing:.06em;
      text-transform:uppercase;
      margin-bottom:.35rem;
      line-height:1.2;
    }
    .product-desc{font-size:.8rem;font-style:italic;color:var(--muted)}
    .product-price{
      font-family:'Cormorant Garamond',serif;
      font-size:1.15rem;
      color:var(--gold);
      white-space:nowrap;
      flex-shrink:0;
    }

    .mobile-view-all{display:none;margin-top:4rem;text-align:center;}

    @media (max-width:1024px){
      .container{padding:0 2rem;}
      .product-grid{grid-template-columns:repeat(2,1fr)}
    }

    @media (max-width:768px){
      .container{padding:0 1.5rem;}
      #shop{padding:70px 0 90px;}
      .shop-header{margin-bottom:34px;}
      .view-all{display:none;}
      .product-grid{grid-template-columns:1fr;}
      .mobile-view-all{display:block;}
    }

    @media (max-width:480px){
      .hero-actions{flex-direction:column;width:100%}
      .acquire-btn{width:100%}
    }

    /* Toast */
    #toast{position:fixed;bottom:2rem;right:2rem;z-index:9999;background:var(--card);border:1px solid var(--gold-20);padding:1.25rem 1.75rem;min-width:260px;box-shadow:0 20px 60px rgba(0,0,0,.6);opacity:0;pointer-events:none;}
    #toast.show{animation:toastIn .45s cubic-bezier(.21,.47,.32,.98) forwards;pointer-events:all;}
    #toast.hide{animation:toastOut .35s ease forwards;}
    @keyframes toastIn{from{transform:translateY(120%) scale(0.95);opacity:0}to{transform:translateY(0) scale(1);opacity:1}}
    @keyframes toastOut{from{transform:translateY(0) scale(1);opacity:1}to{transform:translateY(120%) scale(0.95);opacity:0}}
    #toast-title{font-size:.65rem;font-weight:500;letter-spacing:.18em;text-transform:uppercase;color:var(--gold);margin-bottom:.4rem}
    #toast-desc{font-size:.825rem;font-weight:300;color:var(--muted)}
  </style>
</head>
<body>

  <div id="toast" role="alert">
    <div id="toast-title"></div>
    <div id="toast-desc"></div>
  </div>

  <div class="container">
    <div class="back-row">
      <a href="{{ url('/') }}" class="back-link">
        <span aria-hidden="true">←</span>
        Back to Noir
      </a>
    </div>
  </div>

  <section id="shop" class="section-border">
    <div class="container">
      <div class="shop-header">
        <div>
          <span class="label">The Arsenal</span>
          <h2 class="shop-title">Selected Armaments</h2>
        </div>
        <a href="#" class="view-all" onclick="event.preventDefault(); showToast('Collection Ready','Browse the full roster below.');">
          View Full Collection
          <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
      </div>

      <div class="product-grid" id="products-grid"></div>

      <div class="mobile-view-all">
        <a href="#" class="view-all" style="display:inline-flex !important; border-bottom:1px solid var(--gold-20);" onclick="event.preventDefault(); showToast('Collection Ready','Browse the full roster below.');">
          View Full Collection
          <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
        </a>
      </div>
    </div>
  </section>

  <script>
    // Cart utils (compatible with existing localStorage keys)
    let cartItems = JSON.parse(localStorage.getItem('noirCart')) || [];
    let cartCount = parseInt(localStorage.getItem('cartCount')) || 0;

    function showToast(title, desc) {
      const t = document.getElementById('toast');
      document.getElementById('toast-title').textContent = title;
      document.getElementById('toast-desc').textContent = desc;
      t.classList.remove('hide');
      t.classList.add('show');
      clearTimeout(window.__toastTimer);
      window.__toastTimer = setTimeout(() => t.classList.replace('show', 'hide'), 3600);
    }

    function saveCart() {
      localStorage.setItem('noirCart', JSON.stringify(cartItems));
      localStorage.setItem('cartCount', cartCount);
      const badge = document.getElementById('cart-badge');
      if (badge) {
        badge.textContent = cartCount;
        if (cartCount > 0) badge.classList.add('visible');
        else badge.classList.remove('visible');
      }
    }

    function recalcCartCount() {
      cartCount = cartItems.reduce((sum, item) => sum + (item.quantity || 1), 0);
      saveCart();
    }

    function addToCartFromShop(product) {
      const name = product.name;
      const price = product.price;
      const image = product.image;

      const color = (product.colors && product.colors[0]) ? product.colors[0] : 'default';
      const size = (product.sizes && product.sizes[0]) ? product.sizes[0] : 'default';

      const existing = cartItems.find(i => i.id === product.id && i.color === color && i.size === size);
      if (existing) {
        existing.quantity = (existing.quantity || 1) + 1;
      } else {
        cartItems.push({
          id: product.id,
          name,
          price,
          image,
          color,
          size,
          quantity: 1
        });
      }

      recalcCartCount();
      showToast('Added to Cart', name + ' added to your bag.');
    }

    // Mock products (images are real, same CDN style as homepage)
    const products = [
      {
        id: 1,
        name: 'Oversized Wool Coat',
        price: 285,
        category: 'Outerwear',
        colors: ['black'],
        sizes: ['s','m','l','xl'],
        image: 'https://simple-commerce-1--nsabimanabutais.replit.app/images/product-coat.png',
        description: 'Deep charcoal double-faced wool'
      },
      {
        id: 2,
        name: 'Raw Edge Denim Jacket',
        price: 175,
        category: 'Jackets',
        colors: ['black'],
        sizes: ['s','m','l','xl'],
        image: 'https://simple-commerce-1--nsabimanabutais.replit.app/images/product-jacket.png',
        description: 'Distressed indigo Japanese denim'
      },
      {
        id: 3,
        name: 'Draped Silk Shirt',
        price: 145,
        category: 'Tops',
        colors: ['white'],
        sizes: ['xs','s','m','l','xl'],
        image: 'https://simple-commerce-1--nsabimanabutais.replit.app/images/product-shirt.png',
        description: 'Ivory bias-cut silk with water-print effect'
      },
      {
        id: 4,
        name: 'Wide-Leg Trousers',
        price: 195,
        category: 'Bottoms',
        colors: ['black'],
        sizes: ['28','30','32','34','36'],
        image: 'https://simple-commerce-1--nsabimanabutais.replit.app/images/product-trousers.png',
        description: 'Tailored chalk-stripe suiting fabric'
      },
      {
        id: 5,
        name: 'Merino Turtleneck',
        price: 120,
        category: 'Knitwear',
        colors: ['green'],
        sizes: ['s','m','l','xl'],
        image: 'https://simple-commerce-1--nsabimanabutais.replit.app/images/product-turtleneck.png',
        description: 'Rib-knit in deep forest green'
      },
      {
        id: 6,
        name: 'Leather Chelsea Boots',
        price: 320,
        category: 'Footwear',
        colors: ['black'],
        sizes: ['7','8','9','10','11'],
        image: 'https://simple-commerce-1--nsabimanabutais.replit.app/images/product-boots.png',
        description: 'Pull-tab silhouette in waxed black leather'
      }
    ];

    function escapeHtml(str){
      return String(str).replace(/[&<>"']/g, s => ({'&':'&amp;','<':'<','>':'>','"':'"',"'":'&#039;'}[s]));
    }

    function renderProducts(list) {
      const grid = document.getElementById('products-grid');
      grid.innerHTML = list.map(p => `
        <div class="product-card">
          <div class="product-img-wrap">
            <img src="${escapeHtml(p.image)}" alt="${escapeHtml(p.name)}" loading="lazy" />
            <div class="product-overlay"></div>
            <div class="product-action">
              <button class="acquire-btn" type="button" onclick="window.__noirShopAdd(${p.id})">Acquire — $${p.price}</button>
            </div>
          </div>
          <div class="product-meta">
            <div>
              <p class="product-cat">${escapeHtml(p.category)}</p>
              <h3 class="product-name serif">${escapeHtml(p.name)}</h3>
              <p class="product-desc">${escapeHtml(p.description)}</p>
            </div>
            <span class="product-price serif">$${p.price}</span>
          </div>
        </div>
      `).join('');
    }

    // Expose handlers
    window.__noirShopAdd = function(id){
      const product = products.find(p => p.id === id);
      if (!product) return;
      addToCartFromShop(product);
    };

    // Initial render
    renderProducts(products);

    // If badge exists (depends on whether homepage header scripts are present on this page)
    saveCart();
  </script>
</body>
</html>

