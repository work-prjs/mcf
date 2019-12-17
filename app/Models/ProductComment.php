<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ProductComment
 * @package App\Models
 * @version December 17, 2019, 7:10 am UTC
 *
 * @property string text
 * @property boolean allowed
 * @property string product_id
 * @property integer user_id
 * @property string session
 */
class ProductComment extends Model
{

    public $table = 'product_comments';
    



    public $fillable = [
        'text',
        'allowed',
        'product_id',
        'user_id',
        'session'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'allowed' => 'boolean',
        'product_id' => 'string',
        'user_id' => 'integer',
        'session' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
