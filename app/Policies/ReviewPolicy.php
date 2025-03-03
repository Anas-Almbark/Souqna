<?php
namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use App\Models\Request;

class ReviewPolicy
{
    public function review(User $user, Product $product)
    {
        //هنا نضع جدول الذي تم حفظ فيه معلومات البيع
        return Request::where('buyer', $user->id)
                    ->where('product_id', $product->id)
                    ->where('is_sold',true )
                    ->exists();
    }
    
}
