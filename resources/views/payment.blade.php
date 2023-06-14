@extends('layouts.master')

@section('payment')

<?php $id = $_GET['form-id'];
 $a = DB::table('policy')->where('unique_id', $id)->first(); ?>
<link rel="stylesheet" href="{{ asset('assets/css/card.css') }}" />
<script src="https://js.stripe.com/v3/"></script>
<style type="text/css">
    .form-row {
    display: contents !important;
    margin-right: 0px !important;
    margin-left: 0px !important;
}
#contain{
    padding: 50px 350px !important;
}
</style>
<?php $price = DB::table('price')->where('id', 1)->first(); ?>
<form action="{{ url('charge') }}" method="post" id="payment-form">
    <div class="container" id="contain">
        <h1>Make Payment</h1>
        <div class="form-row">
            <p><input type="text" name="amount" placeholder="Enter Amount" value="<?php echo $price->deal_price; ?>" readonly="readonly" /></p>
            <p><input type="email" name="email" placeholder="Enter Email" value="<?php echo $a->email; ?>" readonly="readonly" /></p>
            <p style="display: none;"><input type="text" name="unique_id" placeholder="" value="<?php echo $id ?>" /></p>
            <label for="card-element">
            Credit or debit card
            </label>
            <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
            </div>
         
            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
        </div>
        <center><button class="button" style="margin-top: 40px;">Submit Payment</button></center>
        {{ csrf_field() }}
    </div>
</form>
<?php $stripe = DB::table('stripe')->where('id', 1)->first(); ?>
<script>
var publishable_key = "<?php echo $stripe->values; ?>";
</script>
<script src="{{ asset('assets/js/card.js') }}"></script>

@endsection