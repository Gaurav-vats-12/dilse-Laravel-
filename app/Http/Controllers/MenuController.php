<?php

namespace App\Http\Controllers;

use App\Models\Admin\FoodItem;
use App\Models\Admin\Menu;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as AuthAlias;
use Illuminate\Support\Facades\Session;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class MenuController extends Controller
{
  /**
   * @param Request $request
   * @param string $slug
   * @return View|Application|Factory|JsonResponse|string|\Illuminate\Contracts\Foundation\Application
   * @throws ContainerExceptionInterface
   * @throws NotFoundExceptionInterface
   */
  public function menu(Request $request, string $slug = ''): View|Application|Factory|\Illuminate\Http\JsonResponse|string|\Illuminate\Contracts\Foundation\Application
  {
        $order_type = session()->get('order_type');
        if ($request->ajax()) {
            $slug = $request->slug;
            $current_url = $request->current_url;
            if ($current_url == 'home') {
                session()->put('order_type', $request->type);
                Session::forget('deliveryCost');
                $slug = 'appetizers';
                $menu_id = Menu::where('menu_slug', $slug)->first()->id;
                $FoodItem = FoodItem::where('menu_id', $menu_id)->where('extra_items', 0)->where('status', 1)->paginate(20);
                return view('Pages.menu', compact('FoodItem', 'slug'))->render();
            } else if ($current_url == 'cart.view') {
                $authType = AuthAlias::guard('user')->check();
                $loginroute = AuthAlias::guard('user')->check() ? route('checkout.view') : route('user.login');
                session()->put('order_type', $request->type);
                return response()->json(['code' => 200, 'status' => 'success', 'url' => $loginroute]);
            } else {
                $Menu = Menu::where('menu_slug', $slug)->first();
                if (!$Menu) {
                    abort(404);
                }
                $FoodItem = $Menu->products()->where('extra_items', 0)->where('status', 1)->paginate(20); // Change 10 to your desired number of products per page.
                return view('ajax.menufooditems', ['FoodItem' => $FoodItem, 'slug' => $slug])->render();
            }
        } else {
            $menu_id = Menu::where('menu_slug', $slug)->first()->id;
            $FoodItem = FoodItem::where('menu_id', $menu_id)->where('extra_items', 0)->where('status', 1)->paginate(20);
            return view('Pages.menu', ['FoodItem' => $FoodItem, 'slug' => $slug]);
        }
    }

  /**
   * @param string $id
   * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
   */
  public function menudetails(string $id): View | Application | Factory | \Illuminate\Contracts\Foundation\Application
    {
        $food_details = FoodItem::where('slug', $id)->first();
        $related_product = FoodItem::where('menu_id', $food_details->menu_id)->where('extra_items', 0)->where('status', 1)->get();
        return view('Pages.details', compact('food_details', 'related_product'));
    }
}
