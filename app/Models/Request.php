<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Request extends Model
{
    use HasFactory;

    protected $table = 'requests'; 
    protected $fillable = [
        'buyer',
        'seller',
        'product_id',
        'offer_ratio',
        'is_sale'
    ];
    public $timestamps = true; 

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function buyer_user()
    {
        return $this->belongsTo(User::class, 'buyer');
    }

    public function seller_user()
    {
        return $this->belongsTo(User::class, 'seller');
    }
    
}


