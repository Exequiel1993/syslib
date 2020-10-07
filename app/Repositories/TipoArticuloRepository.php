<?php

namespace App\Repositories;

use App\Models\TipoArticulo;
use App\Repositories\BaseRepository;

/**
 * Class TipoArticuloRepository
 * @package App\Repositories
 * @version September 30, 2020, 3:29 pm UTC
*/

class TipoArticuloRepository extends BaseRepository
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
        return TipoArticulo::class;
    }
}
