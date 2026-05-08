<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Search - NOIR.</title>
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
      --accent: #ff6b6b;
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
    .search-section {
      background: rgba(15,15,15,0.96);
      border: 1px solid rgba(201,169,110,0.14);
      border-radius: 16px;
      padding: 2rem;
      margin-bottom: 2rem;
    }
    .search-input-group {
      position: relative;
      margin-bottom: 2rem;
    }
    .search-input {
      width: 100%;
      padding: 1rem 3rem 1rem 1rem;
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(201,169,110,0.18);
      border-radius: 12px;
      color: var(--cream);
      font-family: inherit;
      font-size: 1.1rem;
      outline: none;
    }
    .search-input:focus {
      border-color: var(--gold);
      box-shadow: 0 0 0 2px rgba(201,169,110,0.2);
    }
    .search-btn {
      position: absolute;
      right: 1rem;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: var(--gold);
      cursor: pointer;
      padding: 0.5rem;
    }
    .ai-helper {
      background: rgba(201,169,110,0.05);
      border: 1px solid rgba(201,169,110,0.2);
      border-radius: 12px;
      padding: 1.5rem;
      margin-bottom: 2rem;
    }
    .ai-helper h3 {
      color: var(--gold);
      margin: 0 0 1rem;
      font-size: 1.2rem;
    }
    .ai-suggestions {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1rem;
    }
    .ai-suggestion {
      background: rgba(255,255,255,0.02);
      padding: 1rem;
      border-radius: 8px;
      border: 1px solid rgba(201,169,110,0.08);
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .ai-suggestion:hover {
      background: rgba(255,255,255,0.05);
      border-color: var(--gold);
    }
    .filters-section {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      margin-bottom: 2rem;
    }
    .filter-group {
      background: rgba(255,255,255,0.02);
      padding: 1.5rem;
      border-radius: 12px;
      border: 1px solid rgba(201,169,110,0.08);
    }
    .filter-group h4 {
      color: var(--gold);
      margin: 0 0 1rem;
      font-size: 1.1rem;
    }
    .filter-options {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }
    .filter-option {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .filter-option input[type="checkbox"],
    .filter-option input[type="radio"] {
      width: auto;
      margin: 0;
    }
    .price-range {
      display: flex;
      gap: 1rem;
      align-items: center;
    }
    .price-input {
      flex: 1;
      padding: 0.5rem;
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(201,169,110,0.18);
      border-radius: 6px;
      color: var(--cream);
    }
    .results-section {
      background: rgba(15,15,15,0.96);
      border: 1px solid rgba(201,169,110,0.14);
      border-radius: 16px;
      padding: 2rem;
    }
    .results-header {
      display: flex;
      justify-content: between;
      align-items: center;
      margin-bottom: 2rem;
      flex-wrap: wrap;
      gap: 1rem;
    }
    .results-count {
      color: var(--muted);
      font-size: 1rem;
    }
    .sort-select {
      padding: 0.5rem 1rem;
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(201,169,110,0.18);
      border-radius: 6px;
      color: var(--cream);
    }
    .products-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 2rem;
    }
    .product-card {
      background: rgba(255,255,255,0.02);
      border: 1px solid rgba(201,169,110,0.08);
      border-radius: 12px;
      overflow: hidden;
      transition: all 0.2s ease;
    }
    .product-card:hover {
      border-color: var(--gold);
      transform: translateY(-2px);
    }
    .product-image {
      width: 100%;
      height: 300px;
      background: var(--surface);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--muted);
    }
    .product-info {
      padding: 1.5rem;
    }
    .product-name {
      font-weight: 500;
      color: var(--cream);
      margin: 0 0 0.5rem;
    }
    .product-price {
      color: var(--gold);
      font-size: 1.2rem;
      font-weight: 600;
      margin: 0 0 1rem;
    }
    .product-meta {
      color: var(--muted);
      font-size: 0.9rem;
      margin: 0 0 1rem;
    }
    .btn {
      padding: 0.75rem 1.5rem;
      border: none;
      border-radius: 8px;
      font-family: inherit;
      font-size: 0.9rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.2s ease;
      text-decoration: none;
      display: inline-block;
    }
    .btn-primary {
      background: var(--gold);
      color: #0A0A0A;
    }
    .btn-primary:hover {
      background: #B8955E;
    }
    .btn-secondary {
      background: rgba(255,255,255,0.05);
      color: var(--cream);
      border: 1px solid rgba(201,169,110,0.18);
    }
    .btn-secondary:hover {
      background: rgba(255,255,255,0.1);
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
    .loading {
      text-align: center;
      padding: 3rem;
      color: var(--muted);
    }
    .no-results {
      text-align: center;
      padding: 3rem;
      color: var(--muted);
    }
    @media (max-width: 768px) {
      .filters-section {
        grid-template-columns: 1fr;
      }
      .results-header {
        flex-direction: column;
        align-items: stretch;
      }
      .products-grid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="{{ url('/') }}" class="back-link">← Back to Noir</a>

    <div class="header">
      <h1>Discover Noir</h1>
      <p>Find your perfect piece with intelligent search and curation.</p>
    </div>

    <div class="search-section">
      <div class="search-input-group">
        <input type="text" id="search-input" class="search-input" placeholder="Search for jackets, shirts, accessories..." />
        <button class="search-btn" id="search-btn">
          <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
        </button>
      </div>

      <div class="ai-helper">
        <h3>AI-Powered Suggestions</h3>
        <div class="ai-suggestions">
          <div class="ai-suggestion" data-query="black leather jacket">Black leather jacket</div>
          <div class="ai-suggestion" data-query="minimalist white shirt">Minimalist white shirt</div>
          <div class="ai-suggestion" data-query="wool overcoat">Wool overcoat</div>
          <div class="ai-suggestion" data-query="designer sneakers">Designer sneakers</div>
          <div class="ai-suggestion" data-query="silk scarf">Silk scarf</div>
          <div class="ai-suggestion" data-query="tailored trousers">Tailored trousers</div>
        </div>
      </div>

      <div class="filters-section">
        <div class="filter-group">
          <h4>Category</h4>
          <div class="filter-options">
            <div class="filter-option">
              <input type="checkbox" id="cat-outerwear" name="category" value="outerwear">
              <label for="cat-outerwear">Outerwear</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="cat-shirts" name="category" value="shirts">
              <label for="cat-shirts">Shirts</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="cat-pants" name="category" value="pants">
              <label for="cat-pants">Pants</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="cat-shoes" name="category" value="shoes">
              <label for="cat-shoes">Shoes</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="cat-accessories" name="category" value="accessories">
              <label for="cat-accessories">Accessories</label>
            </div>
          </div>
        </div>

        <div class="filter-group">
          <h4>Price Range</h4>
          <div class="price-range">
            <input type="number" class="price-input" placeholder="Min" id="price-min">
            <span>to</span>
            <input type="number" class="price-input" placeholder="Max" id="price-max">
          </div>
        </div>

        <div class="filter-group">
          <h4>Size</h4>
          <div class="filter-options">
            <div class="filter-option">
              <input type="checkbox" id="size-xs" name="size" value="xs">
              <label for="size-xs">XS</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="size-s" name="size" value="s">
              <label for="size-s">S</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="size-m" name="size" value="m">
              <label for="size-m">M</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="size-l" name="size" value="l">
              <label for="size-l">L</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="size-xl" name="size" value="xl">
              <label for="size-xl">XL</label>
            </div>
          </div>
        </div>

        <div class="filter-group">
          <h4>Color</h4>
          <div class="filter-options">
            <div class="filter-option">
              <input type="checkbox" id="color-black" name="color" value="black">
              <label for="color-black">Black</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="color-white" name="color" value="white">
              <label for="color-white">White</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="color-gray" name="color" value="gray">
              <label for="color-gray">Gray</label>
            </div>
            <div class="filter-option">
              <input type="checkbox" id="color-brown" name="color" value="brown">
              <label for="color-brown">Brown</label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="results-section">
      <div class="results-header">
        <div class="results-count" id="results-count">0 results found</div>
        <select class="sort-select" id="sort-select">
          <option value="relevance">Sort by Relevance</option>
          <option value="price-low">Price: Low to High</option>
          <option value="price-high">Price: High to Low</option>
          <option value="newest">Newest First</option>
        </select>
      </div>

      <div id="results-container">
        <div class="loading">
          <p>Start typing to search our collection...</p>
        </div>
      </div>
    </div>
  </div>

  <script>
    // AI-powered search functionality
    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('search-input');
      const searchBtn = document.getElementById('search-btn');
      const resultsContainer = document.getElementById('results-container');
      const resultsCount = document.getElementById('results-count');
      const aiSuggestions = document.querySelectorAll('.ai-suggestion');

      // AI suggestions click handler
      aiSuggestions.forEach(suggestion => {
        suggestion.addEventListener('click', function() {
          searchInput.value = this.dataset.query;
          performSearch(this.dataset.query);
        });
      });

      // Search input handler
      let searchTimeout;
      searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
          performSearch(this.value);
        }, 300);
      });

      // Search button handler
      searchBtn.addEventListener('click', function() {
        performSearch(searchInput.value);
      });

      // Enter key handler
      searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
          performSearch(this.value);
        }
      });

      function performSearch(query) {
        if (!query.trim()) {
          resultsContainer.innerHTML = '<div class="loading"><p>Start typing to search our collection...</p></div>';
          resultsCount.textContent = '0 results found';
          return;
        }

        // Show loading state
        resultsContainer.innerHTML = '<div class="loading"><p>Searching...</p></div>';

        // Simulate AI-powered search (replace with actual API call)
        setTimeout(() => {
          const mockResults = generateMockResults(query);
          displayResults(mockResults);
        }, 500);
      }

      function generateMockResults(query) {
        // AI-powered mock results based on query
        const allProducts = [
          { id: 1, name: 'Leather Biker Jacket', price: 450, category: 'outerwear', color: 'black', image: '🧥' },
          { id: 2, name: 'White Oxford Shirt', price: 120, category: 'shirts', color: 'white', image: '👔' },
          { id: 3, name: 'Wool Overcoat', price: 680, category: 'outerwear', color: 'gray', image: '🧥' },
          { id: 4, name: 'Designer Sneakers', price: 350, category: 'shoes', color: 'white', image: '👟' },
          { id: 5, name: 'Silk Scarf', price: 95, category: 'accessories', color: 'black', image: '🧣' },
          { id: 6, name: 'Tailored Trousers', price: 180, category: 'pants', color: 'black', image: '👖' },
          { id: 7, name: 'Cashmere Sweater', price: 320, category: 'shirts', color: 'gray', image: '🧥' },
          { id: 8, name: 'Leather Boots', price: 420, category: 'shoes', color: 'brown', image: '🥾' }
        ];

        // AI-like filtering based on query keywords
        return allProducts.filter(product => {
          const searchTerm = query.toLowerCase();
          return product.name.toLowerCase().includes(searchTerm) ||
                 product.category.toLowerCase().includes(searchTerm) ||
                 product.color.toLowerCase().includes(searchTerm);
        });
      }

      function displayResults(results) {
        if (results.length === 0) {
          resultsContainer.innerHTML = '<div class="no-results"><p>No products found matching your search.</p></div>';
          resultsCount.textContent = '0 results found';
          return;
        }

        resultsCount.textContent = `${results.length} result${results.length === 1 ? '' : 's'} found`;

        const productsHTML = results.map(product => `
          <div class="product-card">
            <div class="product-image">${product.image}</div>
            <div class="product-info">
              <h3 class="product-name">${product.name}</h3>
              <div class="product-price">$${product.price}</div>
              <div class="product-meta">${product.category} • ${product.color}</div>
              <button class="btn btn-primary">Add to Cart</button>
            </div>
          </div>
        `).join('');

        resultsContainer.innerHTML = `<div class="products-grid">${productsHTML}</div>`;
      }
    });
  </script>
</body>
</html>