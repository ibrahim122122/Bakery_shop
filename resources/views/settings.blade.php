<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Settings - NOIR.</title>
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
      --error: #ff6b6b;
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
      max-width: 800px;
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
    .settings-section {
      background: rgba(15,15,15,0.96);
      border: 1px solid rgba(201,169,110,0.14);
      border-radius: 16px;
      padding: 2rem;
      margin-bottom: 2rem;
    }
    .section-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.8rem;
      font-weight: 500;
      margin: 0 0 1.5rem;
      color: var(--gold);
    }
    .form-group {
      margin-bottom: 1.5rem;
    }
    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 500;
      color: var(--cream);
    }
    .form-group input,
    .form-group textarea,
    .form-group select {
      width: 100%;
      padding: 0.75rem;
      background: rgba(255,255,255,0.05);
      border: 1px solid rgba(201,169,110,0.18);
      border-radius: 8px;
      color: var(--cream);
      font-family: inherit;
      font-size: 1rem;
    }
    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
      outline: none;
      border-color: var(--gold);
      box-shadow: 0 0 0 2px rgba(201,169,110,0.2);
    }
    .form-group textarea {
      resize: vertical;
      min-height: 100px;
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
      margin-top: 2rem;
    }
    .notification-preferences {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1rem;
    }
    .preference-item {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }
    .preference-item input[type="checkbox"] {
      width: auto;
      margin: 0;
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
    @media (max-width: 768px) {
      .btn-group {
        flex-direction: column;
      }
      .notification-preferences {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="{{ url('/') }}" class="back-link">← Back to Noir</a>

    <div class="header">
      <h1>Account Settings</h1>
      <p>Manage your Noir account preferences and information.</p>
    </div>

    <form method="POST" action="{{ route('settings.update') }}">
      @csrf
      <div class="settings-section">
        <h2 class="section-title">Personal Information</h2>
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="phone" value="{{ auth()->user()->phone ?? '' }}">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <textarea id="address" name="address">{{ auth()->user()->address ?? '' }}</textarea>
        </div>
        <div class="form-group">
          <label for="age">Age</label>
          <input type="number" id="age" name="age" value="{{ auth()->user()->age ?? '' }}" min="13" max="120">
        </div>
      </div>

      <div class="settings-section">
        <h2 class="section-title">Notification Preferences</h2>
        <div class="notification-preferences">
          <div class="preference-item">
            <input type="checkbox" id="email_newsletter" name="email_newsletter" checked>
            <label for="email_newsletter">Email newsletter</label>
          </div>
          <div class="preference-item">
            <input type="checkbox" id="order_updates" name="order_updates" checked>
            <label for="order_updates">Order updates</label>
          </div>
          <div class="preference-item">
            <input type="checkbox" id="new_arrivals" name="new_arrivals" checked>
            <label for="new_arrivals">New arrivals</label>
          </div>
          <div class="preference-item">
            <input type="checkbox" id="promotions" name="promotions">
            <label for="promotions">Promotional offers</label>
          </div>
        </div>
      </div>

      <div class="settings-section">
        <h2 class="section-title">Privacy & Security</h2>
        <div class="form-group">
          <label for="current_password">Current Password (required for changes)</label>
          <input type="password" id="current_password" name="current_password">
        </div>
        <div class="form-group">
          <label for="new_password">New Password (leave blank to keep current)</label>
          <input type="password" id="new_password" name="new_password">
        </div>
        <div class="form-group">
          <label for="confirm_password">Confirm New Password</label>
          <input type="password" id="confirm_password" name="confirm_password">
        </div>
      </div>

      <div class="btn-group">
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="{{ route('profile') }}" class="btn btn-secondary">View Profile</a>
      </div>
    </form>

    <div class="settings-section">
      <h2 class="section-title">Account Actions</h2>
      <div class="btn-group">
        <a href="{{ route('logout') }}" class="btn btn-secondary" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
        <button type="button" class="btn btn-secondary" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">Delete Account</button>
      </div>
    </div>
  </div>
</body>
</html>