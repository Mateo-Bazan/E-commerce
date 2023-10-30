<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $rubro
 * @property $subrubro
 * @property $producto
 * @property $marca
 * @property $stock
 * @property $foto
 * @property $precio_costo
 * @property $iva
 * @property $ibb
 * @property $impuesto_provincia
 * @property $precio_venta
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'rubro' => 'required',
		'subrubro' => 'required',
		'producto' => 'required',
		'marca' => 'required',
		'stock' => 'required',
		'foto' => 'required|image|mimes:jpeg,png,jpg',
		'precio_costo' => 'required',
		'iva' => 'nullable',
		'ibb' => 'nullable',
		'impuesto_provincia' => 'nullable',
		'precio_venta' => 'nullable',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['rubro','subrubro','producto','marca','stock','foto','precio_costo','iva','ibb','impuesto_provincia','precio_venta'];



}
