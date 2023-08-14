<?php

namespace App\Http\Livewire\Checkout;

use Livewire\Component;

class UserCheckoutAddressForm extends Component
{

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.checkout.user-checkout-address-form');
    }
}
