<?php

namespace App\Repositories;

use App\Models\Compra;
use App\Repositories\BaseRepository;

/**
 * Class CompraRepository
 * @package App\Repositories
 * @version October 2, 2020, 1:46 pm UTC
*/

class CompraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
        'proveedor_id',
        
        
        'numeroComprobante',
        'total'
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
        return Compra::class;
    }
}
