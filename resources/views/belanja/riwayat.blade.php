@extends('belanja.componens.main')


@section('container')

<div class="container">

    @php
        $no = 1;
    @endphp
    @foreach ($data as $d)
                
            
    <div class="row border p-2 mb-2">
        <div class="row">
            <h5 class="card-title border-bottom mb-3">{{ $no }}. {{ $d['tanggal'] }}</h5>
            <h5 class="card-title mt-2">Total Jumlah Beli = {{ $d['jumlah'] }}</h5>
            <h5 class="card-title mt-3 mb-5">Total Harga : Rp.{{ number_format($d['totalHarga'], 2, ',', '.') }}</h5>
            
        </div>

        @foreach ($d['detailProduct'] as $detail)
            <div class="row border-bottom mb-4">
                <div class="col-2">
                    <img src="../../img/product/{{ $detail->image }}" width="100px" alt="">
                </div>
                <div class="col-6">
                    <h5 class="card-title">{{ $detail->product_name }}</h5>
                    <p class="card-text">jumlah produk : {{ $detail->jumlah }}</p>
                    <p class="card-text">Total harga : Rp.{{ number_format($detail->jumlah * $detail->harga, 2, ',', '.') }}</p>
                </div>
            </div>
        @endforeach

    </div>
        @php
            $no++;
        @endphp
    @endforeach
    
</div>
@endsection