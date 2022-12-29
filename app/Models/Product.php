<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $guarded = ['created_at','updated_at'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
