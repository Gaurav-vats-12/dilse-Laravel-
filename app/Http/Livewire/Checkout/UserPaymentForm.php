<?php

namespace App\Http\Livewire\Checkout;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UserPaymentForm extends Component
{
    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */

    public function render()
    {
        $subtotal =0;
        foreach(session('cart') as $id => $details) $subtotal = $subtotal + $details["price"] *  $details["quantity"];
        return view('livewire.checkout.user-paymnet-form',compact('subtotal'));
    }
}
