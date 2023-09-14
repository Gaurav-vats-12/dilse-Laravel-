

<input type="hidden" name="StripeKey" id="StripeKey" value="{{ Config::get('stripe.api_keys.key')}}">
<div id="express-checkout-element">
        <!-- A Stripe Element will be inserted here. -->
    <!-- <div class="group">
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
    </div> -->
    <div class="outcome">
      <div class="error"></div>
      <div class="success">
      </div>
    </div>
    </div>
    </div>
<style>
#card-element form {
  width: 480px;
  margin: 20px 0;
}

#card-element .group {
  margin-bottom: 20px;
}

#card-element label {
  position: relative;
  color: #8898AA;
  font-weight: 300;
  height: 40px;
  line-height: 40px;
  margin-left: 20px;
  display: flex;
  flex-direction: row;
}

#card-element .group label:not(:last-child) {
  border-bottom: 1px solid #F0F5FA;
}

#card-element label > span {
  width: 120px;
  margin-right: 30px;
}

#card-element label > span.brand {
  width: 30px;
}

#card-element .field {
  font-weight: 300;
  border: 0;
  outline: none;
  flex: 1;
  padding-right: 10px;
  padding-left: 10px;
  cursor: text;
}

#card-element .field::-webkit-input-placeholder {
  color: #CFD7E0;
}

#card-element .field::-moz-placeholder {
  color: #CFD7E0;
}


.outcome {
  float: left;
  width: 100%;
  padding-top: 8px;
  min-height: 24px;
  text-align: center;
}

.success,
 {
  display: none;
  font-size: 13px;
}

.success.visible,
.error.visible {
  display: inline;
}

.error {
  color: #E4584C;
}

.success {
  color: #666EE8;
    display: none;
}

.success .token {
  font-weight: 500;
  font-size: 13px;
}
</style>
