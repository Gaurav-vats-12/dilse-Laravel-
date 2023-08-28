
<input type="hidden" name="StripeKey" id="StripeKey" value="{{Config::get('stripe.api_keys.key', '')}}">
<div id="card-element">
    <div class="group">
      <label>
        <span>Card number</span>
        <div id="card-number-element" class="field cusstom_input"></div>
        <span class="brand"><i class="pf pf-credit-card" id="brand-icon"></i></span>
      </label>
      <label>
        <span>Expiry date</span>
        <div id="card-expiry-element" class="field cusstom_input"></div>
      </label>
      <label>
        <span>CVC</span>
        <div id="card-cvc-element" class="field"></div>
      </label>
    </div>
    <div class="outcome">
      <div class="error"></div>
      <div class="success">
        Success! Your Stripe token is <span class="token"></span>
      </div>
    </div>
    </div>
    </div>
