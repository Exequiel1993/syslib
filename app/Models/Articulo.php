<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Articulo
 * @package App\Models
 * @version September 30, 2020, 3:42 pm UTC
 *
 * @property string $codigoUnico
 * @property string $imagen
 * @property integer $cantidad
 * @property string $precioVenta
 * @property string $stockMinimo
 * @property string $stockMaximo
 * @property integer $tipoArticulo_id
 * @property integer $marca_id
 */
class Articulo extends Model
{
    use SoftDeletes;

    public $table = 'articulos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'codigoUnico' => 'string',
        'imagen' => 'string',
        'cantidad' => 'integer',
        'precioVenta' => 'string',
        'stockMinimo' => 'string',
        'stockMaximo' => 'string',
        'tipoArticulo_id' => 'integer',
        'marca_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'codigoUnico' => 'required',
        'cantidad' => 'required',
        'precioVenta' => 'required',
        'stockMinimo' => 'required',
        'stockMaximo' => 'required',
        'tipoArticulo_id' => 'required',
        'marca_id' => 'required'
    ];

    public function tipo(){
        return $this->belongsTo(TipoArticulo::Class,'tipoArticulo_id');
    }

    public function marca(){
        return $this->belongsTo(Marca::Class,'marca_id');
    }
    
}
