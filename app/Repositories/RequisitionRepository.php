<?php

namespace App\Repositories;

use App\Models\Requisition;
use App\Repositories\BaseRepository;

/**
 * Class RequisitionRepository
 * @package App\Repositories
 * @version December 30, 2020, 7:00 am UTC
*/

class RequisitionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return Requisition::class;
    }
}
