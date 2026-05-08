<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile - NOIR.</title>
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
      padding: 2rem;
    }
    .container {
      max-width: 1000px;
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
    .profile-card {
      background: rgba(15,15,15,0.96);
      border: 1px solid rgba(201,169,110,0.14);
      border-radius: 16px;
      padding: 2rem;
      margin-bottom: 2rem;
      display: grid;
      grid-template-columns: 200px 1fr;
      gap: 2rem;
      align-items: start;
    }
    .profile-avatar {
      width: 200px;
      height: 200px;
      background: var(--gold-soft);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 4rem;
      font-weight: 300;
      color: var(--gold);
      border: 2px solid var(--gold);
    }
    .profile-info h2 {
      font-family: 'Cormorant Garamond', serif;
      font-size: 2rem;
      font-weight: 500;
      margin: 0 0 1rem;
      color: var(--gold);
    }
    .profile-details {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1rem;
      margin-bottom: 2rem;
    }
    .detail-item {
      background: rgba(255,255,255,0.02);
      padding: 1rem;
      border-radius: 8px;
      border: 1px solid rgba(201,169,110,0.08);
    }
    .detail-label {
      font-weight: 500;
      color: var(--muted);
      font-size: 0.9rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 0.25rem;
    }
    .detail-value {
      color: var(--cream);
      font-size: 1rem;
      margin: 0;
    }
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: 1rem;
      margin-bottom: 2rem;
    }
    .stat-card {
      background: rgba(255,255,255,0.02);
      padding: 1.5rem;
      border-radius: 8px;
      border: 1px solid rgba(201,169,110,0.08);
      text-align: center;
    }
    .stat-number {
      font-size: 2rem;
      font-weight: 600;
      color: var(--gold);
      margin: 0;
    }
    .stat-label {
      color: var(--muted);
      font-size: 0.9rem;
      margin: 0.5rem 0 0;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .btn {
      padding: 0.75rem 1.5rem;
      border: none;
      border-radius: 8px;
      font-family: inherit;
      font-size: 1rem;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.2s ease;
      text-decoration: none;
      display: inline-block;
      text-align: center;
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
    .btn-group {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
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
    .member-since {
      color: var(--muted);
      font-size: 0.9rem;
      margin-top: 1rem;
    }
    @media (max-width: 768px) {
      .profile-card {
        grid-template-columns: 1fr;
        text-align: center;
      }
      .profile-avatar {
        width: 150px;
        height: 150px;
        font-size: 3rem;
        margin: 0 auto;
      }
      .btn-group {
        justify-content: center;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="{{ url('/') }}" class="back-link">← Back to Noir</a>

    <div class="header">
      <h1>My Profile</h1>
      <p>Your Noir account overview and activity.</p>
    </div>

    <div class="profile-card">
      <div class="profile-avatar">
        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
      </div>
      <div class="profile-info">
        <h2>{{ auth()->user()->name }}</h2>
        <div class="profile-details">
          <div class="detail-item">
            <div class="detail-label">Email</div>
            <div class="detail-value">{{ auth()->user()->email }}</div>
          </div>
          <div class="detail-item">
            <div class="detail-label">Phone</div>
            <div class="detail-value">{{ auth()->user()->phone ?? 'Not provided' }}</div>
          </div>
          <div class="detail-item">
            <div class="detail-label">Address</div>
            <div class="detail-value">{{ auth()->user()->address ?? 'Not provided' }}</div>
          </div>
          <div class="detail-item">
            <div class="detail-label">Age</div>
            <div class="detail-value">{{ auth()->user()->age ?? 'Not provided' }}</div>
          </div>
        </div>
        <div class="member-since">
          Member since {{ auth()->user()->created_at->format('F Y') }}
        </div>
      </div>
    </div>

    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-number">0</div>
        <div class="stat-label">Orders</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">0</div>
        <div class="stat-label">Items in Cart</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">0</div>
        <div class="stat-label">Wishlist Items</div>
      </div>
      <div class="stat-card">
        <div class="stat-number">0</div>
        <div class="stat-label">Reviews</div>
      </div>
    </div>

    <div class="btn-group">
      <a href="{{ route('settings') }}" class="btn btn-primary">Edit Settings</a>
      <a href="{{ route('cart') }}" class="btn btn-secondary">View Cart</a>
      <a href="{{ route('orders') }}" class="btn btn-secondary">Order History</a>
      <a href="{{ route('logout') }}" class="btn btn-secondary" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
    </div>
  </div>
</body>
</html>