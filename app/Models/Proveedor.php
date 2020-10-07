<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Proveedor
 * @package App\Models
 * @version October 2, 2020, 1:16 pm UTC
 *
 * @property string $nombre
 * @property string $telefono
 */
class Proveedor extends Model
{
    use SoftDeletes;

    public $table = 'proveedors';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nombre',
        'telefono'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'telefono' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'telefono' => 'required'
    ];

    
}
