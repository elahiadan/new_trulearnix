<style>
    .order-container {
        max-width: 700px;
        margin: 40px auto;
        padding: 20px 30px;
        background: #fffdf8;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        font-family: 'Segoe UI', sans-serif;
    }

    .order-header {
        border-bottom: 2px solid #eee0d5;
        margin-bottom: 20px;
        padding-bottom: 10px;
    }

    .order-header h3 {
        margin: 0;
        color: #4b3832;
    }

    .order-status {
        font-size: 0.9rem;
        padding: 5px 10px;
        border-radius: 6px;
        display: inline-block;
        margin-top: 6px;
    }

    .status-paid {
        background: #d4edda;
        color: #155724;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-failed {
        background: #f8d7da;
        color: #721c24;
    }

    .order-items {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .order-items li {
        padding: 12px 0;
        border-bottom: 1px solid #eee0d5;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .order-items li:last-child {
        border-bottom: none;
    }

    .total-section {
        margin-top: 20px;
        text-align: right;
        font-size: 1.1rem;
        font-weight: bold;
    }
</style>

<div class="order-container">
    <div class="order-header">
        <h3>Order #{{ $order->id }}</h3>
        <span class="order-status 
            {{ $order->payment_status === 'paid' ? 'status-paid' : '' }}
            {{ $order->payment_status === 'pending' ? 'status-pending' : '' }}
            {{ $order->payment_status === 'failed' ? 'status-failed' : '' }}">
            {{ ucfirst($order->payment_status) }}
        </span>
    </div>

    <ul class="order-items">
        @foreach($order->items as $item)
        <li>
            <span>{{ $item->product->name }} × {{ $item->quantity }}</span>
            <span>${{ number_format($item->price * $item->quantity, 2) }}</span>
        </li>
        @endforeach
    </ul>

    <div class="total-section">
        Total: {{ number_format($order->total_amount, 2) }} {{ strtoupper($order->currency) }}
    </div>
</div>