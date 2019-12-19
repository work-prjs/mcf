<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Article
 * @package App\Models
 * @version December 18, 2019, 5:55 pm UTC
 *
 * @property string name
 * @property string text
 * @property string image
 */
class Article extends Model
{

    public $table = 'articles';
    



    public $fillable = [
        'name',
        'text',
        'image',
        'ifile'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'image' => 'string',
        'ifile' => 'string'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
