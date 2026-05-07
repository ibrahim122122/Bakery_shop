<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
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
    }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      min-height: 100vh;
      font-family: 'Inter', system-ui, sans-serif;
      background: radial-gradient(circle at top, rgba(201,169,110,0.12), transparent 34%),
                  linear-gradient(180deg, #0A0A0A 0%, #050505 100%);
      color: var(--cream);
      display: grid;
      place-items: center;
      padding: 1.5rem;
    }
    .auth-card {
      width: min(1120px, 100%);
      display: grid;
      grid-template-columns: 1.2fr 1fr;
      gap: 2rem;
      background: rgba(15,15,15,0.96);
      border: 1px solid rgba(201,169,110,0.14);
      border-radius: 28px;
      overflow: hidden;
      box-shadow: 0 30px 90px rgba(0,0,0,0.55);
    }
    .auth-hero {
      padding: 3rem;
      background: linear-gradient(180deg, rgba(201,169,110,0.07), transparent 38%),
                  linear-gradient(90deg, rgba(255,255,255,0.03), transparent 80%);
      display: flex;
      flex-direction: column;
      justify-content: center;
      gap: 1.5rem;
    }
    .eyebrow {
      display: inline-flex;
      align-items: center;
      gap: .75rem;
      font-size: .7rem;
      letter-spacing: .3em;
      text-transform: uppercase;
      color: var(--gold);
    }
    .eyebrow::before {
      content: '';
      width: 1.75rem;
      height: 1px;
      background: rgba(201,169,110,0.5);
    }
    .hero-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: clamp(3rem, 4vw, 4.75rem);
      line-height: 0.92;
      letter-spacing: -.04em;
      margin: 0;
    }
    .hero-copy {
      max-width: 36rem;
      font-size: 1rem;
      line-height: 1.85;
      color: var(--muted);
    }
    .hero-meta {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 1rem;
      margin-top: 1rem;
    }
    .meta-pill {
      padding: 1rem 1.25rem;
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 16px;
      background: rgba(255,255,255,0.03);
      color: var(--cream);
      font-size: .85rem;
    }
    .auth-panel {
      padding: 3rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      gap: 1.5rem;
    }
    .auth-panel h1 {
      margin: 0 0 1rem;
      font-size: clamp(2rem, 3vw, 2.75rem);
      letter-spacing: -.03em;
    }
    .auth-panel p {
      margin: 0 0 2rem;
      color: var(--muted);
      line-height: 1.8;
    }
    .form-field {
      display: grid;
      gap: .5rem;
      margin-top: 1rem;
    }
    label {
      font-size: .75rem;
      letter-spacing: .12em;
      text-transform: uppercase;
      color: var(--muted);
    }
    input {
      width: 100%;
      border-radius: 14px;
      border: 1px solid rgba(201,169,110,0.18);
      background: rgba(255,255,255,0.03);
      padding: 1rem 1.1rem;
      color: var(--cream);
      font-size: 1rem;
    }
    input:focus {
      outline: none;
      border-color: rgba(201,169,110,0.85);
      box-shadow: 0 0 0 3px rgba(201,169,110,0.12);
    }
    .button-row {
      margin-top: 1.5rem;
    }
    button {
      width: 100%;
      border: none;
      border-radius: 14px;
      padding: 1rem 1.25rem;
      background: var(--gold);
      color: var(--bg);
      text-transform: uppercase;
      letter-spacing: .18em;
      font-weight: 700;
      cursor: pointer;
    }
    .links {
      display: flex;
      flex-wrap: wrap;
      gap: .75rem;
      align-items: center;
      justify-content: space-between;
      margin-top: 1.5rem;
    }
    .links a {
      color: var(--gold);
      text-decoration: none;
      font-size: .9rem;
    }
    .muted {
      color: var(--muted);
      font-size: .88rem;
    }
    .errors {
      background: rgba(255,68,68,0.12);
      border: 1px solid rgba(255,68,68,0.35);
      padding: 1rem 1.1rem;
      border-radius: 14px;
      color: #FFD0D0;
      font-size: .95rem;
      line-height: 1.6;
    }
    .field-error {
      color: #FFB3B3;
      font-size: .85rem;
      margin-top: .5rem;
    }
    @media (max-width: 900px) {
      .auth-card { grid-template-columns: 1fr; }
      .auth-hero { padding: 2.5rem; }
      .auth-panel { padding: 2.5rem; }
    }
  </style>
</head>
<body>
  <main class="auth-card">
    <section class="auth-hero">
      <span class="eyebrow">NOIR. LOGIN</span>
      <h1 class="hero-title">Backstage access<br />for modern silhouettes.</h1>
      <p class="hero-copy">Sign in and continue browsing the curated Noir edit. Your account keeps your orders, preferences, and private drops in one clean experience.</p>
      <div class="hero-meta">
        <span class="meta-pill">Secure access</span>
        <span class="meta-pill">Member experience</span>
      </div>
    </section>

    <section class="auth-panel">
      <h1>Log in</h1>
      <p>Use the form below to enter your account and continue shopping with the Noir collection.</p>

      @if ($errors->any())
        <div class="errors">
          <ul style="margin:0;padding-left:18px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ url('/login') }}">
        @csrf

        <div class="form-field">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus />
          @error('email')<div class="field-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-field">
          <label for="password">Password</label>
          <input id="password" name="password" type="password" required />
          @error('password')<div class="field-error">{{ $message }}</div>@enderror
        </div>

        <div class="button-row">
          <button type="submit">Log in</button>
        </div>

        <div style="margin-top: 1rem; text-align: center;">
          <a href="{{ route('auth.google') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.75rem 1.5rem; background: rgba(255,255,255,0.05); border: 1px solid rgba(201,169,110,0.18); border-radius: 14px; color: var(--cream); text-decoration: none; font-size: 0.9rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
              <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
              <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
              <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
            </svg>
            Continue with Google
          </a>
        </div>

        <div class="links">
          <a href="{{ url('/register') }}">Create account</a>
          <a href="{{ route('password.request') }}">Forgot password?</a>
          <span class="muted">Return to the Noir storefront anytime.</span>
        </div>
      </form>
    </section>
  </main>
</body>
</html>

