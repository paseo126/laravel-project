@extends('belanja.componens.main')


@section('container')

    <div class="container">
        <div class="row mt-5">
            <div class="col-6">
                <img src="../../img/product/{{ $data['product']['image'] }}" width="100%"  alt="">
            </div>
            <div class="col">
                <h1 class="mb-5 ">Description</h1>
                
                    <h5 class="card-title">{{ $data['product']['product_name'] }}</h5>
                    <h5 class="card-title">Rp.{{ number_format($data['product']['harga'], 2, ',', '.') }}</h5>
                    <p class="card-text">Stock :    {{ $data['product']['stock'] }}</p>
                    <p class="card-text">{{ $data['product']['description'] }}</p>

                    <h1 class="mb-5 ">Beli</h1>

                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" class="btn btn-danger" onclick="kurang()">-</button>
                        <input type="text" width="50px" class="from-control" value="{{ $data['jumlah'] }}" id="jml_produk" onclick="tambah()">
                        <button type="button" class="btn btn-success" onclick="tambah()">+</button>
                    </div>

                    <form action="/cart/edit/{{ $data['id'] }}" method="POST">
                        @csrf
                        <input type="hidden" name="jumlah" id="jumlah" value="{{ $data['jumlah'] }}">
                        <input type="hidden" name="product_id" id="product_id" value="{{ $data['product']['id'] }}">
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">

                        <button type="submit" class="btn btn-success mt-3">Simpan</button>
                    </form>
            </div>
        </div>
    </div>

@endsection



<script>
    function kurang()
    {
        
        var jumlah = document.getElementById("jml_produk").value
        
        jumlah_produk = parseInt(jumlah) - 1;
        console.log(jumlah_produk);
        document.getElementById("jml_produk").value = jumlah_produk;
        document.getElementById("jumlah").value = jumlah_produk;
    }

    function tambah()
    {
        var jumlah = document.getElementById("jml_produk").value

        jumlah_produk = parseInt(jumlah) + 1;

        document.getElementById("jml_produk").value = jumlah_produk;
        document.getElementById("jumlah").value = jumlah_produk;    
    }

</script>