<?php

namespace App\Repositories;

use App\Models\DocFile;
use App\Repositories\BaseRepository;

/**
 * Class DocFileRepository
 * @package App\Repositories
 * @version December 19, 2019, 2:15 am UTC
*/

class DocFileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'desc',
        'doc_file',
        'doc_file_type'
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
        return DocFile::class;
    }
}
