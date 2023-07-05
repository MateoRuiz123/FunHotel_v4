<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servicio;

class Catalogo extends Model
{
    use HasFactory;
    protected $table = 'catalogos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'descripcion',
    ];
    public $timestamps = false;
    protected $guarded = [];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'idServicio', 'id');
    }

    const Activo = 1;
    const Inactivo = 0;

    public function getEstadoTextoAttribute()
    {
        switch ($this->estado) {
            case Catalogo::Activo:
                return 'Activo';
            case Catalogo::Inactivo:
                return 'Inactivo';
            default:
                return 'Desconocido';
        }
    }

    public static function getEstadoValue($estado)
    {
        switch ($estado) {
            case 'Activo':
                return 1;
            case 'Inactivo':
                return 0;
            default:
                return 69; // Valor por defecto si el estado no coincide con ninguno de los valores anteriores
        }
    }
}
