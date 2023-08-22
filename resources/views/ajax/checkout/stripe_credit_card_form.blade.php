
<input type="hidden" name="StripeKey" id="StripeKey" value="pk_test_51Ng3mqJhLKjdolzELxiiUuoQAeIh37PT6KR6QFkiSVF7thLp85BG0oN0t4INLtwW0X0ggOC1dZE2uUq8FEE1t2a200WqliAM32">

<div id="card-element">
        <!-- A Stripe Element will be inserted here. -->
   <input type="hidden" name="stripeToken" />
    <div class="group">
      <label>
        <span>Card number</span>
        <div id="card-number-element" class="field"></div>
        <span class="brand"><i class="pf pf-credit-card" id="brand-icon"></i></span>
      </label>
      <label>
        <span>Expiry date</span>
        <div id="card-expiry-element" class="field"></div>
      </label>
      <label>
        <span>CVC</span>
        <div id="card-cvc-element" class="field"></div>
      </label>
      <label>
        <span>Postal code</span>
        <input id="postal-code" name="postal_code" class="field" placeholder="90210" />
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
<style>
#card-element form {
  width: 480px;
  margin: 20px 0;
}

#card-element .group {
  /* background: white;
  box-shadow: 0 7px 14px 0 rgba(49, 49, 93, 0.10), 0 3px 6px 0 rgba(0, 0, 0, 0.08);
  border-radius: 4px; */
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
  /* color: #0000!important; */
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
.error {
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
}

.success .token {
  font-weight: 500;
  font-size: 13px;
}
</style>
