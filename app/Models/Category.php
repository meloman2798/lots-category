<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $guarded = ['created_at', 'updated_at'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
}
