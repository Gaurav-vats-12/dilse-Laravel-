<?php

namespace App\Http\Livewire\Checkout;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UserProductCartList extends Component
{

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function render()
    {
        return view('livewire.checkout.user-product-cart-list',['cart'=>session('cart')]);
    }
}
