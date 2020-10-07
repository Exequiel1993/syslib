<?php

namespace App\Repositories;

use App\Models\Articulo;
use App\Repositories\BaseRepository;

/**
 * Class ArticuloRepository
 * @package App\Repositories
 * @version September 30, 2020, 3:42 pm UTC
*/

class ArticuloRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'codigoUnico',
        'descripcion',
        'imagen',
        'cantidad',
        'precioVenta',
        'stockMinimo',
        'stockMaximo',
        'tipoArticulo_id',
        'marca_id'
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
        return Articulo::class;
    }
}
