<?php

namespace App\Http\Controllers;

use App\Models\Belanja;
use Illuminate\Http\Request;
use App\Models\DetailBelanja;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class BelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $belanja = Belanja::where('user_id', auth()->user()->id)->get();

        $data=[];
        foreach($belanja as $b):
            $detailBelanja = DB::select('
                SELECT p.product_name, p.image, p.harga, bd.jumlah
                FROM (products as p, belanja as b)
                JOIN detail_belanja as bd
                ON p.id = bd.product_id AND b.id = bd.belanja_id
            ');

            $data[] = [
                'id' => $b->id,
                'jumlah' => $b->jumlah,
                'totalHarga' => $b->totalHarga,
                'tanggal' => $b->created_at,
                'detailProduct' => $detailBelanja
            ];
        endforeach;

        return view('belanja.riwayat',[
            'data' => $data
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
            'lokasi' => '',
            'jumlah' => '',
            'totalHarga' => '',
        ]);

        $belanja = Belanja::create($validate);

        if ($belanja) {
            $cart = DB::select('SELECT * FROM cart WHERE user_id = '.auth()->user()->id.'');
            $getBelanja = DB::select('SELECT id FROM belanja WHERE user_id = '.auth()->user()->id.'')[0];

            foreach($cart as $c):
                $product = DB::select('select * from products where id = '.$c->product_id.'')[0];

                $newStock = $product->stock - $c->jumlah;

                $detailBelanja = [
                    'belanja_id' => $getBelanja->id,
                    'cart_id' => $c->id,
                    'product_id' => $c->product_id,
                    'jumlah' => $c->jumlah
                ];

                $addDetailBelanja = DetailBelanja::create($detailBelanja);

                $updateProduct = DB::update("update products set 
                product_name = '$product->product_name',
                stock = '$newStock',
                harga = '$product->harga',
                image = '$product->image',
                description = '$product->description',
                created_at = NOW(),
                updated_at = NOW()
                WHERE id = $c->product_id
                ");
            endforeach;
        }
        


        return redirect('/dasboard/riwayat')->with('success', 'registering successfull, please login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
