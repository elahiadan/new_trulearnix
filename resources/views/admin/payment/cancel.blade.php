<style>
    .cancel-container {
        max-width: 600px;
        margin: 60px auto;
        padding: 30px;
        background: #fffdf8;
        text-align: center;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        font-family: 'Segoe UI', sans-serif;
    }

    .cancel-icon {
        font-size: 60px;
        color: #f44336;
        margin-bottom: 15px;
    }

    .cancel-title {
        font-size: 2rem;
        font-weight: bold;
        color: #4b3832;
        margin-bottom: 10px;
    }

    .cancel-message {
        font-size: 1.1rem;
        color: #6d4c41;
        margin-bottom: 25px;
    }

    .back-btn {
        display: inline-block;
        padding: 12px 25px;
        background: #795548;
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 500;
        transition: background 0.2s ease;
    }

    .back-btn:hover {
        background: #5d4037;
    }
</style>

<div class="cancel-container">
    <div class="cancel-icon">❌</div>
    <h2 class="cancel-title">Payment Canceled</h2>
    <p class="cancel-message">
        No charges were made.<br>
        You can retry checkout anytime.
    </p>
    <a href="{{ route('cart.view') }}" class="back-btn">Back to Cart</a>
</div>