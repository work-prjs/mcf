<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Chit
 * @package App\Models
 * @version December 18, 2019, 2:53 am UTC
 *
 * @property string text
 * @property string by_line
 * @property boolean active
 */
class Chit extends Model
{

    public $table = 'chits';
    



    public $fillable = [
        'text',
        'by_line',
        'active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
