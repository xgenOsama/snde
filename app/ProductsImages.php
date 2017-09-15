<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductsImages extends Model
{
    use SoftDeletes;

    public $table = 'products_images';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'product_id',
        'file_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'product_id' => 'integer',
        'file_id' => 'integer',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function products()
    {
        return $this->belongsTo(App\Products::class, 'product_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function files()
    {
        return $this->belongsTo(App\Files::class, 'file_id', 'id');
    }
}
