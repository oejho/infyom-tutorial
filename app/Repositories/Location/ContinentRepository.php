<?php

namespace App\Repositories\Location;

use App\Models\Location\Continent;
use App\Repositories\BaseRepository;

/**
 * Class ContinentRepository
 * @package App\Repositories\Location
 * @version October 16, 2020, 3:18 am UTC
*/

class ContinentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Continent::class;
    }
}
