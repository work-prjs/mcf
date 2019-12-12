<?php

namespace App\Repositories;

use App\Models\GroupInMail;
use App\Repositories\BaseRepository;

/**
 * Class GroupInMailRepository
 * @package App\Repositories
 * @version December 12, 2019, 4:21 pm UTC
*/

class GroupInMailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'make_sub_mail_id',
        'subs_group_id'
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
        return GroupInMail::class;
    }
}
