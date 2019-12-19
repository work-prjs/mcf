<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class DocFile
 * @package App\Models
 * @version December 19, 2019, 2:15 am UTC
 *
 * @property string name
 * @property string desc
 * @property string doc_file
 * @property string doc_file_type
 */
class DocFile extends Model
{

    public $table = 'doc_files';
    



    public $fillable = [
        'name',
        'desc',
        'doc_file',
        'doc_file_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'desc' => 'string',
        'doc_file' => 'string',
        'doc_file_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
