<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} - Home</title>

        <link rel="stylesheet" href="{{ asset('css/homepage.css') }}" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/css/homepage.css', 'resources/js/app.js'])
        @else
            <style>
                body { font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; }
            </style>
        @endif
    </head>

    <body class="home-wrap">
        <header class="home-header">
            <div class="home-container home-header-inner">
                <a href="{{ url('/') }}" class="brand">{{ config('app.name', 'Laravel') }}</a>

                <nav class="home-nav">
                    <a href="#features">Features</a>
                    <a href="#testimonials">Testimonials</a>
                    <a href="#contact">Contact</a>
                </nav>
            </div>
        </header>

        <main>
            {{-- Hero --}}
            <section class="home-hero">
                <div class="home-container">
                    <div class="home-grid hero">
                        <div>
                            <h1>A clean homepage for your Laravel app</h1>
                            <p>
                                This page is served by the <code>/homepage</code> route. Use this layout as the landing page for a small Laravel project or starter app.
                            </p>

                            <div class="home-actions">
                                <a href="#contact" class="home-cta primary">Get in touch</a>
                                <a href="#features" class="home-cta secondary">See features</a>
                            </div>
                        </div>

                        <div class="home-card home-card--soft">
                            <div class="home-card-content">
                                <h2>Quick stats</h2>
                                <dl class="home-grid cards">
                                    <div class="home-article">
                                        <dt class="text-sm">Pages</dt>
                                        <dd class="text-2xl font-semibold">2</dd>
                                    </div>
                                    <div class="home-article">
                                        <dt class="text-sm">Routes</dt>
                                        <dd class="text-2xl font-semibold">1</dd>
                                    </div>
                                    <div class="home-article">
                                        <dt class="text-sm">UI</dt>
                                        <dd class="text-2xl font-semibold">Tailored</dd>
                                    </div>
                                    <div class="home-article">
                                        <dt class="text-sm">Next</dt>
                                        <dd class="text-2xl font-semibold">Edit</dd>
                                    </div>
                                </dl>

                                <p class="home-blockquote" style="margin-top: 1rem;">Tip: keep using Blade and Tailwind classes for rapid layout updates.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Features --}}
            <section id="features" class="home-section">
                <div class="home-container">
                    <h2 class="home-section-title">Features</h2>
                    <div class="home-grid cards">
                        @php
                            $features = [
                                ['title' => 'Hero section', 'desc' => 'A headline + call to action.'],
                                ['title' => 'Reusable layout', 'desc' => 'Consistent header, sections, and footer.'],
                                ['title' => 'Dark mode friendly', 'desc' => 'Uses the same color approach as the default template.'],
                            ];
                        @endphp

                        @foreach ($features as $feature)
                            <article class="home-article">
                                <h3>{{ $feature['title'] }}</h3>
                                <p>{{ $feature['desc'] }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- Testimonials --}}
            <section id="testimonials" class="home-section">
                <div class="home-container">
                    <h2 class="home-section-title">Testimonials</h2>
                    <div class="home-grid cards">
                        @php
                            $quotes = [
                                ['name' => 'Alex', 'text' => 'Simple, fast, and looks great.'],
                                ['name' => 'Sam', 'text' => 'The route works perfectly at /homepage.'],
                                ['name' => 'Jordan', 'text' => 'Easy to edit and extend with your own content.'],
                            ];
                        @endphp

                        @foreach ($quotes as $quote)
                            <figure class="home-figure">
                                <blockquote class="home-blockquote">“{{ $quote['text'] }}”</blockquote>
                                <figcaption class="mt-4 text-sm font-medium">{{ $quote['name'] }}</figcaption>
                            </figure>
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- Contact --}}
            <section id="contact" class="home-section">
                <div class="home-container">
                    <div class="home-contact">
                        <h2 class="home-section-title">Contact</h2>
                        <p>This form is static for now—wire it up to your controller later.</p>

                        <form class="home-grid cards" onsubmit="event.preventDefault(); alert('Thanks! (demo only)');">
                            <label class="block">
                                <span class="text-sm font-medium">Name</span>
                                <input class="home-input" type="text" placeholder="Your name" />
                            </label>

                            <label class="block">
                                <span class="text-sm font-medium">Email</span>
                                <input class="home-input" type="email" placeholder="you@example.com" />
                            </label>

                            <label class="block full-width">
                                <span class="text-sm font-medium">Message</span>
                                <textarea class="home-textarea" placeholder="Write your message..."></textarea>
                            </label>

                            <div class="home-contact-actions full-width">
                                <button type="submit" class="home-cta primary">Send message</button>
                                <p class="home-blockquote">Demo only—no backend connected.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>

        <footer class="home-footer">
            <div class="home-container home-footer-inner">
                <p>© {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
                <a href="#">Back to top</a>
            </div>
        </footer>
    </body>
</html>

