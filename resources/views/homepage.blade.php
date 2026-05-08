<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NOIR. — Dressed in Darkness</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400&family=Inter:wght@300;400;500&display=swap" rel="stylesheet" />
  <style>
    /* ── Reset ── */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }

    /* ── Tokens ── */
    :root {
      --bg:       #0A0A0A;
      --card:     #0F0F0F;
      --surface:  #141414;
      --gold:     #C9A96E;
      --gold-20:  rgba(201,169,110,0.20);
      --gold-10:  rgba(201,169,110,0.10);
      --gold-dim: rgba(201,169,110,0.40);
      --cream:    #F0EDE8;
      --muted:    rgba(240,237,232,0.50);
    }

    body {
      background: var(--bg);
      color: var(--cream);
      font-family: 'Inter', sans-serif;
      font-weight: 300;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
    }
    .serif { font-family: 'Cormorant Garamond', serif; }

    /* ── Scrollbar ── */
    ::-webkit-scrollbar { width: 3px; }
    ::-webkit-scrollbar-track { background: var(--bg); }
    ::-webkit-scrollbar-thumb { background: var(--gold); }

    /* ──────────────────────────────────────
       ANIMATIONS
    ────────────────────────────────────── */
    @keyframes heroZoom {
      from { transform: scale(1.28); }
      to   { transform: scale(1.0);  }
    }
    @keyframes introReveal {
      0%   { opacity: 1; }
      70%  { opacity: 1; }
      100% { opacity: 0; pointer-events: none; }
    }
    @keyframes introCurtainLeft {
      0%   { transform: translateX(0); }
      100% { transform: translateX(-100%); }
    }
    @keyframes introCurtainRight {
      0%   { transform: translateX(0); }
      100% { transform: translateX(100%); }
    }
    @keyframes introLogoFade {
      0%   { opacity: 0; letter-spacing: .6em; }
      30%  { opacity: 1; letter-spacing: .25em; }
      70%  { opacity: 1; letter-spacing: .25em; }
      100% { opacity: 0; letter-spacing: .25em; }
    }
    @keyframes zoomEnter {
      from { transform: scale(1.1); opacity: 0; }
      to   { transform: scale(1.0); opacity: 1; }
    }
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(30px); }
      to   { opacity: 1; transform: translateY(0);    }
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to   { opacity: 1; }
    }
    @keyframes shimmerSweep {
      from { left: -100%; }
      to   { left: 160%;  }
    }
    @keyframes slideInLeft {
      from { opacity: 0; transform: translateX(-100%); }
      to   { opacity: 1; transform: translateX(0);     }
    }
    @keyframes slideOutLeft {
      from { opacity: 1; transform: translateX(0); }
      to   { opacity: 0; transform: translateX(-100%); }
    }
    @keyframes badgePop {
      0%   { transform: scale(0); }
      70%  { transform: scale(1.2); }
      100% { transform: scale(1); }
    }
    @keyframes toastIn {
      from { transform: translateY(120%) scale(0.95); opacity: 0; }
      to   { transform: translateY(0)   scale(1);    opacity: 1; }
    }
    @keyframes toastOut {
      from { transform: translateY(0)   scale(1);    opacity: 1; }
      to   { transform: translateY(120%) scale(0.95); opacity: 0; }
    }

    /* Scroll reveal */
    .reveal {
      opacity: 0;
      transform: translateY(36px);
      transition: opacity 0.85s cubic-bezier(.21,.47,.32,.98),
                  transform 0.85s cubic-bezier(.21,.47,.32,.98);
    }
    .reveal.in { opacity: 1; transform: translateY(0); }
    .reveal-clip { overflow: hidden; }
    .reveal-clip > span {
      display: block;
      transform: translateY(70px);
      opacity: 0;
      transition: transform 0.85s cubic-bezier(.21,.47,.32,.98),
                  opacity   0.85s cubic-bezier(.21,.47,.32,.98);
    }
    .reveal-clip.in > span { transform: translateY(0); opacity: 1; }

    /* Stagger delays */
    .d0  { transition-delay: 0s; }
    .d1  { transition-delay: 0.07s; }
    .d2  { transition-delay: 0.14s; }
    .d3  { transition-delay: 0.21s; }
    .d4  { transition-delay: 0.28s; }
    .d5  { transition-delay: 0.35s; }

    /* ──────────────────────────────────────
       INTRO OVERLAY
    ────────────────────────────────────── */
    #intro-overlay {
      position: fixed; inset: 0; z-index: 999;
      display: flex; pointer-events: none;
      animation: introReveal 2.8s ease 0.2s forwards;
    }
    #intro-overlay.gone { display: none; }
    .intro-curtain-left, .intro-curtain-right {
      flex: 1; height: 100%; background: #0A0A0A;
    }
    .intro-curtain-left  { animation: introCurtainLeft  0.9s cubic-bezier(.76,0,.24,1) 1.7s forwards; }
    .intro-curtain-right { animation: introCurtainRight 0.9s cubic-bezier(.76,0,.24,1) 1.7s forwards; }
    #intro-logo {
      position: absolute; inset: 0;
      display: flex; align-items: center; justify-content: center;
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(2.5rem, 6vw, 5rem);
      font-weight: 400; letter-spacing: .25em;
      color: #F0EDE8;
      animation: introLogoFade 2.6s ease 0.2s forwards;
      pointer-events: none;
    }

    /* ──────────────────────────────────────
       SCROLL-ZOOM IMAGES
    ────────────────────────────────────── */
    .zoom-enter {
      opacity: 0;
      transform: scale(1.1);
      transition: transform 1.1s cubic-bezier(.16,1,.3,1),
                  opacity   1.1s cubic-bezier(.16,1,.3,1);
    }
    .zoom-enter.in {
      opacity: 1;
      transform: scale(1.0);
    }

    /* ──────────────────────────────────────
       HEADER
    ────────────────────────────────────── */
    header {
      position: fixed; top: 0; left: 0; right: 0; z-index: 100;
      height: 96px;
      display: flex; align-items: center; justify-content: space-between;
      padding: 0 3rem;
      background: transparent;
      border-bottom: 1px solid transparent;
      transition: background .5s ease, border-color .5s ease, backdrop-filter .5s ease;
    }
    header.scrolled {
      background: rgba(10,10,10,0.95);
      border-color: var(--gold-10);
      backdrop-filter: blur(12px);
    }
    .header-left { display: flex; align-items: center; gap: 3rem; }
    .logo {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.875rem; font-weight: 500;
      letter-spacing: .25em; color: var(--cream);
      text-decoration: none;
    }
    .desktop-nav { display: flex; gap: 2.5rem; }
    .desktop-nav a {
      font-size: .7rem; font-weight: 400;
      letter-spacing: .22em; text-transform: uppercase;
      color: var(--muted); text-decoration: none;
      transition: color .25s;
    }
    .desktop-nav a:hover { color: var(--gold); }
    .header-right { display: flex; align-items: center; gap: 1.5rem; }
    .icon-btn {
      background: none; border: none; cursor: pointer;
      color: var(--cream); padding: 4px;
      transition: color .25s; position: relative;
    }
    .icon-btn:hover { color: var(--gold); }
    .cart-badge {
      position: absolute; top: -6px; right: -7px;
      background: var(--gold); color: var(--bg);
      font-size: 9px; font-weight: 700;
      width: 16px; height: 16px; border-radius: 50%;
      display: none; align-items: center; justify-content: center;
    }
    .cart-badge.visible {
      display: flex;
      animation: badgePop .35s cubic-bezier(.34,1.56,.64,1) forwards;
    }
    .hamburger {
      display: none; background: none; border: none;
      cursor: pointer; color: var(--cream); padding: 4px;
    }

    /* ── Account Dropdown ── */
    .account-dropdown {
      position: relative;
    }
    .account-btn {
      position: relative;
    }
    .dropdown-menu {
      position: absolute; top: 100%; right: 0;
      background: var(--surface); border: 1px solid var(--gold-10);
      border-radius: 8px; padding: 0.5rem 0;
      min-width: 150px; opacity: 0; visibility: hidden;
      transform: translateY(-10px);
      transition: opacity 0.2s, visibility 0.2s, transform 0.2s;
    }
    .account-dropdown:hover .dropdown-menu {
      opacity: 1; visibility: visible; transform: translateY(0);
    }
    .dropdown-menu a {
      display: block; padding: 0.75rem 1rem;
      color: var(--cream); text-decoration: none;
      font-size: 0.875rem;
    }
    .dropdown-menu a:hover {
      background: var(--gold-10);
    }
    .logout-btn {
      width: 100%; background: none; border: none;
      color: var(--cream); text-align: left; padding: 0.75rem 1rem;
      cursor: pointer; font-size: 0.875rem;
    }
    .logout-btn:hover {
      background: var(--gold-10);
    }

    /* ── Search Overlay ── */
    #search-overlay {
      position: fixed; inset: 0; z-index: 200;
      background: rgba(10,10,10,0.95); backdrop-filter: blur(20px);
      display: flex; align-items: center; justify-content: center;
      opacity: 0; visibility: hidden; transition: opacity 0.3s, visibility 0.3s;
    }
    #search-overlay.open {
      opacity: 1; visibility: visible;
    }
    .search-container {
      width: 100%; max-width: 600px; padding: 2rem;
    }
    .search-input {
      width: 100%; background: transparent;
      border: none; border-bottom: 2px solid var(--gold);
      padding: 1rem 0; color: var(--cream);
      font-size: 2rem; outline: none;
    }
    .search-results {
      margin-top: 2rem; max-height: 400px; overflow-y: auto;
    }
    .search-result {
      padding: 1rem; border-bottom: 1px solid var(--gold-10);
      color: var(--cream); text-decoration: none; display: block;
    }
    .search-result:hover {
      background: var(--gold-10);
    }

    /* ── Mobile Menu ── */
    #mobile-menu {
      position: fixed; inset: 0; z-index: 200;
      background: var(--bg);
      display: flex; flex-direction: column;
      padding: 2.5rem;
      border-right: 1px solid var(--gold-10);
      transform: translateX(-100%);
      transition: transform .5s cubic-bezier(.22,1,.36,1), opacity .5s ease;
      opacity: 0;
      pointer-events: none;
    }
    #mobile-menu.open {
      transform: translateX(0); opacity: 1; pointer-events: all;
    }
    .mobile-menu-top {
      display: flex; justify-content: space-between; align-items: center;
      margin-bottom: 4rem;
    }
    .mobile-nav { display: flex; flex-direction: column; gap: 2rem; }
    .mobile-nav a {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.25rem; font-weight: 300;
      color: var(--cream); text-decoration: none;
      letter-spacing: .04em; transition: color .25s;
    }
    .mobile-nav a:hover { color: var(--gold); }
    .mobile-tagline {
      margin-top: auto; padding-bottom: 2rem;
      font-size: .65rem; letter-spacing: .22em; text-transform: uppercase;
      color: var(--muted);
    }

    /* ──────────────────────────────────────
       HERO
    ────────────────────────────────────── */
    .hero {
      position: relative; height: 100vh; min-height: 640px;
      display: flex; align-items: center; justify-content: center;
      overflow: hidden; text-align: center;
    }
    .hero-bg {
      position: absolute; inset: 0; z-index: 0;
      animation: heroZoom 3.4s cubic-bezier(.16,1,.3,1) forwards;
      transform-origin: center;
      will-change: transform;
    }
    .hero-bg img {
      width: 100%; height: 100%; object-fit: cover; display: block;
    }
    .hero-gradient {
      position: absolute; inset: 0;
      background: linear-gradient(to top,
        #0A0A0A 0%,
        rgba(10,10,10,.4) 50%,
        rgba(10,10,10,.2) 100%);
    }
    .hero-content {
      position: relative; z-index: 2;
      display: flex; flex-direction: column; align-items: center;
      padding: 0 1.5rem; margin-top: 6rem;
      max-width: 900px; width: 100%;
    }
    .hero-label {
      font-size: .7rem; letter-spacing: .3em; text-transform: uppercase;
      color: var(--gold); margin-bottom: 1.5rem;
      animation: fadeIn 0.8s ease 0.6s both;
    }
    .hero-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(4rem, 12vw, 10rem);
      line-height: .92; letter-spacing: -.02em;
      color: var(--cream); margin-bottom: 2.5rem;
      animation: fadeUp 0.8s cubic-bezier(.21,.47,.32,.98) 1.2s both;
    }
    .hero-title em {
      font-style: italic; font-weight: 300;
      color: rgba(240,237,232,.88);
    }
    .hero-welcome {
      text-align: center;
      margin-bottom: 2rem;
      animation: fadeUp 0.8s cubic-bezier(.21,.47,.32,.98) 1.5s both;
    }
    .hero-welcome p {
      font-size: 1.2rem;
      color: var(--muted);
      margin: 0;
    }
    .user-name {
      color: var(--gold);
      font-weight: 500;
    }
    .hero-actions {
      display: flex; gap: 1.5rem; flex-wrap: wrap; justify-content: center;
      animation: fadeUp 0.8s cubic-bezier(.21,.47,.32,.98) 1.8s both;
    }

    /* ──────────────────────────────────────
       BUTTONS
    ────────────────────────────────────── */
    .btn-primary {
      position: relative; overflow: hidden;
      display: inline-flex; align-items: center; justify-content: center;
      padding: 1.1rem 3rem;
      background: var(--gold); color: var(--bg);
      font-family: 'Inter', sans-serif;
      font-size: .65rem; font-weight: 500;
      letter-spacing: .22em; text-transform: uppercase;
      text-decoration: none; border: none; cursor: pointer;
      transition: background .25s, transform .25s;
    }
    .btn-primary::after {
      content: '';
      position: absolute; top: 0; left: -100%;
      width: 50%; height: 100%;
      background: linear-gradient(to right, transparent, rgba(255,255,255,.22), transparent);
      transform: skewX(-20deg);
    }
    .btn-primary:hover { background: rgba(201,169,110,.9); transform: translateY(-1px); }
    .btn-primary:hover::after { animation: shimmerSweep .7s ease forwards; }

    .btn-outline {
      display: inline-flex; align-items: center; justify-content: center;
      padding: 1.1rem 3rem;
      border: 1px solid var(--gold-20); background: transparent;
      color: var(--cream);
      font-family: 'Inter', sans-serif;
      font-size: .65rem; font-weight: 500;
      letter-spacing: .22em; text-transform: uppercase;
      text-decoration: none; cursor: pointer;
      backdrop-filter: blur(4px);
      transition: background .25s, border-color .25s, transform .25s;
    }
    .btn-outline:hover {
      background: var(--gold-10); border-color: var(--gold-20);
      transform: translateY(-1px);
    }

    /* ──────────────────────────────────────
       DIVIDER
    ────────────────────────────────────── */
    .section-border { border-top: 1px solid var(--gold-10); }

    /* ──────────────────────────────────────
       LAYOUT
    ────────────────────────────────────── */
    .container {
      max-width: 1280px; margin: 0 auto;
      padding: 0 3rem;
    }
    section { padding: 8rem 0; }

    .label {
      font-size: .65rem; font-weight: 500;
      letter-spacing: .22em; text-transform: uppercase;
      color: var(--gold); display: block; margin-bottom: 1rem;
    }

    /* ──────────────────────────────────────
       CATEGORIES
    ────────────────────────────────────── */
    .cat-grid {
      display: grid; grid-template-columns: repeat(3, 1fr);
      gap: 2rem; margin-top: 5rem;
    }
    .cat-card { text-decoration: none; color: inherit; display: block; }
    .cat-img-wrap {
      position: relative; aspect-ratio: 2/3;
      overflow: hidden; background: var(--surface); margin-bottom: 1.5rem;
    }
    .cat-img-wrap img {
      width: 100%; height: 100%; object-fit: cover;
      transition: transform .8s cubic-bezier(.21,.47,.32,.98);
    }
    .cat-card:hover .cat-img-wrap img { transform: scale(1.05); }
    .cat-img-wrap::after {
      content: '';
      position: absolute; inset: 0;
      background: linear-gradient(to top, rgba(10,10,10,.8) 0%, transparent 60%);
      opacity: .8; transition: opacity .5s;
    }
    .cat-card:hover .cat-img-wrap::after { opacity: .4; }
    .cat-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.5rem; font-weight: 400;
      letter-spacing: .08em; text-transform: uppercase;
      text-align: center; margin-bottom: .5rem;
      transition: color .25s;
    }
    .cat-card:hover .cat-name { color: var(--gold); }
    .cat-tag {
      font-size: .8rem; font-style: italic; font-weight: 300;
      color: var(--muted); text-align: center;
    }

    /* ──────────────────────────────────────
       PRODUCT GRID
    ────────────────────────────────────── */
    #shop { background: rgba(20,20,20,.3); }
    .shop-header {
      display: flex; justify-content: space-between;
      align-items: flex-end; margin-bottom: 5rem; gap: 1rem;
      flex-wrap: wrap;
    }
    .view-all {
      font-size: .65rem; letter-spacing: .18em; text-transform: uppercase;
      color: var(--muted); text-decoration: none;
      border-bottom: 1px solid var(--gold-20);
      padding-bottom: .25rem;
      display: inline-flex; align-items: center; gap: .5rem;
      transition: color .25s, border-color .25s;
    }
    .view-all:hover { color: var(--gold); border-color: var(--gold); }
    .view-all svg { transition: transform .25s; }
    .view-all:hover svg { transform: translateX(3px); }

    .product-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2rem 2rem;
      row-gap: 5rem;
    }
    .product-card { position: relative; }
    .product-img-wrap {
      position: relative; aspect-ratio: 3/4;
      background: var(--card); overflow: hidden; margin-bottom: 1.5rem;
    }
    .product-img-wrap img {
      width: 100%; height: 100%; object-fit: cover;
      transition: transform .6s cubic-bezier(.21,.47,.32,.98);
    }
    .product-card:hover .product-img-wrap img { transform: scale(1.08); }
    .product-overlay {
      position: absolute; inset: 0;
      background: rgba(10,10,10,.2);
      opacity: 0; transition: opacity .5s;
      pointer-events: none;
    }
    .product-card:hover .product-overlay { opacity: 1; }
    .product-action {
      position: absolute; inset-x: 0; bottom: 0; padding: 1.5rem;
      opacity: 0; transform: translateY(12px);
      transition: opacity .35s ease, transform .35s ease;
    }
    .product-card:hover .product-action { opacity: 1; transform: translateY(0); }
    .acquire-btn {
      width: 100%; padding: .875rem;
      background: var(--bg); color: var(--cream);
      border: 1px solid var(--gold-20);
      font-family: 'Inter', sans-serif;
      font-size: .65rem; font-weight: 400;
      letter-spacing: .22em; text-transform: uppercase;
      cursor: pointer; backdrop-filter: blur(8px);
      transition: background .25s, color .25s, border-color .25s;
    }
    .acquire-btn:hover {
      background: var(--gold); color: var(--bg); border-color: var(--gold);
    }
    .product-meta { display: flex; justify-content: space-between; align-items: flex-start; gap: 1rem; }
    .product-cat {
      font-size: .6rem; letter-spacing: .22em; text-transform: uppercase;
      color: var(--gold); margin-bottom: .5rem;
    }
    .product-name {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.2rem; letter-spacing: .06em; text-transform: uppercase;
      margin-bottom: .35rem; line-height: 1.2;
    }
    .product-desc { font-size: .8rem; font-style: italic; color: var(--muted); }
    .product-price {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.15rem; color: var(--gold); white-space: nowrap; flex-shrink: 0;
    }
    .mobile-view-all { display: none; margin-top: 4rem; text-align: center; }

    /* ──────────────────────────────────────
       EDITORIAL / REVIEWS
    ────────────────────────────────────── */
    .editorial-header { text-align: center; margin-bottom: 6rem; }
    .editorial-grid {
      display: grid; grid-template-columns: repeat(3, 1fr);
      gap: 0;
      border-top: 1px solid var(--gold-10);
    }
    .review-block {
      padding: 4rem 3rem;
      border-right: 1px solid var(--gold-10);
      display: flex; flex-direction: column;
      align-items: center; text-align: center;
    }
    .review-block:last-child { border-right: none; }
    .review-quote-mark {
      font-family: 'Cormorant Garamond', serif;
      font-size: 5rem; line-height: 1;
      color: var(--gold-dim); margin-bottom: 1.5rem; display: block;
    }
    .review-text {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.35rem; font-style: italic; font-weight: 300;
      line-height: 1.6; color: rgba(240,237,232,.9);
      margin-bottom: 2.5rem; flex: 1;
    }
    .review-author {
      font-size: .65rem; font-weight: 700;
      letter-spacing: .22em; text-transform: uppercase;
      color: var(--gold); margin-bottom: .5rem;
    }
    .review-role {
      font-size: .65rem; letter-spacing: .14em;
      color: var(--muted);
    }

    /* ──────────────────────────────────────
       NEWSLETTER
    ────────────────────────────────────── */
    #about { background: var(--card); }
    .newsletter-inner { max-width: 768px; margin: 0 auto; text-align: center; }
    .newsletter-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(2.5rem, 5vw, 3.25rem); font-weight: 400;
      letter-spacing: -.01em; margin-bottom: 1.5rem;
    }
    .newsletter-sub {
      font-size: 1.05rem; font-style: italic; font-weight: 300;
      color: var(--muted); margin-bottom: 3rem; line-height: 1.75;
    }
    .newsletter-form {
      display: flex; max-width: 560px; margin: 0 auto;
      border: 1px solid var(--gold-20);
      background: rgba(10,10,10,.5); backdrop-filter: blur(4px);
      padding: .25rem;
    }
    .newsletter-input {
      flex: 1; background: transparent; border: none; outline: none;
      color: var(--cream);
      font-family: 'Inter', sans-serif;
      font-size: .65rem; font-weight: 300;
      letter-spacing: .22em; text-transform: uppercase;
      padding: 0 1.5rem; height: 3.5rem;
    }
    .newsletter-input::placeholder { color: rgba(240,237,232,.3); }

    /* ──────────────────────────────────────
       FOOTER
    ────────────────────────────────────── */
    footer { background: var(--bg); padding: 6rem 0 3rem; }
    .footer-grid {
      display: grid; grid-template-columns: 4fr 2fr 2fr 2fr;
      gap: 3rem; margin-bottom: 5rem;
    }
    .footer-brand {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.5rem; font-weight: 400;
      letter-spacing: .22em; color: var(--cream);
      text-decoration: none; display: block; margin-bottom: 2rem;
    }
    .footer-desc { font-size: .875rem; color: var(--muted); line-height: 1.8; max-width: 280px; }
    .footer-col h4 {
      font-size: .62rem; font-weight: 500;
      letter-spacing: .22em; text-transform: uppercase;
      color: var(--gold); margin-bottom: 2rem;
    }
    .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 1rem; }
    .footer-col a {
      font-size: .875rem; font-weight: 300;
      color: var(--muted); text-decoration: none;
      transition: color .25s;
    }
    .footer-col a:hover { color: var(--gold); }
    .footer-bottom {
      padding-top: 2rem; border-top: 1px solid var(--gold-10);
      display: flex; justify-content: space-between; align-items: center;
      flex-wrap: wrap; gap: 1rem;
    }
    .footer-copy {
      font-size: .7rem; font-weight: 300;
      letter-spacing: .14em; text-transform: uppercase; color: var(--muted);
    }
    .footer-sig { font-size: .75rem; font-style: italic; color: var(--gold-dim); }

    /* ──────────────────────────────────────
       TOAST
    ────────────────────────────────────── */
    #toast {
      position: fixed; bottom: 2rem; right: 2rem; z-index: 9999;
      background: var(--card);
      border: 1px solid var(--gold-20);
      padding: 1.25rem 1.75rem;
      min-width: 260px;
      box-shadow: 0 20px 60px rgba(0,0,0,.6);
      pointer-events: none; opacity: 0;
    }
    #toast.show { animation: toastIn .45s cubic-bezier(.21,.47,.32,.98) forwards; pointer-events: all; }
    #toast.hide { animation: toastOut .35s ease forwards; }
    #toast-title {
      font-size: .65rem; font-weight: 500;
      letter-spacing: .18em; text-transform: uppercase;
      color: var(--gold); margin-bottom: .4rem;
    }
    #toast-desc { font-size: .825rem; font-weight: 300; color: var(--muted); }

    /* ──────────────────────────────────────
       RESPONSIVE
    ────────────────────────────────────── */
    @media (max-width: 1024px) {
      .container { padding: 0 2rem; }
      .product-grid { grid-template-columns: repeat(2, 1fr); }
      .footer-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 768px) {
      header { padding: 0 1.5rem; }
      .desktop-nav { display: none; }
      .hamburger { display: block; }
      .cat-grid { grid-template-columns: 1fr; gap: 3rem; }
      .product-grid { grid-template-columns: 1fr; }
      .editorial-grid { grid-template-columns: 1fr; }
      .review-block { border-right: none; border-bottom: 1px solid var(--gold-10); padding: 3rem 1.5rem; }
      .review-block:last-child { border-bottom: none; }
      .footer-grid { grid-template-columns: 1fr 1fr; gap: 2.5rem; }
      .mobile-view-all { display: block; }
      .view-all { display: none; }
      .container { padding: 0 1.5rem; }
      section { padding: 5rem 0; }
    }
    @media (max-width: 480px) {
      .footer-grid { grid-template-columns: 1fr; }
      .hero-actions { flex-direction: column; width: 100%; }
      .btn-primary, .btn-outline { width: 100%; }
    }
  </style>
</head>
<body>

<!-- ════ INTRO OVERLAY ════ -->
<div id="intro-overlay" aria-hidden="true">
  <div class="intro-curtain-left"></div>
  <div class="intro-curtain-right"></div>
  <div id="intro-logo">NOIR.</div>
</div>

<!-- ════ TOAST ════ -->
<div id="toast" role="alert">
  <div id="toast-title"></div>
  <div id="toast-desc"></div>
</div>

<!-- ════ MOBILE MENU ════ -->
<div id="mobile-menu" role="dialog" aria-modal="true">
  <div class="mobile-menu-top">
    <span class="serif" style="font-size:1.875rem;letter-spacing:.25em;">NOIR.</span>
    <button onclick="closeMobile()" style="background:none;border:none;cursor:pointer;color:var(--muted);transition:color .25s;" onmouseover="this.style.color='var(--gold)'" onmouseout="this.style.color='var(--muted)'" aria-label="Close menu">
      <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.4" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
  </div>
  <nav class="mobile-nav">
    <a href="#collections" onclick="closeMobile()">Collection</a>
    <a href="#editorial"   onclick="closeMobile()">Editorial</a>
    <a href="#about"       onclick="closeMobile()">About</a>
  </nav>
  <p class="mobile-tagline">Dressed in Darkness.</p>
</div>

<!-- ════ HEADER ════ -->
<header id="site-header">
  <div class="header-left">
    <button class="hamburger" onclick="openMobile()" aria-label="Open menu">
      <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><line x1="3" y1="7" x2="21" y2="7"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="17" x2="21" y2="17"/></svg>
    </button>
    <a href="#" class="logo">NOIR.</a>
    <nav class="desktop-nav">
      <a href="#collections">Collection</a>
      <a href="#editorial">Editorial</a>
      <a href="#about">About</a>
      @guest
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
      @endguest
    </nav>
  </div>
  <div class="header-right">
    <a href="{{ route('search') }}" class="icon-btn" aria-label="Search">
      <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
    </a>
    @auth
      <div class="account-dropdown">
        <button class="icon-btn account-btn" aria-label="Account">
          <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="12" cy="8" r="5"/><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/></svg>
        </button>
        <div class="dropdown-menu">
          <a href="{{ route('profile') }}">Profile</a>
          <a href="{{ route('settings') }}">Settings</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
          </form>
        </div>
      </div>
    @endauth
    <button class="icon-btn" id="cart-btn" aria-label="Shopping bag">
      <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
      <span id="cart-badge" class="cart-badge">0</span>
    </button>
  </div>
</header>

<!-- ════ SEARCH OVERLAY ════ -->
<div id="search-overlay">
  <div class="search-container">
    <input type="text" id="search-input" class="search-input" placeholder="Search products..." />
    <div id="search-results" class="search-results"></div>
  </div>
</div>

<!-- ════ HERO ════ -->
<section class="hero">
  <div class="hero-bg">
    <img src="https://simple-commerce-1--nsabimanabutais.replit.app/images/hero.png" alt="" />
    <div class="hero-gradient"></div>
  </div>
  <div class="hero-content">
    <span class="hero-label">The New Collection</span>
    <h1 class="hero-title serif">
      Dressed in<br/><em>Darkness.</em>
    </h1>
    @auth
      <div class="hero-welcome">
        <p>Welcome back, <span class="user-name">{{ auth()->user()->name }}</span></p>
      </div>
    @endauth
    <div class="hero-actions">
      <a href="{{ route('shop') }}" class="btn-primary">Shop Collection</a>
      <a href="#collections" class="btn-outline">View Editorial</a>
    </div>
  </div>
</section>

<!-- ════ CATEGORIES ════ -->
<section id="collections" class="section-border">
  <div class="container">
    <div class="reveal-clip" style="text-align:center;">
      <span class="serif" style="font-size:clamp(2.25rem,5vw,3.75rem);font-weight:400;letter-spacing:-.01em;overflow:hidden;display:block;">
        <span>Curated Archetypes</span>
      </span>
    </div>
    <div class="cat-grid">
      <a href="#shop" class="cat-card reveal d1">
        <div class="cat-img-wrap">
          <img class="zoom-enter" src="https://simple-commerce-1--nsabimanabutais.replit.app/images/category-outerwear.png" alt="Outerwear" />
        </div>
        <p class="cat-name">Outerwear</p>
        <p class="cat-tag">Layers that command attention.</p>
      </a>
      <a href="#shop" class="cat-card reveal d2">
        <div class="cat-img-wrap">
          <img class="zoom-enter d1" src="https://simple-commerce-1--nsabimanabutais.replit.app/images/category-essentials.png" alt="Essentials" />
        </div>
        <p class="cat-name">Essentials</p>
        <p class="cat-tag">The quiet power of a perfect fit.</p>
      </a>
      <a href="#shop" class="cat-card reveal d3">
        <div class="cat-img-wrap">
          <img class="zoom-enter d2" src="https://simple-commerce-1--nsabimanabutais.replit.app/images/category-footwear.png" alt="Footwear" />
        </div>
        <p class="cat-name">Footwear</p>
        <p class="cat-tag">Grounded in craft.</p>
      </a>
    </div>
  </div>
</section>

<!-- ════ PRODUCTS ════ -->
<section id="shop" class="section-border">
  <div class="container">
    <div class="shop-header">
      <div class="reveal">
        <span class="label">The Arsenal</span>
        <div class="reveal-clip">
          <span class="serif" style="font-size:clamp(2.25rem,5vw,3.75rem);font-weight:400;letter-spacing:-.01em;display:block;">
            <span>Selected Armaments</span>
          </span>
        </div>
      </div>
      <a href="#shop" class="view-all reveal">
        View Full Collection
        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
    </div>

    <div class="product-grid">

      <div class="product-card reveal d1">
        <div class="product-img-wrap">
          <img class="zoom-enter" src="https://simple-commerce-1--nsabimanabutais.replit.app/images/product-coat.png" alt="Oversized Wool Coat" />
          <div class="product-overlay"></div>
          <div class="product-action">
            <button class="acquire-btn" onclick="addToCart('Oversized Wool Coat', 285)">Acquire — $285</button>
          </div>
        </div>
        <div class="product-meta">
          <div>
            <p class="product-cat">Outerwear</p>
            <h3 class="product-name serif">Oversized Wool Coat</h3>
            <p class="product-desc">Deep charcoal double-faced wool</p>
          </div>
          <span class="product-price serif">$285</span>
        </div>
      </div>

      <div class="product-card reveal d2">
        <div class="product-img-wrap">
          <img class="zoom-enter" src="https://simple-commerce-1--nsabimanabutais.replit.app/images/product-jacket.png" alt="Raw Edge Denim Jacket" />
          <div class="product-overlay"></div>
          <div class="product-action">
            <button class="acquire-btn" onclick="addToCart('Raw Edge Denim Jacket', 175)">Acquire — $175</button>
          </div>
        </div>
        <div class="product-meta">
          <div>
            <p class="product-cat">Jackets</p>
            <h3 class="product-name serif">Raw Edge Denim Jacket</h3>
            <p class="product-desc">Distressed indigo Japanese denim</p>
          </div>
          <span class="product-price serif">$175</span>
        </div>
      </div>

      <div class="product-card reveal d3">
        <div class="product-img-wrap">
          <img class="zoom-enter" src="https://simple-commerce-1--nsabimanabutais.replit.app/images/product-shirt.png" alt="Draped Silk Shirt" />
          <div class="product-overlay"></div>
          <div class="product-action">
            <button class="acquire-btn" onclick="addToCart('Draped Silk Shirt', 145)">Acquire — $145</button>
          </div>
        </div>
        <div class="product-meta">
          <div>
            <p class="product-cat">Tops</p>
            <h3 class="product-name serif">Draped Silk Shirt</h3>
            <p class="product-desc">Ivory bias-cut silk with water-print effect</p>
          </div>
          <span class="product-price serif">$145</span>
        </div>
      </div>

      <div class="product-card reveal d1">
        <div class="product-img-wrap">
          <img class="zoom-enter" src="https://simple-commerce-1--nsabimanabutais.replit.app/images/product-trousers.png" alt="Wide-Leg Trousers" />
          <div class="product-overlay"></div>
          <div class="product-action">
            <button class="acquire-btn" onclick="addToCart('Wide-Leg Trousers', 195)">Acquire — $195</button>
          </div>
        </div>
        <div class="product-meta">
          <div>
            <p class="product-cat">Bottoms</p>
            <h3 class="product-name serif">Wide-Leg Trousers</h3>
            <p class="product-desc">Tailored chalk-stripe suiting fabric</p>
          </div>
          <span class="product-price serif">$195</span>
        </div>
      </div>

      <div class="product-card reveal d2">
        <div class="product-img-wrap">
          <img class="zoom-enter" src="https://simple-commerce-1--nsabimanabutais.replit.app/images/product-turtleneck.png" alt="Merino Turtleneck" />
          <div class="product-overlay"></div>
          <div class="product-action">
            <button class="acquire-btn" onclick="addToCart('Merino Turtleneck', 120)">Acquire — $120</button>
          </div>
        </div>
        <div class="product-meta">
          <div>
            <p class="product-cat">Knitwear</p>
            <h3 class="product-name serif">Merino Turtleneck</h3>
            <p class="product-desc">Rib-knit in deep forest green</p>
          </div>
          <span class="product-price serif">$120</span>
        </div>
      </div>

      <div class="product-card reveal d3">
        <div class="product-img-wrap">
          <img class="zoom-enter" src="https://simple-commerce-1--nsabimanabutais.replit.app/images/product-boots.png" alt="Leather Chelsea Boots" />
          <div class="product-overlay"></div>
          <div class="product-action">
            <button class="acquire-btn" onclick="addToCart('Leather Chelsea Boots', 320)">Acquire — $320</button>
          </div>
        </div>
        <div class="product-meta">
          <div>
            <p class="product-cat">Footwear</p>
            <h3 class="product-name serif">Leather Chelsea Boots</h3>
            <p class="product-desc">Pull-tab silhouette in waxed black leather</p>
          </div>
          <span class="product-price serif">$320</span>
        </div>
      </div>

    </div>

    <div class="mobile-view-all">
      <a href="#shop" class="btn-outline" style="width:100%;display:flex;justify-content:center;">View Full Collection</a>
    </div>
  </div>
</section>

<!-- ════ EDITORIAL / REVIEWS ════ -->
<section id="editorial" class="section-border">
  <div class="container">
    <div class="editorial-header reveal">
      <span class="label">The Verdict</span>
      <h2 class="serif" style="font-size:clamp(2rem,4.5vw,3rem);font-weight:400;letter-spacing:-.01em;">Critical Reception</h2>
    </div>
    <div class="editorial-grid">

      <div class="review-block reveal d1">
        <span class="review-quote-mark">"</span>
        <p class="review-text">A masterful approach to silhouette. The drape on the silk shirt is unparalleled in modern ready-to-wear.</p>
        <div>
          <p class="review-author">Vogue</p>
          <p class="review-role">Editorial Review</p>
        </div>
      </div>

      <div class="review-block reveal d2">
        <span class="review-quote-mark">"</span>
        <p class="review-text">NOIR. proves that restraint is the ultimate form of expression. Their outerwear collection is an absolute triumph.</p>
        <div>
          <p class="review-author">GQ</p>
          <p class="review-role">Style Profile</p>
        </div>
      </div>

      <div class="review-block reveal d3">
        <span class="review-quote-mark">"</span>
        <p class="review-text">The tailoring is razor-sharp. These pieces don't just dress you; they arm you for the modern world.</p>
        <div>
          <p class="review-author">Hypebeast</p>
          <p class="review-role">Feature</p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ════ NEWSLETTER ════ -->
<section id="about" class="section-border">
  <div class="container">
    <div class="newsletter-inner reveal">
      <h2 class="newsletter-title serif">Enter the Void</h2>
      <p class="newsletter-sub">Subscribe for private viewings, editorial features, and early access to limited armaments.</p>
      <form class="newsletter-form" onsubmit="handleNewsletter(event)">
        <input class="newsletter-input" type="email" required placeholder="Email Address" />
        <button type="submit" class="btn-primary" style="height:3.5rem;padding:0 2.5rem;">Subscribe</button>
      </form>
    </div>
  </div>
</section>

<!-- ════ FOOTER ════ -->
<footer class="section-border">
  <div class="container">
    <div class="footer-grid">
      <div>
        <a href="#" class="footer-brand">NOIR.</a>
        <p class="footer-desc">A study in restraint. High fashion essentials crafted with obsessive attention to detail and shadow.</p>
      </div>
      <div class="footer-col">
        <h4>Navigation</h4>
        <ul>
          <li><a href="#collections">Collections</a></li>
          <li><a href="#shop">Armaments</a></li>
          <li><a href="#editorial">Editorial</a></li>
          <li><a href="#about">About</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Legal</h4>
        <ul>
          <li><a href="#">Terms of Service</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Shipping</a></li>
          <li><a href="#">Returns</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Social</h4>
        <ul>
          <li><a href="#">Instagram</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Pinterest</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p class="footer-copy">&copy; 2026 NOIR. All Rights Reserved.</p>
      <p class="footer-sig">Dressed in Darkness.</p>
    </div>
  </div>
</footer>

<script>
  // ── Cart ──────────────────────────────
  let cartCount = parseInt(localStorage.getItem('cartCount')) || 0;
  updateCartBadge();
  function addToCart(name, price) {
    cartCount++;
    localStorage.setItem('cartCount', cartCount);
    updateCartBadge();
    showToast('Added to Cart', name + ' added to your bag.');
  }
  function updateCartBadge() {
    const badge = document.getElementById('cart-badge');
    badge.textContent = cartCount;
    if (cartCount > 0) {
      badge.classList.add('visible');
    } else {
      badge.classList.remove('visible');
    }
  }

  // ── Search ────────────────────────────
  const searchOverlay = document.getElementById('search-overlay');
  const searchInput = document.getElementById('search-input');
  const searchResults = document.getElementById('search-results');

  // Note: Search button now navigates to search page instead of opening overlay
  // Remove search overlay functionality as it's handled by dedicated search page

  searchOverlay.addEventListener('click', (e) => {
    if (e.target === searchOverlay) {
      searchOverlay.classList.remove('open');
    }
  });

  searchInput.addEventListener('input', (e) => {
    const query = e.target.value.toLowerCase();
    searchResults.innerHTML = '';
    if (query.length > 1) {
      const products = [
        'Oversized Wool Coat',
        'Raw Edge Denim Jacket',
        'Draped Silk Shirt',
        'Wide-Leg Trousers',
        'Merino Turtleneck',
        'Leather Chelsea Boots'
      ];
      const filtered = products.filter(p => p.toLowerCase().includes(query));
      filtered.forEach(product => {
        const div = document.createElement('a');
        div.className = 'search-result';
        div.href = '#shop';
        div.textContent = product;
        searchResults.appendChild(div);
      });
    }
  });

  // ── Toast ─────────────────────────────
  let toastTimer, toastHideTimer;
  function showToast(title, desc) {
    const t = document.getElementById('toast');
    document.getElementById('toast-title').textContent = title;
    document.getElementById('toast-desc').textContent  = desc;
    clearTimeout(toastTimer);
    clearTimeout(toastHideTimer);
    t.classList.remove('hide');
    t.classList.add('show');
    toastTimer = setTimeout(() => {
      t.classList.replace('show', 'hide');
    }, 3600);
  }

  // ── Newsletter ────────────────────────
  function handleNewsletter(e) {
    e.preventDefault();
    showToast('Subscribed', 'Welcome to the world of NOIR.');
    e.target.reset();
  }

  // ── Header scroll ─────────────────────
  const hdr = document.getElementById('site-header');
  window.addEventListener('scroll', () => {
    hdr.classList.toggle('scrolled', window.scrollY > 50);
  }, { passive: true });

  // ── Mobile menu ───────────────────────
  function openMobile()  {
    document.getElementById('mobile-menu').classList.add('open');
    document.body.style.overflow = 'hidden';
  }
  function closeMobile() {
    document.getElementById('mobile-menu').classList.remove('open');
    document.body.style.overflow = '';
  }

  // ── Scroll reveal ─────────────────────
  const revealObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('in');
        revealObs.unobserve(e.target);
      }
    });
  }, { threshold: 0.1, rootMargin: '-40px' });

  document.querySelectorAll('.reveal, .reveal-clip').forEach(el => revealObs.observe(el));

  // ── Zoom-enter observer ───────────────
  const zoomObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('in');
        zoomObs.unobserve(e.target);
      }
    });
  }, { threshold: 0.08, rootMargin: '-20px' });

  document.querySelectorAll('.zoom-enter').forEach(el => zoomObs.observe(el));

  // ── Intro overlay cleanup ─────────────
  const overlay = document.getElementById('intro-overlay');
  overlay.addEventListener('animationend', () => {
    overlay.classList.add('gone');
  });

  // ── Hero parallax on scroll ───────────
  const heroBg = document.querySelector('.hero-bg');
  window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    if (scrollY < window.innerHeight) {
      // Shift bg upward at 40% of scroll speed — pure parallax, no zoom change
      heroBg.style.transform = `translateY(${scrollY * 0.4}px)`;
    }
  }, { passive: true });
</script>

</body>
</html>
    