<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Detalle
 * @package App\Models
 * @version October 29, 2020, 1:22 pm UTC
 *
 * @property integer $articulo_id
 * @property integer $cantidad
 * @property integer $precioCompra
 * @property integer $subtotal
 * @property integer $compra_id
 */
class Detalle extends Model
{
    use SoftDeletes;

    public $table = 'detalles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'articulo_id',
        'cantidad',
        'precioCompra',
        'subtotal',
        'compra_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'articulo_id' => 'integer',
        'cantidad' => 'integer',
        'precioCompra' => 'integer',
        'subtotal' => 'integer',
        'compra_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'articulo_id' => 'required',
        'cantidad' => 'required',
        'precioCompra' => 'required',
        'subtotal' => 'required',
        'compra_id' => 'required'
    ];

    
}
