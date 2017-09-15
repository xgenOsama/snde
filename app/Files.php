<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Files extends Model
{
    use SoftDeletes;
    public $table = 'files';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'user_id',
        'name',
        'local_path',
        'url',
        'file_size',
        'is_active',
        'product_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'name' => 'string',
        'local_path' => 'string',
        'file_size' => 'integer',
        'url' => 'string',
        'is_active' => 'boolean',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'local_path' => 'required',
        'url' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(App\User::class, 'user_id', 'id');
    }
}
