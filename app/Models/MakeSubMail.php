<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class MakeSubMail
 * @package App\Models
 * @version December 12, 2019, 4:17 pm UTC
 *
 * @property string name
 * @property string subject
 * @property string text
 * @property string mail_files
 * @property boolean done
 * @property string comment
 */
class MakeSubMail extends Model
{

    public $table = 'make_sub_mails';
    



    public $fillable = [
        'name',
        'subject',
        'text',
        'mail_files',
        'done',
        'comment'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'subject' => 'string',
        'mail_files' => 'string',
        'done' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function group_in_mails()
    {
        return $this->hasMany('App\Models\GroupInMail');
    }
    
}
