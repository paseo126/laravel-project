@extends('belanja.componens.main')



@section('container')
    @php
            $jml = 0;
            $totalBiaya = 0;
        foreach ($carts as $cart) {
            $totalBiaya = $totalBiaya + ($cart->jumlah * $cart->harga);
            $jml = $jml + $cart->jumlah;
        }
    @endphp


    <div class="container bg-light">
        <div class="col-6">
            <form action="/dasboard/belanja" method="POST">
                <div class="mb-3">
                    @csrf
                    <label for="exampleFormControlTextarea1" class="form-label">Lokasi Pengiriman</label>
                    <textarea class="form-control" name="lokasi" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="div">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="jumlah" value="{{ $jml }}">
                    <input type="hidden" name="totalHarga" value="{{ $totalBiaya }}">
                    <h5 class="card-title mb-3">total harga = Rp.{{ number_format($totalBiaya, 2, ',', '.') }}</h5>
                </div>
                <Button type="submit" name="button" class="btn btn-success mb-3">Belanja</Button>
            </form>
              
        </div>


        @foreach ($carts as $cart)
            
        
        <div class="row border p-2 mb-2">
            <div class="col-2">
                <img src="../../img/product/{{ $cart->image }}" width="100px" alt="">
            </div>
            <div class="col-6">
                <h5 class="card-title">{{ $cart->product_name }}</h5>
                <p class="card-text">jumlah produk : {{ $cart->jumlah }}</p>
                <p class="card-text">Total harga : Rp.{{ number_format($cart->jumlah * $cart->harga, 2, ',', '.') }}</p>
            </div>
            <div class="col-4 justify-content-center">
                <a href="cart/delete/{{ $cart->id }}" class="btn btn-sm btn-danger">delete</a>
                <a href="cart/edit/{{ $cart->id }}" class="btn btn-sm btn-primary">edit</a>
            </div>
        </div>

        @endforeach
    </div>
@endsection