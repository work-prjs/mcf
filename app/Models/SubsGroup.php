<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class SubsGroup
 * @package App\Models
 * @version December 12, 2019, 2:41 pm UTC
 *
 * @property boolean active
 * @property string name
 * @property string comment
 */
class SubsGroup extends Model
{

    public $table = 'subs_groups';
    



    public $fillable = [
        'active',
        'name',
        'comment'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'active' => 'boolean',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function emails()
    {
        return $this->hasMany('App\Models\SubsEmail','group_email_id');
        // return $this->belongsTo('App\Carts');
    }

    // public function group_in_mails()
    // {
    //     return $this->hasMany('App\Models\GroupInMail', );
    // }



    
}
