@extends('layouts.app')

@section('content')

<header class="header bg-gray">
    <div class="container">
        <div class="row h-10">

            <h4>Checkout</h4>

        </div>
    </div>
</header>

<!-- Main Content -->
<main class="main-content">

    <section class="section">
        <div class="container">

            <div class="row gap-y">
                <div class="col-lg-8">
                    <div>
                        @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            <h3>{{session('success')}}</h3>
                        </div>
                        @endif
                    </div>
                    <table class="table table-cart">
                        <tbody valign="middle">

                            <tr>
                                <td>
                                    <div class="{{ $plan->color }} text-white text-center lead p-3">{{ $plan->name }}
                                    </div>
                                </td>

                                <td>
                                    <h5>ViralGet Subscription</h5>
                                    <p>{{ $plan->name }} plan</p>
                                </td>

                                <td>
                                    <h4 class="price price-value">{!! $plan->currencyAmount !!}</h4>
                                </td>
                            </tr>



                        </tbody>
                    </table>



                </div>


                <div class="col-lg-4">
                    <div class="cart-price">
                        <div class="flexbox">
                            <div>
                                <p><strong>Subtotal:</strong></p>
                            </div>

                            <div>
                                <p class="price-value">{!! $plan->currencyAmount !!}</p>
                            </div>
                        </div>

                        <hr>

                        <div class="flexbox">
                            <div>
                                <p><strong>Total:</strong></p>
                            </div>

                            <div>
                                <p class="fw-600 price-value">{!! $plan->currencyAmount !!}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">
                            <button class="btn btn-block btn-primary" onclick="payWithPaystack()" type="button">Checkout
                                <i class="ti-angle-right fs-9"></i></button>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </section>

</main>
@endsection
@section('scripts')
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
    let formatPaystack = true;
    let amount = {{ $plan->price }};
    let currency = 'NGN';

    if(checkCookie() && getCookie('location') !== 'NG'){
        formatPaystack = false;
        getEchangeRates();
    }
    
    if(!checkCookie() && !isNigeria()){
        formatPaystack = false;
        getEchangeRates();
    }

    if(formatPaystack === true){
        amount = {{ $plan->price * 100 }}
    }

    function payWithPaystack(){
        console.log(currency, amount);
        var handler = PaystackPop.setup({
            key: '{{ env("PAYSTACK_PK") }}',
            email: '{{ $email }}',
            amount: amount,
            currency: currency,
            metadata: {
                custom_fields: [
                    {
                        display_name: "Plan",
                        variable_name: "plan",
                        value: "{{ $plan->name }}"
                    }
                ]
            },
            callback: function(response) {
                // Event snippet for Website lead conversion page
                gtag('event', 'conversion', {
                'send_to': 'AW-668034109/hrE0CJfVjtABEL3Ixb4C',
                'value': amount,
                'currency': currency,
                'transaction_id': response.reference
                });

                window.location = '/subscribe/management/confirm/{{ $email }}/{{ request()->user_plan_id }}/'+ response.reference;
            },
        });
        handler.openIframe();
    }

    function getEchangeRates(){
        $.get("http://data.fixer.io/api/latest?access_key={{ env('EXCHANGE_RATE_ACCESS') }}&format=1", function (response) {
            amount = (amount / response.rates.NGN.toFixed(2)) * response.rates.USD.toFixed(2);
            amount = Math.ceil(amount);
            currency = 'USD';
            setDollarValue();
        }, "jsonp");
    }

    function isNigeria(){
        $.get("http://ipinfo.io?token={{ env('IP_TOKEN') }}", function (response) {
            setCookie('location', response.country, 1);
            console.log(response.country);
            if(response.country === 'NG'){
                return true
            }

            return false;
        }, "jsonp");
    }

    function setDollarValue(){
        var all = $(".price-value").map(function() {
        return this.innerHTML = `$${amount}`;
        }).get();
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
    
    function getCookie(cname = 'location') {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c=ca[i]; while (c.charAt(0)==' ' ) {
                c=c.substring(1); 
            } 

            if(c.indexOf(name)==0) { 
                return c.substring(name.length, c.length); 
            } 
        } 
        
        return "" ; 
    }

    function checkCookie() {
        var user=getCookie("location");
        if (user !="" ) {
            return true;
        } 
        return false;
    }

    function deleteCookie(cookieName = 'location'){
        document.cookie = "location=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
</script>
@endsection