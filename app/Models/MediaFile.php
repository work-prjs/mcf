<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class MediaFile
 * @package App\Models
 * @version December 18, 2019, 5:13 pm UTC
 *
 * @property string name
 * @property string desc
 * @property string image
 */
class MediaFile extends Model
{

    public $table = 'media_files';
    



    public $fillable = [
        'name',
        'desc',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
