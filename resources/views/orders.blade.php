<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Order History - NOIR.</title>
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
    .orders-section {
      background: rgba(15,15,15,0.96);
      border: 1px solid rgba(201,169,110,0.14);
      border-radius: 16px;
      padding: 2rem;
      margin-bottom: 2rem;
    }
    .order-card {
      border-bottom: 1px solid rgba(201,169,110,0.08);
      padding: 1.5rem 0;
      display: grid;
      grid-template-columns: 1fr auto;
      gap: 2rem;
      align-items: start;
    }
    .order-card:last-child {
      border-bottom: none;
    }
    .order-info h3 {
      margin: 0 0 0.5rem;
      color: var(--cream);
      font-size: 1.1rem;
    }
    .order-meta {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: 1rem;
      margin-bottom: 1rem;
    }
    .meta-item {
      color: var(--muted);
      font-size: 0.9rem;
    }
    .meta-label {
      color: var(--gold);
      font-weight: 500;
      font-size: 0.8rem;
      text-transform: uppercase;
      display: block;
      margin-bottom: 0.25rem;
    }
    .order-status {
      display: inline-block;
      padding: 0.5rem 1rem;
      border-radius: 20px;
      font-size: 0.85rem;
      font-weight: 500;
    }
    .status-pending {
      background: rgba(255,193,7,0.2);
      color: #ffc107;
    }
    .status-processing {
      background: rgba(33,150,243,0.2);
      color: #2196f3;
    }
    .status-shipped {
      background: rgba(76,175,80,0.2);
      color: #4caf50;
    }
    .status-delivered {
      background: rgba(81,207,102,0.2);
      color: var(--success);
    }
    .order-total {
      text-align: right;
    }
    .order-price {
      font-size: 1.5rem;
      font-weight: 600;
      color: var(--gold);
      margin-bottom: 1rem;
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
    .empty-state {
      text-align: center;
      padding: 3rem;
      color: var(--muted);
    }
    .empty-state h2 {
      color: var(--gold);
      margin-bottom: 1rem;
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
      .order-card {
        grid-template-columns: 1fr;
      }
      .order-total {
        text-align: left;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="{{ route('profile') }}" class="back-link">← Back to Profile</a>

    <div class="header">
      <h1>Order History</h1>
      <p>Track and manage your Noir purchases.</p>
    </div>

    <div class="orders-section" id="orders-container">
      <div class="empty-state">
        <div style="font-size: 3rem; margin-bottom: 1rem;">📦</div>
        <h2>No Orders Yet</h2>
        <p>You haven't placed any orders yet. Start shopping with Noir today!</p>
        <a href="{{ route('shop') }}" class="btn btn-primary" style="margin-top: 1rem;">Shop Collection</a>
      </div>
    </div>
  </div>

  <script>
    // Order history functionality
    document.addEventListener('DOMContentLoaded', function() {
      const ordersContainer = document.getElementById('orders-container');

      // Mock orders data (replace with actual API)
      const mockOrders = [
        {
          id: '#NO-001',
          date: '2026-05-01',
          items: 2,
          total: 570,
          status: 'delivered',
          statusLabel: 'Delivered'
        },
        {
          id: '#NO-002',
          date: '2026-04-28',
          items: 1,
          total: 120,
          status: 'delivered',
          statusLabel: 'Delivered'
        }
      ];

      // Uncomment to show mock orders
      if (mockOrders.length > 0) {
        const ordersHTML = mockOrders.map(order => `
          <div class="order-card">
            <div class="order-info">
              <h3>Order ${order.id}</h3>
              <div class="order-meta">
                <div class="meta-item">
                  <span class="meta-label">Order Date</span>
                  ${new Date(order.date).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })}
                </div>
                <div class="meta-item">
                  <span class="meta-label">Items</span>
                  ${order.items} item${order.items !== 1 ? 's' : ''}
                </div>
                <div class="meta-item">
                  <span class="meta-label">Status</span>
                  <span class="order-status status-${order.status}">${order.statusLabel}</span>
                </div>
              </div>
            </div>
            <div class="order-total">
              <div class="order-price">$${order.total.toFixed(2)}</div>
              <button class="btn btn-secondary" onclick="viewOrder('${order.id}')">View Details</button>
            </div>
          </div>
        `).join('');

        ordersContainer.innerHTML = ordersHTML;
      }
    });

    function viewOrder(orderId) {
      alert(`Viewing order ${orderId} - This functionality will be implemented with the backend.`);
    }
  </script>
</body>
</html>