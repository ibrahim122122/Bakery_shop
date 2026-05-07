<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Storefront</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/css/homepage.css', 'resources/js/app.js'])
    @endif
</head>
<body>
    <div id="toast">
        <div id="toast-title"></div>
        <div id="toast-desc"></div>
    </div>

    <header class="site-header">
        <div class="page-inner header-inner">
            <div class="brand-row">
                <button id="mobile-menu-btn" class="menu-toggle" aria-label="Open menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <a href="{{ url('/') }}" class="brand font-serif">{{ config('app.name', 'Laravel') }}</a>
                <nav id="desktop-nav" class="nav-links">
                    <a href="#shop">Shop</a>
                    <a href="#categories">Collections</a>
                    <a href="#contact">About</a>
                </nav>
            </div>
            <div class="header-actions">
                <button class="icon-button" aria-label="Search">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                </button>
                <button id="cart-btn" class="icon-button cart-button" aria-label="Cart">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
                    <span id="cart-badge" class="cart-badge" style="display:none;">0</span>
                </button>
            </div>
        </div>
    </header>

    <div id="mobile-menu" class="mobile-menu">
        <div class="mobile-menu-top">
            <span class="font-serif brand">{{ config('app.name', 'Laravel') }}</span>
            <button id="mobile-menu-close" class="icon-button" aria-label="Close">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
        <nav class="mobile-nav">
            <a href="#shop" onclick="closeMobileMenu()">Shop</a>
            <a href="#categories" onclick="closeMobileMenu()">Collections</a>
            <a href="#contact" onclick="closeMobileMenu()">About</a>
        </nav>
    </div>

    <main>
        <section class="hero-panel">
            <div class="hero-bg"></div>
            <div class="page-inner hero-inner">
                <div class="hero-copy reveal">
                    <span class="eyebrow">New Arrivals</span>
                    <h1 class="hero-title font-serif">Objects made for <em>mindful living.</em></h1>
                    <p class="hero-copytext">A curated collection of warm, tactile essentials designed to elevate your everyday routines.</p>
                    <div class="hero-actions">
                        <a href="#shop" class="hero-cta primary">Shop Now</a>
                        <a href="#categories" class="hero-cta secondary">Explore Collections</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="categories" class="section-light">
            <div class="page-inner">
                <h2 class="section-title reveal font-serif">Curated Collections</h2>
                <div class="cards-grid">
                    <a href="#shop" class="cat-card reveal">
                        <div class="cat-media">
                            <img class="cat-img" src="https://images.unsplash.com/photo-1620799140408-edc6dcb6d633?w=800&q=80" alt="Apparel">
                            <div class="image-overlay"></div>
                        </div>
                        <h3 class="cat-title font-serif">Apparel</h3>
                        <p class="cat-meta">Effortless everyday wear. <span class="cat-arrow">→</span></p>
                    </a>
                    <a href="#shop" class="cat-card reveal">
                        <div class="cat-media">
                            <img class="cat-img" src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=800&q=80" alt="Home Goods">
                            <div class="image-overlay"></div>
                        </div>
                        <h3 class="cat-title font-serif">Home Goods</h3>
                        <p class="cat-meta">Objects for a mindful space. <span class="cat-arrow">→</span></p>
                    </a>
                    <a href="#shop" class="cat-card reveal">
                        <div class="cat-media">
                            <img class="cat-img" src="https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=800&q=80" alt="Accessories">
                            <div class="image-overlay"></div>
                        </div>
                        <h3 class="cat-title font-serif">Accessories</h3>
                        <p class="cat-meta">Thoughtful details. <span class="cat-arrow">→</span></p>
                    </a>
                </div>
            </div>
        </section>

        <section id="shop" class="section-dark">
            <div class="page-inner">
                <div class="section-header reveal">
                    <div>
                        <span class="eyebrow">Selected Goods</span>
                        <h2 class="section-heading font-serif">Featured Products</h2>
                    </div>
                    <a href="#shop" class="section-link">View All</a>
                </div>

                <div class="products-grid">
                    @php
                        $products = [
                            ['title' => 'Artisan Ceramic Mug', 'category' => 'Home', 'desc' => 'Hand-thrown speckled clay, matte finish.', 'price' => '$34', 'img' => 'https://images.unsplash.com/photo-1514228742587-6b1558fcca3d?w=600&q=80', 'rating' => '★★★★★'],
                            ['title' => 'Linen Throw Blanket', 'category' => 'Home', 'desc' => 'Soft breathable blend in sage green.', 'price' => '$120', 'img' => 'https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?w=600&q=80', 'rating' => '★★★★★'],
                            ['title' => 'Minimalist Leather Wallet', 'category' => 'Accessories', 'desc' => 'Slim full-grain leather, ages beautifully.', 'price' => '$65', 'img' => 'https://images.unsplash.com/photo-1627123424574-724758594e93?w=600&q=80', 'rating' => '★★★★★'],
                            ['title' => 'Organic Cotton T-Shirt', 'category' => 'Apparel', 'desc' => 'Premium weight organic cotton, terracotta.', 'price' => '$45', 'img' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=600&q=80', 'rating' => '★★★★☆'],
                            ['title' => 'Brass Desk Lamp', 'category' => 'Home', 'desc' => 'Sleek minimal design, warm ambient glow.', 'price' => '$185', 'img' => 'https://images.unsplash.com/photo-1507473885765-e6ed057f782c?w=600&q=80', 'rating' => '★★★★★'],
                            ['title' => 'Heavy Canvas Tote', 'category' => 'Accessories', 'desc' => 'Durable everyday carry, leather handles.', 'price' => '$55', 'img' => 'https://images.unsplash.com/photo-1544816565-aa8c1166648f?w=600&q=80', 'rating' => '★★★★☆'],
                        ];
                    @endphp

                    @foreach ($products as $product)
                        <article class="product-card reveal" onclick="addToCart('{{ $product['title'] }}')">
                            <div class="product-media">
                                <img class="product-img" src="{{ $product['img'] }}" alt="{{ $product['title'] }}">
                                <button class="add-to-cart-btn">Add to Cart — {{ $product['price'] }}</button>
                            </div>
                            <p class="product-tag">{{ $product['category'] }}</p>
                            <h3 class="product-title font-serif">{{ $product['title'] }}</h3>
                            <div class="product-meta">
                                <p>{{ $product['desc'] }}</p>
                                <span>{{ $product['price'] }}</span>
                            </div>
                            <div class="product-rating">{{ $product['rating'] }}</div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section-light">
            <div class="page-inner">
                <h2 class="section-title reveal font-serif">Words from our customers</h2>
                <div class="reviews-grid">
                    @php
                        $reviews = [
                            ['quote' => 'The ceramic mug has become my favourite part of my morning routine. The texture is incredible.', 'author' => 'Sarah M.', 'product' => 'Artisan Ceramic Mug', 'rating' => '★★★★★'],
                            ['quote' => 'Exceptional quality. You can tell real care went into crafting this wallet. It\'s slim but holds everything.', 'author' => 'James L.', 'product' => 'Minimalist Leather Wallet', 'rating' => '★★★★★'],
                            ['quote' => 'The color of the throw is exactly as pictured, and it drapes beautifully over my sofa.', 'author' => 'Elena R.', 'product' => 'Linen Throw Blanket', 'rating' => '★★★★☆'],
                        ];
                    @endphp

                    @foreach ($reviews as $review)
                        <div class="review-card reveal">
                            <div class="review-stars">{{ $review['rating'] }}</div>
                            <p class="review-copy font-serif">"{{ $review['quote'] }}"</p>
                            <div>
                                <p class="review-author">{{ $review['author'] }}</p>
                                <p class="review-product">Reviewing: {{ $review['product'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="contact" class="contact-section">
            <div class="page-inner contact-grid" id="contact-grid">
                <div class="contact-panel reveal">
                    <span class="eyebrow">Get in touch</span>
                    <h2 class="contact-title font-serif">Have a question?</h2>
                    <form onsubmit="handleContact(event)" class="contact-form">
                        <label>
                            <span>Name</span>
                            <input class="dark-input" type="text" required placeholder="Your name">
                        </label>
                        <label>
                            <span>Email</span>
                            <input class="dark-input" type="email" required placeholder="you@example.com">
                        </label>
                        <label>
                            <span>Message</span>
                            <textarea class="dark-input" rows="4" required placeholder="Write your message..."></textarea>
                        </label>
                        <button type="submit" class="hero-cta primary">Send Message</button>
                    </form>
                </div>
                <div class="newsletter-panel reveal">
                    <div class="newsletter-card">
                        <h3 class="newsletter-title font-serif">Join our community</h3>
                        <p class="newsletter-copy">Subscribe to receive thoughtful updates, early access to new arrivals, and stories from our makers.</p>
                        <form onsubmit="handleNewsletter(event)" class="newsletter-form">
                            <input class="dark-input" type="email" required placeholder="Your email address">
                            <button type="submit" class="newsletter-button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="page-inner footer-grid" id="footer-grid">
            <div>
                <a href="{{ url('/') }}" class="brand font-serif">{{ config('app.name', 'Laravel') }}</a>
                <p class="footer-copy">Objects thoughtfully curated for the modern, mindful home. We believe in buying fewer, better things.</p>
            </div>
            <div>
                <h4>Shop</h4>
                <ul>
                    <li><a href="#shop">All Products</a></li>
                    <li><a href="#shop">New Arrivals</a></li>
                    <li><a href="#shop">Home Goods</a></li>
                    <li><a href="#shop">Apparel</a></li>
                </ul>
            </div>
            <div>
                <h4>Support</h4>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Shipping & Returns</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <div class="page-inner footer-bottom">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
            <div class="footer-socials">
                <a href="#">Instagram</a>
                <a href="#">Pinterest</a>
                <a href="#">Journal</a>
            </div>
        </div>
    </footer>

    <script>
        let cartCount = 0;
        function addToCart(name) {
            cartCount++;
            const badge = document.getElementById('cart-badge');
            badge.textContent = cartCount;
            badge.style.display = 'flex';
            showToast('Added to cart', name + ' has been added to your bag.');
        }

        let toastTimer;
        function showToast(title, desc) {
            const toast = document.getElementById('toast');
            document.getElementById('toast-title').textContent = title;
            document.getElementById('toast-desc').textContent = desc;
            toast.classList.add('show');
            clearTimeout(toastTimer);
            toastTimer = setTimeout(() => toast.classList.remove('show'), 3500);
        }

        function handleContact(e) {
            e.preventDefault();
            showToast('Message sent', "We'll get back to you shortly.");
            e.target.reset();
        }

        function handleNewsletter(e) {
            e.preventDefault();
            showToast('Subscribed!', 'Thank you for joining our newsletter.');
            e.target.reset();
        }

        document.getElementById('mobile-menu-btn').addEventListener('click', () => {
            document.getElementById('mobile-menu').style.display = 'flex';
        });
        document.getElementById('mobile-menu-close').addEventListener('click', closeMobileMenu);
        function closeMobileMenu() {
            document.getElementById('mobile-menu').style.display = 'none';
        }

        function handleResize() {
            const isMobile = window.innerWidth < 768;
            document.getElementById('mobile-menu-btn').style.display = isMobile ? 'block' : 'none';
            document.getElementById('desktop-nav').style.display = isMobile ? 'none' : 'flex';
            document.getElementById('contact-grid').style.gridTemplateColumns = isMobile ? '1fr' : '1fr 1fr';
            document.getElementById('footer-grid').style.gridTemplateColumns = isMobile ? '1fr' : '2fr 1fr 1fr';
        }
        handleResize();
        window.addEventListener('resize', handleResize);

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '-40px' });
        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    </script>
</body>
</html>

