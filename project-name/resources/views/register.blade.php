<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
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
      background: radial-gradient(circle at top, rgba(201,169,110,0.1), transparent 35%),
                  linear-gradient(180deg, #0A0A0A 0%, #050505 100%);
      color: var(--cream);
      display: grid;
      place-items: center;
      padding: 1.5rem;
    }
    .auth-card {
      width: min(1220px, 100%);
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
      <span class="eyebrow">NOIR. REGISTER</span>
      <h1 class="hero-title">Join the Noir edit<br />and shop with confidence.</h1>
      <p class="hero-copy">Create your account to unlock private access, manage orders, and receive curated updates from the Noir collection.</p>
      <div class="hero-meta">
        <span class="meta-pill">Member benefits</span>
        <span class="meta-pill">Faster checkout</span>
      </div>
    </section>

    <section class="auth-panel">
      <h1>Create account</h1>
      <p>Complete this form to set up your profile and begin shopping the latest Noir arrivals.</p>

      @if ($errors->any())
        <div class="errors">
          <ul style="margin:0;padding-left:18px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ url('/register') }}">
        @csrf

        <div class="form-field">
          <label for="name">Name</label>
          <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus />
          @error('name')<div class="field-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-field">
          <label for="email">Email</label>
          <input id="email" name="email" type="email" value="{{ old('email') }}" required />
          @error('email')<div class="field-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-field">
          <label for="password">Password</label>
          <input id="password" name="password" type="password" required />
          @error('password')<div class="field-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-field">
          <label for="password_confirmation">Confirm Password</label>
          <input id="password_confirmation" name="password_confirmation" type="password" required />
        </div>

        <div class="form-field">
          <label for="address">Address</label>
          <input id="address" name="address" type="text" value="{{ old('address') }}" required />
          @error('address')<div class="field-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-field">
          <label for="phone">Phone</label>
          <input id="phone" name="phone" type="text" value="{{ old('phone') }}" required />
          @error('phone')<div class="field-error">{{ $message }}</div>@enderror
        </div>

        <div class="form-field">
          <label for="age">Age</label>
          <input id="age" name="age" type="text" value="{{ old('age') }}" required />
          @error('age')<div class="field-error">{{ $message }}</div>@enderror
        </div>

        <div class="button-row">
          <button type="submit">Register</button>
        </div>

        <div class="links">
          <a href="{{ url('/login') }}">I already have an account</a>
          <span class="muted">Only /login and /register are enabled</span>
        </div>
      </form>
    </section>
  </main>
</body>
</html>

