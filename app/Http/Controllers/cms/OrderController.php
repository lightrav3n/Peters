<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\ConfigOrder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = ConfigOrder::query()->latest()->with('product')->get()->unique('order_uid');

        return \view('cms.orders.index', compact('orders'));
    }

    public function details($id): View
    {
        $products = ConfigOrder::query()->with('product')->where('order_uid', $id)->get();
        $clientName = ConfigOrder::query()->where('order_uid', $id)->value('client_name');
        $clientEmail = ConfigOrder::query()->where('order_uid', $id)->value('client_email');
        $orderDate = ConfigOrder::query()->where('order_uid', $id)->value('created_at');

        $clientDetails = array(
            'clientName' => $clientName,
            'clientEmail' => $clientEmail,
            'date' => $orderDate,
        );
        return \view('cms.orders.show', compact('products', 'clientDetails'));
    }

    public function destroy(ConfigOrder $order): RedirectResponse
    {
        $order->delete();
        return redirect()->back();
    }
}
