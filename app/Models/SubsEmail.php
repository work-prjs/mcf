<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class SubsEmail
 * @package App\Models
 * @version December 12, 2019, 2:38 pm UTC
 *
 * @property integer group_email_id
 * @property string email
 * @property boolean active
 * @property string comment
 * @property boolean subs
 */
class SubsEmail extends Model
{

    public $table = 'subs_emails';
    



    public $fillable = [
        'group_email_id',
        'email',
        'active',
        'comment',
        'subs'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'group_email_id' => 'integer',
        'email' => 'string',
        'active' => 'boolean',
        'subs' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function group()
    {
        // return $this->belongsTo('App\Models\Cat', 'cat_id');
        return $this->belongsTo('App\Models\SubsGroup', 'group_email_id');
        // return $this->hasMany('App\Models\LineItem');
        // return $this->belongsTo('App\Carts');
    }
    
}
