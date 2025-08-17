<script src="https://js.stripe.com/v3/"></script>

<style>
    .payment-container {
        max-width: 500px;
        margin: 50px auto;
        padding: 20px;
        background: #fff8f0;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    .payment-title {
        text-align: center;
        font-size: 1.6rem;
        font-weight: bold;
        color: #4b3832;
        margin-bottom: 20px;
    }
    #card-element {
        padding: 12px;
        border: 1px solid #e0c7b1;
        border-radius: 6px;
        background: white;
        margin-bottom: 20px;
    }
    .pay-btn {
        background: #795548;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        font-size: 1rem;
        cursor: pointer;
        font-weight: 500;
        width: 100%;
        transition: background 0.2s ease;
    }
    .pay-btn:hover {
        background: #5d4037;
    }
</style>

<div class="payment-container">
    <h2 class="payment-title">Secure Payment</h2>
    <form id="payment-form">
        <div id="card-element"></div>
        <button type="submit" class="pay-btn">Pay ${{ number_format($total, 2) }}</button>
    </form>
</div>

<script>
    const stripe = Stripe('{{ env("STRIPE_KEY") }}');

    fetch('{{ route("payment.create-intent") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ amount: {{ $total * 100 }} }) // amount in cents
    })
    .then(res => res.json())
    .then(data => {
        const elements = stripe.elements();
        const card = elements.create('card', {
            style: {
                base: {
                    fontSize: '16px',
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif'
                }
            }
        });
        card.mount('#card-element');

        document.getElementById('payment-form').addEventListener('submit', async e => {
            e.preventDefault();

            const result = await stripe.confirmCardPayment(data.clientSecret, {
                payment_method: { card: card }
            });

            if (result.error) {
                alert(result.error.message);
            } else {
                window.location.href = '{{ route("payment.success") }}?payment_intent=' + result.paymentIntent.id;
            }
        });
    });
</script>
