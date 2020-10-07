<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Compra
 * @package App\Models
 * @version October 2, 2020, 1:46 pm UTC
 *
 * @property string $cantidad
 * @property integer $proveedor_id
 * @property integer $articulo_id
 */
class Compra extends Model
{
    use SoftDeletes;

    public $table = 'compras';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'cantidad',
        'proveedor_id',
        'articulo_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cantidad' => 'string',
        'proveedor_id' => 'integer',
        'articulo_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cantidad' => 'required',
        'proveedor_id' => 'required',
        'articulo_id' => 'required'
    ];

    public function articulo(){
        return $this->belongsTo(Articulo::Class,'articulo_id');
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::Class,'proveedor_id');
    }
    
}
