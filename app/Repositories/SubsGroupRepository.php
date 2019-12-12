<?php

namespace App\Repositories;

use App\Models\SubsGroup;
use App\Repositories\BaseRepository;

/**
 * Class SubsGroupRepository
 * @package App\Repositories
 * @version December 12, 2019, 2:41 pm UTC
*/

class SubsGroupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'active',
        'name',
        'comment'
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
        return SubsGroup::class;
    }
}
