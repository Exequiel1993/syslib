<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Informe
 * @package App\Models
 * @version November 2, 2020, 10:45 pm UTC
 *
 * @property string $empresa
 * @property string $direccion
 * @property string $telefono
 * @property string $imagen
 */
class Informe extends Model
{
    use SoftDeletes;

    public $table = 'informes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'empresa',
        'direccion',
        'telefono',
        'imagen'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'empresa' => 'string',
        'direccion' => 'string',
        'telefono' => 'string',
        'imagen' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'empresa' => 'required',
        'direccion' => 'required',
        'telefono' => 'required',
        'imagen' => 'required'
    ];

    
}
