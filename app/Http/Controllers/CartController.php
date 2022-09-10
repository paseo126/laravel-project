<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('
        SELECT u.first_name, u.midle_name, u.last_name, 
        p.product_name, p.id as id_product, p.image, p.harga,
        c.jumlah, c.id
        FROM (users as u, products as p)
        JOIN (SELECT * FROM cart WHERE user_id = '.auth()->user()->id.') as c
        ON u.id = c.user_id AND p.id = c.product_id
        ');

        return view('belanja.cart', [
            'carts' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_id' => '',
            'product_id' => '',
            'jumlah' => '',
        ]);

        Cart::create($validate);

        return redirect('/dasboard/cart')->with('success', 'registering successfull, please login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = Cart::findOrFail($id);
        $carts = DB::select('select * from cart where id= '.$id.'')[0];
        $product = DB::select('select * from products where id = '.$carts->product_id.'')[0];

        $data = [
            'id' => $id,
            'user_id' => $cart->user_id,
            'jumlah' => $cart->jumlah,
            'product' => [
                'id' => $product->id,
                'product_name' => $product->product_name,
                'stock' => $product->stock,
                'image' => $product->image,
                'harga' => $product->harga,
                'description' => $product->description
            ],
        ];

        return view('belanja.editcart', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Cart::findorfail($id);

        $data->update($request->all());

        return redirect('/dasboard/cart')->with('updatesuccess', 'update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Cart::findorfail($id);

        $data->delete();

        return redirect('/dasboard/cart')->with('deletesuccess', 'delete success');
    }
}
