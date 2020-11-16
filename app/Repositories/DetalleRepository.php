<?php

namespace App\Repositories;

use App\Models\Detalle;
use App\Repositories\BaseRepository;

/**
 * Class DetalleRepository
 * @package App\Repositories
 * @version October 29, 2020, 1:22 pm UTC
*/

class DetalleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'articulo_id',
        'cantidad',
        'precioCompra',
        'subtotal',
        'compra_id'
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
        return Detalle::class;
    }
}
