<?php

namespace App\Repositories;

use App\Models\Cat;
use App\Repositories\BaseRepository;

/**
 * Class CatRepository
 * @package App\Repositories
 * @version November 1, 2019, 1:18 pm UTC
*/

class CatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ident',
        'name',
        'desc',
        'image',
        'xml_name',
        'parent_id',
        'menu'
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
        return Cat::class;
    }
}
