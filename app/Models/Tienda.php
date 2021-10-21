<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tienda
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Juego[] $juegos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tienda extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function juegos()
    {
        return $this->hasMany('App\Models\Juego', 'tienda_id', 'id');
    }
    

}
