<?php

namespace App\Repositories;

use App\Models\ContactContractor;
use App\Repositories\BaseRepository;

/**
 * Class ContactContractorRepository
 * @package App\Repositories
 * @version December 22, 2019, 6:33 pm UTC
*/

class ContactContractorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country',
        'city',
        'adr',
        'contacts',
        'name',
        'user_id'
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
        return ContactContractor::class;
    }
}
