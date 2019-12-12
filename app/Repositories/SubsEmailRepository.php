<?php

namespace App\Repositories;

use App\Models\SubsEmail;
use App\Repositories\BaseRepository;

/**
 * Class SubsEmailRepository
 * @package App\Repositories
 * @version December 12, 2019, 2:38 pm UTC
*/

class SubsEmailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'group_email_id',
        'email',
        'active',
        'comment',
        'subs'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SubsEmail::class;
    }
}
