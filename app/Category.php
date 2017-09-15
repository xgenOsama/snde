<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use SoftDeletes;

    public $table = 'categories';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'category_id',
        'name',
        'description',
        'is_active',
        'slug',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'category_id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'is_active' => 'boolean',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'slug' => 'required|alpha_dash',
    ];


    public function childCategories()
    {
        return $this->hasMany(App\Category::class, 'category_id', 'id');
    }

    public function parentCategory()
    {
        return $this->belongsTo(App\Category::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(App\Product::class, 'category_id', 'id');
    }

    /*
        get products that related to a child category
     */
    public function childrenProducts()
    {
        return $this->hasManyThrough(
            App\Product::class,
            App\Category::class,
            'category_id', 'category_id'
        );
    }

    // need to check why it cases union error
    public function allProducts()
    {
        return $this->products()->union($this->childrenProducts()->toBase());
    }


    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

}
