@extends('belanja.componens.main')


@section('container')
<div class="container">
    <div class="row">
        @foreach ($products as $product)
            <div class="card shadow p-3 mb-5 rounded m-2 pt-3 col-3" style="width: 15rem;">
                <img src="img/product/{{ $product->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                <h5 class="card-title">{{ $product->product_name }}</h5>
                <p class="card-text">stock : {{ $product->stock }}</p>
                <p class="card-text">Harga : Rp.{{ number_format($product->harga, 2, ',', '.') }}</p>
                </div>
                <a href="/product/details/{{ $product->id }}" class="btn btn-primary">detail</a>
            </div>
        @endforeach
    </div>
</div>
@endsection