<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\Facades\DNS2DFacade;

class HomeApiController extends Controller
{
    public function store(Request $request)
    {

        $data = $this->validate(
            \request(),
            [
                'id' => 'required',
                'amount' => 'required|numeric',
                'tax' => 'required|numeric',
                'total' => 'required|numeric',
                'supplier_name' => 'required|string',

            ]
        );

        $order = new order;
        $order->order_id = $request->id;
        $order->amount = $request->amount;
        $order->tax = $request->tax;
        $order->total = $request->total;
        $order->supplier_name = $request->supplier_name;
        $order->save();
        $id = base64_encode($order->id);
        $url = url('/show/' . $id);

        $file = Storage::disk('public')->put($id, base64_decode(DNS2DFacade::getBarcodePNG($url, "QRCODE")));
        return "<img src=" . url("/uploads/qr_images/" . $id) . ">";
//        return url("/uploads/qr_images/' . $id);

    }

    public function show($id)
    {
        $id = base64_decode($id);
        $order = Order::findOrFail($id);
        return view('show', compact('order'));
    }
}
