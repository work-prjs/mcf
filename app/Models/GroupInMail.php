<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class GroupInMail
 * @package App\Models
 * @version December 12, 2019, 4:21 pm UTC
 *
 * @property integer make_sub_mail_id
 * @property integer subs_group_id
 */
class GroupInMail extends Model
{

    public $table = 'group_in_mails';
    



    public $fillable = [
        'make_sub_mail_id',
        'subs_group_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'make_sub_mail_id' => 'integer',
        'subs_group_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    public function subs_groups()
    {
        return $this->belongsTo('App\Models\SubsGroup', 'subs_group_id');
    }
    public function make_sub_mails()
    {
        return $this->belongsTo('App\Models\MakeSubMail', 'make_sub_mail_id');
    }    
}
