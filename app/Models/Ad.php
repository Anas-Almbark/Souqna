<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public function TypeAd()
    {
        return $this->hasOne(type_ad::class);
    }
}
