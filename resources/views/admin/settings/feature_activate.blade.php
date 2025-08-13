@extends('admin.layouts.app')

@section('title', 'Feature Activate')
@section('content')
@section('row')
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Feature Activate</h2>

            </div>
        </div>
    </div>
@endsection
<h4 class="text-center text-muted">{{ 'System' }}</h4>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6 text-center">{{ 'HTTPS Activation' }}</h5>
            </div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'FORCE_HTTPS')" <?php if (env('FORCE_HTTPS') == 'On') {
                        echo 'checked';
                    } ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Maintenance Mode Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'maintenance_mode')" <?php if (get_setting('maintenance_mode') == 1) {
                        echo 'checked';
                    } ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Disable image encoding?' }}</h3>
            </div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'disable_image_optimization')"
                        <?php if (get_setting('disable_image_optimization') == 1) {
                            echo 'checked';
                        } ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
</div>


<h4 class="text-center text-muted mt-4">{{ 'Business Related' }}</h4>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Vendor System Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'vendor_system_activation')"
                        <?php if (get_setting('vendor_system_activation') == 1) {
                            echo 'checked';
                        } ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Classified Product' }}</h3>
            </div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'classified_product')" <?php if (get_setting('classified_product') == 1) {
                        echo 'checked';
                    } ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Wallet System Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'wallet_system')" <?php if (get_setting('wallet_system') == 1) {
                        echo 'checked';
                    } ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Coupon System Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'coupon_system')" <?php if (get_setting('coupon_system') == 1) {
                        echo 'checked';
                    } ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Pickup Point Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'pickup_point')" <?php if (get_setting('pickup_point') == 1) {
                        echo 'checked';
                    } ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Conversation Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'conversation_system')" <?php if (get_setting('conversation_system') == 1) {
                        echo 'checked';
                    } ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Vendor Product Manage By Admin' }}</h3>
            </div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'product_manage_by_admin')">
                    <span class="slider round"></span>
                </label>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'After activate this option Cash On Delivery of Vendor product will be managed by Admin' }}.
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Admin Approval On Vendor Product' }}</h3>
            </div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'product_approve_by_admin')">
                    <span class="slider round"></span>
                </label>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'After activate this option, Admin approval need to vendor product' }}.
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Email Verification' }}</h3>
            </div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'email_verification')" <?php if (get_setting('email_verification') == 1) {
                        echo 'checked';
                    } ?>>
                    <span class="slider round"></span>
                </label>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure SMTP correctly to enable this feature.' }} <a
                        href="{{ url('smtp_settings.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Product Query Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'product_query_activation')"
                        <?php if (get_setting('product_query_activation') == 1) {
                            echo 'checked';
                        } ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    @if (addon_is_activated('wholesale'))
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 h6 text-center">{{ 'Wholesale Product for Vendor' }}</h3>
                </div>
                <div class="card-body text-center">
                    <label class="aiz-switch aiz-switch-success mb-0">
                        <input type="checkbox" onchange="updateSettings(this, 'vendor_wholesale_product')"
                            <?php if (get_setting('vendor_wholesale_product') == 1) {
                                echo 'checked';
                            } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    @endif
    @if (addon_is_activated('auction'))
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="mb-0 h6 text-center">{{ 'Auction Product for Vendor' }}</h3>
                </div>
                <div class="card-body text-center">
                    <label class="aiz-switch aiz-switch-success mb-0">
                        <input type="checkbox" onchange="updateSettings(this, 'vendor_auction_product')"
                            <?php if (get_setting('vendor_auction_product') == 1) {
                                echo 'checked';
                            } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    @endif
</div>

<h4 class="text-center text-muted mt-4">{{ 'Payment Related' }}</h4>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header text-center bord-btm">
                <h3 class="mb-0 h6 text-center">{{ 'Paypal Payment Activation' }}</h3>
            </div>
            <div class="card-body">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/paypal.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'paypal_payment')" <?php if (get_setting('paypal_payment') == 1) {
                            echo 'checked';
                        } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert text-center"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure Paypal correctly to enable this feature' }}. <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>



    {{-- PayU Payment Getway --}}



    <div class="col-lg-4">
        <div class="card">
            <div class="card-header text-center bord-btm">
                <h3 class="mb-0 h6 text-center">{{ 'PayU Payment Activation' }}</h3>
            </div>
            <div class="card-body">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/payu.jpg') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'payu_payment')" <?php if (get_setting('payu_payment') == 1) {
                            echo 'checked';
                        } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert text-center"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure PayU correctly to enable this feature' }}. <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Stripe Payment Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/stripe.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'stripe_payment')" <?php if (get_setting('stripe_payment') == 1) {
                            echo 'checked';
                        } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure Stripe correctly to enable this feature.' }} <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Mercadopago Payment Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/mercadopago.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'mercadopago_payment')"
                            <?php if (get_setting('mercadopago_payment') == 1) {
                                echo 'checked';
                            } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure Mercadopago correctly to enable this feature.' }} <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'SSlCommerz Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/sslcommerz.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'sslcommerz_payment')"
                            <?php if (get_setting('sslcommerz_payment') == 1) {
                                echo 'checked';
                            } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure SSlCommerz correctly to enable this feature.' }} <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Instamojo Payment Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/instamojo.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'instamojo_payment')"
                            <?php if (get_setting('instamojo_payment') == 1) {
                                echo 'checked';
                            } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure Instamojo Payment correctly to enable this feature' }}. <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Razor Pay Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/rozarpay.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'razorpay')" <?php if (get_setting('razorpay') == 1) {
                            echo 'checked';
                        } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure Razor correctly to enable this feature' }}. <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'PayStack Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/paystack.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'paystack')" <?php if (get_setting('paystack') == 1) {
                            echo 'checked';
                        } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure PayStack correctly to enable this feature' }}. <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'VoguePay Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/vogue.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'voguepay')" <?php if (get_setting('voguepay') == 1) {
                            echo 'checked';
                        } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure VoguePay correctly to enable this feature' }}. <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Payhere Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/payhere.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'payhere')" <?php if (get_setting('payhere') == 1) {
                            echo 'checked';
                        } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure Payhere correctly to enable this feature' }}. <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Ngenius Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/ngenius.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'ngenius')" <?php if (get_setting('ngenius') == 1) {
                            echo 'checked';
                        } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure Ngenius correctly to enable this feature' }}. <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Iyzico Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/iyzico.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'iyzico')" <?php if (get_setting('iyzico') == 1) {
                            echo 'checked';
                        } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure iyzico correctly to enable this feature' }}. <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Bkash Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/bkash.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'bkash')" <?php if (get_setting('bkash') == 1) {
                            echo 'checked';
                        } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure bkash correctly to enable this feature' }}. <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Nagad Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/nagad.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'nagad')" <?php if (get_setting('nagad') == 1) {
                            echo 'checked';
                        } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure nagad correctly to enable this feature' }}. <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Proxy Pay Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/proxypay.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'proxypay')" <?php if (get_setting('proxypay') == '1') {
                            echo 'checked';
                        } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure proxypay correctly to enable this feature' }}. <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Amarpay Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/aamarpay.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'aamarpay')"
                            @if (get_setting('aamarpay') == '1') checked @endif>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure amarpay correctly to enable this feature' }}. <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Authorize Net Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/authorizenet.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'authorizenet')" <?php if (get_setting('authorizenet') == 1) {
                            echo 'checked';
                        } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure authorize net correctly to enable this feature' }}. <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Payku Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/payku.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'payku')" <?php if (get_setting('payku') == 1) {
                            echo 'checked';
                        } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure payku net correctly to enable this feature' }}. <a
                        href="{{ url('payment_method.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Cash Payment Activation' }}</h3>
            </div>
            <div class="card-body text-center">
                <div class="clearfix">
                    <img class="float-left" src="{{ asset('assets/img/cards/cod.png') }}" height="30">
                    <label class="aiz-switch aiz-switch-success mb-0 float-right">
                        <input type="checkbox" onchange="updateSettings(this, 'cash_payment')" <?php if (get_setting('cash_payment') == 1) {
                            echo 'checked';
                        } ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        </div>
    </div>

</div>

<h4 class="text-center text-muted mt-4">{{ 'Social Media Login' }}</h4>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Facebook login' }}</h3>
            </div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'facebook_login')" <?php if (get_setting('facebook_login') == 1) {
                        echo 'checked';
                    } ?>>
                    <span class="slider round"></span>
                </label>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure Facebook Client correctly to enable this feature' }}. <a
                        href="{{ url('social_login.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Google login' }}</h3>
            </div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'google_login')" <?php if (get_setting('google_login') == 1) {
                        echo 'checked';
                    } ?>>
                    <span class="slider round"></span>
                </label>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure Google Client correctly to enable this feature' }}. <a
                        href="{{ url('social_login.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0 h6 text-center">{{ 'Twitter login' }}</h3>
            </div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'twitter_login')" <?php if (get_setting('twitter_login') == 1) {
                        echo 'checked';
                    } ?>>
                    <span class="slider round"></span>
                </label>
                <div class="alert"
                    style="color: #004085;background-color: #cce5ff;border-color: #b8daff;margin-bottom:0;margin-top:10px;">
                    {{ 'You need to configure Twitter Client correctly to enable this feature' }}. <a
                        href="{{ url('social_login.index') }}">{{ 'Configure Now' }}</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    function updateSettings(el, type) {
        if ($(el).is(':checked')) {
            var value = 1;
        } else {
            var value = 0;
        }

        $.post('{{ url('business_settings.update.activation') }}', {
            _token: '{{ csrf_token() }}',
            type: type,
            value: value
        }, function(data) {
            if (data == '1') {
                AIZ.plugins.notify('success', '{{ 'Settings updated successfully' }}');
            } else {
                AIZ.plugins.notify('danger', 'Something went wrong');
            }
        });
    }
</script>
@endsection
