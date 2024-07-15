<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;

class CartController extends Controller
{

    // public function index()
    // {
    //     $cart = Session::get('cart', []);
    //     $totalPrice = array_sum(array_map(function ($item) {
    //         return $item['price'] * $item['product']['quantity'];
    //     }, $cart));

    //     return view('user.pesanan', compact('cart', 'totalPrice'));
    // }

    public function add(Request $request, Product $product)
    {
        $cart = Session::get('cart', []);

        // Cek jika produk sudah ada di keranjang
        $index = null;
        foreach ($cart as $key => $item) {
            if (isset($item['product']) && $item['product']['id'] == $product->id) {
                $index = $key;
                break;
            }
        }

        if ($index !== null) {
            // Jika produk sudah ada, tambahkan quantity-nya
            $cart[$index]['product']['quantity'] += $request->quantity;
        } else {
            // Jika produk belum ada, tambahkan produk baru ke keranjang
            $cart[] = [
                'product' => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'category_id' => $product->category_id,
                    'description' => $product->description,
                    'original_price' => $product->original_price,
                    'selling_price' => $product->selling_price,
                    'quantity' => $request->quantity,
                    'max_quantity' => $product->quantity, // Tambahkan jumlah stok yang tersedia
                    'image_path' => $product->image_path,
                ],
                'price' => $product->selling_price
            ];
        }

        Session::put('cart', $cart);

        // Set flash session dengan jumlah item di keranjang
        Session::flash('cartCount', count($cart));

        return redirect()->route('home')->with('success', 'Berhasil disimpan di cart!');
    }

    public function update(Request $request, $index)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$index])) {
            $cart[$index]['product']['quantity'] = $request->quantity;
            Session::put('cart', $cart);
        }

        return redirect()->route('home')->with('success', 'Kuantitas produk berhasil diperbarui!');
    }

    public function remove($index)
    {
        $cart = Session::get('cart', []);
        unset($cart[$index]);
        Session::put('cart', array_values($cart));

        return redirect()->route('home');
    }

    public function checkout()
    {
        $cart = Session::get('cart', []);

        $user = Auth::user()->id;

        if (count($cart) > 0) {
            // Periksa apakah ada produk dengan quantity 0 di keranjang
            foreach ($cart as $item) {
                if ($item['product']['quantity'] == 0) {
                    return redirect()->route('home')->with('error', 'Terdapat produk dengan jumlah 0 di keranjang Anda.');
                }

                // Periksa apakah quantity produk di database mencukupi
                $product = Product::find($item['product']['id']);
                if (!$product || $product->quantity < $item['product']['quantity']) {
                    return redirect()->route('home')->with('error', 'Jumlah produk "' . $product->name . '" tidak mencukupi.');
                }
            }

            $order = Order::create([
                'user_id' => $user,
                'total_price' => array_sum(array_map(function ($item) {
                    return $item['price'] * $item['product']['quantity'];
                }, $cart)),
            ]);

            foreach ($cart as $item) {
                // Simpan detail pesanan
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product']['id'],
                    'quantity' => $item['product']['quantity'],
                    'price' => $item['price'],
                ]);

                // Kurangi quantity produk di database
                $product->quantity -= $item['product']['quantity'];
                $product->save();
            }

            Session::forget('cart');
            return redirect()->route('home')->with('success', 'Checkout berhasil!');
        }

        return redirect()->route('home')->with('error', 'Keranjang belanja Anda kosong.');
    }

    public function history()
    {
        $orders = Order::with('product.product')->get();
        return view('admin.history', compact('orders'));
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->delete();
            return redirect()->route('order.history')->with('success', 'Order deleted successfully!');
        } else {
            return redirect()->route('order.history')->with('error', 'Order not found!');
        }
    }

    public function pdf($order)
    {
        // Ambil data pesanan
        $order = Order::findOrFail($order);
        // $cartItems = Order::with('products')->where('user_id', $userId)->get();

        // Load view data into the PDF
        $pdf = Pdf::loadView('admin.pdf', compact('order'));

        // Optional: Set paper size and orientation
        $pdf->setPaper('A4', 'landscape');

        // Generate and return the PDF for download or display
        return $pdf->stream('order_' . $order->id . '.pdf');
    }
}
