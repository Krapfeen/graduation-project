<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public $name;
    public $email;

    public function index(Request $request, $id)
    {
        $product = Product::query()->find($id);
        return view('product.order', ['product' => $product]);
    }

    public function add()
    {
        $name = $_GET['name'];
        $email = $_GET['email'];
        $gameName = $_GET['game'];
        $game = Product::query()->where('name', '=', $gameName)->get();
        $order = new Order();

        $order->name = $name;
        $order->email = $email;
        $order->product_id = $game[0]->id;
        $order->user_id = Auth::user()->id;
        $order->save();
        return view('index');
    }

    public function show(Product $product)
    {
        $orders = Order::query()->get();
        return view('order.list', ['orders' => $orders]);
    }

    public function destroy($id)
    {
        Order::query()->find($id)->delete();
        return redirect()->route('order.list');
    }
}
