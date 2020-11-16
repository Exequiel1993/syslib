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
        
        'proveedor_id',
        
        
        'numeroComprobante',
        'total'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        
        'proveedor_id' => 'integer',
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
        'proveedor_id' => 'required',
        
    ];

    

    public function proveedor(){
        return $this->belongsTo(Proveedor::Class,'proveedor_id');
    }
    
}
