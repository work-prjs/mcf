<?php

namespace App\Repositories;

use App\Models\MediaFile;
use App\Repositories\BaseRepository;

/**
 * Class MediaFileRepository
 * @package App\Repositories
 * @version December 18, 2019, 5:13 pm UTC
*/

class MediaFileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'desc',
        'image'
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
        return MediaFile::class;
    }
}
