<?php

namespace App\Repositories;

use App\Models\Chit;
use App\Repositories\BaseRepository;

/**
 * Class ChitRepository
 * @package App\Repositories
 * @version December 18, 2019, 2:53 am UTC
*/

class ChitRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'text',
        'by_line',
        'active'
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
        return Chit::class;
    }
}
