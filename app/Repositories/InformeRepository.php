<?php

namespace App\Repositories;

use App\Models\Informe;
use App\Repositories\BaseRepository;

/**
 * Class InformeRepository
 * @package App\Repositories
 * @version November 2, 2020, 10:45 pm UTC
*/

class InformeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'empresa',
        'direccion',
        'telefono',
        'imagen'
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
        return Informe::class;
    }
}
