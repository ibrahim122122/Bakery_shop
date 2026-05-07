<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }} - Home</title>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                body { font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; }
            </style>
        @endif
    </head>

    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex min-h-screen flex-col">
        <header class="w-full border-b border-[#e3e3e0] dark:border-[#3E3E3A]">
            <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
                <a href="{{ url('/') }}" class="font-medium text-[#1b1b18] dark:text-[#EDEDEC]">{{ config('app.name', 'Laravel') }}</a>

                <nav class="flex items-center gap-4 text-sm">
                    <a href="#features" class="hover:underline underline-offset-4">Features</a>
                    <a href="#testimonials" class="hover:underline underline-offset-4">Testimonials</a>
                    <a href="#contact" class="hover:underline underline-offset-4">Contact</a>
                </nav>
            </div>
        </header>

        <main class="flex-1">
            {{-- Hero --}}
            <section class="max-w-6xl mx-auto px-6 py-14">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                    <div>
                        <h1 class="text-4xl leading-[1.1] font-semibold mb-3">A clean homepage for your Laravel app</h1>
                        <p class="text-[#706f6c] dark:text-[#A1A09A] text-base mb-6">
                            This page is served by the <code class="px-1">/homepage</code> route.
                        </p>

                        <div class="flex flex-wrap gap-3">
                            <a href="#contact" class="inline-block px-5 py-2 bg-[#1b1b18] text-white rounded-sm">Get in touch</a>
                            <a href="#features" class="inline-block px-5 py-2 border border-black rounded-sm">See features</a>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg p-6 shadow-sm">
                        <h2 class="font-medium mb-4">Quick stats</h2>
                        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="p-4 rounded-md bg-[#FDFDFC] dark:bg-[#0a0a0a] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                                <dt class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Pages</dt>
                                <dd class="text-2xl font-semibold">2</dd>
                            </div>
                            <div class="p-4 rounded-md bg-[#FDFDFC] dark:bg-[#0a0a0a] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                                <dt class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Routes</dt>
                                <dd class="text-2xl font-semibold">1</dd>
                            </div>
                            <div class="p-4 rounded-md bg-[#FDFDFC] dark:bg-[#0a0a0a] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                                <dt class="text-sm text-[#706f6c] dark:text-[#A1A09A]">UI</dt>
                                <dd class="text-2xl font-semibold">Tailored</dd>
                            </div>
                            <div class="p-4 rounded-md bg-[#FDFDFC] dark:bg-[#0a0a0a] border border-[#e3e3e0] dark:border-[#3E3E3A]">
                                <dt class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Next</dt>
                                <dd class="text-2xl font-semibold">Edit</dd>
                            </div>
                        </dl>

                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] mt-4">
                            Tip: keep using Blade and Tailwind classes.
                        </p>
                    </div>
                </div>
            </section>

            {{-- Features --}}
            <section id="features" class="max-w-6xl mx-auto px-6 pb-12">
                <h2 class="text-2xl font-semibold mb-6">Features</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    @php
                        $features = [
                            ['title' => 'Hero section', 'desc' => 'A headline + call to action.'],
                            ['title' => 'Reusable layout', 'desc' => 'Consistent header, sections, and footer.'],
                            ['title' => 'Dark mode friendly', 'desc' => 'Uses the same color approach as the default template.'],
                        ];
                    @endphp

                    @foreach ($features as $feature)
                        <article class="bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg p-6">
                            <h3 class="font-medium mb-2">{{ $feature['title'] }}</h3>
                            <p class="text-[#706f6c] dark:text-[#A1A09A] text-sm">{{ $feature['desc'] }}</p>
                        </article>
                    @endforeach
                </div>
            </section>

            {{-- Testimonials --}}
            <section id="testimonials" class="max-w-6xl mx-auto px-6 pb-12">
                <h2 class="text-2xl font-semibold mb-6">Testimonials</h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    @php
                        $quotes = [
                            ['name' => 'Alex', 'text' => 'Simple, fast, and looks great.'],
                            ['name' => 'Sam', 'text' => 'The route works perfectly at /homepage.'],
                            ['name' => 'Jordan', 'text' => 'Easy to edit and extend with your own content.'],
                        ];
                    @endphp

                    @foreach ($quotes as $quote)
                        <figure class="m-0 bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg p-6">
                            <blockquote class="text-sm text-[#706f6c] dark:text-[#A1A09A]">“{{ $quote['text'] }}”</blockquote>
                            <figcaption class="mt-4 text-sm font-medium">{{ $quote['name'] }}</figcaption>
                        </figure>
                    @endforeach
                </div>
            </section>

            {{-- Contact --}}
            <section id="contact" class="max-w-6xl mx-auto px-6 pb-16">
                <div class="bg-white dark:bg-[#161615] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-lg p-8">
                    <h2 class="text-2xl font-semibold mb-2">Contact</h2>
                    <p class="text-[#706f6c] dark:text-[#A1A09A] mb-6 text-sm">This form is static for now—wire it up to your controller later.</p>

                    <form class="grid grid-cols-1 md:grid-cols-2 gap-4" onsubmit="event.preventDefault(); alert('Thanks! (demo only)');">
                        <label class="block">
                            <span class="text-sm font-medium">Name</span>
                            <input class="mt-1 w-full rounded-sm border border-[#e3e3e0] dark:border-[#3E3E3A] bg-[#FDFDFC] dark:bg-[#0a0a0a] px-3 py-2" type="text" placeholder="Your name" />
                        </label>

                        <label class="block">
                            <span class="text-sm font-medium">Email</span>
                            <input class="mt-1 w-full rounded-sm border border-[#e3e3e0] dark:border-[#3E3E3A] bg-[#FDFDFC] dark:bg-[#0a0a0a] px-3 py-2" type="email" placeholder="you@example.com" />
                        </label>

                        <label class="block md:col-span-2">
                            <span class="text-sm font-medium">Message</span>
                            <textarea class="mt-1 w-full min-h-[120px] rounded-sm border border-[#e3e3e0] dark:border-[#3E3E3A] bg-[#FDFDFC] dark:bg-[#0a0a0a] px-3 py-2" placeholder="Write your message..."></textarea>
                        </label>

                        <div class="md:col-span-2 flex items-center gap-3">
                            <button type="submit" class="inline-block px-5 py-2 bg-[#1b1b18] text-white rounded-sm">Send message</button>
                            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Demo only—no backend connected.</p>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <footer class="border-t border-[#e3e3e0] dark:border-[#3E3E3A]">
            <div class="max-w-6xl mx-auto px-6 py-6 text-sm flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                <p class="text-[#706f6c] dark:text-[#A1A09A]">© {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
                <a href="#" class="font-medium hover:underline underline-offset-4">Back to top</a>
            </div>
        </footer>
    </body>
</html>

