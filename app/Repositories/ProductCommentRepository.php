<?php

namespace App\Repositories;

use App\Models\ProductComment;
use App\Repositories\BaseRepository;

/**
 * Class ProductCommentRepository
 * @package App\Repositories
 * @version December 17, 2019, 7:10 am UTC
*/

class ProductCommentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'text',
        'allowed',
        'product_id',
        'user_id',
        'session'
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
        return ProductComment::class;
    }
}
