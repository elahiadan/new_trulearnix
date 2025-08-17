<style>
    .thankyou-container {
        max-width: 600px;
        margin: 60px auto;
        padding: 30px;
        background: #fffdf8;
        text-align: center;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        font-family: 'Segoe UI', sans-serif;
    }

    .thankyou-icon {
        font-size: 60px;
        color: #4caf50;
        margin-bottom: 15px;
    }

    .thankyou-title {
        font-size: 2rem;
        font-weight: bold;
        color: #4b3832;
        margin-bottom: 10px;
    }

    .thankyou-message {
        font-size: 1.1rem;
        color: #6d4c41;
        margin-bottom: 25px;
    }

    .continue-btn {
        display: inline-block;
        padding: 12px 25px;
        background: #795548;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 500;
        transition: background 0.2s ease;
    }

    .continue-btn:hover {
        background: #5d4037;
    }
</style>

<div class="thankyou-container">
    <div class="thankyou-icon">✅</div>
    <h2 class="thankyou-title">Thank you!</h2>
    <p class="thankyou-message">
        Your payment is being confirmed.<br>
        You’ll receive an email once it’s completed.
    </p>
    <a href="{{ route('products.index') }}" class="continue-btn">Continue Shopping</a>
</div>