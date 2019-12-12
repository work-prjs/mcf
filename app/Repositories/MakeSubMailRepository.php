<?php

namespace App\Repositories;

use App\Models\MakeSubMail;
use App\Repositories\BaseRepository;

/**
 * Class MakeSubMailRepository
 * @package App\Repositories
 * @version December 12, 2019, 4:17 pm UTC
*/

class MakeSubMailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'subject',
        'text',
        'mail_files',
        'done',
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
        return MakeSubMail::class;
    }
}
