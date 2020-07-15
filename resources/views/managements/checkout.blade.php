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

            <table class="table table-cart">
            <tbody valign="middle">

                <tr>
                <td>
                    <div class="{{ $plan->color }} text-white text-center lead p-3">{{ $plan->name }}</div>
                </td>

                <td>
                    <h5>ViralGet Subscription</h5>
                    <p>{{ $plan->name }} plan</p>
                </td>

                <td>
                    <h4 class="price">{!! $plan->currencyAmount !!}</h4>
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
                <p>{!! $plan->currencyAmount !!}</p>
                </div>
            </div>

            <hr>

            <div class="flexbox">
                <div>
                <p><strong>Total:</strong></p>
                </div>

                <div>
                <p class="fw-600">{!! $plan->currencyAmount !!}</p>
                </div>
            </div>
            </div>

            <div class="row">

            <div class="col-12">
                <button class="btn btn-block btn-primary" onclick="payWithPaystack()" type="button">Checkout <i class="ti-angle-right fs-9"></i></button>
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
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: '{{ env("PAYSTACK_PK") }}',
      email: '{{ $email }}',
      amount: {{ $plan->price * 100 }},
      currency: "NGN",
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
          window.location = '/subscribe/confirm/'+ response.reference;
      },
    });
    handler.openIframe();
  }
</script>
@endsection