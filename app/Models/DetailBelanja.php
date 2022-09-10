<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBelanja extends Model
{
    use HasFactory;

    protected $table = 'detail_belanja';
    protected $fillable = [
        'belanja_id',
        'cart_id',
        'product_id',
        'jumlah'
    ];

    protected $hidden = [];


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function Belanja()
    {
        return $this->belongsTo(Belanja::class, 'belanja_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
}
