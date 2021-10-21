<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Juego
 *
 * @property $id
 * @property $tienda_id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Tienda $tienda
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Juego extends Model
{
    
    static $rules = [
		'tienda_id' => 'required',
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tienda_id','nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tienda()
    {
        return $this->hasOne('App\Models\Tienda', 'id', 'tienda_id');
    }
    

}
