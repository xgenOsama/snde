<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function category()
    {
        return $this->belongsTo(App\Category::class, 'category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function owner()
    {
        return $this->belongsTo(App\User::class, 'user_id', 'id');
    }

    public function images()
    {
        return $this->belongsToMany(
            App\Files::class, 'products_images', 'product_id', 'file_id'
        );
    }
}
