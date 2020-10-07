<?php

namespace App\Repositories;

use App\Models\Marca;
use App\Repositories\BaseRepository;

/**
 * Class MarcaRepository
 * @package App\Repositories
 * @version September 30, 2020, 3:31 pm UTC
*/

class MarcaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
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
        return Marca::class;
    }
}
