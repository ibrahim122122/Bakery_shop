<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Logout - NOIR.</title>
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
      padding: 2rem;
    }
    .logout-card {
      background: rgba(15,15,15,0.96);
      border: 1px solid rgba(201,169,110,0.14);
      border-radius: 28px;
      padding: 3rem;
      text-align: center;
      max-width: 500px;
      width: 100%;
      box-shadow: 0 30px 90px rgba(0,0,0,0.55);
    }
    .logout-card h1 {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2.5rem;
      font-weight: 400;
      margin: 0 0 1rem;
      color: var(--gold);
    }
    .logout-card p {
      color: var(--muted);
      font-size: 1.1rem;
      margin: 0 0 2rem;
      line-height: 1.6;
    }
    .user-info {
      background: rgba(255,255,255,0.02);
      padding: 1.5rem;
      border-radius: 12px;
      margin-bottom: 2rem;
      border: 1px solid rgba(201,169,110,0.08);
    }
    .user-name {
      font-weight: 500;
      color: var(--cream);
      margin: 0;
    }
    .user-email {
      color: var(--muted);
      font-size: 0.9rem;
      margin: 0.25rem 0 0;
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
      margin: 0 0.5rem;
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
    .btn-group {
      display: flex;
      justify-content: center;
      gap: 1rem;
      flex-wrap: wrap;
    }
    .back-link {
      position: absolute;
      top: 2rem;
      left: 2rem;
      color: var(--gold);
      text-decoration: none;
      font-weight: 500;
    }
    .back-link:hover {
      text-decoration: underline;
    }
    @media (max-width: 768px) {
      .btn-group {
        flex-direction: column;
      }
      .btn {
        margin: 0.25rem 0;
      }
      .back-link {
        position: static;
        display: block;
        margin-bottom: 2rem;
        text-align: center;
      }
    }
  </style>
</head>
<body>
  <a href="{{ url('/') }}" class="back-link">← Back to Noir</a>

  <div class="logout-card">
    <h1>Goodbye for now.</h1>
    <p>Thank you for being part of the Noir community. Your session has been securely ended.</p>

    <div class="user-info">
      <p class="user-name">Logged out: {{ auth()->user()->name }}</p>
      <p class="user-email">{{ auth()->user()->email }}</p>
    </div>

    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
      @csrf
      <div class="btn-group">
        <button type="submit" class="btn btn-primary">Confirm Logout</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Stay Logged In</a>
      </div>
    </form>
  </div>
</body>
</html>