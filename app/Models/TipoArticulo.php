<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Doctrine\DBAL\Query;

/**
 * Class TipoArticulo
 * @package App\Models
 * @version September 30, 2020, 3:29 pm UTC
 *
 * @property string $nombre
 */
class TipoArticulo extends Model 
{
    use SoftDeletes;

    public $table = 'tipo_articulos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'tipoArticulo_id',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required|max: 50'
    ];

    
}
