<?php

namespace App\Modules\Users\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class UserAppLayout extends Component
{
  /**
   * Get the view / contents that represents the component.
   * @return View
   */
    public function render(): View
    {
        return view('user.layouts.app');
    }
}
