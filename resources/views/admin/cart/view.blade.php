<style>
    .cart-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 20px;
        background: #fff8f0;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .cart-title {
        text-align: center;
        font-size: 1.8rem;
        font-weight: bold;
        color: #4b3832;
        margin-bottom: 20px;
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #e0c7b1;
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    .item-name {
        font-size: 1rem;
        color: #3e2723;
        font-weight: 500;
    }

    .item-quantity {
        color: #6d4c41;
        font-size: 0.9rem;
    }

    .item-total {
        font-weight: bold;
        color: #2e7d32;
    }

    .checkout-button {
        display: block;
        margin: 25px auto 0;
        background: #795548;
        color: white;
        padding: 10px 20px;
        border-radius: 6px;
        text-align: center;
        text-decoration: none;
        font-weight: 500;
        width: fit-content;
        transition: background 0.2s ease;
    }

    .checkout-button:hover {
        background: #5d4037;
    }
</style>

<div class="cart-container">
    <h2 class="cart-title">🛒 Your Cart</h2>

    @foreach($cart as $item)
    <div class="cart-item">
        <div>
            <span class="item-name">{{ $item['name'] }}</span>
            <span class="item-quantity">× {{ $item['quantity'] }}</span>
        </div>
        <span class="item-total">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
    </div>
    @endforeach

    <a href="{{ route('checkout.index') }}" class="checkout-button">Proceed to Checkout</a>
</div>