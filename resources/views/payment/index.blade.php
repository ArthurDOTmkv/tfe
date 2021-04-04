@extends('layouts.main')

@section('script')
    <!-- Inclus la détection de fraude -->
    <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
    <div class="col-md-12">
        <h1>Page de paiement</h1>
        <div class="row">
            <div class="col-md-6">
                <form class="my-2" action="#">
                    <div id="card-element">
                        <!-- Elements will create Input elements here-->
                    </div>
                    <div id="card-errors" role="alert">
                        <!-- We'll put the error messages in this element-->
                    </div>
                    <button id='submit' class="btn btn-secondary mt-6 mt-4">Payer</button>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        var stripe = Stripe('pk_test_51IbU2DFyQMpZqbpyblriff2lgqkKyVeKFRmQVSFCyFXfxILaItMTgD5LYxlgUWsE4BS0oeWpfqSFBllIv0Qb52TH00FRMZnIEb');
        var elements = stripe.elements();
          
        var style = {
            base: {
              color: "#32325d",
              fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
              fontSmoothing: "antialiased",
              fontSize: "16px",
              "::placeholder": {
                color: "#aab7c4"
              }
            },
            invalid: {
              color: "#fa755a",
              iconColor: "#fa755a"
            }
        };
    
        var card = elements.create("card", { style: style });
        card.mount("#card-element");
    </script>
@endsection