<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ContactContractor
 * @package App\Models
 * @version December 22, 2019, 6:33 pm UTC
 *
 * @property string country
 * @property string city
 * @property string adr
 * @property string contacts
 * @property string name
 * @property integer user_id
 */
class ContactContractor extends Model
{

    public $table = 'contact_contractors';
    



    public $fillable = [
        'country',
        'city',
        'adr',
        'contacts',
        'name',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'country' => 'string',
        'city' => 'string',
        'adr' => 'string',
        'contacts' => 'string',
        'name' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
